<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery SIEMPRE PRIMERO -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" href="{{ asset('storage/login/logo-removebg-preview.png') }}"> 

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) 

    <title>
         @yield('title') 
    </title>
</head>


<body class="bg-base-200">
    <div class="drawer lg:drawer-open">
        <input id="sidebar" type="checkbox" class="drawer-toggle" />

        {{-- CONTENIDO --}}
        <div class="drawer-content flex flex-col">

            {{-- HEADER --}}
            <div class="navbar bg-base-200/80 backdrop-blur shadow-sm border-b border-base-300 px-4 sticky top-0 z-50">
                <div class="flex-none lg:hidden">
                    <label for="sidebar" class="btn btn-square btn-ghost">
                        ☰
                    </label>
                </div>

                <div class="flex-1">
                    <h1 class="font-bold text-xl"></h1>
                </div>

                {{-- TOGGLE MODO OSCURO / CLARO --}}
                <label class="flex cursor-pointer gap-1 items-center text-xs" id="themeToggleLabel">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        fill="none" 
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5" />
                        <path
                        d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                    </svg>
                    <input
                        id="themeToggle"
                        type="checkbox"
                        value="synthwave"
                        class="toggle toggle-xs theme-controller"
                    />
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </label>
                <div class="dropdown dropdown-end ml-2">
                    <label tabindex="0" class="btn btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('storage/login/logo-removebg-preview.png') }}" />
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
            <div class="p-6  min-h-dvh grid-rows-[auto_1fr_auto] bg-base-300/70 rounded-box border border-base-300 shadow-sm">
                @yield('content')
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="drawer-side z-40">
            <label for="sidebar" class="drawer-overlay"></label> 
            <aside class="flex flex-col w-62 min-h-full bg-base-200 border-r border-base-300">
                
                {{-- LOGO / TÍTULO --}}
                <div class="flex items-center gap-3 px-4 py-5 border-b border-base-300">
                    <img src="{{ asset('storage/login/logo-removebg-preview.png') }}" class="w-10 h-10 rounded-lg" alt="Logo"/>
                    <div>
                        <h2 class="font-bold text-base leading-tight">Sistema Municipal</h2>
                        <span class="text-xs text-base-content/60">Panel de Gestión</span>
                    </div>
                </div>

                {{-- MENÚ --}}
                <ul class="menu flex-1 px-3 py-4 gap-1">
                    
                    {{-- INICIO --}}
                    @can('admin-index')
                    <li class="mr-15"> 
                        <a href="{{ route('admin.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors   {{ request()->is('admin') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-home class="w-5 h-5" />
                            <b>Inicio</b>
                        </a> 
                    </li>
                    @endcan
                    {{-- SECCIÓN: OPERACIONES --}}
                    <li class="menu-title mt-4">
                        <span class="text-xs uppercase tracking-wider text-base-content/50">Operaciones</span>
                    </li> 
                    @can('compras-index')
                    <li class="mr-15">
                        <a href="{{ route('compras.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/compras*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-shopping-bag class="w-5 h-5" />
                            Compras
                        </a>
                    </li>
                    @endcan
                    @can('combustibles-index')
                    <li class="mr-15">
                        <a href="{{ url('/admin/combustibles') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/combustibles*') ? 'active bg-primary text-primary-content' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-fuel w-5 h-5" aria-hidden="true">
                                <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                                <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                                <path d="M2 21h13"></path>
                                <path d="M3 9h11"></path>
                            </svg>
                            Combustibles
                        </a>
                    </li>
                    @endcan
                    @can('obras-index')
                    <li class="mr-15">
                        <a href="{{ url('/admin/obras') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/obras*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-building-office-2 class="w-5 h-5" />
                            Obras
                        </a>
                    </li> 
                    @endcan
                    @can('movimientos-index')
                    <li class=" mr-15">
                        <a href="{{ url('/admin/movimientos') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/movimientos*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-arrow-path class="w-5 h-5" />
                            Movimientos
                        </a>
                    </li>
                    @endcan
                    {{-- SECCIÓN: CATÁLOGOS --}}
                    <li class="menu-title mt-4">
                        <span class="text-xs uppercase tracking-wider text-base-content/50">Inventario</span>
                    </li>
                    @can('proveedores-index')
                    <li class=" mr-15">
                        <a href="{{ route('proveedores.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/proveedores*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-building-storefront class="w-5 h-5" />
                            Proveedores
                        </a>
                    </li>
                    @endcan
                    @can('categorias-index')
                    <li class="mr-15">
                        <a href="{{ route('categorias.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/categorias*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-tag class="w-5 h-5" />
                            Categorías
                        </a>
                    </li>
                    @endcan
                    @can('productos-index')
                    <li class="mr-15">
                        <a href="{{ route('productos.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/productos*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-cube class="w-5 h-5" />
                            Productos
                        </a>
                    </li>
                    @endcan
                    @can('vehiculos-index')
                    <li class="mr-15">
                        <a href="{{ route('vehiculos.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/vehiculos*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-truck class="w-5 h-5" />
                            Vehículos
                        </a>
                    </li>
                    @endcan
                    @can('depositos-index')
                    <li class="w-full mr-15">
                        <a href="{{ url('/admin/depositos') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/depositos*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-home-modern class="w-5 h-5" />
                            Depósitos
                        </a>
                    </li> 
                    @endcan
                    {{-- SECCIÓN: PERSONAL --}}
                    <li class="menu-title mt-4">
                        <span class="text-xs uppercase tracking-wider text-base-content/50">Personal</span>
                    </li>
                    @can('usuarios-index') 
                    <li class="mr-15">
                        <a href="{{ route('usuarios.index') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/usuarios*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-users class="w-5 h-5" />
                            Usuarios
                        </a>
                    </li>
                    @endcan
                    @can('empleados-index')               
                    <li class="mr-15">
                        <a href="{{ url('/admin/empleados') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/empleados*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-identification class="w-5 h-5" />
                            Empleados
                        </a>
                    </li>
                    @endcan

                    {{-- SECCIÓN: SEGURIDAD --}}
                    <li class="menu-title mt-4">
                        <span class="text-xs uppercase tracking-wider text-base-content/50">Seguridad</span>
                    </li>
                    @can('roles-index')
                    <li class="mr-15">
                        <a href="{{ url('/admin/roles') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/roles*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-shield-check class="w-5 h-5" />
                            Roles
                        </a>
                    </li>
                    @endcan
                    @can('permisos-index')
                    <li class="mr-15">
                        <a href="{{ url('/admin/permisos') }}"
                           class="hover:bg-base-300 hover:text-primary transition-colors {{ request()->is('admin/permisos*') ? 'active bg-primary text-primary-content' : '' }}">
                            <x-heroicon-o-key class="w-5 h-5" />
                            Permisos
                        </a>
                    </li>
                    @endcan
                </ul>

                {{-- FOOTER DEL SIDEBAR --}}
                <div class="border-t border-base-300 p-4">
                    <div class="flex items-center gap-3">
                        <div class="avatar">
                            <div class="rounded-full w-9">
                                <img src="{{ asset('storage/login/logo-removebg-preview.png') }}" alt="Logo" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium truncate">{{ Auth::user()->name ?? 'Usuario' }}</p>
                            <p class="text-xs text-base-content/60 truncate">{{ Auth::user()->email ?? '' }}</p>
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </div>
    @yield('js') 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    @if ($errors->any())
        {{-- Esto NO muestra los errores, pero asegura que se cargaron --}}
    @endif
    @if (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
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
                background: oscuro ? "#1f2937" : "#ffffff", // gris oscuro / blanco
                color: oscuro ? "#f3f4f6" : "#111827", // texto claro / oscuro
            });
        </script>
    @endif
</body>

</html>
