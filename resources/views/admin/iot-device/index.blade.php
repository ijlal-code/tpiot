<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perangkat') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable

            var datatable = $('#crudTable').DataTable({
                responsive: true, // <--- aktifkan fitur ini
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '10%'
                    },
                    {
                        data: 'user.id',
                        name: 'user.id',
                    },
                    {
                        data: 'user.name',
                        name: 'user.name',
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%',
                    }
                ]
            })
        </script>
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
                    <span class="text-gray-500">Perangkat</span>
                </nav>
                @if (session('error'))
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Error
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-5" role="alert">
                        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                            Berhasil
                        </div>
                        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="mb-10">
                    <a href="{{ route('iot-devices.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded shadow-lg">+
                        Perangkat
                    </a>
                </div>



                <div class="shadow overflow-hidden sm-rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <table id="crudTable" class="display cell-border">
                            <thead>
                                <tr>
                                    <th>ID Perangkat</th>
                                    <th>ID Pengguna</th>
                                    <th>Pengguna</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>