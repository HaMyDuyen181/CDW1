<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::select("id", "name", "email", "phone", "title", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('backend.contact.index', compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        $contacts = Contact::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(10); // Phân trang
        return view('backend.contact.trash', compact('contacts'));
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
    public function edit($id)
    {
        $users = User::all();
        $contact = Contact::where('id', $id)->firstOrFail();
        $contacts = Contact::select("id", "name", "status")
            ->get();
        return view('backend.contact.edit', compact('contact', 'contacts', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->user_id = $request->user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->updated_by = Auth::id() ?? 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->status = $request->status ?? 0;
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'cap nhat thanh cong');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->route('contact.index')->with('success', 'Xóa contact thành công!');
        }

        return redirect()->route('contact.index')->with('error', 'Không tìm thấy contact!');
    }

    public function restore(string $id)
    {
        $contact = Contact::withTrashed()->where('id', $id);
        if ($contact->first() != null) {
            $contact->restore();
            return redirect()->route('contact.trash')->with('success', 'Xóa contact thành công!');
        }

        return redirect()->route('contact.trash')->with('error', 'Không tìm thấy contact!');
    }
    public function destroy($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();
        if ($contact != null) {
            if ($contact->image && File::exists(public_path("images/contact/" . $contact->image))) {
                File::delete(public_path("images/contact/" . $contact->image));
            }
            $contact->forceDelete();

            return redirect()->route("contact.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('contact.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
    public function status(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
    
        // Toggle trạng thái (nếu trạng thái là 1 thì chuyển thành 0, ngược lại)
        $contact->status = !$contact->status; 
        $contact->save();
    
        return redirect()->route('contact.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
}
