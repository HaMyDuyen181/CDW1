<x-layout-site>
    @vite('resources/css/app.css')
    <div class="container mx-auto my-8">
        <h2 class="text-center text-2xl font-bold text-red-600">Chi tiết bài viết</h2>
        <div class="flex flex-wrap bg-white shadow-lg rounded-lg overflow-hidden my-6">
            <div class="w-full md:w-1/3">
                <img src="{{ asset('images/posts/' . $post->thumbnail) }}" class="w-full h-72 object-cover" alt="{{ $post->thumbnail }}">
            </div>
            <div class="w-full md:w-2/3 p-6">
                <h4 class="text-2xl font-semibold mb-4">{{ $post->title }}</h4>
                <p class="text-gray-700 mb-4"><strong>Mô tả:</strong> {!! nl2br(e($post->description)) !!}</p>
            </div>
        </div>

        <div class="my-8">
            <h3 class="text-xl font-semibold text-red-600 mb-6">Bài viết cùng loại</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($list_post as $postitem)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <x-post-item :postitem="$postitem" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout-site>
