<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Người dùng
    </x-slot:title>
    <div class="flex justify-center">
        <!-- Main Content -->
        <div class="max-w-4xl w-full bg-red-200 shadow-lg rounded-lg p-6 mt-10">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Chỉnh sửa thành viên</h1>
                <a href="{{ route('user.index') }}" class="text-red-500 ml-auto border border-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                    ← Về danh sách
                </a>
        </div>
        <div class="bg-white shadow-md rounded-lg p-8">
            <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Tên người dùng -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Tên người dùng</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $user->name) }}" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" 
                               name="email" id="email" 
                               value="{{ old('email', $user->email) }}" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Mật khẩu -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Mật khẩu</label>
                        <input type="password" 
                               name="password" id="password" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Chỉ nhập mật khẩu nếu muốn thay đổi">
                    </div>

                    <!-- Hình ảnh -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-semibold text-gray-700">Hình ảnh</label>
                        <input type="file" name="thumbnail" id="thumbnail" 
                               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if ($user->thumbnail)
                            <img src="{{ asset('/images/user/' . $user->thumbnail) }}" alt="{{ $user->name }}" class="mt-4 rounded-lg shadow-sm" width="150">
                        @endif
                    </div>

                    <!-- Họ và tên -->
                    <div>
                        <label for="fullname" class="block text-sm font-semibold text-gray-700">Họ và tên</label>
                        <input type="text" 
                               name="fullname" id="fullname" 
                               value="{{ old('fullname', $user->fullname) }}" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Giới tính -->
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-gray-700">Giới tính</label>
                        <select name="gender" id="gender" 
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <!-- Số điện thoại -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700">Số điện thoại</label>
                        <input type="text" 
                               name="phone" id="phone" 
                               value="{{ old('phone', $user->phone) }}" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Địa chỉ -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700">Địa chỉ</label>
                        <input type="text" 
                               name="address" id="address" 
                               value="{{ old('address', $user->address) }}" 
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Vai trò -->
                    <div>
                        <label for="roles" class="block text-sm font-semibold text-gray-700">Vai trò</label>
                        <select name="roles" id="roles" 
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                            <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>Người dùng</option>
                        </select>
                    </div>

                    <!-- Trạng thái -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700">Trạng thái</label>
                        <select name="status" id="status" 
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Không hoạt động</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-600">
                        Cập nhật Người dùng
                    </button>
                    <a href="{{ route('user.index') }}" class="ml-4 bg-red-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-600">
                        Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-layout-admin>
