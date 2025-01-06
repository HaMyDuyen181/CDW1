<x-layout-admin>
    <x-slot:title>
        Thêm Người Dùng
    </x-slot:title>

    <div class="flex justify-center">
        <!-- Main Content -->
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Thêm người dùng</h1>
                <a href="{{ route('user.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"> <!-- Thêm enctype để hỗ trợ upload file -->
                    @csrf

                    <div class="space-y-4"> {{-- Khoảng cách giữa các phần tử form --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> {{-- Chia thành 2 cột trên màn hình lớn --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-black">Tên đăng nhập</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Nhập tên đăng nhập">
                                @if ($errors->has('name'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-black">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Nhập email">
                                @if ($errors->has('email'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-black">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Nhập số điện thoại">
                                @if ($errors->has('phone'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-black">Mật khẩu</label>
                                <input type="password" name="password" id="password" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Nhập mật khẩu">
                                @if ($errors->has('password'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-black">Xác nhận mật khẩu</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-medium text-black">Vai trò</label>
                                <select name="role" id="role" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @if ($errors->has('role'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('role') }}</div>
                                @endif
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-medium text-black">Hình ảnh</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @if ($errors->has('image'))
                                    <div class="text-red-500 text-sm">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2"> {{-- Thêm khoảng cách giữa các button --}}
                            <button type="submit"
                                class="px-6 py-2 bg-green-500 text-white font-medium text-sm rounded-md hover:bg-green-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                                Thêm Người Dùng
                            </button>
                            <a href="{{ route('user.index') }}"
                                class="px-6 py-2 bg-red-500 text-white font-medium text-sm rounded-md hover:bg-red-600 transition duration-300">Huỷ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
