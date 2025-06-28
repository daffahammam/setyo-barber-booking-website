<x-app-layout>
<div class="bg-gray-100 mt-6 flex flex-col items-center min-h-screen">      
    
    <div class="bg-white p-4 rounded-lg shadow-md w-full max-w-md mb-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Booking Setyo Barber</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $booking->name) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">No HP</label>
            <input type="text" name="phone" value="{{ old('phone', $booking->phone) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tanggal</label>
            <input type="date" name="date" value="{{ old('date', $booking->date) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="time" class="block font-semibold mb-1">Jam</label>
            <select name="time" id="time" class="w-full border px-3 py-2 rounded" required>
                @php
                $formattedTime = $booking->time ? \Carbon\Carbon::createFromFormat('H:i:s', $booking->time)->format('H:i') : '';
            @endphp
            
            <option value="{{ $formattedTime }}" {{ old('time', $formattedTime) == $formattedTime ? 'selected' : '' }}>
                {{ $formattedTime }}
            </option>
            
        
                @foreach ($timeSlots as $time)
                    <option value="{{ $time }}"
                        {{ old('time', $booking->time ?? '') == $time ? 'selected' : '' }}>
                        {{ $time }}
                    </option>
                @endforeach
            </select>
        </div>
        
        
        

        <div class="mb-4">
            <label class="block font-semibold mb-1">Capster</label>
            <select name="barber" class="w-full border px-3 py-2 rounded" required>
                <option value="Setyo" {{ $booking->barber == 'Setyo' ? 'selected' : '' }}>Setyo</option>
                <option value="Thariq" {{ $booking->barber == 'Thariq' ? 'selected' : '' }}>Thariq</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select name="status" id="status" class="w-full border px-3 py-2 rounded" required>
                <option value="diterima" {{ old('status', $booking->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="proses" {{ old('status', $booking->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ old('status', $booking->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        

        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Simpan Perubahan
            </button>
        </div>
        
    </form>
</div>
</x-app-layout>


        <!-- Footer -->
     