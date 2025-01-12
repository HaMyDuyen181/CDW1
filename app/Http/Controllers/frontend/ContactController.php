<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $contactData = Contact::first(); // Giả sử lấy một bản ghi đầu tiên

        // Trả dữ liệu sang view
        
     
return view("frontend.contact", ["contactData" => $contactData]);
    }
}
