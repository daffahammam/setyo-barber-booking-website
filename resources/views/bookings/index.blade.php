<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl text-center font-bold mb-4">Daftar Booking</h2>

        

        @if(session('success'))
            <div class="text-green-500 mb-4">{{ session('success') }}</div>
        @endif

        <form id="filterForm" method="GET" action="{{ route('bookings.index') }}" class="mb-6 grid grid-cols-1 sm:grid-cols-4 gap-4">
            <input type="date" name="date" value="{{ request('date') }}" class="border rounded px-3 py-2 w-full" placeholder="Tanggal">
        
            <select name="barber" class="border rounded px-3 py-2 w-full">
                <option value="">-- Pilih Capster --</option>
                <option value="Setyo" {{ request('barber') == 'Setyo' ? 'selected' : '' }}>Setyo</option>
                <option value="Thariq" {{ request('barber') == 'Thariq' ? 'selected' : '' }}>Thariq</option>
            </select>
        
            <select name="status" class="border rounded px-3 py-2 w-full">
                <option value="">-- Pilih Status --</option>
                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <a href="{{ route('bookings.create') }}" class="bg-blue-500 text-white px-4 py-2 text-center rounded mb-4 inline-block">
            Tambah Booking
            </a>
        </form>

       <div class="overflow-x-auto w-full">
    <table class="table-auto w-full border min-w-[800px]">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">No</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">No HP</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Waktu</th>
                <th class="p-2 border">Capster</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr class="text-center">
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $booking->name }}</td>
                    <td class="p-2 border">{{ $booking->phone }}</td>
                    <td class="p-2 border">{{ $booking->date }}</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</td>
                    <td class="p-2 border">{{ $booking->barber }}</td>
                    <td class="p-2 border">{{ ucfirst($booking->status) }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 ml-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                        <a href="{{ route('bookings.chat', $booking->id) }}"
                            class="text-green-500 ml-2"
                            onclick="return confirm('Kirim pesan WhatsApp ke customer ini?')">
                            Chat
                         </a>
                         
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        <div class="mt-4">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('filterForm');
            const inputs = form.querySelectorAll('input, select');
    
            inputs.forEach(input => {
                input.addEventListener('change', () => {
                    form.submit();
                });
            });
        });
    </script>
    
</x-app-layout>
