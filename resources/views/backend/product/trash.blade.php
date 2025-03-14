<x-layout-admin>
    <x-slot:title>
        Thùng rác Sản phẩm
    </x-slot:title>
    <div class="p-6 w-full max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Thùng rác</h1>
            <div>
                <a href="{{ route('product.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
                        </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-red-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên sản phẩm</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Danh mục</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Thương hiệu</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ asset('images/product/' . $item->thumbnail) }}" alt="{{ $item->name }}" class="rounded-md" width="50">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->category->name ?? 'Không có danh mục' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->brand->name ?? 'Không có thương hiệu' }}</td>
                            <td class="px-7 py-4 text-center">
                                <!-- Khôi phục -->
                                <form action="{{ route('product.restore', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                        <i class="fas fa-undo"></i> Khôi phục
                                    </button>
                                </form>
                                <!-- Xóa vĩnh viễn -->
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
                                        <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>
