<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            {{ __('Dashboard EnviroSense') }}
        </h2>
    </x-slot>

    <div class="py-12 relative min-h-screen" style="background-color: #f5f5f4; background-size: 40px 40px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0.03) 1px, transparent 1px), linear-gradient(to bottom, rgba(0, 0, 0, 0.03) 1px, transparent 1px);">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 relative z-10">
            
            {{-- Pengecekan apakah user yang login memiliki role 'admin' --}}
            @if(auth()->user()->hasRole('admin'))
                
                <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-sm border border-stone-200 sm:rounded-xl p-6 md:p-8">
                    <div class="mb-8 border-b border-stone-100 pb-4">
                        <h3 class="text-2xl font-bold text-stone-900 tracking-tight">Data User dan Perangkat</h3>
                        <p class="text-stone-500 mt-1">Pantau total pengguna dan perangkat yang terhubung ke jaringan.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="bg-white border-l-4 border-teal-600 rounded-xl p-6 shadow-sm border-y border-r border-stone-100 flex items-center justify-between group hover:shadow-md transition-all duration-300">
                            <div>
                                <p class="text-sm font-semibold text-stone-500 uppercase tracking-wider">Total Pengguna</p>
                                <p class="mt-2 text-4xl font-extrabold text-stone-800">
                                    {{ \App\Models\User::count() }}
                                </p>
                            </div>
                            <div class="p-4 bg-stone-50 rounded-full group-hover:bg-teal-50 transition-colors">
                                <svg class="w-10 h-10 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>

                        <div class="bg-white border-l-4 border-stone-600 rounded-xl p-6 shadow-sm border-y border-r border-stone-100 flex items-center justify-between group hover:shadow-md transition-all duration-300">
                            <div>
                                <p class="text-sm font-semibold text-stone-500 uppercase tracking-wider">Total Perangkat (Sensor)</p>
                                <p class="mt-2 text-4xl font-extrabold text-stone-800">
                                    {{ \App\Models\IotDevice::count() }}
                                </p>
                            </div>
                            <div class="p-4 bg-stone-50 rounded-full group-hover:bg-stone-100 transition-colors">
                                <svg class="w-10 h-10 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-sm border border-stone-200 sm:rounded-xl p-6 md:p-8">
                    
                    <div class="mb-8 border-b border-stone-100 pb-4">
                        <h3 class="text-3xl font-bold text-stone-900 tracking-tight">
                            Selamat Datang, <span class="text-teal-700">{{ auth()->user()->name }}</span>!
                        </h3>
                        <p class="text-stone-500 mt-2 text-lg">Pantau perangkat EnviroSense dan kelola profil Anda di sini.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <div class="md:col-span-2 bg-stone-900 rounded-2xl shadow-lg border border-stone-800 overflow-hidden relative">
                            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-40 h-40 rounded-full bg-teal-800/30 blur-3xl"></div>

                            <div class="p-6 sm:p-8 flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-8 relative z-10">
                                <div class="flex-shrink-0">
                                    @if(auth()->user()->photo)
                                        <img class="h-28 w-28 sm:h-32 sm:w-32 rounded-full border-4 border-stone-700 object-cover shadow-inner bg-white" 
                                             src="{{ asset('storage/' . auth()->user()->photo) }}" 
                                             alt="Foto Profil {{ auth()->user()->name }}">
                                    @else
                                        {{-- Warna background avatar disamakan dengan warna teal-700 (0f766e) --}}
                                        <img class="h-28 w-28 sm:h-32 sm:w-32 rounded-full border-4 border-stone-700 object-cover shadow-inner bg-white" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0f766e&color=fff&size=128" 
                                             alt="Avatar {{ auth()->user()->name }}">
                                    @endif
                                </div>
                                <div class="text-center sm:text-left text-white mt-2 sm:mt-0 w-full">
                                    <div class="flex items-center justify-center sm:justify-start gap-2 mb-2">
                                        <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                        <p class="text-xs sm:text-sm uppercase tracking-widest text-stone-400 font-semibold">Kartu Identitas Mahasiswa</p>
                                    </div>
                                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight mb-5">{{ auth()->user()->name }}</h2>
                                    
                                    <div class="bg-stone-800/80 border border-stone-700 rounded-lg p-4 inline-block w-full sm:w-auto">
                                        <p class="text-sm text-stone-400 font-medium mb-1">Nomor Induk Mahasiswa (NIM)</p>
                                        <p class="text-xl font-mono text-teal-300 font-semibold tracking-widest">
                                            {{ auth()->user()->nim ?? 'BELUM-DIATUR' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-1 bg-white border border-stone-200 rounded-2xl p-6 shadow-sm flex flex-col justify-center items-center text-center relative overflow-hidden group hover:border-teal-300 transition-colors">
                            <div class="absolute inset-0 bg-teal-50/40 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="relative z-10">
                                <div class="p-4 bg-teal-50 border border-teal-100 rounded-2xl mb-4 inline-block">
                                    <svg class="w-8 h-8 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h4 class="text-stone-500 font-medium uppercase tracking-wider text-sm mb-2">Perangkat Aktif Anda</h4>
                                <p class="text-6xl font-extrabold text-teal-700 font-mono tracking-tighter">
                                    {{ \App\Models\IotDevice::where('user_id', auth()->id())->count() }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>