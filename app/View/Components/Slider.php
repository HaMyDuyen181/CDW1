<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $banner_list = Banner::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view('components.slider',compact('banner_list'));
    }
}
