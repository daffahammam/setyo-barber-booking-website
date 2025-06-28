<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Galeri</h2>

        <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block">Caption</label>
                <input type="text" name="name" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Galeri</label>
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
