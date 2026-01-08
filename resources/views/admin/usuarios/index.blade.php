@extends('layouts.admin')
@section('title', 'Usuarios')
@section('content')

    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Usuarios</h1>
        @can('usuarios-store')
            <button onclick="crearUsuarioModal.showModal()" class="btn btn-primary">
                <x-heroicon-o-plus class="w-5 h-5" />Nuevo Usuario
            </button>
        @endcan

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

    <!-- Buscador -->
    <form action="{{ route('usuarios.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por nombre, rol, estado..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                </label>

                <!-- BOTÓN -->
                <button class="btn btn-primary">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    Buscar
                </button>
                @if (request('search'))
                    <a href="{{ route('usuarios.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" />
                        Limpiar</a>
                @endif
            </div>
        </div>
    </form>

    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4"> 
             <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de usuarios</h4> 
                </div>
            </div> 

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Correo electronico</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Ultimo acceso</th>
                            <th class="text-center">Ultimo cierre</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="text-center">{{ $contador++ }}</td>
                                <td class="text-center">{{ $usuario->name }}</td>
                                <td class="text-center"> {{ $usuario->email }}</td>
                                <td class="text-center">
                                    <div
                                        class="badge badge-sm text-xs badge-info h-auto items-start whitespace-normal break-words px-3 py-0">
                                        <strong>{{ $usuario->roles->pluck('name')->join(', ') }}</strong>
                                    </div>
                                </td>
                                <td class="text-center">{{ $usuario->last_login_at?->format('d/m/Y H:i') ?? 'Nunca' }}</td>
                                <td class="text-center">{{ $usuario->last_logout_at?->format('d/m/Y H:i') ?? 'Nunca' }}
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-sm {{ $usuario->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- Ver --}}
                                        @can('usuarios-show')
                                            <a href="{{ url('/admin/usuarios/' . $usuario->id) }}" class="btn btn-info btn-sm">
                                                <x-heroicon-s-eye class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        {{-- Editar --}}
                                        @can('usuarios-edit')
                                            @if (
                                                // No es Super-Admin
                                                !$usuario->hasRole('Super-Admin') ||
                                                    // o es él mismo
                                                    $usuarioLogueado->id === $usuario->id ||
                                                    // o el logueado es Super-Admin
                                                    $usuarioLogueado->hasRole('Super-Admin'))
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ url('/admin/usuarios/' . $usuario->id . '/edit') }}">
                                                    <x-heroicon-s-pencil class="w-4 h-4" />
                                                </a>
                                            @endif
                                        @endcan

                                        {{-- Si está eliminado --}}
                                        @if ($usuario->trashed())
                                            {{-- Restaurar --}}
                                            @can('usuarios-restore')
                                                @if (!$usuario->hasAnyRole(['Super-Admin', 'Administrador']) || auth()->user()->hasRole('Super-Admin'))
                                                    <button class="btn btn-sm btn-success"
                                                        onclick="abrirModalRestaurar('{{ url('/admin/usuarios/' . $usuario->id . '/restore') }}')">
                                                        <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                                    </button>
                                                @endif
                                            @endcan
                                        @else
                                            @can('usuarios-destroy')
                                                @if (
                                                    !$usuario->hasRole('Super-Admin') ||
                                                        $usuarioLogueado->id === $usuario->id ||
                                                        $usuarioLogueado->hasRole('Super-Admin'))
                                                    <button class="btn btn-error btn-sm"
                                                        onclick="confirmarEliminacion({{ $usuario->id }})">
                                                        <x-heroicon-s-trash class="w-4 h-4" />
                                                    </button>
                                                @endif
                                            @endcan
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($usuarios->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $usuarios->firstItem() }} - {{ $usuarios->lastItem() }} de {{ $usuarios->total() }}
                        registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($usuarios->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $usuarios->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Botón Primera página --}}
                        @if (!$usuarios->onFirstPage())
                            <a href="{{ $usuarios->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($usuarios->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $usuarios->currentPage();
                            $totalPages = $usuarios->lastPage();
                            $start = max(1, $currentPage - 2);
                            $end = min($totalPages, $currentPage + 2);

                            // Ajustar para mostrar siempre 5 páginas cuando sea posible
                            if ($end - $start < 4) {
                                if ($start == 1) {
                                    $end = min($totalPages, 5);
                                } elseif ($end == $totalPages) {
                                    $start = max(1, $totalPages - 4);
                                }
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <button class="join-item btn btn-square btn-active">{{ $i }}</button>
                            @else
                                <a href="{{ $usuarios->url($i) }}"
                                    class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($usuarios->currentPage() < $totalPages - 3)
                            @if ($usuarios->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $usuarios->url($totalPages) }}"
                                class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

                        {{-- Botón Siguiente --}}
                        @if ($usuarios->hasMorePages())
                            <a href="{{ $usuarios->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>
    <dialog id="crearUsuarioModal" class="modal">

        <div class="modal-box max-w-xl">

            <h3 class="font-bold text-lg flex items-center gap-2">
                <i class="fas fa-file-alt"></i> Crear Nuevo Usuario
            </h3>

            <form action="{{ url('/admin/usuarios/store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                @csrf

                <!-- Primera fila -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Nombre de Usuario</span></label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full h-10 rounded-md border border-base-300 
                            bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                            focus:ring-primary focus:border-primary transition"
                            placeholder="Ej: Pablo Perez" required>
                        @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Rol</span>
                        </label>

                        <select name="role"
                            class="select select-bordered w-full rounded-md border border-base-300 bg-base-200
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition">

                            @foreach ($roles as $role)
                                @if ($role->name !== 'Super-Admin' || auth()->user()->hasRole('Super-Admin'))
                                    <option value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                </div>

                <!-- Correo -->
                <div class="form-control mt-4">
                    <label class="label"><span class="label-text">Correo</span></label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full h-10 rounded-md border border-base-300 
                            bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                            focus:ring-primary focus:border-primary transition"
                        placeholder="Ej: pabloperez@gmail.com" required>
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Firma -->
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text">Firma</span>
                    </label>

                    <input type="file" name="firma" accept="image/*"
                        class="file-input file-input-bordered w-full bg-base-200
                            focus:outline-none focus:ring-2 focus:ring-primary transition">

                    <small class="text-xs text-gray-500 mt-1">
                        Formatos permitidos: JPG, PNG. Tamaño recomendado: firma escaneada.
                    </small>

                    @error('firma')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>


                <!-- Contraseñas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                    <div class="form-control">
                        <label class="label"><span class="label-text">Contraseña</span></label>
                        <input type="password" name="password" id="password"
                            class="w-full h-10 rounded-md border border-base-300 
                            bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                            focus:ring-primary focus:border-primary transition"
                            required>
                        <button type="button"
                            class="mt-2 text-sm text-primary hover:underline"
                            onclick="togglePassword()">
                            Mostrar contraseñas
                        </button>

                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label"><span class="label-text">Confirmar contraseña</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full h-10 rounded-md border border-base-300 
                            bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 
                            focus:ring-primary focus:border-primary transition"
                            required>
                        @error('password_confirmation')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="modal-action">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                    <button type="button" onclick="crearUsuarioModal.close()" class="btn btn-neutral">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                </div>

            </form>
        </div>

        <!-- Hace que clic afuera cierre -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_usuario" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este usuario?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarUsuario" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-error">
                        <x-heroicon-o-trash class="w-4 h-4" />
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
    </dialog>
    <!-- Modal para restaurar -->
    <dialog id="modal_restaurar_usuario" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">
                ¿Seguro que querés restaurar este usuario?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarUsuario" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-success">
                        <x-heroicon-o-arrow-path class="w-4 h-4" />
                        Restaurar
                    </button>
                </form>

            </div>

        </div>
    </dialog>
@endsection

@section('js')
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarUsuario');
            form.action = routeEliminarUsuario(id);
            document.getElementById('modal_eliminar_usuario').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarUsuario(id) {
            return "{{ url('/admin/usuarios') }}/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarUsuario');
            form.action = url;
            modal_restaurar_usuario.showModal();
        }
    </script>
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
