<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThanhVienController extends Controller
{
    // Phương thức để hiển thị trang hồ sơ của thành viên
    public function profile()
    {
        // Logic để hiển thị thông tin hồ sơ
        return view('profile'); // Giả sử bạn có một view có tên 'profile'
    }

    // Phương thức đăng xuất
    public function logout()
    {
        auth()->logout(); // Đăng xuất người dùng
        return redirect()->route('home'); // Điều hướng về trang chủ sau khi đăng xuất
    }

    // Các phương thức khác cho việc xử lý thành viên
}
