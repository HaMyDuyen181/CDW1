<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Category;

class SubListCategory extends Component
{
    public $category_id;

    public function __construct($categoryid)
    {
        $this->category_id = $categoryid;
    }

    public function render(): View|Closure|string
    {
        $catid = $this->category_id;
        $args = [
            ['status', '=', '1'],
            ['parent_id', '=', $catid],
        ];
        $category_list = Category::where($args)->orderBy('sort_order', 'DESC')->get();
        return view('components.sub-list-category', compact('category_list'));
    }
}
