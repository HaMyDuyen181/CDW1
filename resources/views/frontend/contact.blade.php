<x-layout-site>
  <x-slot:title>
    {{ $dulieu['title'] }}
    </x-slot:title>
     <!-- Contact Section -->
  <section class="py-20 bg-gradient-to-b from-blue-50 to-gray-50">
    <div class="container mx-auto px-6 lg:px-16">
      <!-- Title -->
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Liên Hệ Với Chúng Tôi</h2>
        <p class="text-lg text-gray-600">Chúng tôi sẵn sàng hỗ trợ bạn. Để lại thông tin, chúng tôi sẽ liên hệ sớm nhất!</p>
      </div>

      <!-- Content -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <!-- Contact Information -->
        <div class="flex flex-col space-y-8">
          <h3 class="text-3xl font-semibold text-gray-800">Thông Tin Liên Hệ</h3>
          <div class="space-y-4">
            <p class="flex items-center text-lg text-gray-700">
              <i class="fas fa-envelope text-blue-500 mr-4"></i>
              <a href="mailto:hamyduyenhitu.it@gmail.com" class="hover:text-blue-600 transition">hamyduyenhitu.it@gmail.com</a>
            </p>
            <p class="flex items-center text-lg text-gray-700">
              <i class="fas fa-phone text-blue-500 mr-4"></i>
              <a href="tel:+0335235807" class="hover:text-blue-600 transition">0335235807</a>
            </p>
            <p class="flex items-center text-lg text-gray-700">
              <i class="fas fa-map-marker-alt text-blue-500 mr-4"></i>
              Số 60C Trương Văn Thành, Phường Hiệp Phú, Quận 9, TP.HCM
            </p>
          </div>
          <!-- Google Map -->
          <div class="rounded-lg shadow-lg overflow-hidden">
            <iframe
              width="100%"
              height="300"
              frameborder="0"
              class="rounded-lg"
              style="border:0"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.915560377518!2d105.84117111535554!3d21.028511986000708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab687c83b5f5%3A0x110b2d94545ca939!2zVHLhuqduIE5naGFuLCBMYSBMdW5n!5e0!3m2!1svi!2s!4v1645123177638!5m2!1svi!2s"
              allowfullscreen=""
              loading="lazy">
            </iframe>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <h3 class="text-3xl font-semibold text-gray-800 mb-6">Gửi Thông Tin Của Bạn</h3>
          <form action="#" method="POST" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="flex flex-col">
                <label for="name" class="text-lg font-medium text-gray-700 mb-2">Tên</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" required />
              </div>
              <div class="flex flex-col">
                <label for="email" class="text-lg font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" required />
              </div>
            </div>
            <div class="flex flex-col">
              <label for="message" class="text-lg font-medium text-gray-700 mb-2">Lời nhắn</label>
              <textarea id="message" name="message" placeholder="Nhập nội dung" rows="6" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" required></textarea>
            </div>
            <button type="submit" class="w-full py-4 bg-blue-600 text-white font-bold text-lg rounded-lg hover:bg-blue-500 transition">Gửi Thông Tin</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  </x-layout-site>