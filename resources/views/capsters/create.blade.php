<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Capster</h2>

        <form method="POST" action="{{ route('capsters.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block">Nama Capster</label>
                <input type="text" name="name" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Posisi</label>
                <input type="text" name="position" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Link instagram</label>
                <input type="text" name="instagram" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Capster</label>
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
