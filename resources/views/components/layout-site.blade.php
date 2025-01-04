@vite('resources/css/app.css')
{{ $header ?? '' }}
</head>
<body class="font-sans bg-gray-100">
<!-- Header Section -->
<header class="bg-white shadow">
    <x-header />
</header>

<!-- Main Content Section -->
<main class="container mx-auto px-4 py-6">
    {{ $slot }}
    
</main>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white py-6">
    <x-footer />
    <x-footer-menu />
</footer>

{{ $footer ?? '' }}
</body>
</html>
