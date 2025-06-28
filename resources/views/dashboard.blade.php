
<x-app-layout>
    <div class="flex h-screen">

       

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gray-100">
            <h1 class="text-3xl font-semibold mb-6 text-gray-800">Admin Dashboard</h1>

            <!-- Tombol Responsif -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tombol 1 -->
                <a href="{{ route('users.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-users mr-4"></i>
                    Manage Users
                </a>

                <!-- Tombol 2 -->
                <a href="{{ route('bookings.index') }}"  class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-calendar-check mr-4"></i>
                    Manage Bookings
                </a>

                <!-- Tombol 3 -->
                <a href="{{ route('price_lists.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-tag mr-4"></i>
                    Manage Harga
                </a>

                <!-- Tombol 3 -->
                <a href="{{ route('capsters.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-tag mr-4"></i>
                    Manage Capsters
                </a>

                <!-- Tombol 4 -->
                <a href="{{ route('products.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-cogs mr-4"></i>
                    Manage Produk
                </a>

                <!-- Tombol 5 -->
                <a href="{{ route('galleries.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-images mr-4"></i>
                    Manage Galeri
                </a>

                <!-- Tombol 6 -->
                <a href="{{ route('contacts.index') }}" class="flex justify-center items-center bg-indigo-500 text-white text-xl font-semibold rounded-lg p-6 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <i class="fas fa-phone-alt mr-4"></i>
                    Manage Kontak
                </a>
            </div>
        </div>
        
    </div>
</x-app-layout>
