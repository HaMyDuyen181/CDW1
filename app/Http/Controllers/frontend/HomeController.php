<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Trang chủ', 'content' => 'Chào mừng đến với trang chủ!'];
        
        // Trả dữ liệu sang view
        return view("frontend.home", ["dulieu" => $data]);
    }
}
