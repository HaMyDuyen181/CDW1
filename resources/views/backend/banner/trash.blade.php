<x-layout-admin>
    <x-slot:title>
        Thùng rác Banner
    </x-slot:title>

    <div class="p-6"> 
        <div class="max-w-7xl mx-auto"> 
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Thùng rác</h1>
                <a href="{{ route('banner.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
                        </div>

            <div class="overflow-x-auto bg-white shadow-md  rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-red-200 ">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Liên kết (URL)</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Ngày xóa</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ asset('images/banners/' . $item->image) }}" alt="Banner Image" class="rounded-md max-w-[100px] max-h-[100px]">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <a href="{{ $item->link }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ $item->link }}</a> {{-- Added break-all --}}
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                {{ $item->deleted_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center"> {{-- Added whitespace-nowrap and centered content --}}
                                <div class="flex justify-center"> {{-- Center buttons within cell --}}
                                    <form action="{{ route('banner.restore', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 text-xs mr-1"> {{-- Reduced padding and added margin --}}
                                            <i class="fas fa-undo"></i> Khôi phục
                                        </button>
                                    </form>
                                    <form action="{{ route('banner.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 text-xs"> {{-- Reduced padding --}}
                                            <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>