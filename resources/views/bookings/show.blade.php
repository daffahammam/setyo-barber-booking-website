<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Booking Barber</title>
        <link rel="icon" type="image/png" href="{{ asset('images/stylogo.png') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>


    <body class="bg-gray-100 mt-12 flex flex-col items-center min-h-screen">
        @include('components.navbar-user')
        
        <div class="max-w-5xl mx-auto bg-white p-4 mt-6 mb-6  sm:p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-center">Daftar Booking</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 mt-4 rounded">
                {{ session('success') }}
            </div>
        @endif

            <!-- Filter (Otomatis saat diubah) -->
            <form id="filter-form" method="GET" action="{{ route('bookings.show') }}" class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold">Tanggal</label>
                        <input type="date" name="date" value="{{ request('date', now()->toDateString()) }}"
                            class="w-full border rounded p-2 filter-input">
                    </div>
                    <div>
                        <label class="block font-bold">Tukang Cukur</label>
                        <select name="barber" class="w-full border rounded p-2 filter-input">
                            <option value="">Semua</option>
                            <option value="Setyo" {{ request('barber') == 'Setyo' ? 'selected' : '' }}>Setyo</option>
                            <option value="Thariq" {{ request('barber') == 'Thariq' ? 'selected' : '' }}>Thariq</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold">Status</label>
                        <select name="status" class="w-full border rounded p-2 filter-input">
                            <option value="">Semua</option>
                            <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima
                            </option>
                            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses
                            </option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai
                            </option>
                        </select>
                    </div>
                </div>
                <!-- Tombol Reset -->
                <div class="text-center mt-4">
                    <button type="button" id="reset-button"
                        class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-500">
                        Reset Filter
                    </button>
                    <button type="button" id="booking-button"
                        onclick="window.location.href='{{ route('bookings.add') }}'"
                        class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-500">
                        Booking
                    </button>
                </div>
            </form>

            <!-- Membuat tabel menjadi responsif -->
            <div class="overflow-x-auto">
                @if ($bookings->isEmpty())
                    <p class="text-center text-gray-600">Tidak ada booking untuk tanggal ini.</p>
                @else
                    @foreach ($bookings as $date => $groupedBookings)
                        <h3 class="text-lg font-bold bg-gray-200 p-2 mt-4 rounded">
                            Booking untuk {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
                        </h3>

                        <table class="w-full border-collapse border border-gray-300 text-sm sm:text-base mt-2">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border p-2">No</th>
                                    <th class="border p-2">Nama</th>
                                    {{-- <th class="border p-2">Nomor HP</th> --}}
                                    <th class="border p-2">Tukang Cukur</th>
                                    <th class="border p-2">Waktu</th>
                                    <th class="border p-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedBookings as $index => $booking)
                                    <tr class="text-center border-b">
                                        <td class="border p-2">{{ $loop->iteration }}</td>
                                        <td class="border p-2">{{ $booking->name }}</td>
                                        {{-- <td class="border p-2">{{ $booking->phone }}</td> --}}
                                        <td class="border p-2">{{ $booking->barber }}</td>
                                        <td class="border p-2">
                                            {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</td>
                                        <td class="border p-2">{{ ucfirst($booking->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endif
            </div>
        </div>

        <script>
            // Filter otomatis saat diubah
            document.querySelectorAll('.filter-input').forEach(input => {
                input.addEventListener('change', function() {
                    document.getElementById('filter-form').submit();
                });
            });

            // Tombol Reset
            document.getElementById('reset-button').addEventListener('click', function() {
                window.location.href = "{{ route('bookings.show') }}";
            });
        </script>

        @include('components.footer')
    </body>



</html>
