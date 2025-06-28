<x-app-layout>
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto w-full">
        <table class="table-auto w-full border min-w-[800px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Produk</th>
                    <th class="p-2 border">Deskripsi</th>
                    <th class="p-2 border">Harga</th>
                    <th class="p-2 border">Foto</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $product->product_name }}</td>
                    <td class="p-2 border">{{ $product->description }}</td>
                    <td class="p-2 border">Rp {{ number_format($product->price) }}</td>
                    <td class="p-2 border">
                        @if($product->photo)
                            <img src="{{ asset('storage/'.$product->photo) }}" alt="" class="w-16 h-16 object-cover">
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
