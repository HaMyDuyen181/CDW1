<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lọc các người dùng với trạng thái '1' (hoạt động)
        $query = User::query();

        // Lọc theo vai trò nếu có
        if ($request->has('role')) {
            $query->where('roles', $request->role);
        }

        // Tìm kiếm người dùng theo tên hoặc email
        if ($request->has('search')) {
            $query->where('fullname', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // Lấy các người dùng, sắp xếp theo ngày tạo và phân trang
        $users = $query->orderBy('created_at', 'DESC')->paginate(8);

        // Trả về view với danh sách người dùng
        return view('backend.user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.user.trash');
    }
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.user.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'user không tồn tại.');
        }

        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.user.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.user.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.user.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.user.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.user.status');    
    }
}

