<x-layout-admin>
    <x-slot:title>
        Post
    </x-slot:title>
    <div class="flex">
        <!-- Main content -->
        <div class="flex-1 p-6 ml-4"> <!-- Thay left-[100px] bằng ml-4 -->
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý Bài Viết</h1>
                <div>
                    <button href="" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm Bài Viết</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tóm tắt</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Trạng thái</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Ngày tạo</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $post->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ \Str::limit($post->summary, 50) }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    {{ $post->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $post->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 text-center text-sm">
                                <!-- Trạng thái -->
                                <a href="{{ route('post.status', $post->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold rounded-md
                                   bg-{{ $post->status ? 'green' : 'gray' }}-500 hover:bg-{{ $post->status ? 'green' : 'gray' }}-600">
                                    <i class="fa {{ $post->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('post.edit', $post->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-green-500 hover:bg-green-600 rounded-md">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('post.show', $post->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-blue-500 hover:bg-blue-600 rounded-md">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-2 py-1 text-white text-xs font-bold bg-red-500 hover:bg-red-600 rounded-md">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
