<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Pengecekan apakah user yang login memiliki role 'admin' --}}
            @if(auth()->user()->hasRole('admin'))
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Data User dan Perangkat</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-blue-600 uppercase tracking-wide">Total Pengguna</p>
                                <p class="mt-2 text-3xl font-extrabold text-gray-900">
                                    {{ \App\Models\User::count() }}
                                </p>
                            </div>
                            <div class="text-blue-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>

                        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-6 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-green-600 uppercase tracking-wide">Total Perangkat (Sensor)</p>
                                <p class="mt-2 text-3xl font-extrabold text-gray-900">
                                    {{ \App\Models\IotDevice::count() }}
                                </p>
                            </div>
                            <div class="text-green-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h3>
                    <p class="text-gray-600 mb-8">Ini adalah dashboard personal Anda untuk memantau perangkat dan profil.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <div class="md:col-span-2 bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl shadow-xl overflow-hidden">
                            <div class="p-6 sm:p-8 flex items-center space-x-6 sm:space-x-8">
                                
                                <div class="flex-shrink-0">
                                    @if(auth()->user()->photo)
                                        {{-- Jika user SUDAH mengunggah foto profil --}}
                                        <img class="h-24 w-24 sm:h-32 sm:w-32 rounded-full border-4 border-gray-400 object-cover shadow-inner bg-white" 
                                             src="{{ asset('storage/' . auth()->user()->photo) }}" 
                                             alt="Foto Profil {{ auth()->user()->name }}">
                                    @else
                                        {{-- Jika user BELUM mengunggah foto profil, gunakan Avatar Inisial --}}
                                        <img class="h-24 w-24 sm:h-32 sm:w-32 rounded-full border-4 border-gray-400 object-cover shadow-inner bg-white" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random&color=fff&size=128" 
                                             alt="Avatar {{ auth()->user()->name }}">
                                    @endif
                                </div>
                                <div class="text-white">
                                    <p class="text-xs sm:text-sm uppercase tracking-widest text-gray-400 font-semibold mb-1">Kartu Identitas Mahasiswa</p>
                                    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">{{ auth()->user()->name }}</h2>
                                    
                                    <div class="mt-4 bg-gray-700/50 rounded p-3 inline-block">
                                        <p class="text-sm sm:text-base text-gray-300">
                                            <span class="font-semibold text-gray-400">NIM:</span> 
                                            {{ auth()->user()->nim ?? 'Belum Diatur' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-1 bg-purple-50 border-t-4 border-purple-500 rounded-2xl p-6 shadow-md flex flex-col justify-center items-center text-center">
                            <div class="p-3 bg-purple-100 rounded-full mb-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h4 class="text-gray-600 font-semibold mb-1">Perangkat Aktif Anda</h4>
                            <p class="text-5xl font-extrabold text-purple-700">
                                {{ \App\Models\IotDevice::where('user_id', auth()->id())->count() }}
                            </p>
                        </div>

                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>