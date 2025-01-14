@if (count($menus) > 0)
    <li class="relative">
        <a class="text-black inline-block px-3 p-3 hover:text-red-500 transition duration-300" href="{{ url($menu->link) }}">
            {{ $menu->name }}
        </a>
    </li>
@else
    <li class="relative">
        <a class="text-black inline-block px-3 p-3 hover:text-red-500 transition duration-300" href="{{ url($menu->link) }}">
            {{ $menu->name }}
        </a>
    </li>
@endif
