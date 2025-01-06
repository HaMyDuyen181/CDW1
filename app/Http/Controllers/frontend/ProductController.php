<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        return view('product.category', compact('products', 'slug'));
    }
    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $listcatid = $this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        return view('frontend.product_detail', compact('product', 'list_product'));
    }
    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])->select("id")->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select("id")->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                        // $list2 = Category::where([['parent_id','=',$row1->id],['status','=',1]])->select("id")->get();
                    }
                }
            }
        }
        return $listcatid;
    }
   
}
