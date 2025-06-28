<x-app-layout>
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Daftar Galeri</h2>
        <a href="{{ route('galleries.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto w-full">
        <table class="table-auto w-full border min-w-[800px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Caption</th>
                    <th class="p-2 border">Foto</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $gallery->name }}</td>
                    <td class="p-2 border">
                        @if($gallery->photo)
                            <img src="{{ asset('storage/'.$gallery->photo) }}" alt="" class="w-16 h-16 object-cover">
                        @else
                            -
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin hapus?')">
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
