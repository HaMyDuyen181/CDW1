<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;    
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select("id", "name", "phone", "email", "address", "status")
            ->with('user')->orderBy('created_at', 'DESC')->paginate(5);
        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        $orders = Order::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.order.trash', compact('orders'));
    }

    public function create()
    {
        return view('backend.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.order.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('order.index')->with('error', 'order không tồn tại.');
        }

        return view('backend.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $orders = Order::select("id", "name", "status")
            ->get();
        return view('backend.order.edit', compact('order', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->updated_by = Auth::id() ?? 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->status = $request->status ?? 0;
        $order->save();
        return redirect()->route('order.index')->with('success', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->route('order.index')->with('success', 'Xóa order thành công!');
        }

        return redirect()->route('order.index')->with('error', 'Không tìm thấy order!');
    }

    public function restore(string $id)
    {
        $order = Order::withTrashed()->where('id', $id);
        if ($order->first() != null) {
            $order->restore();
            return redirect()->route('order.trash')->with('success', 'Xóa order thành công!');
        }

        return redirect()->route('order.trash')->with('error', 'Không tìm thấy order!');
    }
    public function destroy($id)
    {
        $order = Order::withTrashed()->where('id', $id)->first();
        if ($order != null) {
            if ($order->image && File::exists(public_path("images/order/" . $order->image))) {
                File::delete(public_path("images/order/" . $order->image));
            }
            $order->forceDelete();

            return redirect()->route("order.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('order.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
    public function status(Request $request, $id)
    {
        $order = Order::findOrFail($id);
    
        // Toggle trạng thái (nếu trạng thái là 1 thì chuyển thành 0, ngược lại)
        $order->status = !$order->status; 
        $order->save();
    
        return redirect()->route('order.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
}

