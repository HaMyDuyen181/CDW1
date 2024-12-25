<x-layout-site>
  <x-slot:title>
    {{ $dulieu['title'] }}
  </x-slot:title>
  <x-slot:header>
      <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
  </x-slot:header>
  <x-slot:footer>
      <script src="{{ asset('js/layoutsite.js') }}"></script>
  </x-slot:footer>
  <div>
 <!-- Slider -->
 <x-slide/>
 <!-- San pham theo danh muc -->
 <x-productcategory/>
 <!-- San pham moi -->
 <x-product-store/>
 <!-- San pham khuyen mai -->
 <x-product-sale/>
 <!-- Bai viet moi nhat -->
 <x-post/>
</div>
</x-layout-site>
