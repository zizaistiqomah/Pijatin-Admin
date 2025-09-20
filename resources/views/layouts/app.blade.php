<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pijat.in') }} - @yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
     @vite(['resources/css/app.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Tailwind CSS CDN (if not using Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- expand sidebar -->
    <style>[x-cloak] { display: none !important; }</style>

    
    <!-- Custom Styles -->
    <style>
        /* Custom scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 1);
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-poppins">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
        


        
        <!-- Main Content Area -->
        <div class="ml-64 flex-1 min-h-screen p-6" style="background-color: #EBFFF2;">
            @include('components.navbar')

            @yield('content')
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>