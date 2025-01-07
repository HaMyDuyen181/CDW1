<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::select("id", "name", "link", "image", "position", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        $banners = Banner::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(5);
        return view('backend.banner.trash', compact('banners'));
    }
    public function create()
    {
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.banner.create', compact('banners'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
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
    public function edit($id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.banner.edit', compact('banner', 'banners'));
    }

    /**
     * Update the specified resource in storage.
     */
   
     public function update(UpdateBannerRequest $request, $id)
     {
         // Lấy banner theo id
         $banner = Banner::findOrFail($id);
     
         // Xác thực dữ liệu từ request
         $validatedData = $request->validate([
             'name' => 'required|string|max:1000',
             'link' => 'nullable|string|max:1000',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'position' => 'required|in:slideshow,asd', // Chỉ chấp nhận giá trị hợp lệ
             'description' => 'required|string',
             'sort_order' => 'required|integer|min:1',
             'status' => 'required|boolean',
         ]);
     
         // Cập nhật các thuộc tính
         $banner->name = $validatedData['name'];
         $banner->link = $validatedData['link'] ?? $banner->link;
     
         // Xử lý hình ảnh nếu có upload mới
         if ($request->hasFile('image')) {
             if ($banner->image && File::exists(public_path("/images/banners/" . $banner->image))) {
                 File::delete(public_path("/images/banners/" . $banner->image));
             }
     
             $file = $request->file('image');
             $filename = date('YmdHis') . '.' . $file->extension();
             $file->move(public_path('/images/banners'), $filename);
             $banner->image = $filename;
         }
     
         // Đảm bảo giá trị position không null
         $banner->position = $validatedData['position'] ?? 'slideshow'; // Sử dụng giá trị mặc định nếu không cung cấp
         $banner->description = $validatedData['description'];
         $banner->sort_order = $validatedData['sort_order'];
         $banner->status = $validatedData['status'];
         $banner->updated_by = Auth::id() ?? 1;
         $banner->updated_at = now();
     
         // Lưu thay đổi
         $banner->save();
     
         return redirect()->route('banner.index')->with('success', 'Cập nhật thành công');
     }
     
 

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->delete();
            return redirect()->route('banner.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('banner.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $banner = Banner::withTrashed()->where('id', $id);
        if ($banner->first() != null) {
            $banner->restore();
            return redirect()->route('banner.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('banner.trash')->with('error', 'Không tìm thấy banner!');
    }
    
    public function destroy($id)
    {
        $banner = Banner::withTrashed()->where('id', $id)->first();
        if ($banner != null) {
            if ($banner->image && File::exists(public_path("images/banners/" . $banner->image))) {
                File::delete(public_path("images/banners/" . $banner->image));
            }
            $banner->forceDelete();

            return redirect()->route("banner.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('banner.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
    public function status(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
    
        // Toggle trạng thái (nếu trạng thái là 1 thì chuyển thành 0, ngược lại)
        $banner->status = !$banner->status; 
        $banner->save();
    
        return redirect()->route('banner.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
    

}
