<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Setyo Barbershop</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/stylogo.png') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>

        @include('components.navbar')


        <!-- Hero Section -->
        <div
        class="hero relative isolate px-6 mt-2 lg:px-8 bg-[url('{{ asset('images/stylogo.png') }}')] bg-cover bg-center bg-no-repeat">
        <div class="mx-auto max-w-2xl py-28 sm:py-42 lg:py-52 bg-white/50 rounded-lg p-8">
            <div class="text-center">
                <h1 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-6xl">
                    Welcome to <br> SETYO BARBER STUDIO
                </h1>
                <p class="mt-4 text-lg text-gray-700 sm:text-xl italic font-bold">
                    " Go Home Handsome "
                </p>
                <p class="mt-4 text-lg text-gray-700 sm:text-xl ">
                    Open : Selasa - Minggu <br> Jam 10.00 - 21.00 WIB <br>
                    Istirahat Jam 12.00 - 13.00 WIB
                </p>
                <div class="mt-8 flex items-center justify-center gap-x-6">
                  <a href="{{ route('bookings.show') }}" class="text-sm font-semibold text-gray-900 ">
                        Lihat Antrian <span aria-hidden="true">→</span>
                    </a>  
                  <a href="{{ route('bookings.add') }}"
                        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                        Pesan Sekarang
                  </a>
                </div>
            </div>
        </div>
    </div>
    

        <!-- Tentang Kami -->
        <section id="about" class="py-20 bg-white">
            <div class="container mx-auto px-6 text-center">
              <h3 class="text-4xl font-bold text-gray-800 mb-8">Tentang Kami</h3>
              <p class="text-gray-600 text-lg leading-relaxed max-w-4xl mx-auto">
                Setyo Barbershop Studio telah menjadi pilihan utama para pria yang menginginkan potongan rambut berkualitas sejak 2017.
                Dengan tim barber profesional dan berpengalaman, kami menghadirkan layanan premium yang mengutamakan presisi, gaya, dan kenyamanan.
                Dalam suasana modern dan santai, setiap pelanggan mendapatkan pengalaman grooming terbaik dengan peralatan canggih dan produk berkualitas.
                Kami tidak hanya memotong rambut, tapi membantu Anda menemukan gaya yang mencerminkan karakter Anda.
              </p>
            </div>
          
            <!-- Capsters -->
            <div class="container mx-auto px-6 mt-20">
              <h4 class="text-2xl font-bold text-center text-gray-800 mb-12">Capsters Kami</h4>
              <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">

                @foreach ($capsters as $capster )
                <!-- Capster 1 -->
                <div class="bg-gray-100 rounded-2xl shadow-md p-4 text-center hover:shadow-xl transition duration-300">
                  <img class="w-32 h-32  mx-auto mb-2" src="{{ asset('storage/'.$capster->photo) }}" alt="photo">
                  <h3 class="text-2xl font-semibold text-gray-900">{{ $capster->name }}</h3>
                  <p class="text-gray-500 mb-3">{{ $capster->position }}</p>
                  <a href="{{ $capster->instagram }}" target="_blank"
                    class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M3 8a5 5 0 015-5h8a5 5 0 015 5v8a5 5 0 01-5 5H8a5 5 0 01-5-5V8zm5-3a3 3 0 00-3 3v8a3 3 0 003 3h8a3 3 0 003-3V8a3 3 0 00-3-3H8zm7.6 2.2a1 1 0 011-1h.01a1 1 0 110 2h-.01a1 1 0 01-1-1zM12 9a3 3 0 100 6 3 3 0 000-6z"
                        clip-rule="evenodd" />
                    </svg>
                  Instagram
                  </a>
                </div>
                @endforeach
          
              </div>
            </div>
          </section>

        <!-- Layanan -->
        <section id="services" class="py-16 bg-gray-200">
            <div class="container mx-auto px-6 text-center">
                <h3 class="text-3xl font-bold mb-8">Layanan Kami</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h4 class="text-xl font-semibold mb-3">Premium Haircut</h4>
                        <p class="text-gray-600">Pelayanan cukur rambut premium dengan cuci & styling rambut</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h4 class="text-xl font-semibold mb-3">Home Service</h4>
                        <p class="text-gray-600">Pelayanan cukur rambut premium & styling rambut langsung ke rumah
                            anda
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h4 class="text-xl font-semibold mb-3">Wedding Hairstylist</h4>
                        <p class="text-gray-600">Pelayanan cukur rambut premium & styling rambut untuk momen
                            spesialmu
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing -->
        <section id="prices" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 text-center">
              <h3 class="text-4xl font-bold text-gray-800 mb-12">Daftar Harga</h3>
          
              <div class="flex justify-center">
                <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-200">
                  <h3 class="text-2xl font-semibold text-gray-900 mb-6">Men’s Haircut</h3>
                  @foreach ($priceList as $prices)
                  <ul class="space-y-4 text-left">
                    <li class="flex justify-between items-center">
                      <span class="text-gray-700 font-medium">{{ $prices->service_name }}</span>
                      <span class="text-indigo-600 font-bold">RP. {{ $prices->price }}</span>
                    </li>
                  </ul>
                  @endforeach
                  <div class="mt-8">
                    <a href="{{ route('bookings.create') }}">
                      <button class="w-full px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 transition duration-200">
                        Pesan Sekarang
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>

        <!-- Products -->
        <section id="products" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
              <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Katalog Produk Barber</h2>
          
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card -->
                @foreach($products as $product)
                <div class="bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                  <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->product_name }}"
                    class="w-full h-52 object-cover transition-transform duration-300 hover:scale-105">
                  <div class="p-6">
                    <h3 class="text-lg font-semibold text-center text-gray-800 mb-1">{{ $product->product_name }}</h3>
                    <p class="text-gray-700 font-medium mb-4">{{ $product->description }}</p>
                    <p class="text-indigo-600 font-medium mb-4">Rp. {{ $product->price }}</p>
                    <a href="https://wa.me/6285641728429" target="_blank"> 
                      <button class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-500 transition">
                        Pesan Sekarang
                      </button>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>
          
        <!-- Galeri -->
        <section id="galeri" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
              <h3 class="text-3xl font-bold text-center mb-10">Galeri Barber</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($galleries as $gallery )
                <!-- Card 1 -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg">
                  <img src="{{ asset('storage/'.$gallery->photo) }}" alt="{{ $gallery->name }}" class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
                  <div class="absolute inset-0 bg-black bg-opacity-0 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold">{{ $gallery->name }}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>

        <!-- Testimoni -->
        <section id="testimonials" class="py-8 bg-white overflow-hidden">
            <div class="container mx-auto px-6 text-center">
                <h3 class="text-3xl font-bold mb-8">Apa Kata Pelanggan Kami?</h3>
                <div class="relative w-full overflow-hidden">
                    <div id="testimonial-container" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Testimoni 1 -->
                        <div class="testimonial-item min-w-full p-6 bg-gray-200 rounded-lg shadow text-center">
                            <p class="text-gray-700">"Pelayanan sangat profesional! Hasil cukurannya sangat rapi
                                dan
                                memuaskan."</p>
                            <p class="text-red-500 font-bold mt-2">- Daffa Hammam</p>
                        </div>
                        <!-- Testimoni 2 -->
                        <div class="testimonial-item min-w-full p-6 bg-gray-200 rounded-lg shadow text-center">
                            <p class="text-gray-700">"Tempat yang nyaman dan barber-nya sangat ramah. Rekomendasi
                                banget!"</p>
                            <p class="text-red-500 font-bold mt-2">- Labib Awwam</p>
                        </div>
                        <!-- Testimoni 3 -->
                        <div class="testimonial-item min-w-full p-6 bg-gray-200 rounded-lg shadow text-center">
                            <p class="text-gray-700">"Harga terjangkau, hasil cukuran presisi! Pasti akan kembali
                                lagi."</p>
                            <p class="text-red-500 font-bold mt-2">- Dika Ardian </p>
                        </div>
                        <!-- Duplikat Testimoni 1 untuk looping halus -->
                        <div class="testimonial-item min-w-full p-6 bg-gray-200 rounded-lg shadow text-center">
                            <p class="text-gray-700">"Pelayanan sangat profesional! Hasil cukurannya sangat rapi
                                dan
                                memuaskan."</p>
                            <p class="text-red-500 font-bold mt-2">- Daffa Hammam</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JavaScript untuk Auto Scroll dengan Reset Halus -->
        <script>
            let index = 0;
            const container = document.getElementById("testimonial-container");
            const items = document.querySelectorAll(".testimonial-item").length;
            const transitionDuration = 700; // Durasi animasi dalam milidetik

            function autoScrollTestimonials() {
                index++;
                container.style.transition = "transform 0.7s ease-in-out";
                container.style.transform = `translateX(-${index * 100}%)`;

                // Jika mencapai slide duplikat, reset ke awal setelah transisi selesai
                if (index === items - 1) {
                    setTimeout(() => {
                        container.style.transition = "none"; // Matikan transisi untuk reset cepat
                        container.style.transform = "translateX(0)";
                        index = 0; // Reset index
                    }, transitionDuration);
                }
            }

            setInterval(autoScrollTestimonials, 5000); // Scroll setiap 5 detik
        </script>

        <!-- Kontak & Lokasi -->
        <section id="contact" class="py-20 bg-gray-100">
            <div class="container mx-auto px-6 text-center">
              <h3 class="text-4xl font-bold text-gray-800 mb-8">Temukan Kami</h3>
          
              <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6 space-y-4">
                @foreach ($contacts as $contact)
                  
                <!-- Lokasi -->
                <a href="{{ $contact->maps }}" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-green-600 transition">
                  <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 2.636A7 7 0 0117 9c0 3.771-3.153 7.343-6.151 9.537a.75.75 0 01-.898 0C6.153 16.343 3 12.77 3 9a7 7 0 012.05-6.364zM10 10.5A1.5 1.5 0 1010 7a1.5 1.5 0 000 3.5z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-base font-medium">
                    Jl. Lkr. Delanggu, Krecek, Delanggu, Kabupaten Klaten
                  </span>
                </a>
          
                <!-- WhatsApp -->
                <a href="{{ $contact->whatsapp }}" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-green-600 transition">
                  <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd" />
                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                  </svg>
                  <span class="text-base font-medium">0856-4172-8429</span>
                </a>
          
                <!-- Instagram -->
                <a href="{{ $contact->instagram }}" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-pink-600 transition">
                  <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.6 2.2a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-base font-medium">@stybarber.std</span>
                </a>

                <!-- TikTok -->
                <a href="{{ $contact->tiktok }}" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-black transition">
                  <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.75 2h2.628a5.25 5.25 0 0 0 5.247 5.247v2.628a7.875 7.875 0 0 1-5.25-1.942v7.567a6.375 6.375 0 1 1-6.79-6.348v2.65a3.75 3.75 0 1 0 3.75 3.75V2z"/>
                  </svg>
                  <span class="text-base font-medium">@stybarber.std</span>
                </a>

              @endforeach

              </div>
            </div>
          </section>
          


    </body>
    @include('components.footer')

</html>
