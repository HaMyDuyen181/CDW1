<x-layout-admin>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    
    <div class="relative">
        <!-- Header -->
        <header class="flex justify-between items-center mb-8 p-6 bg-gray-100 rounded-xl shadow-md">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Hello, Admin!</h1>
                <p class="text-gray-600">Welcome back to your dashboard</p>
            </div>
            <a href="{{ route('admin.logout') }}" class="flex items-center text-red-500 hover:text-red-700 transition-colors font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h6a2 2 0 002-2v-1" />
                </svg>
                Đăng xuất
            </a>
                    </header>
        <!-- Content Area -->
        <div class="flex-2 p-6 ">
            <!-- Statistics Section -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6 rounded-xl shadow-lg text-white hover:scale-105 transform transition-all">
        <h2 class="text-lg font-semibold">Tổng số người dùng</h2>
        <p class="text-3xl font-bold">1,500</p>
    </div>
    <div class="bg-gradient-to-r from-green-400 to-teal-500 p-6 rounded-xl shadow-lg text-white hover:scale-105 transform transition-all">
        <h2 class="text-lg font-semibold">Giảm giá</h2>
        <p class="text-3xl font-bold">$100,000</p>
    </div>
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-6 rounded-xl shadow-lg text-white hover:scale-105 transform transition-all">
        <h2 class="text-lg font-semibold">Đơn đặt hàng mới</h2>
        <p class="text-3xl font-bold">120</p>
    </div>
</div>

<!-- Sales Distribution Section -->
<div class="bg-white p-8 rounded-xl shadow-lg mb-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Phân phối bán hàng</h2>

    <!-- Circular Progress Chart -->
    <div class="flex justify-center mb-8 relative">
        <svg class="w-48 h-48 transform rotate-90" viewBox="0 0 32 32">
            <!-- Background Circle -->
            <circle r="16" cx="16" cy="16" fill="transparent" stroke="#e5e7eb" stroke-width="32" />
            <!-- Blue Segment -->
            <circle r="16" cx="16" cy="16" fill="transparent" stroke="#3b82f6" stroke-width="32" stroke-dasharray="60 40" />
            <!-- Yellow Segment -->
            <circle r="16" cx="16" cy="16" fill="transparent" stroke="#fbbf24" stroke-width="32" stroke-dasharray="20 80" />
            <!-- Green Segment -->
            <circle r="16" cx="16" cy="16" fill="transparent" stroke="#22c55e" stroke-width="32" stroke-dasharray="30 70" />
            <!-- Center Circle for Clarity -->
            <circle r="10" cx="16" cy="16" fill="white" />
        </svg>
        <div class="absolute inset-0 flex items-center justify-center text-xl font-semibold text-gray-800">Tổng: 100%</div>
    </div>

    <!-- Distribution Info with Hover Effect -->
    <div class="space-y-4">
        <div class="flex justify-between items-center text-sm text-gray-600 hover:text-blue-600 transition-colors duration-300">
            <div class="flex items-center">
                <span class="text-blue-500 font-medium">Thương hiệu Việt Nam (60%)</span>
            </div>
            <div class="w-10 h-1 bg-blue-500 rounded"></div>
        </div>
        <div class="flex justify-between items-center text-sm text-gray-600 hover:text-yellow-600 transition-colors duration-300">
            <div class="flex items-center">
                <span class="text-yellow-500 font-medium">Thương hiệu Nhật Bản (20%)</span>
            </div>
            <div class="w-10 h-1 bg-yellow-500 rounded"></div>
        </div>
        <div class="flex justify-between items-center text-sm text-gray-600 hover:text-green-600 transition-colors duration-300">
            <div class="flex items-center">
                <span class="text-green-500 font-medium">Thương hiệu Trung Quốc (30%)</span>
            </div>
            <div class="w-10 h-1 bg-green-500 rounded"></div>
        </div>
    </div>

    <!-- Clickable Details -->
    <div class="mt-6 text-sm text-center text-gray-500 hover:text-blue-600 cursor-pointer transition-colors duration-300">
        <p>Click here for more details</p>
    </div>
</div>
<div class="bg-white p-8 rounded-xl shadow-lg mb-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Hoạt động gần đây</h2>

    <!-- Recent Activities List -->
    <ul class="space-y-4 text-gray-600">
        <li class="hover:bg-gray-50 p-5 rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
            <div class="flex items-center space-x-3">
                <span class="text-blue-600 font-medium">Người dùng Hồ Diên Lợi</span>
                <span>đã tham gia nền tảng này.</span>
            </div>
            <div class="mt-1 text-xs text-gray-400">Thời gian: 2 giờ trước</div>
        </li>
        <li class="hover:bg-gray-50 p-5 rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
            <div class="flex items-center space-x-3">
                <span class="text-green-600 font-medium">Đơn hàng mới</span>
                <span>được đặt bởi Hà Mỹ Duyên.</span>
            </div>
            <div class="mt-1 text-xs text-gray-400">Thời gian: 5 giờ trước</div>
        </li>
        <li class="hover:bg-gray-50 p-5 rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
            <div class="flex items-center space-x-3">
                <span class="text-yellow-600 font-medium">Người dùng Nguyễn Thanh Tâm</span>
                <span>đã cập nhật hồ sơ của họ.</span>
            </div>
            <div class="mt-1 text-xs text-gray-400">Thời gian: 1 ngày trước</div>
        </li>
    </ul>
</div>
        </div>
    </div>
</x-layout-admin>