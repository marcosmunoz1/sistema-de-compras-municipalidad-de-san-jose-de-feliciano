<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
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
                            <img src="" /> 
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
                <li> <a href="#">  
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                      Home 
                    </a></li>
                <li><a href="{{ route('compras.index') }}">🛒Compras</a></li> 
                <li><a href="{{ route('proveedores.index') }}"><x-heroicon-o-truck class="w-6 h-6 inline" />Proveedores</a></li>
                <li><a href="{{ route('categorias.index') }}"><x-heroicon-o-tag class="w-6 h-6 inline" />Categorias</a></li>
                <li><a href="{{ route('productos.index') }}"><x-heroicon-o-cog class="w-6 h-6 inline" />Productos</a></li>
                <li><a href="{{ route('usuarios.index') }}"><x-heroicon-o-user-group class="w-6 h-6 inline" />Usuarios</a></li>
                <li><a href="{{ url('/admin/roles') }}"><x-heroicon-o-cog class="w-6 h-6 inline" />Roles</a></li>
                <li><a href="{{ route('vehiculos.index') }}"><x-heroicon-o-truck class="w-6 h-6 inline" />Vehículos</a></li>
                <li><a href="{{ url('/admin/combustibles') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fuel w-5 h-5" aria-hidden="true"><path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path><path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path><path d="M2 21h13"></path><path d="M3 9h11"></path></svg>Combustibles</a></li>
                <li><a href="{{ url('/admin/empleados') }}"><x-heroicon-o-user-group class="w-6 h-6 inline" />Empleados</a></li>
            </ul>
        </div>
    </div>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    @if ($errors->any())
        {{-- Esto NO muestra los errores, pero asegura que se cargaron --}}
    @endif
     @if(($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script> 
            // Detectar modo oscuro del SO
            const oscuro = window.matchMedia('(prefers-color-scheme: dark)').matches;

            Swal.fire({
                position: "top-center",
                icon: "{{ $icono }}",
                title: "{{ $mensaje }}",
                showConfirmButton: false,
                timer: 4000,

                // Estilos adaptados
                background: oscuro ? "#1f2937" : "#ffffff",     // gris oscuro / blanco
                color: oscuro ? "#f3f4f6" : "#111827",           // texto claro / oscuro
            });

        </script>  
@endif 
</body>
</html>
