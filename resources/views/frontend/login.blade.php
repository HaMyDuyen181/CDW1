<x-layout-site>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
            {{-- @if(Auth::check())
                <a href="{{ route('site.profile')}}" class="text-center mb-4">Chào, {{ Auth::user()->name }}! Bạn đã đăng nhập.</a>

            @else --}}
            <h2 class="text-2xl font-semibold text-center mb-4">Đăng Nhập</h2>
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <label for="remember" class="flex items-center text-sm">
                            <input type="checkbox" name="remember" id="remember" class="mr-2"> Ghi nhớ tôi
                        </label>
                        <a href="#" class="text-blue-500 text-sm hover:underline">Quên mật khẩu?</a>
                    </div>
                    <p class="mt-4 mb-4 text-center text-sm">Chưa có tài khoản? <a href="{{ route('site.register') }}" class="text-blue-500 hover:underline">Đăng ký ngay</a></p>

                    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Đăng Nhập</button>
                </form>
            {{-- @endif --}}

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mt-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-layout-site>
