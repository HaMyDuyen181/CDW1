<x-layout-site>
    <x-slot:title>
        Thông Tin Tài Khoản
    </x-slot:title>
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto max-w-3xl">
            <!-- Card Profile -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Thông Tin Tài Khoản</h2>
                <div class="space-y-6">
                    <!-- Họ và Tên -->
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-700">Họ và Tên:</span>
                        <p class="mt-1 text-gray-600 bg-gray-100 p-3 rounded-md border border-gray-300">
                            {{ $user->name }}
                        </p>
                    </div>
                    <!-- Email -->
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-700">Email:</span>
                        <p class="mt-1 text-gray-600 bg-gray-100 p-3 rounded-md border border-gray-300">
                            {{ $user->email }}
                        </p>
                    </div>
                    <!-- Số Điện Thoại -->
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-700">Số Điện Thoại:</span>
                        <p class="mt-1 text-gray-600 bg-gray-100 p-3 rounded-md border border-gray-300">
                            {{ $user->phone ?? 'Chưa cập nhật' }}
                        </p>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-700">Địa Chỉ:</span>
                        <p class="mt-1 text-gray-600 bg-gray-100 p-3 rounded-md border border-gray-300">
                            {{ $user->address ?? 'Chưa cập nhật' }}
                        </p>
                    </div>
                </div>

                <!-- Nút Chỉnh sửa -->
                <div class="mt-6 text-center">
                    <a href="{{ route('site.profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Chỉnh Sửa Thông Tin
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout-site>
