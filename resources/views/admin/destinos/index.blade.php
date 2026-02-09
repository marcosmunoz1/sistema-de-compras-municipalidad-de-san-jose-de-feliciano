@extends('layouts.admin')
@section('title', 'Destinos')
@section('content')
    <!-- Titulo y boton -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-2xl font-semibold">Destinos</h1>
        <div class="flex gap-2">
            @can('destinos-store')
                <button onclick="abrir_modal('crearDestinoModal', 'Crear Nuevo Destino', 1, [], [])" class="btn btn-primary">
                    <x-heroicon-o-plus class="w-5 h-5" />Nuevo Destino
                </button>
            @endcan
        </div>
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
                <a href="{{ route('destinos.index') }}">
                    <x-heroicon-o-map-pin class="w-4 h-4 inline" />
                    Destinos
                </a>
            </li>
        </ul>
    </div>
    <!-- Buscador -->
    <form action="{{ route('destinos.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ $search ?? '' }}" type="text"
                        placeholder="Buscar por nombre, tipo, descripción..." class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" />
                </label>

                <!-- BOTÓN -->
                <button class="btn btn-primary">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    Buscar
                </button>
                @if(request('search'))
                    <a href="{{ route('destinos.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" />
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
                    <h4 class="text-lg font-semibold">Historial de destinos</h4>

                    <!-- Filtro por estado -->
                    <div class="dropdown dropdown-end">
                        <label tabindex="0"
                            class="btn btn-sm btn-ghost gap-2 {{ request('estado') == 'inactivo' || request('estado') == 'todos' ? 'text-primary' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            @if(request('estado') == 'inactivo')
                                <span class="badge badge-error badge-sm">Inactivos</span>
                            @elseif(request('estado') == 'todos')
                                <span class="badge badge-neutral badge-sm">Todos</span>
                            @endif
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow-lg bg-base-100 rounded-box w-52 border border-base-300">
                            <li class="menu-title">
                                <span>Filtrar por estado</span>
                            </li>
                            <li>
                                <a href="{{ route('destinos.index', array_merge(request()->except('estado', 'page'), [])) }}"
                                    class="{{ !request('estado') || request('estado') == 'activo' ? 'active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    Solo Activos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('destinos.index', array_merge(request()->except('page'), ['estado' => 'inactivo'])) }}"
                                    class="{{ request('estado') == 'inactivo' ? 'active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-error">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                    Solo Inactivos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('destinos.index', array_merge(request()->except('page'), ['estado' => 'todos'])) }}"
                                    class="{{ request('estado') == 'todos' ? 'active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    </svg>
                                    Todos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nr = $destinos->currentPage() * $destinos->perPage() - $destinos->perPage() + 1; 
                        @endphp
                        @foreach ($destinos as $destino)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $destino->nombre }}</td>
                                <td class="text-center">
                                    <span class="badge badge-sm badge-primary">
                                        {{ ucfirst(str_replace('_', ' ', $destino->tipo)) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ Str::limit($destino->descripcion, 50) }}</td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Ver --}}
                                        @can('destinos-show')
                                            <button
                                                onclick="abrir_modal('crearDestinoModal', 'Detalles del Destino', 3, ['nombre', 'tipo', 'descripcion'], {{ $destino }}, true)"
                                                class="btn btn-info btn-sm" title="Ver destino">
                                                <x-heroicon-s-eye class="w-4 h-4" />
                                            </button>
                                        @endcan

                                        {{-- Editar --}}
                                        @can('destinos-update')
                                            <button class="btn btn-warning btn-sm" title="Editar destino"
                                                onclick="abrir_modal('crearDestinoModal', 'Editar Destino', 2, ['nombre', 'tipo', 'descripcion'], {{ $destino }})">
                                                <x-heroicon-o-pencil-square class="w-4 h-4" />
                                            </button>
                                        @endcan

                                        {{-- Eliminar/Restaurar --}}
                                        {{-- Si está eliminado (tiene deleted_at) --}}
                                        @if ($destino->trashed())
                                            {{-- Restaurar --}}
                                            @can('destinos-restore')
                                                <button class="btn btn-sm btn-success" title="Restaurar destino"
                                                    onclick="abrirModalRestaurar('{{ url('/admin/destinos/' . $destino->id . '/restore') }}')">
                                                    <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                                </button>
                                            @endcan
                                            {{-- Si NO está eliminado --}}
                                        @else
                                            {{-- Eliminar --}}
                                            @can('destinos-destroy')
                                                <button class="btn btn-error btn-sm" title="Eliminar destino"
                                                    onclick="confirmarEliminacion({{ $destino->id }})">
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
            @if ($destinos->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $destinos->firstItem() }} - {{ $destinos->lastItem() }} de {{ $destinos->total() }}
                        registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($destinos->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $destinos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Botón Primera página --}}
                        @if (!$destinos->onFirstPage())
                            <a href="{{ $destinos->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($destinos->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $destinos->currentPage();
                            $totalPages = $destinos->lastPage();
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
                                <a href="{{ $destinos->url($i) }}" class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($destinos->currentPage() < $totalPages - 3)
                            @if ($destinos->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $destinos->url($totalPages) }}" class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

                        {{-- Botón Siguiente --}}
                        @if ($destinos->hasMorePages())
                            <a href="{{ $destinos->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_destino" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este destino?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarDestino" method="POST">
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
    <dialog id="modal_restaurar_destino" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">
                ¿Seguro que querés restaurar este destino?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarDestino" method="POST">
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

    <!-- Modal para crear/editar/ver -->
    <dialog id="crearDestinoModal" class="modal">

        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título -->
            <h3 id="crearDestinoModal_titulo" class="font-bold text-xl flex items-center gap-3 mb-4">
                <x-heroicon-o-map-pin class="w-6 h-6" />
                <span>Crear Nuevo Destino</span>
            </h3>

            <form action="{{ route('destinos.store') }}" name="formDestino" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre del Destino</span>
                    </label>

                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}"
                        placeholder="Ej: Juan Pérez, Comisaría 1ra, Empresa XYZ..." class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
              text-sm focus:outline-none focus:ring-2 focus:ring-primary 
              focus:border-primary transition" required>

                    @error('nombre')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tipo -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Tipo de Destino</span>
                    </label>

                    <select id="tipo" name="tipo" class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
              focus:border-primary transition" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="persona">Persona</option>
                        <option value="policia">Policía</option>
                        <option value="empresa">Empresa</option>
                        <option value="institucion">Institución</option>
                        <option value="organismo_publico">Organismo Público</option>
                    </select>

                    @error('tipo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                    </label>

                    <textarea id="descripcion" name="descripcion" rows="3"
                        placeholder="Ingrese una descripción del destino (opcional)..." class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
              focus:border-primary transition">{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('crearDestinoModal').close()"
                        class="btn btn-neutral">
                        Cerrar
                    </button>
                    <button id="btnGuardar" type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar
                    </button>
                </div>

            </form>

        </div>

        <!-- fondo oscuro -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>

    </dialog>

@endsection

@section('js')
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarDestino');
            form.action = routeEliminarDestino(id);
            document.getElementById('modal_eliminar_destino').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarDestino(id) {
            return "{{ url('/admin/destinos') }}/" + id;
        }
        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarDestino');
            form.action = url;
            modal_restaurar_destino.showModal();
        }
    </script>
    <script>
        function abrir_modal(modal, title, accion, campos, dato, soloVer = false) {
            $(`#${modal}`).get(0).showModal();
            $(`#${modal}_titulo`).text(title);
            document.getElementById("accion").value = accion;

            if (campos.length >= 1) {
                campos.forEach(
                    (campo) => {
                        document.getElementById(campo).value = dato[campo];
                    }
                );
                document.getElementById("id").value = dato['id'];
            }
            else {
                document.formDestino.reset();
                document.getElementById("accion").value = 1;
                document.getElementById("id").value = 0;
            }

            // Si es solo ver (accion 3), deshabilitar campos y ocultar botón guardar
            if (soloVer || accion === 3) {
                $(`#${modal} input, #${modal} select, #${modal} textarea`).not('#accion, #id').prop('disabled', true);
                $('#btnGuardar').hide();
            } else {
                $(`#${modal} input, #${modal} select, #${modal} textarea`).prop('disabled', false);
                $('#btnGuardar').show();
            }
        }
    </script>
@endsection