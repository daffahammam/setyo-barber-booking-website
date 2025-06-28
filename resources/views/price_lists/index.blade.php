<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl text-center font-bold mb-4">Daftar Layanan Harga </h2>

        <div class="flex justify-end">
    <a href="{{ route('price_lists.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Tambah Layanan
    </a>
</div>

        @if (session('success'))
            <div class="text-green-500 mt-4">{{ session('success') }}</div>
        @endif

        
        <table class="table-auto w-full mt-4 border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Layanan</th>
                    <th class="p-2 border">Harga</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($priceList as $price)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $price->service_name }}</td>
                    <td class="p-2 border">Rp {{ number_format($price->price, 0, ',', '.') }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('price_lists.edit', $price->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('price_lists.destroy', $price->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
