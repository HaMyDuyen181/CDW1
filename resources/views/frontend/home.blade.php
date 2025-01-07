<x-layout-site>
  <x-slot:title>
  </x-slot:title>
  <x-slot:header>
      <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
  </x-slot:header>
  <x-slot:footer>
      <script src="{{ asset('js/layoutsite.js') }}"></script>
  </x-slot:footer>
  <div>
 <!-- Slider -->
 <x-slider/>
 <!-- San pham theo danh muc -->
 <x-home-list-category/>
 <!-- San pham moi -->
 <x-product-new/>
 <!-- San pham khuyen mai -->
 <x-product-sale />
 <!-- Bai viet moi nhat -->
 <x-post-new/>
</div>
</x-layout-site>
