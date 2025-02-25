<x-layout-site>
    <x-slot:title>
        Chỉnh Sửa Thông Tin
    </x-slot:title>
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto max-w-3xl">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Chỉnh Sửa Thông Tin</h2>
                
                @if(session('success'))
                    <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
                @endif

                <form action="{{ route('site.profile.update') }}" method="POST">
                    @csrf
                    <!-- Họ và Tên -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Họ và Tên</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded">
                    </div>

                    <!-- Số Điện Thoại -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Số Điện Thoại</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full p-2 border rounded">
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Địa Chỉ</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}" class="w-full p-2 border rounded">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout-site>
