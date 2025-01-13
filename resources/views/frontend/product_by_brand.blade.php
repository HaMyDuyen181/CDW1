<x-layout-site>
    <x-slot:title>
        Sản phẩm của các thương hiệu
    </x-slot:title>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-green-500 text-center mb-6">Sản phẩm theo thương hiệu</h1>

        <form method="GET" action="{{ route('site.product.by.brand') }}" class="flex justify-between items-center mb-6">
            <!-- Lọc theo thương hiệu -->
            <div>
                <label for="brand" class="mr-2">Chọn thương hiệu:</label>
                <select id="brand" name="brand" class="border px-4 py-2 rounded" onchange="this.form.submit()">
                    <option value="">Tất cả thương hiệu</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sắp xếp theo -->
            <div>
                <label for="sort" class="mr-2">Sắp xếp theo:</label>
                <select id="sort" name="sort" class="border px-4 py-2 rounded" onchange="this.form.submit()">
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                </select>
            </div>

                <!-- Chế độ hiển thị -->
                <div>
                    <label for="viewMode" class="mr-2">Chế độ hiển thị:</label>
                    <select id="viewMode" name="viewMode" class="border px-4 py-2 rounded" onchange="this.form.submit()">
                        <option value="grid" {{ request('viewMode') == 'grid' ? 'selected' : '' }}>Lưới</option>
                        <option value="list" {{ request('viewMode') == 'list' ? 'selected' : '' }}>Danh sách</option>
                    </select>
                </div>
        </form>

        <!-- Hiển thị sản phẩm -->
        <div id="product-list" class="{{ request('viewMode') == 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-6' }}">
            @foreach ($products as $product)
                <div class="product-card card bg-white shadow-md rounded-lg overflow-hidden {{ request('viewMode') == 'list' ? 'flex' : '' }}">
                    <img class="img-fluid {{ request('viewMode') == 'list' ? 'w-1/4' : 'w-full h-64 object-cover' }}" 
                        src="{{ asset('images/product/' . $product->thumbnail) }}" 
                        alt="{{ $product->name }}">
                    <div class="card-body p-4 {{ request('viewMode') == 'list' ? 'flex-1' : '' }}">
                        <h5 class="text-xl font-medium text-gray-800">{{ $product->name }}</h5>
                        <p class="text-gray-600 mt-2">{{ substr($product->description, 0, 100) }}...</p>

                        <div class="flex justify-between items-center mt-4">
                            <p class="text-lg text-red-500">Giá: {{ number_format($product->price_buy, 2, '.', ',') }}đ</p>
                            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" 
                            class="btn btn-primary text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-8">
            {{ $products->links() }}
        </div>
    </div>
</x-layout-site>
