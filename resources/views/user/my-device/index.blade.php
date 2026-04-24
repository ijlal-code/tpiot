<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perangkat') }}
        </h2>
    </x-slot>

    <x-slot name="script">

    </x-slot>
    <main class="flex-1 overflow-y-auto">

        {{-- @include('components.header') --}}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:text-green-600">
                        <i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
                    </a>
                    <span>›</span>
                    <span class="text-gray-500">Perangkat Saya</span>
                </nav>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($myDevices as $id)
                        <a href="{{ route('my-iot-devices.show', $id) }}"
                            class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden">

                            <div class="relative h-44 bg-gray-100">
                                <img src="{{ asset('images/devices/' . $id . '.png') }}"
                                    onerror="this.src='{{ asset('assets/images/img-card.png') }}'"
                                    alt="Device {{ $id }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                                <div class="absolute top-3 left-3">
                                    <span
                                        class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider bg-black/50 text-white backdrop-blur-sm rounded">
                                        IoT Device
                                    </span>
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Device
                                        ID</span>
                                    <i data-lucide="cpu" class="w-4 h-4 text-green-500"></i>
                                </div>

                                <h3 class="text-sm font-mono font-bold text-gray-800 break-all leading-relaxed">
                                    {{ $id }}
                                </h3>

                                <div
                                    class="mt-5 pt-4 border-t border-gray-50 flex items-center justify-between text-green-600 text-sm font-bold">
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