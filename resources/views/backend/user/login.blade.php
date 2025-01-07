<x-layout-admin>
    <div class="min-h-screen flex items-center justify-center bg-pink-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Đăng Nhập</h2>

            {{-- Form đăng nhập --}}
            <form action="{{ route('admin.dologin') }}" method="POST">
                @csrf
                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500 @error('email') border-red-500 @enderror"
                        placeholder="Nhập email"
                        required>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            
                {{-- Mật khẩu --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password"
                        name="password"
                        id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500 @error('password') border-red-500 @enderror"
                        placeholder="Nhập mật khẩu"
                        required>
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            
                {{-- Nút Đăng nhập --}}
                <button type="submit"
                    class="w-full py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    aria-label="Đăng Nhập">
                    Đăng Nhập
                </button>
            </form>
            

            {{-- Thông báo lỗi --}}
            @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mt-4">
                <ul class="list-disc pl-5">
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</x-layout-admin>
