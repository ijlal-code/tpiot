<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Tambahan') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui foto profil dan Nomor Induk Mahasiswa (NIM) Anda.") }}
        </p>
    </header>

   <form method="POST" action="{{ route('profile.additional.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="old('nim', $user->nim)" required />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <div>
            <x-input-label for="photo" :value="__('Foto Profil')" />
            
            @if($user->photo)
                <div class="my-2">
                    <img src="{{ asset('storage/' . $user->photo) }}" class="h-20 w-20 rounded-full object-cover border">
                </div>
            @endif

            <input id="photo" name="photo" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>