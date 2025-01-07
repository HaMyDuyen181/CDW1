@vite('resources/css/app.css')
{{ $header ?? '' }}
</head>
<body>
   
    <header class="sticky top-0 z-50 bg-white lg-shadow">
        <x-header/>
    </header>
  

    <main>
        {{-- Hiển thị thông báo nếu có --}}
        @if (session('warning'))
        <div class="bg-yellow-100 text-yellow-700 p-4 mb-4 rounded">
            {{ session('warning') }}
        </div>
        @elseif (session('error'))
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
        @endif
    
        {{-- Hiển thị nội dung chính --}}
        {{$slot}}
    </main>
    <header>

        <x-footer/>
    </header>
    {{$footer ?? ""}}
</body>
</html>
