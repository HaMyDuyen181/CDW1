<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
// Đăng nhập admin
public function login(Request $request)
{
    return view('admin.login');
}

// Thực hiện đăng nhập
public function dologin(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng.']);
}

// Đăng xuất
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect(route('admin.login'));
}

}

