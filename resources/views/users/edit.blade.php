<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 text-gray-800 font-sans">
        <div class="container mx-auto px-4 py-8 max-w-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Edit User</h1>

            <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PATCH')

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password (leave blank to
                        keep current password):</label>
                    <input type="password" name="password" id="password" placeholder="min. 8 karakter"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <p id="password-error" class="text-red-500 text-sm mt-1 hidden">Password must be at least 8
                        characters long.</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center">
                    <button type="submit" id="submit-btn"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
                    <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                </div>
            </form>
        </div>

        <script>
            document.getElementById('submit-btn').addEventListener('click', function(event) {
                const passwordInput = document.getElementById('password');
                const passwordError = document.getElementById('password-error');

                // Clear any previous errors
                passwordError.classList.add('hidden');

                // Frontend validation for password
                const password = passwordInput.value;

                if (password && password.length < 8) { // If not empty and less than 8 characters
                    passwordError.classList.remove('hidden');
                    event.preventDefault(); // Prevent form submission
                }
            });
        </script>
    </body>

</html>
