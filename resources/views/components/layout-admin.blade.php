<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @include("components.alert")
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script> <!-- Thêm jQuery -->
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" /> <!-- Thêm CSS của Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
        integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $title ?? 'Admin' }}</title>
</head>
<body class="bg-gray-100 min-h-screen font-sans text-gray-900">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-gray-800 text-white flex-shrink-0 p-6">
            <h1 class="text-3xl font-bold mb-8 uppercase text-center tracking-wide">Quản Lý Hệ Thống</h1>
            <nav>
                <ul class="space-y-6">
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin">
                            <i class="mr-4 fas fa-chart-line text-xl"></i>
                            <span class="text-lg font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/menu">
                            <i class="mr-4 fas fa-utensils text-xl"></i>
                            <span class="text-lg font-medium">Menu</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/product">
                            <i class="mr-4 fas fa-box-open text-xl"></i>
                            <span class="text-lg font-medium">Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/category">
                            <i class="mr-4 fas fa-th-large text-xl"></i>
                            <span class="text-lg font-medium">Danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/contact">
                            <i class="mr-4 fas fa-th-large text-xl"></i>
                            <span class="text-lg font-medium">Liên hệ</span>
                        </a>
                    </li>
                        <li>
                            <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/brand">
                                <i class="mr-4 fas fa-tags text-xl"></i>
                                <span class="text-lg font-medium">Thương hiệu</span>
                            </a>
                        </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/banner">
                            <i class="mr-4 fas fa-images text-xl"></i>
                            <span class="text-lg font-medium">Banner</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/order">
                            <i class="mr-4 fas fa-receipt text-xl"></i>
                            <span class="text-lg font-medium">Đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/post">
                            <i class="mr-4 fas fa-user-friends text-xl"></i>
                            <span class="text-lg font-medium">Bài viết</span>
                        </a>
                    </li>
                      <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/topic">
                            <i class="mr-4 fas fa-user-friends text-xl"></i>
                            <span class="text-lg font-medium">Chủ đề bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="/admin/user">
                            <i class="mr-4 fas fa-user-friends text-xl"></i>
                            <span class="text-lg font-medium">Thành viên</span>
                        </a>
                    </li>
                    <li>
                        @if(Auth::guard('admin')->check())
                            <!-- Nếu đã đăng nhập, hiển thị nút đăng xuất -->
                            <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="{{ route('admin.logout') }}">
                                <i class="mr-4 fas fa-sign-out-alt text-xl"></i>
                                <span class="text-lg font-medium">Đăng xuất</span>
                            </a>
                        @else
                            <!-- Nếu chưa đăng nhập, hiển thị nút đăng nhập -->
                            <a class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition-all duration-300" href="{{ route('admin.login') }}">
                                <i class="mr-4 fas fa-sign-in-alt text-xl"></i>
                                <span class="text-lg font-medium">Đăng nhập</span>
                            </a>
                        @endif
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6">
            <header class="bg-white shadow rounded-lg p-4 mb-6">
                <h2 class="text-3xl font-bold text-gray-800">{{ $header ?? "Dashboard" }}</h2>
            </header>
            <section class="bg-white shadow rounded-lg p-6">
                {{ $slot }}
            </section>
        </main>
    </div>
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; 2024 ĐƯỢC THỰC HIỆN BỞI HÀ MỸ DUYÊN.</p>
    </footer>
    {{ $footer ?? "" }}
    <script src="{{ asset('js/toastr.min.js') }}"></script> 
</body>
</html>
