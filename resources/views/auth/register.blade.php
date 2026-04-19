<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="mb-6">
            <h2 class="text-xl font-bold text-stone-800">Registrasi Operator</h2>
            <p class="text-sm text-stone-500 mt-1">Daftarkan akun untuk memonitor data sensor.</p>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm"
                   placeholder="Cth: Budi Santoso">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-600" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm"
                   placeholder="operator@enviro.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-stone-700 mb-1">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm"
                   placeholder="Min. 8 karakter">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-stone-700 mb-1">Konfirmasi Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                   class="block w-full bg-stone-50 border border-stone-300 text-stone-900 rounded-md py-2 px-3 focus:ring-0 focus:border-teal-600 focus:bg-white transition-colors sm:text-sm shadow-sm"
                   placeholder="Ulangi kata sandi">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-600" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-semibold text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-700 transition-colors">
                Buat Akun
            </button>
        </div>

        <div class="text-center mt-4">
            <p class="text-sm text-stone-500">Sudah terdaftar? 
                <a href="{{ route('login') }}" class="font-medium text-teal-700 hover:underline">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>