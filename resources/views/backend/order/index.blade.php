<x-layout-admin>
    <x-slot:title>
        Đơn hàng
    </x-slot:title>
    <div class="flex-1 p-6 ml-[50px]"> <!-- Sửa left-[50px] thành ml-[50px] để dễ kiểm soát hơn -->
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý đơn hàng</h1>
            <div>
                {{-- <a href="{{ route('order.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm Mục order</a> --}}
                <a href="{{ route('order.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
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
                        <td class="px-6 py-4 text-center text-sm text-gray-900">
                            @if($item->status === 1)
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Hoạt động</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Không hoạt động</span>
                            @endif
                        </td>
                       
                        <td class="flex px-7 py-8 text-center">
                            <a href="{{ route('order.status', $item->id) }}" class="bg-{{ $item->status == 1 ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status == 1 ? 'green' : 'red' }}-600 text-xs">
                                <i class="fa {{ $item->status == 1 ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                            </a>
                            <a href="{{ route('order.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('order.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('order.delete', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
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
