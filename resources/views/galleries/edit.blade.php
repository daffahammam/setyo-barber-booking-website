<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Galeri</h2>

        <form method="POST" action="{{ route('galleries.update', $gallery) }}" enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Caption</label>
                <input type="text" name="name" value="{{ old('name', $gallery->name) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Galeri</label>
                @if ($gallery->photo)
                    <img src="{{ asset('storage/' . $gallery->photo) }}" class="w-12 h-12 object-cover mb-2" alt="Foto Produk">
                @endif
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded">
                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Perbarui</button>

            
        </form>
    </div>
</x-app-layout>
