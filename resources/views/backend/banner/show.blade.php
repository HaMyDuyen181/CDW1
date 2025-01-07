@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Banner
    </x-slot:title>

    <div class="p-6">
        <div class="max-w-4xl mx-auto"> 
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết banner</h1>
                <a href="{{ route('banner.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <table class="min-w-full table-auto border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-red-200 text-left"> 
                            <th class="px-6 py-3 font-medium text-black text-sm">Tên trường</th>
                            <th class="px-6 py-3 font-medium text-black text-sm">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Ảnh</td>
                            <td class="px-6 py-4 border-b text-sm">
                                @if($banner->image)
                                    <img src="{{ asset('/images/banners/' . $banner->image) }}" alt="{{ $banner->name }}" class="max-w-xs h-auto rounded-lg">
                                @else
                                    <span class="text-gray-500 italic">Không có ảnh</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Tên banner</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $banner->name ?? 'Chưa có tên' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Mô tả</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $banner->description ?? 'Không có mô tả' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Vị trí</td>
                            <td class="px-6 py-4 border-b text-sm">{{ $banner->position ?? 'Không xác định' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Link</td>
                            <td class="px-6 py-4 border-b text-sm">
                                <a href="{{ $banner->link }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ $banner->link ?? 'Không có liên kết' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-sm">Trạng thái</td>
                            <td class="px-6 py-4 border-b text-sm">
                                <div class="flex items-center"> 
                                    <span class="py-1 px-3 rounded-md text-white {{ $banner->status == 1 ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ $banner->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}
                                    </span>
                                  
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>