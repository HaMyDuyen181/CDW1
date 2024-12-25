<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        return view('frontend.post');   
    }
    function detail($slug) {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Chi Tiết Bài Viết', 'content' => 'Chào mừng đến với trang chi tiết bài viết của chúng tôi!'];
        //Trả về dữ liệu sang view
        return view('frontend.post-detail', ["dulieu" => $data]);
    }
}
