<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

    </head>

    <body>
        <!-- Navbar -->
        <header class="fixed inset-x-0 top-0 z-50 bg-white shadow-md">
            <nav class="flex items-center justify-between p-4 lg:px-8">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="w-8 border rounded-full border-gray-400" src="{{ asset('images/stylogo.png') }}">
                    </a>
                </div>

                <!-- Tombol Menu Mobile -->
                <div class="flex lg:hidden">
                    <button id="menu-toggle"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/home-user" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Beranda</a>
                    <a href="/home-user#about" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">tentang</a>
                    <a href="/home-user#services" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Layanan</a>
                    <a href="/home-user#prices" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Harga</a>
                    <a href="/home-user#products" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Produk</a>
                    <a href="/home-user#galeri" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Galeri</a>
                    <a href="/home-user#contact" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Kontak</a>
                </div>

                {{-- <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Log
                        in <span aria-hidden="true">&rarr;</span></a>
                </div> --}}

                <div x-data="{ open: false }" class="hidden lg:flex lg:flex-1 lg:justify-end items-center space-x-4 relative">
                    @auth
                        <button @click="open = !open"
                            class="text-sm font-semibold text-gray-900 hover:text-indigo-600 flex items-center gap-2">
                            Hi, {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                
                        <div x-show="open" @click.outside="open = false" x-transition
                            class="absolute right-0 mt-16 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-100 rounded-t-md">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 rounded-b-md">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @endauth
                
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-900 hover:text-indigo-600">
                            Log in <span aria-hidden="true">&rarr;</span>
                        </a>
                    @endguest
                </div>
                
            </nav>

            <!-- Menu Mobile -->
            <div id="mobile-menu"
                class="hidden fixed inset-0 z-50 bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#hero" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="{{ asset('images/stylogo.png') }}" alt="Logo">
                    </a>
                    <button id="menu-close" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/home-user"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Beranda</a>
                            <a href="/home-user#about"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Tentang</a>
                            <a href="/home-user#services"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Layanan</a>
                            <a href="/home-user#prices"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Harga</a>
                            <a href="/home-user#prices"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Produk</a>
                            <a href="/home-user#galeri"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Galeri</a>
                            <a href="/home-user#contact"
                                class="mobile-menu-link block rounded-lg px-3 py-2 text-lg font-semibold text-gray-900 hover:bg-gray-50">Kontak</a>
                        </div>
                        {{-- <div class="py-6">
                            <a href="{{ route('login') }}"
                                class="mobile-menu-link block rounded-lg px-3 py-2.5 text-lg font-semibold text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        </div> --}}
                        <div class="py-6">
                            @auth
                                <div class="block px-3 py-2 text-lg font-semibold text-gray-900">
                                    Hi, {{ Auth::user()->name }}
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left rounded-lg px-3 py-2.5 text-lg font-semibold text-red-600 hover:bg-gray-50">
                                        Logout
                                    </button>
                                </form>
                            @endauth
                        
                            @guest
                                <a href="{{ route('login') }}"
                                    class="mobile-menu-link block rounded-lg px-3 py-2.5 text-lg font-semibold text-gray-900 hover:bg-gray-50">
                                    Log in
                                </a>
                            @endguest
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>

        <!-- JavaScript untuk Toggle Menu -->
        <script>
            const menuToggle = document.getElementById("menu-toggle");
            const menuClose = document.getElementById("menu-close");
            const mobileMenu = document.getElementById("mobile-menu");
            const menuLinks = document.querySelectorAll(".mobile-menu-link"); // Ambil semua link dalam menu

            menuToggle.addEventListener("click", () => {
                mobileMenu.classList.remove("hidden");
            });

            menuClose.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
            });

            // Menutup menu saat salah satu link diklik
            menuLinks.forEach(link => {
                link.addEventListener("click", () => {
                    mobileMenu.classList.add("hidden");
                });
            });
        </script>

    </body>

</html>
