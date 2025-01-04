<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Menu;

class FooterMenu extends Component
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
        $args_footermenu = [
            ['status','=',1],
            ['position','=','footermenu'],
            ['parent_id','=',0]
        ];
        $list_menu = Menu::where($args_footermenu)
        ->orderBy('sort_order','DESC')
        ->get();
        return view('components.footer-menu',compact('list_menu'));
    }
}
