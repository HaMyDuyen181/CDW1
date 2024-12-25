<div>
  <!-- Slider -->
  <section class="slider bg-gray-200 py-8">
    <div class="container mx-auto">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img
              src="https://bizweb.dktcdn.net/100/491/197/themes/917410/assets/slider_1.jpg?1720274480928"
              alt="Slide 1"
              class="w-full h-auto object-cover rounded"
            />
          </div>
          <div class="swiper-slide">
            <img
              src="https://bizweb.dktcdn.net/100/491/197/themes/917410/assets/slider_2.jpg?1720274480928"
              alt="Slide 2"
              class="w-full h-auto object-cover rounded"
            />
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>
    </div>
  </section>
  <!-- Swiper JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    });
  </script>
  
</div>


