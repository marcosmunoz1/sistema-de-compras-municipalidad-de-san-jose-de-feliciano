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
        <div class="card-body p-6 max-w-6xl mx-auto">

            <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                <i class="fas fa-user"></i> Editar Usuario
            </h2>

            <form action="{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- DATOS DEL USUARIO --}}
                    <div class="md:col-span-2 space-y-6">

                        <!-- Nombre + Rol -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Nombre de Usuario</label>
                                <input type="text" name="name" class="input input-bordered bg-base-200"
                                    value="{{ old('name', $usuario->name) }}">
                                @error('name')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label pb-1">
                                    <span class="label-text font-semibold">Rol</span>
                                </label>

                                <select name="role" class="select select-bordered bg-base-200 w-full">
                                    @foreach ($roles as $role)
                                        @if ($role->name !== 'Super-Admin' || auth()->user()->hasRole('Super-Admin'))
                                            <option value="{{ $role->name }}"
                                                {{ $usuario->roles->first()?->name === $role->name ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('role')
                                    <small class="text-red-500 mt-1">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                        <!-- Email + Estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Correo</label>
                                <input type="email" name="email" class="input input-bordered bg-base-200"
                                    value="{{ old('email', $usuario->email) }}">
                                @error('email')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold">Estado</label>
                                <select name="estado" class="select select-bordered bg-base-200">
                                    <option value="1" {{ old('estado', $usuario->estado) == 1 ? 'selected' : '' }}>
                                        Activo</option>
                                    <option value="0" {{ old('estado', $usuario->estado) == 0 ? 'selected' : '' }}>
                                        Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-base-300">
                            <div class="form-control">
                                <label class="label font-semibold">Nueva contraseña</label>
                                <input type="password" name="password" id="password"
                                    class="input input-bordered bg-base-200" placeholder="Dejar vacío para no cambiar">
                                @error('password')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                                <button type="button" class="text-sm text-primary mt-1 hover:underline"
                                    onclick="togglePassword()">Mostrar contraseñas</button>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation"
                                    class="input input-bordered bg-base-200">
                                @error('password_confirmation')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- FIRMA --}}
                    <div>
                        <div class="card bg-base-200 border border-base-300 h-full p-4 flex flex-col">
                            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4">
                                <i class="fas fa-pen-nib"></i> Firma
                            </h3>

                            <div id="firmaPreviewWrapper"
                                class="border-2 border-dashed rounded-lg p-4 bg-base-100 mb-4 flex justify-center items-center">

                                @if ($usuario->firma)
                                    <img id="firmaPreviewImg" src="{{ asset('storage/' . $usuario->firma) }}"
                                        class="max-h-32 object-contain">
                                @else
                                    <span id="firmaPlaceholder" class="text-gray-400 text-center">
                                        No hay firma cargada
                                    </span>
                                    <img id="firmaPreviewImg" class="max-h-32 object-contain hidden">
                                @endif

                            </div>

                            <div class="form-control mt-auto">
                                <label class="label font-semibold">Cambiar firma</label>
                                <input type="file" name="firma" accept="image/*" onchange="previewFirmaEdit(event)"
                                    class="file-input file-input-bordered bg-base-200">
                                @error('firma')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>

                <!-- BOTONES -->
                <div class="mt-8 flex justify-end gap-4">
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
    <script>
        function previewFirmaEdit(event) {
            const file = event.target.files[0];
            if (!file) return;

            const img = document.getElementById('firmaPreviewImg');
            const placeholder = document.getElementById('firmaPlaceholder');

            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                img.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        }
    </script>

@endsection
