<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
rel="stylesheet"
/>
<header class="bg-white shadow-lg sticky top-0 z-50">
  <div class="container mx-auto flex justify-between items-center px-6 py-4">
    <div class="flex items-center">
      <!-- Logo -->
      <a href="/" class="text-2xl font-bold">
        <img
          src="https://bizweb.dktcdn.net/100/518/478/themes/952683/assets/logo_footer.png?1731639110376"
          alt="Logo"
          class="h-10"
        />
      </a>

      <!-- Main Menu -->
      <x-main-menu />
    </div>

    <div class="flex items-center space-x-6">
      <!-- Search Form -->
      <form method="GET" action="{{ route('frontend.search') }}" class="relative flex items-center space-x-2">
        <input
          type="text"
          name="q"
          id="searchInput"
          class="rounded-full w-[150px] text-[15px] border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all px-4 py-1"
          placeholder="Tìm kiếm sản phẩm..."
          value="{{ request('q') }}"
        />
        <button
          type="submit"
          class="text-gray-500 hover:text-blue-500 p-2 bg-gray-100 rounded-full transition duration-300"
        >
          <i class="fas fa-search"></i>
        </button>
      </form>

      <!-- Cart Icon -->
      <a href="/gio-hang" class="relative text-gray-700 hover:text-blue-500 transition duration-300">
        <i class="fas fa-shopping-cart text-xl"></i>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-2">
          {{ session('cart_count', 0) }}
        </span>
      </a>

      <!-- Login Icon -->
      <div class="relative inline-block text-left group">
        <button class="text-gray-700 hover:text-blue-500 transition duration-300">
          <i class="fas fa-user text-xl"></i>
        </button>
        <!-- Dropdown Menu -->
        <div
          class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none opacity-0 visibility-hidden transition-all duration-300 group-hover:opacity-100 group-hover:visibility-visible"
        >
          <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="{{ route('site.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hồ Sơ</a>
            <a href="{{ route('site.logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng Xuất</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
