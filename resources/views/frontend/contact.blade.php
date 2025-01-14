<x-layout-site>
  <x-slot:title>
    {{ $contactData->title }}
  </x-slot:title>

  <!-- Contact Section -->
  <section class="py-20 bg-gradient-to-b from-blue-50 to-gray-50">
    <div class="container mx-auto px-6 lg:px-16">
      <!-- Title -->
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $contactData->title }}</h2>
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
              <a href="mailto:{{ $contactData->email }}" class="hover:text-blue-600 transition">{{ $contactData->email }}</a>
            </p>
            <p class="flex items-center text-lg text-gray-700">
              <i class="fas fa-phone text-blue-500 mr-4"></i>
              <a href="tel:+{{ $contactData->phone }}" class="hover:text-blue-600 transition">{{ $contactData->phone }}</a>
            </p>
            <p class="flex items-center text-lg text-gray-700">
              <i class="fas fa-map-marker-alt text-blue-500 mr-4"></i>
              {{ $contactData->address }}
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
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8585885567013!2d106.78396551428733!3d10.827120992282071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527d69b0da58f%3A0xbfac6b88a66f9496!2zNjBDIFRydXVuZyBWxINuIFRo4bqhbmg!5e0!3m2!1svi!2s!4v1696797680652!5m2!1svi!2s" 
              allowfullscreen=""
              loading="lazy">
            </iframe>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <h3 class="text-3xl font-semibold text-gray-800 mb-6">Gửi Thông Tin Của Bạn</h3>
          <form action="{{ route('frontend.contact.send') }}" method="POST" class="space-y-6">
            @csrf
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
  @if (session('success'))
    <div class="container mx-auto my-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Thành công!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Đóng</title>
                    <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 12.828l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
                </svg>
            </span>
        </div>
    </div>
@endif

</x-layout-site>
