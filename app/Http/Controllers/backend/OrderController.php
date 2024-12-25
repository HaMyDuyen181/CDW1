<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách các đơn hàng với trạng thái là "hoạt động" (status = 1)
        $orders = Order::where('status', 1)
            ->orderBy('created_at', 'desc') // Sắp xếp đơn hàng theo thời gian tạo (mới nhất lên đầu)
            ->select('id', 'user_id', 'name', 'phone', 'email', 'address', 'status', 'created_at', 'updated_at')
            ->paginate(10); // Phân trang 10 đơn hàng mỗi trang

        return view('backend.order.index', compact('orders')); // Trả về view với danh sách đơn hàng
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.order.trash');
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
    public function edit(string $id)
    {
        return view('backend.order.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.order.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.order.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.order.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.order.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.order.status');    
    }
}

