<x-layout-admin>
    <x-slot:title>
        Thùng rác Menu
    </x-slot:title>
  
    <!-- Main content -->
    <div class="flex-1 p-6 w-full max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Thùng rác</h1>
            <a href="{{ route('menu.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                ← Về danh sách
            </a>
    </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-red-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên Menu</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Liên kết (URL)</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Vị trí</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Loại</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $item)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <a href="{{ $item->link }}" class="text-blue-500 hover:underline">{{ $item->link }}</a>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $item->position }}</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $item->type }}</td>
                        <td class="flex justify-center items-center px-7 py-4">
                            <!-- Khôi phục -->
                            <form action="{{ route('menu.restore', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-undo"></i> Khôi phục
                                </button>
                            </form>
                            <!-- Xóa vĩnh viễn -->
                            <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="inline-block">
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
                {{ $menus->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>
