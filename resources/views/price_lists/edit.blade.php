<x-app-layout>
    <div class="flex justify-center items-start min-h-screen pt-12">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">Edit Layanan</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('price_lists.update', $priceList->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nama Layanan</label>
                    <input type="text" name="service_name" value="{{ old('service_name', $priceList->service_name) }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Harga</label>
                    <input type="text" name="price" value="{{ old('price', $priceList->price) }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 w-full">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
