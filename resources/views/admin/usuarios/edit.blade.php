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

            <div class="max-w-5xl mx-auto p-6">

                <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                    <i class="fas fa-user"></i> Editar Usuario
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- FORMULARIO --}}
                    <div class="md:col-span-2">
                        <div class="card bg-base-100 shadow-md p-6">

                            <form action="{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Nombre + Rol -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Nombre de Usuario</span>
                                        </label>
                                        <input type="text" name="name"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                               focus:outline-none focus:ring-2 focus:ring-primary transition"
                                            value="{{ old('name', $usuario->name) }}">
                                        @error('name')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Rol</span>
                                        </label>
                                        <select name="role"
                                            class="select select-bordered w-full bg-base-200
                                               focus:outline-none focus:ring-2 focus:ring-primary transition">
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

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Correo</span>
                                        </label>
                                        <input type="email" name="email"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                               focus:outline-none focus:ring-2 focus:ring-primary transition"
                                            value="{{ old('email', $usuario->email) }}">
                                        @error('email')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Estado</span>
                                        </label>
                                        <select name="estado"
                                            class="select select-bordered w-full bg-base-200
                                               focus:outline-none focus:ring-2 focus:ring-primary transition">
                                            <option value="1"
                                                {{ old('estado', $usuario->estado) == 1 ? 'selected' : '' }}>
                                                Activo
                                            </option>
                                            <option value="0"
                                                {{ old('estado', $usuario->estado) == 0 ? 'selected' : '' }}>
                                                Inactivo
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <!-- Cambio de contraseña -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Nueva contraseña</span>
                                        </label>
                                        <input type="password" name="password" id="password"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                               focus:outline-none focus:ring-2 focus:ring-primary transition"
                                            placeholder="Dejar vacío para no cambiar">
                                        <button type="button"
                                            class="mt-2 text-sm text-primary hover:underline"
                                            onclick="togglePassword()">
                                            Mostrar contraseñas
                                        </button>

                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Confirmar contraseña</span>
                                        </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                               focus:outline-none focus:ring-2 focus:ring-primary transition">
                                    </div>

                                </div>

                                <!-- Botones -->
                                <div class="mt-6 flex justify-end gap-4">
                                    <a href="{{ url('admin/usuarios') }}" class="btn btn-neutral">
                                        <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> Volver
                                    </a>

                                    <button type="submit" class="btn btn-success">
                                        <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> Guardar cambios
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                    {{-- FIRMA --}}
                    <div>
                        <div class="card bg-base-100 shadow-md p-6 h-full flex flex-col">

                            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4">
                                <i class="fas fa-pen-nib"></i> Firma
                            </h3>

                            @if ($usuario->firma)
                                <div
                                    class="border-2 border-dashed border-base-300 rounded-lg p-4 bg-base-200 mb-4
                                        flex items-center justify-center">
                                    <img src="{{ asset('storage/' . $usuario->firma) }}" class="max-h-32 object-contain"
                                        alt="Firma actual">
                                </div>
                            @else
                                <div
                                    class="border-2 border-dashed border-base-300 rounded-lg p-4 bg-base-200 mb-4
                                        text-gray-400 text-center">
                                    No hay firma cargada
                                </div>
                            @endif

                            <div class="form-control mt-auto">
                                <label class="label">
                                    <span class="label-text font-semibold">Cambiar firma</span>
                                </label>
                                <input type="file" name="firma" accept="image/*"
                                    class="file-input file-input-bordered w-full bg-base-200">
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('js')
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const confirm = document.getElementById('password_confirmation');

            const type = password.type === 'password' ? 'text' : 'password';

            password.type = type;
            confirm.type = type;
        }
    </script>
@endsection
