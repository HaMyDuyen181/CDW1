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
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Danh mục:</span>
                        <select name="category_id" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                            <option value="all">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                  <!-- Lọc theo thương hiệu -->
                 
                  <label class="flex items-center space-x-2">
                    <span class="font-semibold">Thương hiệu:</span>
                    <select name="brand" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                        <option value="all">Tất cả</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
                
              <!-- Sắp xếp -->
                <label class="flex items-center space-x-2">
                    <span class="font-semibold">Sắp xếp:</span>
                    <select name="sort_by" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                        <option value="price-asc" {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá (Thấp đến Cao)</option>
                        <option value="price-desc" {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá (Cao đến Thấp)</option>
                        <option value="name-asc" {{ request('sort_by') == 'name-asc' ? 'selected' : '' }}>Mới nhất</option>
                    </select>
                </label>

                <!-- Lọc theo giá -->
                {{-- <label class="flex items-center space-x-2">
                    <span class="font-semibold">Giá:</span>
                    <select name="price_buy" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                        <option value="all" {{ request('price_buy') == 'all' ? 'selected' : '' }}>Tất cả</option>
                        <option value="0-100000" {{ request('price_buy') == '0-100000' ? 'selected' : '' }}>Dưới 100,000 VND</option>
                        <option value="100000-500000" {{ request('price_buy') == '100000-500000' ? 'selected' : '' }}>100,000 VND - 500,000 VND</option>
                        <option value="500000-1000000" {{ request('price_buy') == '500000-1000000' ? 'selected' : '' }}>500,000 VND - 1,000,000 VND</option>
                        <option value="1000000" {{ request('price_buy') == '1000000' ? 'selected' : '' }}>Trên 1,000,000 VND</option>
                    </select>
                </label> --}}
                <div class="flex items-center gap-2">
                    <span class="text-gray-600 font-medium">Chế độ hiển thị:</span>
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
                
            </div>
            <!-- Danh sách sản phẩm -->
<div id="product-list">
    @if (request('view_mode') == 'list')
        <!-- Chế độ hiển thị danh sách -->
        
        <div class="space-y-6">
            @foreach ($products as $productitem)
                <div class="flex items-center space-x-4 p-4 border rounded-lg hover:shadow-md">
                    <x-product-card :productitem="$productitem" />
                </div>
            @endforeach
        </div>
    @else
        <!-- Chế độ hiển thị lưới -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $productitem)
                <div class="border rounded-lg p-4 hover:shadow-md">
                    <x-product-card :productitem="$productitem" />
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Pagination -->
<div class="w-full mt-6">
    <div class="pagination flex justify-center space-x-2">
        {{ $products->links() }}
    </div>
</div>

        </section>
    </div>
</x-layout-site>


