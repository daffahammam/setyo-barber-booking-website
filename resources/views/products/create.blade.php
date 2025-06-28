<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Produk</h2>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block">Nama Produk</label>
                <input type="text" name="product_name" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Deskripsi</label>
                <input type="text" name="description" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Harga (Rp)</label>
                <input type="number" name="price" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Produk</label>
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
