<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perangkat') }}
        </h2>
    </x-slot>

    <main class="flex-1 overflow-y-auto">

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- Breadcrumb --}}
                <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:text-green-600">
                        <i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
                    </a>
                    <span>›</span>
                    <span class="text-gray-500">Perangkat Saya</span>
                </nav>

                {{-- GRID --}}
                <div class="flex flex-wrap gap-4">

                    @foreach ($myDevices as $id)

                        <a href="{{ route('my-iot-devices.show', $id) }}"
                           class="group relative bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all duration-200 overflow-hidden flex flex-col"
                           style="width: 220px;">

                            {{-- Badge pojok kiri atas CARD, bukan di dalam foto --}}
                            <div class="absolute top-3 left-3 z-10">
                                <span class="bg-gray-700 text-white text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md">
                                    IOT DEVICE
                                </span>
                            </div>

                            {{-- IMAGE AREA --}}
                            <div class="bg-gray-50 flex items-center justify-center"
                                 style="height: 160px;">

                                <img src="{{ asset('images/devices/' . $id . '.png') }}"
                                     onerror="this.src='{{ asset('assets/images/img-card.png') }}'"
                                     alt="Device {{ $id }}"
                                     class="w-36 h-36 object-contain transition-transform duration-200 group-hover:scale-105">

                            </div>

                            {{-- CONTENT --}}
                            <div class="px-5 py-4 flex flex-col gap-3">

                                {{-- Device ID label --}}
                                <div>
                                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">
                                        Device ID
                                    </span>
                                    <p class="mt-1 text-[13px] font-bold text-gray-800 font-mono break-all leading-snug">
                                        {{ $id }}
                                    </p>
                                </div>

                                {{-- Divider --}}
                                <div class="border-t border-gray-100"></div>

                                {{-- Footer --}}
                                <div class="flex items-center justify-between text-green-600 text-sm font-semibold">
                                    <span>Lihat Kontrol</span>
                                    <i data-lucide="arrow-right"
                                       class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>
        </div>

    </main>

</x-app-layout>