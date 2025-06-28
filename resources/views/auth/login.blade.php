<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
            <!-- Status Sesi -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Pesan Sukses -->
            @if (session('message'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Judul Form -->
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
                    Masuk ke Setyo Barbershop
                </h2>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember"
                    >
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">
                        {{ __('Ingat saya') }}
                    </label>
                </div>

                <!-- Tautan & Tombol -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mt-6">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-gray-600 hover:text-gray-900 underline">
                                Lupa kata sandi?
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 underline">
                                Belum punya akun?
                            </a>
                        @endif
                    </div>

                    <x-primary-button>
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
