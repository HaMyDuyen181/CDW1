<x-layout-site>
    <x-slot:title>
        @vite('resources/css/app.css')
        Sản phẩm theo danh mục
    </x-slot:title>

    <div class="container mx-auto p-4">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Sản phẩm theo danh mục</h2>

        <!-- Bộ lọc và chế độ hiển thị trong 1 hàng ngang -->
      <!-- Bộ lọc và chế độ hiển thị trong 1 hàng ngang -->
<form method="GET" action="{{ url()->current() }}" class="flex justify-between items-center mb-6 gap-6">
    <!-- Bộ lọc -->
    <div class="flex gap-6">
        <!-- Lọc theo danh mục -->
        <select name="category" onchange="this.form.submit()" class="p-3 border rounded-lg shadow-md focus:ring-2 focus:ring-blue-400 transition duration-300">
            <option value="">Chọn danh mục</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <select name="sort_by" onchange="this.form.submit()" class="p-3 border rounded-lg shadow-md focus:ring-2 focus:ring-blue-400 transition duration-300">
            <option value="">Sắp xếp</option>
            <option value="price-asc" {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá tăng dần</option>
            <option value="price-desc" {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá giảm dần</option>
            <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
        </select>
        <select name="price_range" onchange="this.form.submit()" class="p-3 border rounded-lg shadow-md focus:ring-2 focus:ring-blue-400 transition duration-300">
            <option value="">Khoảng giá</option>
            <option value="0-500000" {{ request('price_range') == '0-500000' ? 'selected' : '' }}>0 - 500,000</option>
            <option value="500000-1000000" {{ request('price_range') == '500000-1000000' ? 'selected' : '' }}>500,000 - 1,000,000</option>
        </select>
        <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300">Lọc</button>
    </div>

    <!-- Chế độ hiển thị -->
    <div class="flex gap-6">
        <!-- Lưới Icon -->
        <a href="{{ request()->fullUrlWithQuery(['view_mode' => 'grid']) }}" class="text-lg text-blue-500 hover:text-blue-700 hover:underline transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h5v5H4zM4 10h5v5H4zM4 16h5v5H4zM10 4h5v5h-5zM10 10h5v5h-5zM10 16h5v5h-5zM16 4h5v5h-5zM16 10h5v5h-5zM16 16h5v5h-5z"/>
            </svg>
        </a>
        <!-- Danh sách Icon -->
        <a href="{{ request()->fullUrlWithQuery(['view_mode' => 'list']) }}" class="text-lg text-blue-500 hover:text-blue-700 hover:underline transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </a>
    </div>
</form>

        <!-- Hiển thị sản phẩm theo danh mục -->
        @foreach($list_product as $categoryId => $products)
            <div class="category-products mb-12">
                <!-- Hiển thị tên danh mục -->
                @php
                    $categoryName = $categories->firstWhere('id', $categoryId)->name;
                @endphp
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Danh mục: {{ $categoryName }}</h2>
                
                <div class="{{ $viewMode == 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8' : 'flex flex-col gap-6' }}">
                    @foreach($products as $product)
                        <div class="product-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                            <img 
                                class="group-hover:scale-105 w-full h-56 object-cover mb-4 rounded-lg transition-transform duration-300"
                                src="{{ asset('images/product/' . $product->thumbnail) }}" 
                                alt="{{ $product->name }}">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                            <p class="text-md text-gray-600">{{ number_format($product->price_buy) }} VND</p>
                        </div>
                    @endforeach
                </div>

                <!-- Phân trang cho mỗi danh mục -->
                <div class="w-full mt-8">
                    <div class="pagination flex justify-center space-x-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout-site>
