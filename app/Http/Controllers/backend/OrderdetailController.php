<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách các chi tiết đơn hàng với order_id và sản phẩm liên quan
        $orderDetails = OrderDetail::join('orders', 'orderdetails.order_id', '=', 'orders.id')
            ->join('products', 'orderdetails.product_id', '=', 'products.id')
            ->select(
                'orderdetails.id',
                'orders.id as order_id',
                'products.name as product_name',
                'orderdetails.price',
                'orderdetails.discount',
                'orderdetails.qty',
                'orderdetails.amount',
                'orderdetails.created_at',
                'orderdetails.updated_at'
            )
            ->orderBy('orderdetails.created_at', 'desc') // Sắp xếp theo thời gian tạo (mới nhất lên đầu)
            ->paginate(10); // Phân trang 10 chi tiết đơn hàng mỗi trang

        return view('backend.orderdetail.index', compact('orderDetails')); // Trả về view với danh sách chi tiết đơn hàng
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.orderdetail.trash');
    }
    public function create()
    {
        return view('backend.orderdetail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.orderdetail.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.orderdetail.show');    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.orderdetail.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.orderdetail.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.orderdetail.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.orderdetail.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.orderdetail.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.orderdetail.status');    
    }
}
