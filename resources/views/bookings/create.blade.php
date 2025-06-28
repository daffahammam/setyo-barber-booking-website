<x-app-layout>
    <div class="bg-gray-100 mt-6 flex flex-col items-center min-h-screen">

        <!-- Container Form -->
        <div class="bg-white p-4 rounded-lg shadow-md w-full max-w-md mb-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Booking Setyo Barber</h2>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-2 mt-2 mb-2 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nama:</label>
                    <input type="text" name="name" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">No HP:</label>
                    <input type="text" name="phone"  placeholder="contoh: 628*********" required
                        class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tukang Cukur:</label>
                    <select name="barber" required class="w-full p-2 border rounded">
                        <option value="Setyo">Setyo</option>
                        <option value="Thariq">Thariq</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal:</label>
                    <input type="date" name="date" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Jam:</label>
                    <select name="time" required class="w-full border rounded p-2">
                        @foreach ($timeSlots as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Booking
                    </button>
                </div>
            </form>
        </div>

       

    </div>
    
</x-app-layout>