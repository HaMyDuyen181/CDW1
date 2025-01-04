<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Menu;

class MainMenu extends Component
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
        $args = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', 0],
        ];
        $menus = Menu::where($args)->orderBy('sort_order', 'DESC')->get();

       
        if ($menus->isEmpty()) {
            Log::warning("No menus found for mainmenu.", ['args' => $args]);
        }

        return view('components.main-menu', compact('menus'));
    }
}
