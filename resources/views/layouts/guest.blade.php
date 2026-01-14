<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@props(['title' => null])
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" href="{{ asset('storage/login/logo-removebg-preview.png') }}">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative font-sans text-gray-900 antialiased">
    
    <!-- Imagen de fondo -->
    <div class="absolute inset-0 bg-cover bg-center z-0"
        style="background-image: url('{{ asset('storage/login/parque-fondo.jpg') }}')"></div>

    <!-- Oscurecer un poco para que el formulario se lea -->
    <div class="absolute inset-0 bg-black/40 z-0"></div>

    <!-- Contenido -->
    <div class="min-h-screen relative z-10 flex flex-col items-center justify-center px-4">

        <div>
            <img src="{{ asset('storage/login/logo.png') }}" class="w-20 h-20 object-contain drop-shadow-lg" />
        </div>

        <!-- Este contenedor ya NO tiene bg-blanco -->
        <div class="w-full sm:max-w-md mt-6">
            {{ $slot }}
        </div>

    </div>

</body>



</html>
