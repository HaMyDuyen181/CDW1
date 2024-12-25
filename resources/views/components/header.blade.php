<header class="bg-white shadow-lg sticky top-0 z-50">
      <div
        class="container mx-auto flex justify-between items-center px-6 py-4"
      >
        <div class="flex items-center">
          <a href="/" class="text-2xl font-bold">
            <img
              src="https://bizweb.dktcdn.net/100/518/478/themes/952683/assets/logo_footer.png?1731639110376"
              alt="Logo"
              class="h-10"
            />
          </a>

          <!-- Main Menu -->
        <x-main-menu/>
        </div>
        <div class="flex items-center space-x-6">
          <!-- Tìm kiếm -->
          <x-search/>


         <!-- Cart Icon -->
<a
href="/gio-hang"
class="relative text-gray-700 hover:text-blue-500 transition duration-300"
>
<i class="fas fa-shopping-cart text-xl"></i>
<span
  class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-2"
>
  2
</span>
</a>


<!-- Login Icon -->
<div class="relative inline-block text-left group">
  <button class="text-gray-700 hover:text-blue-500 transition duration-300">
    <i class="fas fa-user text-xl"></i>
  </button>
  <!-- Dropdown Menu -->
  <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden group-hover:block">
    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Hồ sơ</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Đăng xuất</a>
    </div>
  </div>
</div>

        </div>
      </div>
    </header>