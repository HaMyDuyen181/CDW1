<x-layout-site>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>

    <div>
        <div class="py-10">
        </div>

        <!-- Product Section -->
        <section class="container mx-auto my-6 px-4 relative" style="bottom: 100px;">
            <div class="flex items-center justify-between mb-8">
                <!-- Bộ lọc sản phẩm -->
                <form method="GET" action="{{ route('site.product') }}" class="flex space-x-4">
                    <!-- Danh mục -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Danh mục:</span>
                        <select name="category_id" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Thương hiệu -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Thương hiệu:</span>
                        <select name="brand_id" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Sắp xếp sản phẩm -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Sắp xếp:</span>
                        <select name="sort_by" class="border border-gray-300 rounded p-2">
                            <option value="price-asc">Giá (Thấp đến Cao)</option>
                            <option value="price-desc">Giá (Cao đến Thấp)</option>
                            <option value="name-asc">Mới nhất</option>
                        </select>
                    </label>

                    <!-- Chọn giá theo khoảng cố định -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Giá:</span>
                        <select name="price" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            <option value="0-100000">Dưới 100,000 VND</option>
                            <option value="100000-500000">100,000 VND - 500,000 VND</option>
                            <option value="500000-1000000">500,000 VND - 1,000,000 VND</option>
                            <option value="1000000">Trên 1,000,000 VND</option>
                        </select>
                    </label>

                    <!-- Toggle View (Grid/List) -->
                    <div class="flex items-center space-x-4">
                        <!-- Icon cho Lưới (Grid) -->
                        <button id="grid-view" type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 3a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4a1 1 0 011-1h1zm12 0a1 1 0 011 1v12a1 1 0 01-1 1h-1a1 1 0 01-1-1V4a1 1 0 011-1h1zM5 4a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V5a1 1 0 00-1-1H5z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Icon cho Danh sách (List) -->
                        <button id="list-view" type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 3a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4a1 1 0 011-1h1zm12 0a1 1 0 011 1v12a1 1 0 01-1 1h-1a1 1 0 01-1-1V4a1 1 0 011-1h1zM5 4a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V5a1 1 0 00-1-1H5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <button type="submit" class="bg-gray-200 px-4 py-2 rounded">Lọc</button>
                </form>
            </div>

            <!-- Danh sách sản phẩm -->
            <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($products as $productitem)
                    <x-product-card :productitem="$productitem" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="w-full">
                <div class="pagination flex justify-center mt-5 space-x-2">
                    {{ $products->links() }}
                </div>
            </div>

        </section>
    </div>

    <script>
        document.getElementById('grid-view').addEventListener('click', function() {
            console.log("Grid View clicked");
            document.getElementById('product-list').classList.remove('grid-cols-1', 'w-full');
            document.getElementById('product-list').classList.add('grid-cols-1', 'sm:grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-4');
        });

        document.getElementById('list-view').addEventListener('click', function() {
            console.log("List View clicked");
            document.getElementById('product-list').classList.remove('grid-cols-1', 'sm:grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-4');
            document.getElementById('product-list').classList.add('grid-cols-1', 'w-full');
        });
    </script>
</x-layout-site>
