<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col md:flex-row">
            <!-- Sidebar -->
            <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-4 hidden md:block">
                <nav>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Dashboard</a></li>
                        <li><a href="#" class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Users</a></li>
                        <li><a href="#" class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Settings</a></li>
                    </ul>
                </nav>
            </aside>
            
            <div class="flex-1">
                <!-- Navbar -->
                <livewire:layout.navigation />
                
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow p-4">
                        <div class="max-w-7xl mx-auto">{{ $header }}</div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>