@extends('layouts.admin')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Usuarios</h1>
        <button onclick="crearUsuarioModal.showModal()" class="btn btn-primary">
            Nuevo Usuario
        </button>

    </div>

    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('usuarios.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Usuarios
                </a>
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

                            <!-- Estado -->
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Estado</span></label>

                                <div>
                                    <span class="badge badge-lg px-4 {{ $usuario->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                                    </span>

                                </div>
                            </div>

                        </div>

                        <!-- Último inicio de sesión -->
                        <div class="form-control mt-4">
                            <label class="label"><span class="label-text font-semibold">Último inicio de
                                    sesión</span></label>
                            <input type="text" class="input input-bordered w-full"
                                value="{{ $usuario->last_login_at ? \Carbon\Carbon::parse($usuario->last_login_at)->format('d/m/Y H:i') : 'Nunca' }}"
                                readonly>
                        </div>

                        <!-- Botón volver -->
                        <div class="mt-6 text-right">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-neutral">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
