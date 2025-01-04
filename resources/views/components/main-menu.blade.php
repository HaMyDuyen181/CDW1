
<nav class="flex justify-between bg-red-200 items-center px-20 py-2 shadow-lg relative left-[50px] bottom-[5px]">
    <ul class="flex space-x-4">
     @foreach ($menus as $menuitem)
            <x-sub-main-menu :menuitem="$menuitem" />
        @endforeach 
     </ul>
    <div class="md:hidden visible text-white">
        <i class="fa-solid fa-bars-staggered"></i>
    </div>
</nav>  