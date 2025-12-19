@extends('layouts.admin')
@section('title', 'Obras') 
@section('content')

    <!-- Título y botón -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Obras</h1>
        @can('obras-create')
        <a href="{{ route('obras.create') }}" class="btn btn-primary">
            + Nueva Obra
        </a>
        @endcan
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <x-heroicon-o-home class="w-4 h-4 inline" />
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('obras.index') }}">
                    <x-bi-building class="w-4 h-4 inline" />
                    Obras
                </a>
            </li>
        </ul>
    </div>

    <!-- Buscador -->
    <form action="{{ route('obras.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por nombre, barrio, responsable..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition" />
                </label>

                <!-- BOTÓN BUSCAR -->
                <button class="btn btn-primary">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    Buscar
                </button>

                @if (request('search'))
                    <a href="{{ route('obras.index') }}" class="btn btn-error">
                        <x-heroicon-o-trash class="w-4 h-4" />
                        Limpiar
                    </a>
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
                            <th class="text-center">Barrio</th>
                            <th class="text-center">Responsable</th>
                            <th class="text-center">Estado de la obra</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $nr = $obras->currentPage() * $obras->perPage() - $obras->perPage() + 1;
                        @endphp

                        @foreach ($obras as $obra)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $obra->nombre }}</td>
                                <td class="text-center">{{ $obra->barrio ?? '-' }}</td>
                                <td class="text-center">{{ $obra->responsable ?? '-' }}</td>

                                <td class="text-center">
                                    <span class="badge {{ $obra->estado_obra_badge }}">
                                        {{ $obra->estado_obra_formateado }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="badge {{ $obra->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $obra->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Ver --}}
                                        @can('obras-show')
                                        <a href="{{ route('obras.show', $obra->id) }}" class="btn btn-info btn-sm">
                                            <x-heroicon-s-eye class="w-4 h-4" />
                                        </a>
                                        @endcan

                                        {{-- Editar --}}
                                        @can('obras-edit')
                                        <a href="{{ route('obras.edit', $obra->id) }}" class="btn btn-warning btn-sm">
                                            <x-heroicon-s-pencil class="w-4 h-4" />
                                        </a>
                                        @endcan

                                        {{-- Si está eliminado --}}
                                        @if ($obra->trashed())
                                            @can('obras-restore')
                                            <button class="btn btn-success btn-sm"
                                                onclick="abrirModalRestaurar('{{ url('/admin/obras/' . $obra->id . '/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                            </button>
                                            @endcan
                                            {{-- Si NO está eliminado --}}
                                        @else
                                            @can('obras-destroy')
                                            <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion({{ $obra->id }})">
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
            <!-- Paginación -->
            @if ($obras->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <div class="text-sm text-gray-500">
                        Mostrando {{ $obras->firstItem() }} - {{ $obras->lastItem() }} de {{ $obras->total() }} registros
                    </div>

                    <div class="join">
                        @if ($obras->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $obras->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        @foreach ($obras->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $obras->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($obras->hasMorePages())
                            <a href="{{ $obras->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal eliminar -->
    <dialog id="modal_eliminar_obra" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">¿Seguro que querés eliminar esta obra?</p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <form id="formEliminarObra" method="POST">
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

    <!-- Modal restaurar -->
    <dialog id="modal_restaurar_obra" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">¿Seguro que querés restaurar esta obra?</p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <form id="formRestaurarObra" method="POST">
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
            const form = document.getElementById('formEliminarObra');
            form.action = "{{ url('/admin/obras') }}/" + id;
            modal_eliminar_obra.showModal();
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarObra');
            form.action = url;
            modal_restaurar_obra.showModal();
        }
    </script>
@endsection
