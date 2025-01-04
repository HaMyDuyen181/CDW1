<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Menu;

class SubFooterMenu extends Component
{
    public $row_menu = null;
    public function __construct($rowmenu)
    {
        $this->row_menu = $rowmenu;
    }

    public function render(): View|Closure|string
    {
        $menu = $this->row_menu;
        $args_footermenu_sub = [
            ['status','=',1],
            ['position','=','footermenu'],
            ['parent_id','=',$menu->id]
        ];
        $list_menu_sub = Menu::where($args_footermenu_sub)
        ->orderBy('sort_order','DESC')
        ->get();
        return view('components.sub-footer-menu',compact('menu','list_menu_sub'));
    }
}


