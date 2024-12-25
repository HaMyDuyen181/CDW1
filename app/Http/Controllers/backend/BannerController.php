<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Support\Facades\Auth;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $banners = Banner::where('status', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->select("id", "name", "link", "image", "position", "status")
        ->paginate(8);
        
    return view('backend.banner.index', compact('banners'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.banner.trash');
    }
    public function create()
    {
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.banner.create',compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/banner'), $filename);
            $banner->image = $filename;

            $banner->name = $request->name;
            $banner->link = $request->link;
            $banner->position = $request->position;
            $banner->description = $request->description;
            $banner->sort_order = $request->sort_order;
            $banner->created_by = Auth::id() ?? 1;
            $banner->created_at = date('Y-m-d H:i:s');
            $banner->status = $request->status ?? 0;
            $banner->save();
            return redirect()->route('banner.index')->with('success', 'them thanh cong');
        } else {
            return back()->with('error', 'chua chon hinh');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('banner.index')->with('error', 'Banner không tồn tại.');
        }

        return view('backend.banner.show', compact('banner'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner=Banner::find($id);
        // if($banner==null)
        // {
        //     // toastr()->error('Oops! Something went wrong!', 'Oops!');

        // }
        // $list= Banner::where('status','!=',0)->orderBy('created_at','desc')->get();
        // $htmlsortorder="";
        // foreach($list as $item)
        // {
        //     if($banner->sort_order - 1==$item->sort_order)
        //     {
        //         $htmlsortorder .="<option selected value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
        //     }
        //     else
        //     {
        //         $htmlsortorder .="<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
        //     }
        // }
        return view("backend.banner.edit",compact("banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.banner.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.banner.delete');
    }
    public function restore(string $id)
    {
        return view('backend.banner.restore');
    }
    public function destroy(string $id)
    {
        return view('backend.banner.destroy');
    }
    public function status(string $id)
    {
        // $banner=Banner::find($id);
        // if($banner==null)
        // $banner->status=($banner->status==1)?2:1;
        // $banner->updated_at=date('Y-m-d H:i:s');
        // $banner->updated_by=Auth::id()??1;
        // $banner->save();

        return redirect()->route('backend.banner.index');
    }
}
