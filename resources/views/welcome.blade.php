<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EnviroSense - DHT Monitoring</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|jetbrains-mono:400,500&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .bg-technical-grid {
            background-color: #f5f5f4;
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.03) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-technical-grid text-stone-800 font-sans antialiased min-h-screen flex flex-col selection:bg-teal-100 selection:text-teal-900">
    
    <header class="w-full px-6 py-4 flex justify-between items-center bg-white/80 backdrop-blur-sm border-b border-stone-200 z-10 sticky top-0">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            <span class="font-bold text-lg tracking-tight">EnviroSense</span>
        </div>
        @if (Route::has('login'))
            <nav class="flex gap-4 items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-stone-600 hover:text-teal-700 transition-colors">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-stone-600 hover:text-teal-700 transition-colors">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-medium px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800 transition-colors shadow-sm">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="max-w-4xl w-full flex flex-col items-center text-center space-y-8">
            
            <h1 class="text-5xl lg:text-7xl font-bold tracking-tight text-stone-900 leading-tight">
                Presisi Tinggi.<br>
                <span class="text-teal-700">Pantau Lingkunganmu.</span>
            </h1>
            
            <p class="text-stone-600 text-lg md:text-xl max-w-2xl leading-relaxed">
                Sistem pemantauan Suhu dan Kelembaban (DHT) berbasis web. Didesain untuk pembacaan data yang bersih, cepat, dan akurat tanpa gangguan visual.
            </p>
            
            <div class="pt-6 flex flex-col sm:flex-row gap-4 justify-center w-full sm:w-auto">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3.5 bg-teal-700 text-white font-medium rounded-lg hover:bg-teal-800 transition-colors shadow-sm text-center">
                        Buka Panel Data
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-10 py-3.5 bg-teal-700 text-white font-medium rounded-lg hover:bg-teal-800 transition-colors shadow-sm text-center">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-10 py-3.5 bg-white text-stone-700 border border-stone-300 font-medium rounded-lg hover:bg-stone-50 transition-colors text-center">
                            Daftar
                        </a>
                    @endif
                @endauth
            </div>

        </div>
    </main>
</body>
</html>