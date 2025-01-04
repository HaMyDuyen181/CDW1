<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
class ProductSale extends Component
{
    public $product_list;

    public function __construct()
    {
        $this->product_list = Product::where([
                ['status', '=', 1],
                ['price_sale', '>', 0]
            ])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.product-sale', [
            'product_list' => $this->product_list
        ]);
    }
}