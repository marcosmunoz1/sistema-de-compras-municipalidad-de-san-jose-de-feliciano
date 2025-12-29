@extends('layouts.admin')
@section('title', 'Editar Usuario')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Usuarios</h1>
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
                    <x-heroicon-o-user-group class="w-4 h-4 inline" />
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

                        {{-- FORMULARIO --}}
                        <form action="{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Primera fila -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Nombre de Usuario</span>
                                    </label>
                                    <input type="text" name="name" class="w-full h-10 rounded-md border border-base-300 
                                        bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                                        focus:ring-primary focus:border-primary transition"
                                        value="{{ old('name', $usuario->name) }}">
                                    @error('name')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Rol</span>
                                    </label>

                                    <select name="role" class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                                               focus:border-primary transition">
                                        @foreach ($roles as $role)
                                            @if ($role->name !== 'Super-Admin' || auth()->user()->hasRole('Super-Admin'))
                                                <option value="{{ $role->name }}"
                                                    {{ $usuario->roles->first() && $usuario->roles->first()->name === $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <!-- Email + Estado -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                                <!-- Email -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Correo</span>
                                    </label>
                                    <input type="email" name="email" class="w-full h-10 rounded-md border border-base-300 
                                    bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                                    focus:ring-primary focus:border-primary transition"
                                        value="{{ old('email', $usuario->email) }}">
                                    @error('email')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Estado -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Estado</span>
                                    </label>

                                    <select name="estado" class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                                                 focus:border-primary transition">
                                        <option value="1"
                                            {{ old('estado', $usuario->estado) == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0"
                                            {{ old('estado', $usuario->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>

                                    @error('estado')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <!-- CAMBIO DE CONTRASEÑA -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Nueva contraseña</span>
                                    </label>
                                    <input type="password" name="password" class="w-full h-10 rounded-md border border-base-300 
                                                                                bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                                                                                focus:ring-primary focus:border-primary transition"
                                        placeholder="Dejar vacío para no cambiar">
                                    @error('password')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-semibold">Confirmar contraseña</span>
                                    </label>
                                    <input type="password" name="password_confirmation" class="w-full h-10 rounded-md border border-base-300 
                                                                                                bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                                                                                                focus:ring-primary focus:border-primary transition"
                                        placeholder="Repetir contraseña">
                                    @error('password_confirmation')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <!-- Botones -->
                            <div class="mt-6 flex justify-end gap-4">
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-neutral">
                                    <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> Volver
                                </a>

                                <button type="submit" class="btn btn-success">
                                    <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" />  Guardar cambios
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
@endsection
