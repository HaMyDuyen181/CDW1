<?php

// ProductNew.php

// ProductNew.php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductNew extends Component
{

    public function __construct()
    {
      
    }

    public function render(): View|Closure|string
    {
        $product_list = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view('components.product-new',compact('product_list'));
    }
}

