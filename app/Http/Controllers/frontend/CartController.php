<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     function index()
    {
        $cart = session()->get('cart', []);
        return view("frontend.cart", compact('cart'));
    }

    function addcart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        $qty = (isset($cart[$id])) ? ($cart[$id]['qty'] + 1) : 1;
    
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price_buy,
            'qty' => $qty,
            'thumbnail' => $product->thumbnail
        ];
    
        // Cập nhật số lượng giỏ hàng trong session
        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));  // Cập nhật số lượng sản phẩm trong giỏ hàng
    
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    function updatecart(Request $request)
    {
        $cart = session()->get('cart', []);
        $qty = $request->qty; // Lấy dữ liệu qty từ request
    
        foreach ($qty as $id => $n) {
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = max(1, $n); // Đảm bảo số lượng tối thiểu là 1
            }
        }
    
        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));  // Cập nhật lại số lượng sản phẩm trong giỏ hàng
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }
    



function delcart($id = null)
{
    if ($id == null) {
        session()->forget('cart');
        session()->forget('cart_count'); // Xóa số lượng giỏ hàng khi giỏ hàng trống
    } else {
        $cart = session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));  // Cập nhật lại số lượng sản phẩm
    }
    return redirect()->back()->with('success', 'Xóa thành công');
}


function checkout(Request $request)
{
    // Kiểm tra giỏ hàng có rỗng không
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Giỏ hàng của bạn hiện tại không có sản phẩm. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.');
    }

    // Kiểm tra người dùng đã đăng nhập chưa
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục thanh toán.');
    }

    // Tiến hành tạo đơn hàng
    $user = Auth::user();
    $order = new Order();
    $order->user_id = $user->id;
    $order->name = $request->name;
    $order->email = $request->email;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->created_by = $user->id;
    $order->status = 1; // Trạng thái đơn hàng (1: Đang xử lý)
    $order->save();

    // Lưu thông tin chi tiết đơn hàng
    foreach ($cart as $id => $item) {
        $orderdetail = new OrderDetail();
        $orderdetail->order_id = $order->id;
        $orderdetail->product_id = $id;
        $orderdetail->qty = $item['qty'];
        $orderdetail->price = $item['price'];
        $orderdetail->amount = $item['qty'] * $item['price'];
        $orderdetail->save();
    }

    // Xóa giỏ hàng sau khi thanh toán thành công
    session()->forget('cart');
    session()->forget('cart_count');

    // Chuyển hướng tới trang cảm ơn
    return redirect()->route('site.thanks')->with('success', 'Đã đặt hàng thành công');
}


     function thanks()
    {
        return view('frontend.thanks');
    }
    
}