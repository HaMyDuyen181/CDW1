<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Giới Thiệu', 'content' => 'Hãy cùng chúng tôi tìm hiểu sơ qua về cửa hàng!'];
        
        // Trả dữ liệu sang view
        return view("frontend.about_us", ["dulieu" => $data]);
    }
}
