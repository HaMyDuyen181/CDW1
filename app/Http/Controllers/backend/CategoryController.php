<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', '=', 1) // Chỉ lấy những danh mục có trạng thái là 1 (hoạt động)
            ->orderBy('sort_order', 'ASC') // Sắp xếp theo `sort_order`
            ->select('id', 'name', 'slug', 'image', 'parent_id', 'sort_order', 'description', 'status') // Chọn các trường cần thiết
            ->paginate(8); // Phân trang 8 mục mỗi trang
    
        return view('backend.category.index', compact('categories')); // Trả về view với dữ liệu categories
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.category.trash');
    }
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.category.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'category không tồn tại.');
        }

        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.category.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.category.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.category.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.category.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.category.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.category.status');    
    }
}
