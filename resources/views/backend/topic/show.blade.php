@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Chủ đề
    </x-slot:title>

    <div class="p-6">
        <div class="max-w-3xl mx-auto"> 
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết chủ đề</h1>
                <a href="{{ route('topic.index') }}"
                    class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-red-200 text-left">
                            <th class="px-6 py-3 font-medium text-black text-sm border border-gray-300">Tên trường
                            </th>
                            <th class="px-6 py-3 font-medium text-black text-sm border border-gray-300">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">ID Chủ đề</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->id }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Tên chủ đề
                            </td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Slug</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->slug }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Thứ tự sắp
                                xếp</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->sort_order }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Mô tả</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->description }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Ngày tạo</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Ngày cập
                                nhật</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->updated_at }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border border-gray-300 font-medium text-black text-sm">Trạng thái</td>
                            <td class="px-6 py-4 border border-gray-300 text-sm">{{ $topic->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>