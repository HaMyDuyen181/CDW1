<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Tất cả sản phẩm', 'content' => 'Chào mừng đến với trang sản phẩm của chúng tôi!'];
        
        // Trả dữ liệu sang view
        return view("frontend.product", ["dulieu" => $data]);
    }
    function detail($slug) {
        // Dữ liệu cần truyền qua view
        $data = ['title' => 'Chi Tiết Sản Phẩm', 'content' => 'Chào mừng đến với trang chi tiết sản phẩm của chúng tôi!'];
        //Trả về dữ liệu sang view
        return view('frontend.product-detail', ["dulieu" => $data]);
    }
    public function showCategory($slug)
    {
        // Lấy danh sách sản phẩm theo slug danh mục
        $products = Product::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();

        // Nếu không tìm thấy danh mục
        if ($products->isEmpty()) {
            abort(404, 'Danh mục không tồn tại.');
        }

        // Trả về view với danh sách sản phẩm
        return view('site.products.category', compact('products', 'slug'));
    }
}
