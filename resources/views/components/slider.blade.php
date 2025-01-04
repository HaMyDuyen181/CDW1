<link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<div class="slider relative">
    <div class="container mx-auto px-4">
        <!-- Swiper -->
        <div class="swiper" id="bannerSwiper">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                @foreach ($banner_list as $banner)
                    <div class="swiper-slide">
                        <picture>
                            <!-- Fallback for browsers not supporting WebP -->
                            <source srcset="{{ asset('images/banners/' . pathinfo($banner->image, PATHINFO_FILENAME) . '.webp') }}" type="image/webp">
                            <img 
                                src="{{ asset('images/banners/' . $banner->image) }}" 
                                class="w-full object-cover" 
                                style="max-height: 600px;" 
                                alt="{{ $banner->name }}">
                        </picture>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Navigation Buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const swiper = new Swiper("#bannerSwiper", {
        loop: true, // Lặp vô hạn
        autoplay: {
          delay: 3000, // Tự động chuyển slide sau 3 giây
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        effect: "slide", // Hoạt động mượt mà
        speed: 700, // Tốc độ chuyển động (ms)
      });
    });
  </script>
  