<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>

        <form method="POST" action="{{ route('capsters.update', $capster) }}" enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nama Capster</label>
                <input type="text" name="name" value="{{ old('name', $capster->name) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Deskripsi</label>
                <input type="text" name="position" value="{{ old('position', $capster->position) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Link Instagram</label>
                <input type="text" name="instagram" value="{{ old('instagram', $capster->instagram) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Capster</label>
                @if ($capster->photo)
                    <img src="{{ asset('storage/' . $capster->photo) }}" class="w-12 h-12 object-cover mb-2" alt="Foto Produk">
                @endif
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded">
                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Perbarui</button>

            
        </form>
    </div>
</x-app-layout>
