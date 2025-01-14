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
    $brandId = $request->input('brand');
    $priceRange = $request->input('price_buy');
    $sortBy = $request->input('sort_by');

    // Lọc sản phẩm theo các điều kiện
    $query = Product::query()
        ->where('category_id', '!=', 1)
        ->where('category_id', '!=', 11);

    if ($categoryId && $categoryId != 'all') {
        $query->where('category_id', $categoryId);
    }

    if ($brandId && $brandId != 'all') {
        $query->where('brand_id', $brandId); 
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

    // Lấy danh mục và thương hiệu
    $categories = Category::where('status', 1)
        ->where('parent_id', 0) // Lấy danh mục cha
        ->orderBy('name', 'asc')
        ->get();
    
    // Lấy các thương hiệu có status = 1
    $brands = Brand::where('status', 1)->get();

    // Trả về view
    return view('frontend.product', compact('products', 'categories', 'brands'));
}

      public function showCategory(Request $request, $slug)
      {
          // Lấy danh mục theo slug
          $category = Category::where('slug', $slug)->firstOrFail();
      
          // Lấy danh sách sản phẩm thuộc danh mục
          $products = Product::where('category_id', $category->id);
      
          // Xử lý sắp xếp
          if ($request->has('sort_by')) {
              switch ($request->get('sort_by')) {
                  case 'price_asc':
                      $products = $products->orderBy('price', 'asc');
                      break;
                  case 'price_desc':
                      $products = $products->orderBy('price', 'desc');
                      break;
                  case 'newest':
                      $products = $products->orderBy('created_at', 'desc');
                      break;
                  default:
                      $products = $products->orderBy('id', 'desc'); // Mặc định
              }
          } else {
              $products = $products->orderBy('id', 'desc'); // Mặc định
          }
      
          // Phân trang
          $products = $products->paginate(12);
      
          return view('frontend.product_by_category', compact('category', 'products'));
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
       public function category(Request $request)
{
    // Lấy danh sách tất cả các danh mục có trạng thái = 1
    $categories = Category::where('status', 1)->get();

    // Lấy ID danh mục và sắp xếp từ request
    $selectedCategoryId = $request->get('category');
    $sortBy = $request->get('sort_by');

    // Khởi tạo mảng lưu trữ sản phẩm theo danh mục
    $list_product = [];

    // Thiết lập điều kiện sắp xếp
    $sortField = 'created_at';
    $sortDirection = 'desc';

    if ($sortBy) {
        switch ($sortBy) {
            case 'price_asc':
                $sortField = 'price_buy';
                $sortDirection = 'asc';
                break;
            case 'price_desc':
                $sortField = 'price_buy';
                $sortDirection = 'desc';
                break;
            case 'newest':
                $sortField = 'created_at';
                $sortDirection = 'desc';
                break;
            default:
                break;
        }
    }

    if ($selectedCategoryId) {
        // Lấy danh sách category_id con của danh mục được chọn
        $listcatid = $this->getlistcategoryid($selectedCategoryId);

        // Lấy các sản phẩm theo danh mục và áp dụng sắp xếp
        $products = Product::where('status', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy($sortField, $sortDirection)
            ->paginate(3) // Phân trang 3 sản phẩm mỗi trang
            ->appends($request->query());

        if ($products->isNotEmpty()) {
            $list_product[$selectedCategoryId] = $products;
        }
    } else {
        foreach ($categories as $category) {
            // Lấy danh sách category_id con của danh mục hiện tại
            $listcatid = $this->getlistcategoryid($category->id);

            // Lấy các sản phẩm theo danh mục và áp dụng sắp xếp
            $products = Product::where('status', 1)
                ->whereIn('category_id', $listcatid)
                ->orderBy($sortField, $sortDirection)
                ->paginate(3);

            if ($products->isNotEmpty()) {
                $list_product[$category->id] = $products;
            }
        }
    }

    // Truyền các sản phẩm và danh mục vào view
    return view("frontend.product_by_category", compact('list_product', 'categories', 'selectedCategoryId'));
}

       //product brand
       public function brand(Request $request)
{
    // Lấy danh sách tất cả các thương hiệu
    $brands = Brand::where('status', 1)->get();

    // Lấy dữ liệu từ request
    $brandId = $request->input('brand');
    $sort = $request->input('sort', 'latest');
    $viewMode = $request->input('viewMode', 'grid');
    $priceRange = $request->input('price_range');

    // Query sản phẩm
    $query = Product::where('status', 1);

    // Lọc sản phẩm theo thương hiệu
    if ($brandId) {
        $query->where('brand_id', $brandId);
    }

     // Lọc sản phẩm theo khoảng giá
     if ($priceRange) {
        switch ($priceRange) {
            case '0-100':
                $query->whereBetween('price_buy', [0, 100]);
                break;
            case '100-500':
                $query->whereBetween('price_buy', [100, 500]);
                break;
            case '500-1000':
                $query->whereBetween('price_buy', [500, 1000]);
                break;
            case '1000+':
                $query->where('price_buy', '>', 1000);
                break;
        }
    }


    // Sắp xếp sản phẩm
    switch ($sort) {
        case 'price_asc':
            $query->orderBy('price_buy', 'asc');
            break;
        case 'price_desc':
            $query->orderBy('price_buy', 'desc');
            break;
        case 'latest':
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }

    // Phân trang sản phẩm
    $products = $query->paginate(9)->appends($request->query()); // Giữ lại query params khi phân trang

    // Truyền dữ liệu vào view
    return view('frontend.product_by_brand', compact('products', 'brands', 'viewMode', 'brandId', 'sort', 'priceRange'));
}

       
       public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm
        $keyword = $request->input('q');

        // Truy vấn sản phẩm dựa trên từ khóa
        $products = Product::query()
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->paginate(10); // Phân trang 10 sản phẩm

        // Trả về view cùng kết quả tìm kiếm
        return view('frontend.search', compact('products', 'keyword'));
    }

       
   }