@extends('layouts.admin')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Categorias</h1>
        @can('categorias-create')
        <button
            onclick="abrir_modal('crearCategoriaModal', 'Crear Nueva Categoría', '1', ['nombre','slug','descripcion'], {})"
            class="btn btn-primary">
            <x-heroicon-o-plus class="w-5 h-5" />
            Nueva Categoría
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
                <a href="{{ route('productos.index') }}">
                    <x-heroicon-o-tag class="w-4 h-4 inline" />
                    Categorias
                </a>
            </li>
        </ul>
    </div>
    <!-- Buscador -->
    <form action="{{ route('categorias.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por nombre, descripción, estado..."
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
                    <a href="{{ route('categorias.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" />
                        Limpiar</a>
                @endif
            </div>
        </div>
    </form>

    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Fecha y hora de creación</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nr = $categorias->currentPage() * $categorias->perPage() - $categorias->perPage() + 1;
                        @endphp
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $categoria->nombre }}</td>
                                <td class="text-center">{{ $categoria->descripcion }}</td>
                                <td class="text-center">{{ $categoria->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $categoria->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $categoria->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Ver --}}
                                        @can('categorias-show')
                                        <button
                                            onclick="abrir_modal(
                                                'crearCategoriaModal',
                                                'Ver Categoría',
                                                'show',
                                                ['nombre','slug','descripcion'],
                                                {{ json_encode($categoria) }}
                                            )"
                                            class="btn btn-info btn-sm">
                                            <x-heroicon-s-eye class="w-4 h-4" />
                                        </button> 
                                        @endcan


                                        {{-- Editar --}}
                                        @can('categorias-edit')
                                        <button
                                            onclick="abrir_modal(
                                                'crearCategoriaModal',
                                                'Editar Categoría',
                                                '2',
                                                ['nombre','slug','descripcion'],
                                                {{ json_encode($categoria) }}
                                            )"
                                            class="btn btn-warning btn-sm">
                                            <x-heroicon-s-pencil class="w-4 h-4" />
                                        </button>
                                        @endcan


                                        {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                        {{-- Si está eliminado (tiene deleted_at) --}}
                                        @if ($categoria->trashed())
                                            {{-- Restaurar --}}
                                            @can('categorias-restore')
                                            <button class="btn btn-sm btn-success"
                                                onclick="abrirModalRestaurar('{{ url('/admin/categorias/' . $categoria->id . '/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                            </button>
                                            @endcan
                                            {{-- Si NO está eliminado --}}
                                        @else
                                            {{-- Eliminar --}}
                                            @can('categorias-delete')
                                            <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion({{ $categoria->id }})">
                                                <x-heroicon-s-trash class="w-4 h-4" />
                                            </button>
                                            @endcan
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($categorias->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $categorias->firstItem() }} - {{ $categorias->lastItem() }} de
                        {{ $categorias->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($categorias->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $categorias->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($categorias->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $categorias->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if ($categorias->hasMorePages())
                            <a href="{{ $categorias->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_categoria" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar esta categoria?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarCategoria" method="POST">
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
    <dialog id="modal_restaurar_categoria" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">
                ¿Seguro que querés restaurar esta categoria?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarCategoria" method="POST">
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
    <dialog id="crearCategoriaModal" class="modal">
        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título dinámico -->
            <h3 id="crearCategoriaModal_titulo" class="font-bold text-xl flex items-center gap-3 mb-4">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
                </svg>
                <!-- El título será cambiado por JS -->
                Crear Nueva Categoria
            </h3>

            <form action="{{ url('/admin/categorias/store') }}" method="POST" class="space-y-5" id="form">
                @csrf

                <!-- Campo ocultos para acción y ID -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre de la Categoria (*)</span>
                    </label>

                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                        placeholder="Ej: Repuestos, Herramientas, Materiales..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition @error('nombre') input-error @enderror"
                        required>

                    @error('nombre')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Slug (Se completa automáticamente)</span>
                    </label>

                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition @error('slug') input-error @enderror"
                        required readonly>

                    @error('slug')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción (*)</span>
                    </label>

                    <textarea name="descripcion" id="descripcion" rows="3"
                        placeholder="Ingrese una descripción breve de la categoría..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 
                 focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition @error('descripcion') input-error @enderror"
                        required>{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="modal-action">

                    <!-- Guardar -->
                    <button id="btnGuardarCategoria" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Categoria
                    </button>

                    <!-- Cancelar -->
                    <button type="button" onclick="crearCategoriaModal.close()" class="btn btn-neutral">
                        Cancelar
                    </button>
                </div>

            </form>

        </div>

        <!-- Fondo oscuro -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('crearCategoriaModal').showModal();
            });
        </script>
    @endif



@endsection

@section('js')
    <script>
        function abrir_modal(modal, title, accion, campos, dato) {

            const dlg = document.getElementById(modal);
            dlg.showModal();

            // TÍTULO
            document.getElementById(`${modal}_titulo`).textContent = title;

            // ACCIÓN
            document.getElementById("accion").value = accion;

            // CAMPOS
            if (campos.length >= 1) {
                campos.forEach((campo) => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).value = dato[campo] ?? "";
                    }
                });
                document.getElementById("id").value = dato['id'] ?? 0;

            } else {
                document.getElementById("form").reset();
                document.getElementById("id").value = 0;
            }

            const guardarBtn = document.getElementById("btnGuardarCategoria");
            const slugInput = document.getElementById("slug");

            // --- SHOW MODE ---
            if (accion === "show") {

                guardarBtn.style.display = "none";

                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).setAttribute("readonly", true);
                    }
                });

                if (document.querySelector("textarea[name='descripcion']")) {
                    document.querySelector("textarea[name='descripcion']")
                        .setAttribute("readonly", true);
                }

                // 🔒 Slug también readonly en modo show
                if (slugInput) slugInput.setAttribute("readonly", true);

            } else {
                // --- EDITAR / CREAR ---

                guardarBtn.style.display = "inline-flex";

                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).removeAttribute("readonly");
                    }
                });

                if (document.querySelector("textarea[name='descripcion']")) {
                    document.querySelector("textarea[name='descripcion']")
                        .removeAttribute("readonly");
                }

                // 🔒 Slug también readonly en modo editar/crear
                if (slugInput) slugInput.setAttribute("readonly", true);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('crearCategoriaModal');

            modal.addEventListener('close', () => {

                // Quitar mensajes de error
                document.querySelectorAll('.error-message').forEach(el => el.remove());

                // Quitar clases de error de inputs
                document.querySelectorAll('.input-error').forEach(el => {
                    el.classList.remove('input-error');
                });

            });

        });

        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarCategoria');
            form.action = routeEliminarCategoria(id);
            document.getElementById('modal_eliminar_categoria').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarCategoria(id) {
            return "{{ url('/admin/categorias') }}/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarCategoria');
            form.action = url;
            modal_restaurar_categoria.showModal();
        }
        document.getElementById('nombre').addEventListener('input', function() {
            const nombre = this.value.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = nombre;
        });
    </script>
@endsection
