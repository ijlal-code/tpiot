<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SmartNode DHT') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|jetbrains-mono:400,500&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Pola kertas milimeter blok tipis untuk kesan teknis yang ringan */
            .bg-technical-grid {
                background-color: #f5f5f4; /* Tailwind stone-100 */
                background-size: 20px 20px;
                background-image: 
                    linear-gradient(to right, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(0, 0, 0, 0.03) 1px, transparent 1px);
            }
        </style>
    </head>
    <body class="font-sans text-stone-800 antialiased bg-technical-grid min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <div class="mb-6 text-center">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-12 h-12 bg-teal-700 text-stone-50 flex items-center justify-center rounded-lg shadow-sm group-hover:bg-teal-800 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <span class="block text-xl font-bold tracking-tight text-stone-800">Enviro<span class="text-teal-700">Sense</span></span>
                    <span class="block text-xs font-mono text-stone-500 uppercase tracking-wider">Node Authentication</span>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-8 py-8 bg-white border border-stone-200 shadow-sm sm:rounded-xl">
            {{ $slot }}
        </div>
        
    </body>
</html>