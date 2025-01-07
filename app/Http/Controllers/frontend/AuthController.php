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
public function doLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to find the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        // Invalid email or password
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    // Log the user in
    Auth::login($user);

    return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công.');
}

// Đăng xuất
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect(route('admin.login'));
}

}

