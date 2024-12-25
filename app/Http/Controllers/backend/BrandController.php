<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('status', '=', 1)
            ->orderBy('sort_order', 'ASC') // Sắp xếp theo sort_order (có thể thay đổi nếu cần)
            ->select('id', 'name', 'slug', 'image', 'description', 'sort_order', 'status')
            ->paginate(8); // Phân trang 8 mục mỗi trang
            
        return view('backend.brand.index', compact('brands'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.brand.trash');
    }
    public function create()
{
    $brands = Brand::orderBy('sort_order', 'ASC')
        ->select("id", "name","image", "sort_order")
        ->get();
    return view('backend.brand.create', compact('brands'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        $brand->description = $request->description;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$brand->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/brands"),$fileName);
            $brand->image=$fileName;   
            }          
        }
        $brand->save();

        return redirect()->route('backend.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('brand.index')->with('error', 'brand không tồn tại.');
        }

        return view('backend.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.brand.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.brand.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.brand.delete');
    }
    public function restore(string $id)
    {
        return view('backend.brand.restore');
    }
    public function destroy(string $id)
    {
        return view('backend.brand.destroy');
    }
    public function status(string $id)
    {
        return view('backend.brand.status');
    }
}
