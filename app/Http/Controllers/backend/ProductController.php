<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    // public function detail($slug)
    // {
    //     // Lấy thông tin sản phẩm từ database dựa trên slug
    //     $product = Product::where('slug', $slug)->first();

    //     if (!$product) {
    //         abort(404);
    //     }

    //     return view('product_detail', compact('product'));
    // }
    
    public function index()
{
    $products = Product::where('status', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->select("id", "name", "category_id", "brand_id", "slug", "thumbnail","status")
        ->with('category', 'brand')
        ->paginate(8);
        
    return view('backend.product.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.product.trash');
    }
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.product.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'product không tồn tại.');
        }

        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.product.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.product.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.product.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.product.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.product.status');    
    }
}

