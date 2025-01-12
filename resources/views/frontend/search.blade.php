<x-layout-site>
    <x-slot:title>
        Tìm kiếm sản phẩm
    </x-slot:title>
    
    <x-main-menu />
    
    <!-- Search Form -->
    <div class="container my-5">
        <form action="{{ route('site.search') }}" method="GET" class="flex justify-center mb-5">
            <input
                type="text"
                name="query"
                placeholder="Tìm kiếm sản phẩm..."
                class="border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 transition duration-300 w-1/3"
            />
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition duration-300">
                Tìm kiếm
            </button>
        </form>
        
        <h2 class="text-center">Kết quả tìm kiếm cho: "{{  }}"</h2>
        
        @if ($products->count() > 0)
        <div class="row">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        
        <!-- Pagination Links -->
        <div class="row mt-3 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
        @else
        <p>Không tìm thấy sản phẩm.</p>
        @endif
    </div>
</x-layout-site>
