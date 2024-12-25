<x-layout-admin>
    <x-slot:title>
        Banner
    </x-slot:title>
    <div class="flex">
        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý Banner</h1>
                <div>
                    <a href="{{ route('banner.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">
                        Thêm Banner
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        Thùng rác
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-900">Hình ảnh</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                            <th class="px-4 py-4 text-left text-sm font-medium text-gray-900">Liên kết (URL)</th>
                            <th class="px-4 py-4 text-center text-sm font-medium text-gray-900">Trạng thái</th>
                            <th class="px-4 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $item)
    <tr class="border-b hover:bg-gray-50">
        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->id }}</td>
        <td class="px-4 py-4 text-sm text-gray-900">
            <img src="{{ asset('storage/' . $item->image) }}" alt="Banner" class="rounded-md w-24 h-16 object-cover">
        </td>
        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->name }}</td>
        <td class="px-4 py-4 text-sm text-gray-900">
            <a href="{{ $item->link }}" target="_blank" class="text-blue-500 hover:underline">{{ $item->link }}</a>
        </td>
        <td class="px-4 py-4 text-center text-sm text-gray-900">
            <button
                class="py-1 px-3 rounded-md text-white 
                       {{ $item->status == 1 ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-500 hover:bg-gray-600' }}"
                onclick="updateStatus({{ $item->id }}, {{ $item->status }})"
            >
                {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
            </button>
        </td>
        <td class="px-4 py-2 text-center text-sm">
            <div class="flex justify-center space-x-2">
                <!-- Trạng thái -->
                <a href="{{ route('banner.status', $item->id) }}" 
                   class="inline-block px-2 py-1 text-white text-xs font-bold rounded-md
                   bg-{{ $item->status ? 'green' : 'gray' }}-500 hover:bg-{{ $item->status ? 'green' : 'gray' }}-600">
                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                </a>
                <!-- Sửa (Edit) -->
                <a href="{{ route('banner.edit', $item->id) }}" 
                    class="inline-block px-2 py-1 text-white text-xs font-bold bg-green-500 hover:bg-green-600 rounded-md">
                     <i class="fas fa-edit"></i>
                 </a>
                 
                <!-- Xem (View) -->
                <a href="{{ route('banner.show', $item->id) }}" 
                    class="inline-block px-2 py-1 text-white text-xs font-bold bg-blue-500 hover:bg-blue-600 rounded-md">
                     <i class="fas fa-eye"></i>
                 </a>
                 
                <!-- Xóa (Delete) -->
                <form action="{{ route('banner.destroy', $item->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-2 py-1 text-white text-xs font-bold bg-red-500 hover:bg-red-600 rounded-md">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $banners->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
