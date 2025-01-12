@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Bài viết
    </x-slot:title>

    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết Bài viết</h1>
                <a href="{{ route('post.index') }}"
                    class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <table class="min-w-full table-auto border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-red-200 text-left">
                            <th class="px-6 py-3 font-medium text-gray-700 text-sm">Tên trường</th>
                            <th class="px-6 py-3 font-medium text-gray-700 text-sm">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">ID Bài viết</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Tên Bài viết</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Slug</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Mô tả</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->description }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Nội dung</td>
                            <td class="px-6 py-4 border-b text-sm">{!! $post->content !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Hình thu nhỏ</td>
                            <td class="px-6 py-4 border-b text-sm">
                                <img src="{{ asset('/images/posts/' . $post->thumbnail) }}" alt="thumbnail"
                                    class="max-w-xs h-auto rounded-lg">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Loại</td>
                            <td class="px-6 py-4 border-b text-sm">{{ ucfirst($post->type) }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Chuyên mục</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->topic->name ?? 'Không có' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b font-medium text-gray-700 text-sm">Trạng thái</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $post->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>