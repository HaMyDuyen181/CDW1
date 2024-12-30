@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Liên hệ
    </x-slot:title>

    <div class="p-6"> {{-- Padding cho toàn bộ nội dung --}}
        <div class="max-w-6xl mx-auto"> {{-- Giới hạn chiều rộng và căn giữa --}}
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết liên hệ</h1>
                <a href="{{ route('contact.index') }}" class="text-red-500 border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden"> {{-- Card container với overflow hidden --}}
                <div class="p-6"> {{-- Padding bên trong card --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-red-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Tên trường</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ID Người dùng</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $contact->user_id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tên Người Liên Hệ</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Số Điện Thoại</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $contact->phone }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tiêu Đề</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $contact->title }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nội Dung</td>
                                <td class="px-6 py-4 text-sm text-black">{{ $contact->content }}</td> {{-- Không dùng whitespace-nowrap cho nội dung --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>