<x-layout-site>
  <x-slot:title>
    {{ $dulieu['title'] }}
    </x-slot:title>
    <div>
        <!-- Product Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
<!-- Filter Section -->
<div class="flex items-center space-x-6 mb-6">
    <!-- Categories Filter -->
    <div class="flex items-center space-x-2">
      <label for="category" class="text-gray-700">Danh mục</label>
      <select id="category" class="p-3 border rounded">
        <option value="">Tất cả danh mục</option>
        <option value="clothing">Thực phẩm chức năng</option>
        <option value="electronics">Dược mỹ phẩm </option>
        <option value="accessories">Chăm sóc cá nhân</option>
        <option value="accessories">Thuốc</option>
      </select>
    </div>
  
    <!-- Brands Filter -->
    <div class="flex items-center space-x-2">
      <label for="brand" class="text-gray-700">Thương hiệu</label>
      <select id="brand" class="p-3 border rounded">
        <option value="">Tất cả thương hiệu</option>
        <option value="brand-a">Thương hiệu A</option>
        <option value="brand-b">Thương hiệu B</option>
      </select>
    </div>
  
    <!-- Price Range Filter -->
<div class="flex items-center space-x-4">
    <label for="price-range" class="text-gray-700">Khoảng giá:</label>
    <select id="price-range" class="p-3 border rounded">
      <option value="">Chọn khoảng giá</option>
      <option value="0-100000">Dưới 100,000 VND</option>
      <option value="100000-500000">100,000 VND - 500,000 VND</option>
      <option value="500000-1000000">500,000 VND - 1,000,000 VND</option>
      <option value="1000000-5000000">1,000,000 VND - 5,000,000 VND</option>
      <option value="5000000+">Trên 5,000,000 VND</option>
    </select>
  </div>
  
  
    <!-- Sort by -->
    <select class="px-4 py-2 border border-gray-300 rounded-lg">
      <option value="newest">Mới nhất</option>
      <option value="price-asc">Giá thấp đến cao</option>
      <option value="price-desc">Giá cao đến thấp</option>
    </select>
  
    <!-- Type View (List/Grid) -->
    <input type="radio" id="list-view" name="view-type" class="hidden peer" checked />
    <label for="list-view" class="px-4 py-2 bg-blue-600 text-white rounded-lg cursor-pointer peer-checked:bg-blue-700">Danh sách</label>
  
    <input type="radio" id="grid-view" name="view-type" class="hidden peer" />
    <label for="grid-view" class="px-4 py-2 bg-blue-600 text-white rounded-lg cursor-pointer peer-checked:bg-blue-700">Lưới</label>
  </div>
  
      </div>

    <!-- Product Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8" id="product-container">
    <!-- Sample Product Card -->
    <div class="product-card bg-white p-4 rounded-lg shadow-lg" data-category="clothing" data-brand="brand-a" data-price="1000000">
      <a href="{{ route('site.product.detail', ['slug' => 'thuoc-hoat-huyet-truong-phuc']) }}">
        <img
          src="https://bizweb.dktcdn.net/thumb/large/100/518/478/products/1-e23d4069-a3b9-4259-818a-f150236d839b.jpg?v=1723103737563"
          alt="Product 1"
          class="w-full h-48 object-cover mb-4"
        >
        <h3 class="text-xl font-semibold mb-2">Thuốc Hoạt Huyết Trường Phúc giúp hoạt huyết, trị thiếu năng tuần hoàn (3 vỉ x 10 viên)</h3>
        <p class="text-gray-600 mb-4">Thành phần chính là cao đặc hỗn hợp các dược liệu đương quy, ích mẫu, ngưu tất, thục địa, xích thược, xuyên khung có công dụng điều trị các chứng huyết hư, ứ trệ, suy giảm trí nhớ...</p>
        <span class="text-xl font-bold text-blue-600">Giá: 750,000 VND</span>
      </a>
      <div class="flex space-x-2 mt-4">
        <button
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
          onclick="window.location.href='giohang.html';"
        >
          Thêm vào giỏ hàng
        </button>
        <button
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition"
          onclick="window.location.href='product_detail.html';"
        >
          Mua ngay
        </button>
      </div>
    </div>
    
    
    <!-- Add more products as needed -->
    <div class="product-card bg-white p-4 rounded-lg shadow-lg" data-category="electronics" data-brand="brand-b" data-price="800000">
      <a href="{{ route('site.product.detail', ['slug' => 'thuoc-boganic-forte-traphaco-bo-gan']) }}">
        <img
          src="https://bizweb.dktcdn.net/100/518/478/products/1-b84ca9f2-ce22-4a66-95df-b53ce7bd9164.jpg?v=1723104578447"
          alt="Product 2"
          class="w-full h-48 object-cover mb-4"
        >
        <h3 class="text-xl font-semibold mb-2">Thuốc Boganic Forte Traphaco bổ gan, hỗ trợ điều trị suy giảm chức năng gan (5 vỉ x 10 viên)</h3>
        <p class="text-gray-600 mb-4">Thuốc được dùng điều trị trong suy giảm chức năng gan, đặc biệt do dùng nhiều bia, rượu, phòng và hỗ trợ điều trị viêm gan do thuốc, hóa chất, viêm gan gây mệt mỏi, khó tiêu...</p>
        <span class="text-xl font-bold text-blue-600">Giá: 600,000 VND</span>
      </a>
      <div class="flex space-x-2 mt-4">
        <button
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
          onclick="window.location.href='giohang.html';"
        >
          Thêm vào giỏ hàng
        </button>
        <button
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition"
          onclick="window.location.href='checkout.html';"
        >
          Mua ngay
        </button>
      </div>
    </div>
    
  </div>
  
    </div>
  </section>
    </div>
  </x-layout-site>