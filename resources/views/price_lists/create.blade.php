
<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Layanan</h2>

        <form method="POST" action="{{ route('price_lists.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block">Nama Layanan</label>
                <input type="text" name="service_name" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Harga (Rp)</label>
                <input type="number" name="price" class="w-full border px-3 py-2" required>
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>

