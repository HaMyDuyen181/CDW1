<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function scopeFilter($query, $request)
{
    if ($request->has('brand_id') && $request->brand_id !== 'all') {
        $query->where('brand_id', $request->brand_id);
    }

    // Các điều kiện lọc khác
    return $query;
}

      // Hiển thị danh sách sản phẩm
      public function index(Request $request)
      {
  
          // Lọc theo danh mục
          $categoryId = $request->input('category_id');
          $brand = $request->input('brand');
          $priceRange = $request->input('price_buy');
          $sortBy = $request->input('sort_by');
  
          // Lọc sản phẩm theo các điều kiện
          $query = Product::query()
              ->where('category_id', '!=', 1)
              ->where('category_id', '!=', 11);
  
          if ($categoryId && $categoryId != 'all') {
              $query->where('category_id', $categoryId);
          }
  
          if ($brand && $brand != 'all') {
              $query->where('brand', $brand);
          }
  
          if ($priceRange && $priceRange != 'all') {
              $priceRange = explode('-', $priceRange);
              if (count($priceRange) > 1) {
                  $query->whereBetween('price_buy', [$priceRange[0], $priceRange[1]]);
              } else {
                  $query->where('price_buy', '>=', $priceRange[0]);
              }
          }
  
          if ($sortBy) {
              if ($sortBy == 'price-asc') {
                  $query->orderBy('price_buy', 'asc');
              } elseif ($sortBy == 'price-desc') {
                  $query->orderBy('price_buy', 'desc');
              } elseif ($sortBy == 'name-asc') {
                  $query->orderBy('name', 'asc');
              }
          }
  
        // Lấy các sản phẩm đã lọc và phân trang
            $products = $query->paginate(12);
  
  
            $categories = Category::where('status', 1)
            ->where('parent_id', 0) // Lấy danh mục cha
            ->orderBy('name', 'asc')
            ->get();
        // Lấy các thương hiệu có status = 1
            $brands = Brand::where('status', 1)->get();

    // Trả về view
    return view('frontend.product', compact('products', 'categories', 'brands'));
      }  
    public function showCategory($slug)
    {
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
       //product category
       public function category()
       {
           // Lấy danh sách tất cả các danh mục có trạng thái = 1
           $categories = Category::where('status', 1)->get();
           
           // Khởi tạo mảng lưu trữ sản phẩm theo danh mục
           $list_product = [];
           foreach ($categories as $category) {
               // Lấy danh sách category_id con của danh mục hiện tại
               $listcatid = $this->getlistcategoryid($category->id);
               
               // Lấy các sản phẩm theo danh mục và phân trang
               $products = Product::where('status', 1)
                   ->whereIn('category_id', $listcatid)
                   ->orderBy('created_at', 'desc')
                   ->paginate(3); // Phân trang 3 sản phẩm mỗi trang
               
               // Kiểm tra nếu có sản phẩm, mới thêm vào mảng
               if ($products->isNotEmpty()) {
                   // Thêm các sản phẩm vào mảng theo ID danh mục
                   $list_product[$category->id] = $products;
               }
           }
           
           // Chỉ định chế độ hiển thị mặc định là 'grid'
           $viewMode = 'grid'; // hoặc 'list', tùy vào yêu cầu của bạn
           
           // Truyền các sản phẩm và danh mục vào view
           return view("frontend.product_by_category", compact('list_product', 'viewMode', 'categories'));
       }
       
       
       //product brand
       public function brand(Request $request)
       {
           // Lấy danh sách tất cả các thương hiệu có trạng thái = 1 và giới hạn số sản phẩm mỗi thương hiệu
           $brands = Brand::where('status', 1)
                          ->with(['products' => function($query) {
                              $query->where('status', 1)->take(3); // Lấy tối đa 3 sản phẩm mỗi thương hiệu
                          }])
                          ->get();
       
           // Lấy thương hiệu đã chọn từ request
           $brandId = $request->input('brand');
           $sort = $request->input('sort', 'created_at');
           $viewMode = $request->input('viewMode', 'grid');
       
           // Lọc sản phẩm theo thương hiệu, nếu có thương hiệu được chọn
           $query = Product::where('status', 1);
       
           if ($brandId) {
               $query->where('brand_id', $brandId);
           }
       
           // Sắp xếp theo yêu cầu
           switch ($sort) {
               case 'price_asc':
                   $query->orderBy('price_buy', 'asc');
                   break;
               case 'price_desc':
                   $query->orderBy('price_buy', 'desc');
                   break;
               case 'latest':
                   $query->orderBy('created_at', 'desc');
                   break;
               default:
                   $query->orderBy('created_at', 'desc');
                   break;
           }
       
           // Phân trang và lấy sản phẩm
           $products = $query->paginate(3);  // Phân trang 3 sản phẩm mỗi trang
       
           // Truyền dữ liệu vào view
           return view('frontend.product_by_brand', compact('products', 'viewMode', 'brands'));
       }
       
       
       

       public function search(Request $request)
{
    $query = $request->input('query'); // Get the search query
    
    // Search products by name or description
    $products = Product::query()
        ->where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->paginate(8); // Paginate the results to limit the number of products shown
    
    // Return the search results to the view, passing the query as well
    return view('frontend.search', [
        'products' => $products,
        'query' => $query,  // Passing the query to the view
    ]);
}

       
   }