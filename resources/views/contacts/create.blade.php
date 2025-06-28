<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Kontak</h2>

        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block">Link Maps</label>
                <input type="text" name="maps" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Link Whatsapp</label>
                <input type="text" name="whatsapp" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Link Instagram</label>
                <input type="text" name="instagram" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Link TikTok</label>
                <input type="text" name="tiktok" class="w-full border px-3 py-2" required>
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>

