<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl text-center font-bold mb-4">Kontak Setyo Barbershop </h2>

        <div class="flex justify-end">
    <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Tambah Kontak
    </a>
</div>

        @if (session('success'))
            <div class="text-green-500 mt-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto w-full mt-4">
        <table class="table-auto w-full border min-w-[800px]">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Link Maps</th>
                    <th class="p-2 border">Link Whatsapp</th>
                    <th class="p-2 border">Link Instagram</th>
                    <th class="p-2 border">Link TikTok</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($contacts as $contact)
                <tr>
                    <td class="p-2 border">{{ $contact->maps }}</td>
                    <td class="p-2 border">{{ $contact->whatsapp }}</td>
                    <td class="p-2 border">{{ $contact->instagram }}</td>
                    <td class="p-2 border">{{ $contact->tiktok }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</x-app-layout>
