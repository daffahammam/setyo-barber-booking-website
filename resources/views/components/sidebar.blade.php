<!-- resources/views/components/sidebar.blade.php -->
<div class="w-64 bg-gray-800 text-white">
    <div class="p-4">
        <h2 class="text-2xl font-semibold">Admin Panel</h2>
    </div>
    <ul class="mt-8 space-y-4">
        <li>
            <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a2 2 0 012-2h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V4z" />
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18h14V3H5z" />
                </svg>
                Settings
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4v12h14V4H5z" />
                </svg>
                Profile
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17l5-5m0 0l-5-5m5 5H3" />
                </svg>
                Logout
            </a>
        </li>
    </ul>
</div>
