<div>
    <section class="content py-3">
        <div class="container">
            <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">Bài viết mới nhất</h1>
            <div class="product-list mb-3">
                <div class="product_list-s py-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($post_list as $postitem)
                            <x-post-item :postitem="$postitem" />
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Nút Xem Tất Cả Bài Viết -->
            <div class="text-center mt-6">
                <a href="{{ route('posts.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-bold text-lg rounded-lg hover:bg-blue-500 transition">
                    Xem tất cả bài viết
                </a>
            </div>
        </div>
    </section>
</div>
