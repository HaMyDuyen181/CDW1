<x-layout-site>
    @vite('resources/css/app.css')
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2">
                <div class="view-product">
                    <img src="{{ asset('images/product/' . $product->thumbnail) }}" alt="{{ $product->name }}" class="w-full h-auto">
                </div>
            </div>
            <div class="w-full md:w-1/2 pl-0 md:pl-8">
                <div class="product-information">
                    <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
                    <p class="text-gray-500">ID: {{ $product->id }}</p>
                    <p class="mt-2 text-gray-700">Miêu tả: {{ $product->description }}</p>
                    <p class="mt-2 text-gray-700 text-xl font-semibold">Giá: ${{ $product->price_buy }}</p>
                    <label for="qty" class="block mt-4 text-gray-600">Số lượng:</label>
                    <input type="number" id="qty" value="1" class="mt-2 w-20 p-2 border rounded-md" />
                    <p class="mt-4 text-gray-700"><b>Chi tiết:</b> {{ $product->detail }}</p>
                    <p class="mt-2 text-gray-700"><b>Thương hiệu:</b> {{ $product->brand->name ?? 'Không xác định' }}</p>
                    <p class="mt-2 text-gray-700"><b>Danh mục:</b> {{ $product->category->name ?? 'Không xác định' }}</p>
                    <button onclick="handleAddCart({{ $product->id }})" class="mt-4 bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition duration-200">
                        Thêm vào giỏ hàng
                    </button>
                    <a href="{{ route('cart.checkout') }}" class="mt-4 bg-red-500 text-white py-2 px-6 rounded-md hover:bg-red-600 transition duration-200 inline-block">
                        Mua ngay
                    </a>
                </div>
            </div>
        </div>
    
        <div class="related-products mt-12">
            <h2 class="text-xl font-semibold mb-6">Sản phẩm liên quan</h2>
            <div class="flex flex-wrap -mx-4">
                @foreach ($list_product as $related_product)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                        <div class="product-item border rounded-lg shadow-md overflow-hidden">
                            <a href="{{ route('site.product.detail', ['slug' => $related_product->slug]) }}" class="block">
                                <img src="{{ asset('images/product/' . $related_product->thumbnail) }}" alt="{{ $related_product->name }}" class="w-full h-56 object-cover mb-4">
                                <h4 class="text-lg font-semibold text-center text-gray-800">{{ $related_product->name ?? 'Không xác định' }}</h4>
                                <p class="text-center text-gray-600 mt-2">
                                    {{ number_format($related_product->price_buy * 1000, 0, '.', '.') }}đ
                                </p>
                             </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <script>
        function handleAddCart(productid) {
            let qty = document.getElementById("qty").value;
            $j.ajax({
                type: "GET",
                url: "{{ route('cart.add') }}",
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(result, status, xhr) {
                    document.getElementById("showqty").innerHTML = result;
                    alert("Thêm vào giỏ hàng thành công");
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            })
        }
    </script>
    </x-layout-site>
    