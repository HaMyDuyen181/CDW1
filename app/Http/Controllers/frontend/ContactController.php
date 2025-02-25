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
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $contact = new Contact();
        $contact->user_id = Auth::id() ?? 0; // Gán giá trị 0 nếu không có người dùng đăng nhập
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'];
        $contact->title = $validated['title'];
        $contact->content = $validated['content'];
        $contact->created_by = Auth::id() ?? 0; // Sử dụng Auth::id() hoặc giá trị mặc định
        $contact->status = 0; // Mặc định chưa xử lý
        $contact->save();
    
        // Chuyển hướng lại trang liên hệ và hiển thị thông báo thành công
        return redirect()->route('frontend.contact')->with('success', 'Tin nhắn của bạn đã được gửi thành công! Chúng tôi sẽ phản hồi sớm nhất.');
    }

}
