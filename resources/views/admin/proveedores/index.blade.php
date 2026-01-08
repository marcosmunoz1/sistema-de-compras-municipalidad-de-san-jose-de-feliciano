@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')

    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Proveedores</h1>
        @can('proveedores-create')
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
                + Nuevo Proveedor
            </a>
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
                <a href="{{ route('proveedores.index') }}">
                    <x-heroicon-o-truck class="w-4 h-4 inline" />
                    Proveedores
                </a>
            </li>
        </ul>
    </div>

    <!-- Buscador -->
    <form action="{{ route('proveedores.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por nombre, Cuit, contacto..."
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
                    <a href="{{ route('proveedores.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" />
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
                    <h4 class="text-lg font-semibold">Historial de proveedores</h4> 
                </div>
            </div> 
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre de la empresa</th>
                            <th class="text-center">Contacto</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nr = $proveedores->currentPage() * $proveedores->perPage() - $proveedores->perPage() + 1;
                        @endphp
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $proveedor->empresa }}</td>
                                <td class="text-center">{{ $proveedor->nombre ?? 'N/A' }}</td>
                                <td class="text-center">{{ $proveedor->telefono ?? 'N/A' }}</td>
                                <td class="text-center">{{ $proveedor->celular ?? 'N/A' }}</td>
                                <td class="text-center">{{ $proveedor->email ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Ver --}}
                                        @can('proveedores-show')
                                            <a href="{{ route('proveedores.show', Crypt::encrypt($proveedor->id)) }}"
                                                class="btn btn-info btn-sm">
                                                <x-heroicon-s-eye class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        {{-- Editar --}}
                                        @can('proveedores-edit')
                                            <a href="{{ route('proveedores.edit', Crypt::encrypt($proveedor->id)) }}"
                                                class="btn btn-warning btn-sm">
                                                <x-heroicon-s-pencil class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                        {{-- Si está eliminado (tiene deleted_at) --}}
                                        @if ($proveedor->trashed())
                                            {{-- Restaurar --}}
                                            @can('proveedores-restore')
                                                <button class="btn btn-sm btn-success"
                                                    onclick="abrirModalRestaurar('{{ url('/admin/proveedores/' . $proveedor->id . '/restore') }}')">
                                                    <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                                </button>
                                            @endcan
                                            {{-- Si NO está eliminado --}}
                                        @else
                                            {{-- Eliminar --}}
                                            @can('proveedores-destroy')
                                                <button class="btn btn-error btn-sm"
                                                    onclick="confirmarEliminacion({{ $proveedor->id }})">
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
            @if ($proveedores->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $proveedores->firstItem() }} - {{ $proveedores->lastItem() }} de
                        {{ $proveedores->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($proveedores->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $proveedores->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Botón Primera página --}}
                        @if (!$proveedores->onFirstPage())
                            <a href="{{ $proveedores->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($proveedores->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $proveedores->currentPage();
                            $totalPages = $proveedores->lastPage();
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
                                <a href="{{ $proveedores->url($i) }}"
                                    class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($proveedores->currentPage() < $totalPages - 3)
                            @if ($proveedores->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $proveedores->url($totalPages) }}"
                                class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

                        {{-- Botón Siguiente --}}
                        @if ($proveedores->hasMorePages())
                            <a href="{{ $proveedores->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_proveedor" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este proveedor?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarProveedor" method="POST">
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
    <dialog id="modal_restaurar_proveedor" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">
                ¿Seguro que querés restaurar este proveedor?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarProveedor" method="POST">
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
            const form = document.getElementById('formEliminarProveedor');
            form.action = routeEliminarProveedor(id);
            document.getElementById('modal_eliminar_proveedor').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarProveedor(id) {
            return "{{ url('/admin/proveedores') }}/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarProveedor');
            form.action = url;
            modal_restaurar_proveedor.showModal();
        }
    </script>
@endsection
