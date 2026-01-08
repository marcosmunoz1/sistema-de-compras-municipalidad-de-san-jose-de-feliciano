@extends('layouts.admin')
@section('title', 'Ver usuario')

@section('content')
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">
        <!-- Titulo y boton -->
        <div>
            <h1 class="text-2xl font-semibold">Información del usuario: {{ $usuario->name }}</h1>

            @if ($usuario->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>
        <!-- Botones -->
        @php
            $usuarioLogueado = auth()->user();
        @endphp

        <div class="flex gap-2">
            <a href="{{ route('usuarios.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Usuarios
            </a>
            @can('usuarios-edit')
                @if (
                    !$usuario->hasRole('Super-Admin') ||
                        $usuarioLogueado->id === $usuario->id ||
                        $usuarioLogueado->hasRole('Super-Admin'))
                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                        class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                        <x-heroicon-o-pencil class="w-4 h-4 inline" />
                        Editar Usuario
                    </a>
                @endif
            @endcan
        </div>
    </div>
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('usuarios.index') }}">
                    <x-heroicon-o-user-group class="w-4 h-4 inline" />
                    Usuarios
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver usuario
                </span>
            </li>
        </ul>
    </div>
    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">

            <div class="overflow-x-auto">
                <div class="max-w-4xl mx-auto p-6">

                    <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                        <i class="fas fa-user"></i> Detalles del Usuario
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <!-- DATOS DEL USUARIO -->
                        <div class="md:col-span-2">
                            <div class="card bg-base-100 shadow-md p-6">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Nombre de Usuario</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full"
                                            value="{{ $usuario->name }}" readonly>
                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Rol</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full"
                                            value="{{ $usuario->roles->first()->name ?? 'Sin rol' }}" readonly>
                                    </div>

                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Correo</span>
                                        </label>
                                        <input type="email" class="input input-bordered w-full"
                                            value="{{ $usuario->email }}" readonly>
                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Último inicio de sesión</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full"
                                            value="{{ $usuario->last_login_at ? \Carbon\Carbon::parse($usuario->last_login_at)->format('d/m/Y H:i') : 'Nunca' }}"
                                            readonly>
                                    </div>

                                </div>

                                <div class="form-control">
                                    <label class="label"><span class="label-text font-semibold">Nombre de
                                            Usuario</span></label>
                                    <input type="text"
                                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                    focus:border-primary"
                                        value="{{ $usuario->name }}" readonly>
                                </div>

                                <div class="form-control">
                                    <label class="label"><span class="label-text font-semibold">Rol</span></label>
                                    <input type="text"
                                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                    focus:border-primary"
                                        value="{{ $usuario->roles->first()->name ?? 'Sin rol' }}" readonly>
                                </div>

                            </div>

                            <!-- FIRMA -->
                            <div>
                                <div class="card bg-base-100 shadow-md p-6 h-full flex flex-col">

                                    <h3 class="text-lg font-semibold flex items-center gap-2 mb-4">
                                        <i class="fas fa-pen-nib"></i> Firma
                                    </h3>

                                    @if ($usuario->firma)
                                        <div
                                            class="flex items-center justify-center border-2 border-dashed 
                                    border-base-300 rounded-lg p-4 bg-base-200 flex-1">

                                            <img src="{{ asset('storage/' . $usuario->firma) }}" alt="Firma del usuario"
                                                class="max-h-40 object-contain">
                                        </div>
                                    @else
                                        <div
                                            class="flex items-center justify-center border-2 border-dashed 
                                    border-base-300 rounded-lg p-4 bg-base-200 text-gray-400 flex-1">

                                            <span>Este usuario no tiene firma cargada</span>
                                        </div>
                                    @endif

                                    <!-- Email -->
                                    <div class="form-control">
                                        <label class="label"><span class="label-text font-semibold">Correo</span></label>
                                        <input type="email"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                    focus:border-primary"
                                            value="{{ $usuario->email }}" readonly>
                                    </div>

                                    <!-- Ultimo inicio de sesión  -->
                                    <div class="form-control">
                                        <label class="label"><span class="label-text font-semibold">Último inicio de
                                                sesion</span></label>
                                        <input type="text"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                    focus:border-primary"
                                            value="{{ $usuario->last_login_at ? \Carbon\Carbon::parse($usuario->last_login_at)->format('d/m/Y H:i') : 'Nunca' }}"
                                            readonly>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Sección de Permisos -->
            <div class="card bg-base-100 shadow mt-6">
                <div class="card-body p-4">
                    <h2 class="text-xl font-bold flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-primary">
                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                            <path d="M9 3v18"></path>
                        </svg>
                        Permisos Asignados
                        <span
                            class="badge badge-primary badge-sm ml-2">{{ $usuario->getAllPermissions()->count() }}</span>
                    </h2>

                    @php
                        $todosLosPermisos = $usuario->getAllPermissions();

                        // Agrupar permisos por módulo
                        $permisosPorModulo = [];
                        foreach ($todosLosPermisos as $permiso) {
                            $partes = explode('-', $permiso->name);
                            $modulo = $partes[0] ?? 'otros';

                            if (!isset($permisosPorModulo[$modulo])) {
                                $permisosPorModulo[$modulo] = [];
                            }
                            $permisosPorModulo[$modulo][] = $permiso;
                        }
                        ksort($permisosPorModulo);
                    @endphp

                    @if ($todosLosPermisos->count() > 0)
                        @foreach ($permisosPorModulo as $modulo => $permisos)
                            <div class="mb-6">
                                <div class="flex items-center gap-2 mb-3 pb-2 border-b border-base-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                    </svg>
                                    <h3 class="font-bold text-base capitalize">{{ ucfirst($modulo) }}</h3>
                                    <span class="badge badge-sm">{{ count($permisos) }}</span>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                                    @foreach ($permisos as $permiso)
                                        <div
                                            class="flex items-center gap-2 p-2 bg-base-200 rounded-lg hover:bg-base-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-success flex-shrink-0">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                            <span class="text-sm">{{ $permiso->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>Este usuario no tiene permisos asignados</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Actividad -->
    <x-historial-actividad :model="$usuario" :limit="10" />
@endsection

@section('js')
@endsection
