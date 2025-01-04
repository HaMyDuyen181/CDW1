<div class="productcard border bg-white shadow-md rounded-lg overflow-hidden">
    <div class="group relative">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
            <img 
            class="group-hover:scale-105 w-full h-56 object-cover transition-transform duration-300"
            src="{{ asset('images/product/' . $product->thumbnail) }}" 
            alt="{{ $product->name }}">
        </a>
    </div>
    <div class="p-4">
        <h2 class="text-purple-600 text-lg font-semibold text-center truncate">{{ $product->name }}</h2>
        <div class="flex justify-between items-center mt-3">
            <span class="text-purple-500 font-bold">
                Giá: {{ number_format($product->price_buy, 0, ',', '.') }} ₫
            </span>
            <a 
                href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
                class="text-blue-500 hover:text-blue-700 transition duration-300">
                Chi tiết
            </a>
        </div>
        <div class="mt-4 flex justify-between">
            <!-- Nút Thêm vào Giỏ hàng -->
            <a href="{{ route('cart.add', ['product_id' => $product->id]) }}"
                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-200">
                Thêm vào giỏ hàng
            </a>
            <!-- Nút Mua ngay -->
            <a href="{{ route('site.checkout', ['product_id' => $product->id]) }}"
                class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200">
                Mua ngay
            </a>
        </div>
    </div>
</div>
