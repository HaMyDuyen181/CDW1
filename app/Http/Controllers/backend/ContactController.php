<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Lấy danh sách các liên hệ có trạng thái là "hoạt động" (status = 1) và chưa bị xóa (deleted_at = null)
    $contacts = Contact::where('status', 1)
        ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
        ->select('id', 'user_id', 'name', 'email', 'phone', 'title', 'content', 'reply_id', 'status', 'created_at', 'updated_at')
        ->paginate(10); // Phân trang 10 bản ghi mỗi trang

    return view('backend.contact.index', compact('contacts')); // Trả về view với dữ liệu contacts
}


    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.contact.trash');
    }
    public function create()
    {
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.contact.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('contact.index')->with('error', 'contact không tồn tại.');
        }

        return view('backend.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.contact.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.contact.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.contact.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.contact.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.contact.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.contact.status');    
    }
}
