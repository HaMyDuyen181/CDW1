<x-layout-admin>
    <x-slot:title>
        Thêm Người Dùng
    </x-slot:title>

    <div class="flex justify-center">
        <!-- Main Content -->
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Thêm thành viên</h1>
                <a href="{{ route('user.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
        </div>
        <div class="bg-white shadow-md rounded-lg p-8">
            <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Tên đăng nhập -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nhập tên đăng nhập">
                    @if ($errors->has('name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nhập email">
                    @if ($errors->has('email'))
                        <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Số điện thoại -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="phone" name="phone" id="phone" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nhập số điện thoại">
                    @if ($errors->has('phone'))
                        <div class="text-red-500 text-sm">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <!-- Mật khẩu -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" name="password" id="password" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nhập mật khẩu">
                    @if ($errors->has('password'))
                        <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Xác nhận mật khẩu -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Họ và tên -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                    <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Giới tính -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Giới tính</label>
                    <select name="gender" id="gender"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="other">Khác</option>
                    </select>
                </div>

                <!-- Vai trò -->
                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700">Vai trò</label>
                    <select name="roles" id="roles"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="customer" {{ old('roles') == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                        <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                    </select>
                    @if ($errors->has('roles'))
                        <div class="text-red-500 text-sm">{{ $errors->first('roles') }}</div>
                    @endif
                </div>
                 <!-- Hình ảnh -->
                 <div class="mb-4">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full">
                </div>
                <!-- Trạng thái -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select name="status" id="status"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>

                <!-- Nút hành động -->
                <div class="flex justify-end space-x-4">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                        Thêm người dùng
                    </button>
                    <a href="{{ route('user.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                        Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>

    </div>
</x-layout-admin>
