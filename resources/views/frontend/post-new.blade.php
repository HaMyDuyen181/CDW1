<x-layout-site>
    <x-slot:title>
        @vite('resources/css/app.css')
        Tất Cả Bài Viết
    </x-slot:title>

    <div>
        <section class="content py-12 bg-gray-50">
            <div class="container mx-auto px-4 md:px-8">
                <!-- Tiêu đề căn giữa -->
                <h1 class="text-4xl font-bold text-green-500 mb-12 text-center">
                    Tất Cả Bài Viết
                </h1>
                
                <!-- Danh sách bài viết -->
                <div class="product-list mb-3">
                    <div class="product_list-s py-3">
                        <!-- Lưới hiển thị các bài viết, mỗi bài viết chiếm 1 hàng -->
                        <div class="grid grid-cols-1 gap-8">
                            @foreach ($post_list as $postitem)
                                <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-xl transition duration-300">
                                    <!-- Hình ảnh bài viết -->
                                    <div class="md:w-1/2">
                                        <img src="{{ asset('images/posts/' . $postitem->thumbnail) }}" alt="{{ $postitem->title }}" class="w-full h-auto border border-gray-300 rounded-md">
                                    </div>
                                    
                                    <!-- Nội dung bài viết -->
                                    <div class="p-6 md:w-1/2">
                                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $postitem->title }}</h2>
                                        <p class="text-gray-600 text-sm">{{ Str::limit($postitem->content, 120) }}</p>
                                        <!-- Nút xem chi tiết -->
                                        <a href="{{ route('site.post.detail', $postitem->slug) }}" class="mt-4 text-blue-500 hover:text-blue-700 font-semibold">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout-site>
