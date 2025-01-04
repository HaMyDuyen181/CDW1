<div class="section_product_sale my-12">
    <div class="container mx-auto">
        <h1 class="text-green-500 uppercase text-center text-3xl font-bold mb-8">
            Sản phẩm khuyến mãi
        </h1>
        @if ($product_list && $product_list->where('price_sale', '>', 0)->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($product_list->where('price_sale', '>', 0) as $productitem)
                    <div class="relative">
                        <x-product-card :productitem="$productitem" />
                        <div class="absolute top-2 left-2 bg-red-500 text-white px-4 py-1 text-sm font-bold rounded-full">
                            Giảm giá
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Không có sản phẩm nào đang khuyến mãi.</p>
        @endif
        <div class="mt-12 text-center">
            <a href="{{ route('site.product') }}" 
               class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition duration-200">
                Xem thêm sản phẩm
            </a>
        </div>
    </div>
</div>
