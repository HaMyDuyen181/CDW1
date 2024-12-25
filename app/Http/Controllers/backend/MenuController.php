<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách các menu có trạng thái là "hoạt động" (status = 1) và phân trang
        $menus = Menu::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->select('id', 'name', 'link', 'position', 'status', 'sort_order', 'created_at', 'updated_at')
            ->paginate(10); // Sử dụng paginate thay vì get
    
        return view('backend.menu.index', compact('menus')); // Trả về view với dữ liệu menus
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.menu.trash');
    }
    public function create()
    {
        return view('backend.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.menu.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('menu.index')->with('error', 'menu không tồn tại.');
        }

        return view('backend.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.menu.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.menu.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.menu.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.menu.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.menu.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.menu.status');    
    }
}
