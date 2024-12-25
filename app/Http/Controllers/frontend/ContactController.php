<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Liên Hệ', 'content' => 'Hãy liên hệ cho chúng tôi khi bạn thắc mắc hay muốn hỗ trợ tư vấn!'];
        
        // Trả dữ liệu sang view
        return view("frontend.contact", ["dulieu" => $data]);
    }
}
