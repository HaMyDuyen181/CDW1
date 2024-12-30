<x-layout-admin>
    <x-slot:title>Thùng rác thương hiệu</x-slot:title>

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Thùng rác</h1>
            <a href="{{ route('brand.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                ← Về danh sách
            </a>
        </div>

        <div class="bg-white shadow-md rounded-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Hình ảnh</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Tên</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">Chức năng</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($brands as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded-md w-20 h-auto">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex justify-center space-x-2">
                            <form action="{{ route('brand.restore', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded">
                                    <i class="fas fa-undo"></i> Khôi phục
                                </button>
                            </form>
                            <form action="{{ route('brand.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn thương hiệu này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                                    <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $brands->links() }}
        </div>
    </div>
</x-layout-admin>