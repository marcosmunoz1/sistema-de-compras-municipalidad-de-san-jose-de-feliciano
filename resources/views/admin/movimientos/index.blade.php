@extends('layouts.admin')

@section('content')

<!-- Título -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Movimientos</h1>
    <a href="{{ route('movimientos.create') }}" class="btn btn-primary">
        + Nuevo Movimiento
    </a>
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
            <a href="{{ route('movimientos.index') }}">
                <x-heroicon-o-arrow-path class="w-4 h-4 inline" />
                Movimientos
            </a>
        </li>
    </ul>
</div>

<!-- Buscador -->
<form action="{{ route('movimientos.index') }}" method="GET">
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <label class="w-full">
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text"
                    placeholder="Buscar por tipo, producto, origen, destino..."
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition"
                />
            </label>

            <button class="btn btn-primary">
                <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                Buscar
            </button>

            @if(request('search'))
                <a href="{{ route('movimientos.index') }}" class="btn btn-error">
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
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Origen</th>
                        <th class="text-center">Destino</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $nr = $movimientos->currentPage() * $movimientos->perPage() - $movimientos->perPage() + 1;
                    @endphp

                    @foreach ($movimientos as $mov)
                        <tr>
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ ucfirst($mov->tipo) }}</td>
                            <td class="text-center">
                                @if($mov->origen_tipo)
                                    {{ $mov->origen_label }} <br>
                                @else
                                    ---
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $mov->destino_label }}
                            </td>
                            <td class="text-center">{{ $mov->cantidad }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('movimientos.show', $mov->id) }}"
                                        class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>

                                    <a href="{{ route('movimientos.edit', $mov->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginación -->
        @if ($movimientos->hasPages())
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                <div class="text-sm text-gray-500">
                    Mostrando {{ $movimientos->firstItem() }} - {{ $movimientos->lastItem() }} de {{ $movimientos->total() }} movimientos
                </div>

                <div class="join">

                    {{-- Anterior --}}
                    @if ($movimientos->onFirstPage())
                        <button class="join-item btn btn-square btn-disabled">«</button>
                    @else
                        <a href="{{ $movimientos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                    @endif

                    {{-- Números --}}
                    @foreach ($movimientos->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $movimientos->currentPage())
                            <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Siguiente --}}
                    @if ($movimientos->hasMorePages())
                        <a href="{{ $movimientos->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                    @else
                        <button class="join-item btn btn-square btn-disabled">»</button>
                    @endif

                </div>

            </div>
        @endif

    </div>
</div>

@endsection
