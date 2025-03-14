<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select("id", "name", "password", "fullname", "gender", "thumbnail", "email", "phone", "address", "roles", "status")
            ->orderBy('id', 'ASC')->paginate(10);
        return view('backend.user.index', compact('users'));
    }
    public function trash()
    {
        $users = User::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.user.trash', compact('users'));
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Xóa user thành công!');
        }

        return redirect()->route('user.index')->with('error', 'Không tìm thấy user!');
    }

    public function restore(string $id)
    {
        $user = User::withTrashed()->where('id', $id);
        if ($user->first() != null) {
            $user->restore();
            return redirect()->route('user.trash')->with('success', 'Xóa user thành công!');
        }

        return redirect()->route('user.trash')->with('error', 'Không tìm thấy user!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname ?? '';
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; // Đổi sang timestamp để tránh trùng tên
            $path = 'images/user/' . $filename;
            $file->move(public_path('images/user'), $filename);
            $user->thumbnail = $path; // Lưu đường dẫn đầy đủ
        }
        
        

        $user->created_by = Auth::id() ?? 1; // Gán ID người tạo
        $user->save();

        return redirect()->route('user.index')->with('success', 'Thêm người dùng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'user không tồn tại.');
        }

        return view('backend.user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $users = User::select("id", "name", "status")
            ->get();
        return view('backend.user.edit', compact('user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        // Chỉ cập nhật mật khẩu nếu có giá trị mới
        if ($request->password) {
            $user->password = bcrypt($request->password); // Mã hóa mật khẩu mới
        }

        if ($request->hasFile('thumbnail')) {
            if ($user->thumbnail && File::exists(public_path("images/user/" . $user->thumbnail))) {
                File::delete(public_path("images/user/" . $user->thumbnail));
            }
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/user'), $filename);
            $user->thumbnail = $filename;
        }
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = $request->roles;

        $user->updated_by = Auth::id() ?? 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->status = $request->status ?? 0;
        $user->save();
        return redirect()->route('user.index')->with('success', 'cap nhat thanh cong');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if ($user != null) {
            if ($user->image && File::exists(public_path("images/user/" . $user->image))) {
                File::delete(public_path("images/user/" . $user->image));
            }
            $user->forceDelete();

            return redirect()->route("user.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('user.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
    public function status(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Toggle trạng thái (nếu trạng thái là 1 thì chuyển thành 0, ngược lại)
        $user->status = !$user->status; 
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
}