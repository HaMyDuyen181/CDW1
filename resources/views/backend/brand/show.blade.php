@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Thương hiệu
    </x-slot:title>

    <div class="p-6"> 
        <div class="flex justify-between items-center mb-6"> 
            <h1 class="text-3xl font-bold">Chi tiết thương hiệu</h1> 
            <a href="{{ route('brand.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                ← Về danh sách
            </a>
        </div>

        <div class="bg-white shadow-md rounded-md overflow-hidden"> {{-- Added overflow-hidden for rounded corners on table --}}
            <table class="min-w-full divide-y divide-gray-200"> {{-- Used divide utilities for borders --}}
                <thead class="bg-red-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Tên trường</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Giá trị</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ID Thương hiệu</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $brand->id }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tên Thương hiệu</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $brand->name }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Slug</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $brand->slug }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mô tả</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $brand->description }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Hình ảnh</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <img src="{{ asset('storage/images/' . $brand->image) }}" alt="image" class="w-32 h-32 object-cover rounded">
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Thứ tự sắp xếp</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $brand->sort_order }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout-admin>