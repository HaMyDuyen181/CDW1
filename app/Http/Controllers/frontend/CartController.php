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
    public function index()
    {
        $list_cart = session('carts', []);
        return view("frontend.cart", compact('list_cart'));
    }

    public function add(Request $request)
{
    // Lấy product_id và qty từ request
    $productid = $request->input('productid'); // Hoặc $request->productid nếu có tham số trong URL
    $qty = $request->input('qty');

    // Kiểm tra xem product_id và qty có tồn tại hay không
    if (!$productid || !$qty) {
        return response()->json(['error' => 'Missing product ID or quantity'], 400);
    }

    $product = Product::find($productid);
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // Cấu trúc 1 item trong giỏ hàng
    $cartitem = array(
        'id' => $productid,
        'image' => $product->image,
        'name' => $product->name,
        'qty' => $qty,
        'price' => ($product->pricesale > 0) ? $product->pricesale : $product->price,
    );

    // Giỏ hàng mảng 2 chiều [$cartitem, $cartitem, .....]
    $carts = session('carts', []);
    if (count($carts) == 0) {
        array_push($carts, $cartitem);
    } else {
        $check = true;
        foreach ($carts as $key => $cart) {
            if ($cart['id'] == $productid) {
                $carts[$key]['qty'] += $qty;
                $check = false;
                break;
            }
        }
        if ($check) {
            array_push($carts, $cartitem);
        }
    }

    session(['carts' => $carts]);
    return response()->json(['cart_count' => count(session('carts', []))]);
}
public function update(Request $request)
{
    $carts = session('carts', []);
    $list_qty = $request->input('qty'); // Lấy dữ liệu qty từ request

    foreach ($carts as $key => $cart) {
        if (isset($list_qty[$cart['id']])) {
            $carts[$key]['qty'] = $list_qty[$cart['id']];
        }
    }

    session(['carts' => $carts]);
    return redirect()->route('site.cart.index');
}


public function delete($id)
{
    $carts = session('carts', []);
    $carts = array_filter($carts, function($cart) use ($id) {
        return $cart['id'] != $id;
    });

    session(['carts' => array_values($carts)]); // Sắp xếp lại mảng
    return redirect()->route('site.cart.index');
}

    public function checkout()
    {
        $list_cart = session('carts', []);
        return view('frontend.checkout', compact('list_cart'));
    }

    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $carts = session('carts', []);
        //
        if (count($carts) > 0) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->delivery_email = $request->email;
            $order->delivery_name = $request->name;
            $order->delivery_gender = $request->gender;
            $order->delivery_phone = $request->phone;
            $order->delivery_address = $request->address;
            $order->note = $request->note;
            $order->created_at = date('Y-m-d H:i:s');
            $order->type = 'online';
            $order->status = 1;
            if ($order->save()) {
                foreach ($carts as $cart) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $cart['id'];
                    $orderdetail->price = $cart['price'];
                    $orderdetail->qty = $cart['qty'];
                    $orderdetail->amount = $cart['price'] * $cart['qty'];
                    $orderdetail->save();
                }
            }
            session(['carts' => []]);
        }
        return view('frontend.checkout_message');
    }
}