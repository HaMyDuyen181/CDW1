@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Người dùng
    </x-slot:title>

    <div class="p-6"> 
        <div class="max-w-5xl mx-auto">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chi tiết người dùng</h1>
                <a href="{{ route('user.index') }}"
                    class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition duration-300">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <div class="overflow-x-auto"> 
                    <table class="min-w-full divide-y divide-gray-200"> 
                        <thead class="bg-red-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Tên trường
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Giá trị
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200"> {{-- Use divide-y for row borders --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ID Người
                                    dùng</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tên đăng
                                    nhập</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Họ và tên
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->fullname }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Giới tính
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Số điện
                                    thoại</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Địa chỉ</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->address }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Vai trò</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{ $user->roles }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Hình ảnh
                                    đại diện</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                    <img src="{{ asset('images/user/' . $user->thumbnail) }}" alt="Thumbnail" class="w-32 h-32 object-cover rounded-lg shadow-sm">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>