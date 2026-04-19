<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="mb-6">
            <h2 class="text-xl font-bold text-stone-800">Masuk ke Sistem</h2>
            <p class="text-sm text-stone-500 mt-1">Masukkan kredensial akses node Anda.</p>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2.5 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm" 
                   placeholder="operator@enviro.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-stone-700">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-medium text-teal-700 hover:text-teal-800">Lupa sandi?</a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2.5 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm" 
                   placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-stone-300 text-teal-700 focus:ring-teal-600 bg-stone-50">
            <label for="remember_me" class="ml-2 block text-sm text-stone-600">Tetap masuk di perangkat ini</label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-semibold text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-700 transition-colors">
                Login
            </button>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-sm text-stone-500">Belum memiliki akses? 
                <a href="{{ route('register') }}" class="font-medium text-teal-700 hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>