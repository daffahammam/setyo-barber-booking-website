<x-guest-layout>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">

        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Reset Password</h2>

            <div class="mb-4 text-sm text-gray-600 text-center">
                {{ __('Lupa kata sandi? Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan untuk reset password.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-6">
                    <x-primary-button>
                        {{ __('Kirim Link Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>
