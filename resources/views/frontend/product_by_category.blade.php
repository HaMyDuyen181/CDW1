<x-layout-site>
    <x-slot:title>
        @vite('resources/css/app.css')
        Sản phẩm theo danh mục
    </x-slot:title>

    <div class="container mx-auto p-6">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">Sản phẩm theo danh mục</h2>

        <!-- Bộ lọc và chế độ hiển thị trong 1 hàng ngang -->
        <form method="GET" action="{{ url()->current() }}" class="flex flex-wrap items-center gap-4 mb-8 bg-gray-100 p-4 rounded-lg shadow">
            <!-- Bộ lọc theo danh mục -->
            <div class="flex items-center gap-2">
                <label for="category" class="text-gray-600 font-medium">Danh mục:</label>
                <select name="category" id="category" onchange="this.form.submit()" class="border rounded-md p-2 shadow-sm">
                    <option value="">Tất cả</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bộ lọc sắp xếp -->
            <div class="flex items-center gap-2">
                <label for="sort_by" class="text-gray-600 font-medium">Sắp xếp:</label>
                <select name="sort_by" id="sort_by" onchange="this.form.submit()" class="border rounded-md p-2 shadow-sm">
                    <option value="">Mặc định</option>
                    <option value="price-asc" {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price-desc" {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                </select>
            </div>

            <!-- Bộ lọc hiển thị -->
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">Hiển thị:</span>
                <button type="submit" name="view_mode" value="grid"
                    class="p-2 rounded {{ request('view_mode', 'grid') == 'grid' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600' }}">
                    Lưới
                </button>
                <button type="submit" name="view_mode" value="list"
                    class="p-2 rounded {{ request('view_mode', 'grid') == 'list' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600' }}">
                    Danh sách
                </button>
            </div>
        </form>

        <!-- Hiển thị sản phẩm theo danh mục -->
        <div>
            @foreach($list_product as $categoryId => $products)
                <div class="category-products mb-12">
                    <!-- Hiển thị tên danh mục -->
                    @php
                        $categoryName = $categories->firstWhere('id', $categoryId)->name;
                    @endphp
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6 border-b pb-2">
                        Danh mục: {{ $categoryName }}
                    </h2>

                    <div class="{{ request('view_mode', 'grid') == 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'flex flex-col gap-4' }}">
                        @foreach($products as $product)
                            <div class="bg-white rounded-lg shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 {{ request('view_mode', 'grid') == 'list' ? 'flex' : '' }}">
                                <img src="{{ asset('images/product/' . $product->thumbnail) }}" 
                                     alt="{{ $product->name }}" 
                                     class="{{ request('view_mode', 'grid') == 'grid' ? 'w-full h-48 object-cover' : 'w-32 h-32 object-cover mr-4' }}">
                                <div class="p-4 {{ request('view_mode', 'grid') == 'list' ? 'flex-1' : '' }}">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2 hover:text-blue-500">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-gray-600 font-medium mb-2">
                                        Giá: {{ number_format($product->price_buy * 1000, 0, '.', '.') }}đ
                                    </p>
                                    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" 
                                        class="btn btn-primary text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Phân trang chung ở cuối -->
        <div class="pagination flex justify-center mt-12">
            {{ $products->links() }}
        </div>
    </div>
</x-layout-site>
