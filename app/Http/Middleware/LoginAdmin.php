<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginAdmin
{/**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('admin.login')-> with('error', 'Bạn cần đăng nhập để truy cập trang này');
        }
            $user = Auth::user();
            if($user->roles!="admin")
            {
                return redirect()->route('site.home')-> with('error', 'Bạn không có quyền truy cập trang này');
            }

        return $next($request);
    }
}
