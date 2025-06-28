<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create User</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">

        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create User</h1>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex flex-col">
                    <label for="email" class="text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button type="submit"
                    class="w-full py-2 mt-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Create</button>
            </form>
        </div>

    </body>

</html>
