@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @can('proveedores-index')
        {{-- CARD PROVEEDORES --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between"> 
                    <div>
                        <h3 class="text-xl font-bold">Proveedores</h3>
                        <p class="text-sm opacity-80"> 
                            Registrados: {{ $cantidadProveedores ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-truck class="w-12 h-12 opacity-60" />
                </div>
            </div>
            <div class="card-actions justify-end  bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/proveedores') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('roles-index')
         {{-- CARD ROLES --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Roles</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadRoles ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-shield-check class="w-12 h-12 opacity-60" />

                </div>
            </div>
            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/roles') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('permisos-index')
        {{-- CARD PERMISOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Permisos</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadPermisos ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-key class="w-12 h-12 opacity-60" />


                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/permisos') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('usuarios-index')
        {{-- CARD USUARIOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Usuarios</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadUsuarios ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-user-group class="w-12 h-12 opacity-60" />
                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/usuarios') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('categorias-index')
        {{-- CARD CATEGORIAS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Categorias</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadCategorias ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-tag class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/categorias') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('productos-index')
        {{-- CARD PRODUCTOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Productos</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadProductos ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-squares-plus class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/productos') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>   
        @endcan
        @can('compras-index')
        {{-- CARD COMPRAS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Compras</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadCompras ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-shopping-bag class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/compras') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>    
        @endcan
        @can('vehiculos-index')
        {{-- CARD VEHICULOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Vehículos</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadVehiculos ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-truck class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/vehiculos') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div> 
        @endcan
        @can('combustibles-index')
        {{-- CARD COMBUSTIBLES --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Cargas de combustibles</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadCombustibles ?? '0' }}
                        </p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-12 h-12 opacity-60" aria-hidden="true">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/combustibles') }}"
                    class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('obras-index')
        {{-- CARD OBRAS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Obras</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadObras ?? '0' }}
                        </p>
                    </div>
                    <x-bi-building class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/obras') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div> 
        @endcan
        @can('movimientos-index')
        {{-- CARD MOVIMIENTOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Movimientos</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadMovimientos ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-arrow-path class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/movimientos') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('empleados-index')
        {{-- CARD EMPLEADOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Empleados</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadEmpleados ?? '0' }}
                        </p>
                    </div>
                    <x-heroicon-o-identification class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/empleados') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        @can('depositos-index')
        {{-- CARD DEPOSITOS --}}
        <div class="card bg-primary text-neutral-content shadow-xl hover:scale-[1.02] transition-transform">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold">Depósitos</h3>
                        <p class="text-sm opacity-80">
                            Registrados: {{ $cantidadDepositos ?? '0'}}
                        </p>
                    </div>
                    <x-heroicon-o-home-modern class="w-12 h-12 opacity-60" />

                </div>
            </div>

            <div class="card-actions justify-end bg-base-300 bg-opacity-20 px-6 py-3">
                <a href="{{ url('/admin/depositos') }}" class="flex items-center gap-2 text-sm font-medium text-base-content hover:underline">
                    Ingresar
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
        @endcan
        
    </div>
@endsection
