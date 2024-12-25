<x-layout-admin>
    <x-slot:title>
        Đơn hàng
    </x-slot:title>
    <div class="flex-1 p-6 ml-[50px]"> <!-- Sửa left-[50px] thành ml-[50px] để dễ kiểm soát hơn -->
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý Đơn Hàng</h1>
            <div>
                <a href="" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Xuất Excel</a>
                <a href="{{ route('order.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tạo Đơn Hàng</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Khách Hàng</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Số điện thoại</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Địa chỉ</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Trạng Thái</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->address }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $item->status ? 'Đã Xử Lý' : 'Chờ Xử Lý' }}
                            </td>
                            <td class="px-4 py-2 text-center text-sm">
                                <!-- Trạng thái -->
                                <a href="{{ route('order.status', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold rounded-md
                                   bg-{{ $item->status ? 'green' : 'gray' }}-500 hover:bg-{{ $item->status ? 'green' : 'gray' }}-600">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('order.edit', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-green-500 hover:bg-green-600 rounded-md">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('order.show', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-blue-500 hover:bg-blue-600 rounded-md">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('order.destroy', $item->id) }}" method="POST" class="inline-block">
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
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</x-layout-admin>
