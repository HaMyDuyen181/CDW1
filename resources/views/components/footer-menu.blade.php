<div>
    <div class="navbar" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @foreach ($list_menu as $row_menu)
                <li class="nav-item">
                    <x-sub-footer-menu :rowmenu="$row_menu" />
                </li>
            @endforeach
        </ul>
    </div>
</div>
