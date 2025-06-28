<x-app-layout>
  <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Users List</h1>

            <div class="flex justify-end mb-4">
                <a href="{{ route('users.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New User</a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg w-full">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-2 md:px-6 bg-gray-200 text-left text-xs md:text-sm uppercase font-medium text-gray-600">
                                ID</th>
                            <th
                                class="py-3 px-2 md:px-6 bg-gray-200 text-left text-xs md:text-sm uppercase font-medium text-gray-600">
                                Name</th>
                            <th
                                class="py-3 px-2 md:px-6 bg-gray-200 text-left text-xs md:text-sm uppercase font-medium text-gray-600">
                                Email</th>
                            <th
                                class="py-3 px-2 md:px-6 bg-gray-200 text-left text-xs md:text-sm uppercase font-medium text-gray-600">
                                Role</th>
                            <th
                                class="py-3 px-2 md:px-6 bg-gray-200 text-left text-xs md:text-sm uppercase font-medium text-gray-600">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 px-2 md:px-6 text-xs md:text-base">{{ $user->id }}</td>
                                <td class="py-4 px-2 md:px-6 text-xs md:text-base">{{ $user->name }}</td>
                                <td class="py-4 px-2 md:px-6 text-xs md:text-base">{{ $user->email }}</td> 
                                <td class="py-4 px-2 md:px-6 text-xs md:text-base"> {{ $user->role}}</td> 
                                <td class="py-4 px-2 md:px-6 text-xs md:text-base flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class=" text-white px-2 py-1 md:px-3 md:py-1 sm:py-2 rounded hover:bg-yellow-200">
                                        <svg class="w-6 h-6 text-yellow-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class=" text-white px-2 py-1 md:px-3 md:py-1 sm:py-2 rounded hover:bg-red-200">
                                            <svg class="w-6 h-6 text-red-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
