<x-layout-admin>
    <x-slot:title>
        Liên hệ
    </x-slot:title>
    <div class="flex justify-center">
        <!-- Main content -->
        <div class="w-full max-w-7xl p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý Liên hệ</h1>
                <div>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm Liên hệ</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Số điện thoại</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tin nhắn</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Trạng thái</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($item->message, 50) }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    {{ $item->status == 1 ? 'Đã xử lý' : 'Chưa xử lý' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center text-sm">
                                <!-- Trạng thái -->
                                <a href="{{ route('contact.status', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold rounded-md
                                   bg-{{ $item->status ? 'green' : 'gray' }}-500 hover:bg-{{ $item->status ? 'green' : 'gray' }}-600">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('contact.edit', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-green-500 hover:bg-green-600 rounded-md">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('contact.show', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-blue-500 hover:bg-blue-600 rounded-md">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('contact.destroy', $item->id) }}" method="POST" class="inline-block">
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
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
