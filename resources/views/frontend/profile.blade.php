<x-layout-site>
    <x-slot:title>
        Tài khoản
    </x-slot:title>
    <div>
        <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Thông Tin Tài Khoản</h2>

            <div class="space-y-6">
                <!-- Tên người dùng -->
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700">Họ và Tên</label>
                    <p class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md">{{ $user->name }}</p>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <p class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md">{{ $user->email }}</p>
                </div>

                <!-- Số điện thoại -->
                <div>
                    <label for="phone" class="block text-lg font-medium text-gray-700">Số Điện Thoại</label>
                    <p class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md">{{ $user->phone }}</p>
                </div>

                <!-- Địa chỉ -->
                <div>
                    <label for="address" class="block text-lg font-medium text-gray-700">Địa Chỉ</label>
                    <p class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md">{{ $user->address }}</p>
                </div>
            </div>

            <!-- Thay đổi mật khẩu -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Thay Đổi Mật Khẩu</h3>
                <p class="text-gray-600">Nếu bạn muốn thay đổi mật khẩu, vui lòng liên hệ với chúng tôi.</p>
            </div>
        </div>
    </div>
</x-layout-site>
