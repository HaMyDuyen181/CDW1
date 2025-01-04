

<body>
    <div class="section_product_new my-12">
        <div class="container mx-auto">
            <h1 class="text-green-500 uppercase text-center text-3xl font-bold mb-8">Sản phẩm mới</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($product_list as $product_item)
                    <div class="">
                        <x-product-card :productitem="$product_item" />
                    </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('site.product') }}" 
                   class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition duration-200">
                    Xem thêm sản phẩm
                </a>
            </div>
        </div>
    </div>
</body>
