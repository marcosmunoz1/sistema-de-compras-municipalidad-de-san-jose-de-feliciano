<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Panel Administrativo</title>
</head>

<body class="bg-base-200">

    <div class="drawer lg:drawer-open">
        <input id="sidebar" type="checkbox" class="drawer-toggle" />

        {{-- CONTENIDO --}}
        <div class="drawer-content flex flex-col">

            {{-- HEADER --}}
            <div class="navbar bg-base-100 shadow-md px-4">
                <div class="flex-none lg:hidden">
                    <label for="sidebar" class="btn btn-square btn-ghost">
                        ☰
                    </label>
                </div>

                <div class="flex-1">
                    <h1 class="font-bold text-xl">Municipalidad – Sistema de Compras</h1>
                </div>

                {{-- BOTÓN MODO OSCURO --}}
                <div class="flex-none">
                    <button id="darkModeBtn" class="btn btn-neutral btn-sm">
                        🌙 / ☀️
                    </button>
                </div>
                <div class="dropdown dropdown-end ml-2">
                    <label tabindex="0" class="btn btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://i.pravatar.cc/300" />
                        </div>
                    </label>
                    <ul tabindex="0" class="menu dropdown-content mt-3 z-[1] p-2 shadow bg-base-200 rounded-box w-52">
                        <li><a>Perfil</a></li>
                        <li><a>Configuración</a></li>
                        <li><a>
                             <form method="POST" action="{{ route('logout') }}"> 
                                @csrf

                                <x-dropdown-link :href="route('logout')" 
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Cerrar sesión 
                                </x-dropdown-link>
                        </form>
                       </a></li>
                    </ul>
                </div>
            </div>

            <div class="p-6">
                @yield('content')
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="drawer-side">
            <label for="sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content">
                <li class="text-xl font-bold mb-3">Menú Principal</li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('compras.index') }}">Compras</a></li>
                <li><a href="#">Proveedores</a></li>
                <li><a href="#">Usuarios</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
