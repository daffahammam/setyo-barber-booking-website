<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nama Produk</label>
                <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Deskripsi</label>
                <input type="text" name="description" value="{{ old('description', $product->description) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Foto Produk</label>
                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" class="w-12 h-12 object-cover mb-2" alt="Foto Produk">
                @endif
                <input type="file" name="photo" class="w-full border px-3 py-2 rounded">
                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Perbarui</button>

            
        </form>
    </div>
</x-app-layout>
