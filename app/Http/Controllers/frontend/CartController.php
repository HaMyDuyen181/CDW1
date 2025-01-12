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


public function procced()
{

    $cart = session()->get('cart', []);
    $total = 0;
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm.');
    }
    foreach ($cart as $item) {
        $total += $item['qty'] * $item['price'];
    }
    return view("frontend.procced", compact('total'));
}
// Thanh toán
public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.');
    }

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
    }

    $user = Auth::user();
    $order = new Order();
    $order->user_id = $user->id;
    $order->name = $request->name;
    $order->email = $request->email;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->created_by = $user->id;
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 1; // Đang xử lý
    $order->save();

    foreach ($cart as $id => $item) {
        $orderdetail = new OrderDetail();
        $orderdetail->order_id = $order->id;
        $orderdetail->product_id = $id;
        $orderdetail->qty = $item['qty'];
        $orderdetail->price = $item['price'];
        $orderdetail->amount = $item['qty'] * $item['price'];
        $orderdetail->save();
    }

    session()->forget('cart');
    session()->forget('cart_count');

    return redirect()->route('site.thanks')->with('success', 'Đặt hàng thành công!');
}


     function thanks()
    {
        return view('frontend.thanks');
    }
    
}