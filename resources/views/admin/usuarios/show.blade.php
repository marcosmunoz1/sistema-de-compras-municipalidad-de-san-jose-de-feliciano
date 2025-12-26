@extends('layouts.admin')

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
        <div class="flex gap-2">
            <a href="{{ route('usuarios.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Usuarios
            </a>
            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Usuario
            </a>
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
                <div class="max-w-3xl mx-auto p-6">
                    <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                        <i class="fas fa-user"></i> Detalles del Usuario
                    </h2>

                    <div class="card bg-base-100 shadow-md p-6">

                        <!-- Primera fila -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Nombre de
                                        Usuario</span></label>
                                <input type="text" class="input input-bordered w-full" value="{{ $usuario->name }}"
                                    readonly>
                            </div>

                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Rol</span></label>
                                <input type="text" class="input input-bordered w-full"
                                    value="{{ $usuario->roles->first()->name ?? 'Sin rol' }}" readonly>
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                            <!-- Email -->
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Correo</span></label>
                                <input type="email" class="input input-bordered w-full" value="{{ $usuario->email }}"
                                    readonly>
                            </div>

                            <!-- Ultimo inicio de sesión  -->
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Último inicio de
                                        sesion</span></label>
                                <input type="text" class="input input-bordered w-full"
                                    value="{{ $usuario->last_login_at ? \Carbon\Carbon::parse($usuario->last_login_at)->format('d/m/Y H:i') : 'Nunca' }}"
                                    readonly>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Historial de Actividad -->
    <x-historial-actividad :model="$usuario" :limit="10" />

@endsection

@section('js')
@endsection
