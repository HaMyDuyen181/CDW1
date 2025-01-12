<x-layout-site>
    @vite('resources/css/app.css')
    <div class="container mx-auto px-4">
        <!-- Bố cục chi tiết sản phẩm -->
        <div class="flex flex-wrap mb-12">
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <div class="view-product shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset('images/product/' . $product->thumbnail) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover transition duration-500 ease-in-out hover:scale-105">
                </div>
            </div>
            <div class="w-full md:w-1/2 pl-0 md:pl-8">
                <div class="product-information">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900">{{ $product->name }}</h2>
                    <p class="text-gray-500 text-sm">ID: {{ $product->id }}</p>
                    <p class="mt-2 text-gray-700 text-lg">{{ $product->description }}</p>
                    <p class="mt-2 text-gray-700 text-xl font-semibold">               
                         Giá: {{ number_format($product->price_buy * 1000, 0, '.', '.') }}đ
                    </span>
                </p>
                    
                    <!-- Điều chỉnh số lượng -->
                    <label for="qty" class="block mt-4 text-gray-600">Số lượng:</label>
                    <input type="number" id="qty" value="1" class="mt-2 w-20 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    
                    <p class="mt-4 text-gray-700"><strong>Chi tiết:</strong> {{ $product->detail }}</p>
                    <p class="mt-2 text-gray-700"><strong>Thương hiệu:</strong> {{ $product->brand->name ?? 'Không xác định' }}</p>
                    <p class="mt-2 text-gray-700"><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không xác định' }}</p>
                    
                    <div class="mt-6 space-x-4">
                        <a href="{{ route('site.addcart', ['id' => $product->id]) }}" class="bg-green-600 text-white py-3 px-6 rounded-md hover:bg-green-700 transition duration-200 inline-block">
                            Thêm vào giỏ hàng
                        </a>
                        <a href="{{ route('site.checkout') }}" class="mt-4 bg-red-600 text-white py-3 px-6 rounded-md hover:bg-red-700 transition duration-200 inline-block">
                            Mua ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Sản phẩm liên quan -->
        <div class="related-products mt-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Sản phẩm liên quan</h2>
            <div class="flex flex-wrap -mx-4">
                @foreach ($list_product as $related_product)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                        <div class="product-item border rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">
                            <a href="{{ route('site.product.detail', ['slug' => $related_product->slug]) }}" class="block">
                                <img src="{{ asset('images/product/' . $related_product->thumbnail) }}" alt="{{ $related_product->name }}" class="w-full h-56 object-cover mb-4 transition duration-300 ease-in-out hover:scale-105">
                                <h4 class="text-lg font-semibold text-center text-gray-800">{{ $related_product->name ?? 'Không xác định' }}</h4>
                                <p class="text-center text-gray-600 mt-2">{{ number_format($related_product->price_buy * 1000, 0, '.', '.') }}đ</p>
                             </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout-site>
