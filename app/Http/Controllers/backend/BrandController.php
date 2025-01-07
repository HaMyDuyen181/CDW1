<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC') // Sắp xếp theo sort_order (có thể thay đổi nếu cần)
            ->select('id', 'name', 'slug', 'image', 'description', 'sort_order', 'status')
            ->paginate(8); // Phân trang 8 mục mỗi trang
            
        return view('backend.brand.index', compact('brands'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        $brands = Brand::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(10); // Phân trang
        return view('backend.brand.trash', compact('brands'));
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/brand'), $filename);
            $brand->image = $filename;

            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->description = $request->description;
            $brand->sort_order = $request->sort_order;
            $brand->created_by = Auth::id() ?? 1;
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->status = $request->status ?? 0;
            $brand->save();
            return redirect()->route('brand.index')->with('success', 'them thanh cong');
        } else {
            return back()->with('error', 'chua chon hinh');
        }
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
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->firstOrFail();
        $brands = Brand::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.brand.edit', compact('brand', 'brands'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::where('id', $id)->first();
        $brand->name = $request->name;
        $brand->slug = $request->slug;

        if ($request->hasFile('image')) {
            if ($brand->image && File::exists(public_path("/images/brand/" . $brand->image))) {
                File::delete(public_path("/images/brand/" . $brand->image));
            }
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('/images/brand'), $filename);
            $brand->image = $filename;
        }
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        $brand->updated_by = Auth::id() ?? 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->status = $request->status ?? 0;
        $brand->save();
        return redirect()->route('brand.index')->with('success', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return redirect()->route('brand.index')->with('success', 'Xóa brand thành công!');
        }

        return redirect()->route('brand.index')->with('error', 'Không tìm thấy brand!');
    }
    public function restore(string $id)
    {
        $brand = Brand::withTrashed()->where('id', $id);
        if ($brand->first() != null) {
            $brand->restore();
            return redirect()->route('brand.trash')->with('success', 'Xóa brand thành công!');
        }

        return redirect()->route('brand.trash')->with('error', 'Không tìm thấy brand!');
    }
    public function destroy($id)
    {
        $brand = Brand::withTrashed()->where('id', $id)->first();
        if ($brand != null) {
            if ($brand->image && File::exists(public_path("images/brand/" . $brand->image))) {
                File::delete(public_path("images/brand/" . $brand->image));
            }
            $brand->forceDelete();

            return redirect()->route("brand.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('brand.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
    public function status(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
    
        // Toggle trạng thái (nếu trạng thái là 1 thì chuyển thành 0, ngược lại)
        $brand->status = !$brand->status; 
        $brand->save();
    
        return redirect()->route('brand.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
}
