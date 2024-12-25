<x-layout-admin>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>

    <!-- Main content -->
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý sản phẩm</h1>
            <div>
                <a href="/admin/product/create" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">
                    Thêm sản phẩm
                </a>
                <a href="/admin/product/trash" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                    Thùng rác
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Hình</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Tên sản phẩm</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Danh mục</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-900">Thương hiệu</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-900">
                                <input type="checkbox" name="selected[]" value="{{ $item->id }}">
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">
                                <img src="{{ $item->thumbnail }}" alt="{{ $item->name }}" class="w-16 h-16 rounded-md">
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $item->category->name ?? 'Không có danh mục' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $item->brand->name ?? 'Không có thương hiệu' }}</td>
                            <td class="px-4 py-2 text-center text-sm">
                                <!-- Trạng thái -->
                                <a href="{{ route('product.status', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold rounded-md
                                   bg-{{ $item->status ? 'green' : 'gray' }}-500 hover:bg-{{ $item->status ? 'green' : 'gray' }}-600">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('product.edit', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-green-500 hover:bg-green-600 rounded-md">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('product.show', $item->id) }}" 
                                   class="inline-block px-2 py-1 text-white text-xs font-bold bg-blue-500 hover:bg-blue-600 rounded-md">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="inline-block">
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
            {{ $products->links() }}
        </div>
    </div>
</x-layout-admin>
