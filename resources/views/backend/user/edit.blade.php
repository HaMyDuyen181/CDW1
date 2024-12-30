<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Người dùng
    </x-slot:title>


    <div class="flex justify-center">
        <div class="p-6 w-full max-w-4xl bg-red-200 shadow-md rounded-md">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa người dùng </h1>
                <a href="{{ route('user.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4"> {{-- Consistent spacing between form elements --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Two columns on medium screens and up --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Tên người dùng</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $user->name) }}" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email) }}" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                                <input type="text" name="phone" id="phone"
                                    value="{{ old('phone', $user->phone) }}"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                                <input type="text" name="address" id="address"
                                    value="{{ old('address', $user->address) }}"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="roles" class="block text-sm font-medium text-gray-700">Vai trò</label>
                                <select name="roles" id="roles"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản trị
                                        viên</option>
                                    <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>Người dùng
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                                <select name="status" id="status"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Chỉ nhập mật khẩu nếu muốn thay đổi">
                            </div>
                            <div>
                                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                                <input type="file" name="thumbnail" id="thumbnail"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @if ($user->thumbnail)
                                    <img src="{{ asset('storage/images/user/' . $user->thumbnail) }}"
                                        alt="{{ $user->name }}" class="mt-2 max-w-full h-auto" width="200">
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-2">
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Cập
                                nhật người dùng</button>
                            <a href="{{ route('user.index') }}"
                                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>