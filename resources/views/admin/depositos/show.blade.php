@extends('layouts.admin')
@section('title', 'Ver depósito') 

@section('content')
    <!-- Título y botón volver -->
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Información de depósito: {{ $deposito->nombre }}</h1>
        </div>
        <!-- Botones -->
        <div class="flex gap-2">
            <a href="{{ route('depositos.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Depósitos
            </a>
        </div>
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
                <a href="{{ route('depositos.index') }}">
                    <x-heroicon-o-home-modern class="w-4 h-4 inline" />
                    Depósitos
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver depósito
                </span>
            </li>
        </ul>
    </div>
    <form method="GET" action="{{ route('depositos.show', $deposito->id) }}#tabla-productos">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">
                <input type="text" name="search" value="{{ $search }}" class="input input-bordered"
                    placeholder="Buscar...">
                <!-- BOTÓN -->
                <button class="btn btn-primary">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    Buscar
                </button>
                @if (request('search'))
                    <a href="{{ route('depositos.show', $deposito->id) }}#tabla-productos"
                        class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
                @endif
            </div>
        </div>
    </form>
    <div class="card bg-base-100 shadow-xl p-4" id="tabla-productos">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th class="text-center">Nr</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Fecha Compra</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Cantidad Asignada</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1;
                @endphp

                @foreach ($productos as $producto)
                    <tr>
                        <td class="text-center">{{ $nr++ }}</td>
                        <td class="text-center">{{ $producto->nombre }}</td>
                        <td class="text-center">
                            {{ $producto->fecha_orden ? \Carbon\Carbon::parse($producto->fecha_orden)->format('d/m/Y') : '—' }}
                        </td>
                        <td class="text-center">${{ number_format($producto->precio ?? 0, 2) }}</td>
                        <td class="text-center">{{ $producto->cantidad_asignada ?? 0 }}</td>
                        <td class="text-center">{{ $producto->stock ?? 0 }}</td>
                        <td class="text-center">${{ number_format($producto->subtotal_real ?? 0, 2) }}</td>
                        <td class="text-center">
                            @if ($producto->compra_id)
                                <a href="{{ route('compras.show', ['id' => $producto->compra_id, 'from' => 'deposito', 'deposito_id' => $deposito->id]) }}"
                                    class="btn btn-sm btn-primary">
                                    Ver compra
                                </a>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" class="text-right font-bold text-xl">Total:</td>
                    <td class="font-bold text-xl">${{ number_format($totalGeneral ?? 0, 2) }}</td>
                </tr>
            </tfoot>
        </table>


        @if ($productos->hasPages())
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                <!-- Texto "Mostrando X - Y" -->
                <div class="text-sm text-gray-500">
                    Mostrando {{ $productos->firstItem() }} - {{ $productos->lastItem() }}
                    de {{ $productos->total() }} registros
                </div>

                <!-- Controles de paginación -->
                <div class="join">

                    {{-- Botón Anterior --}}
                    @if ($productos->onFirstPage())
                        <button class="join-item btn btn-square btn-disabled">«</button>
                    @else
                        <a href="{{ $productos->previousPageUrl() }}#tabla-productos"
                            class="join-item btn btn-square">«</a>
                    @endif

                    {{-- Números de página --}}
                    @foreach ($productos->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $productos->currentPage())
                            <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}#tabla-productos"
                                class="join-item btn btn-square">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Botón Siguiente --}}
                    @if ($productos->hasMorePages())
                        <a href="{{ $productos->nextPageUrl() }}#tabla-productos" class="join-item btn btn-square">»</a>
                    @else
                        <button class="join-item btn btn-square btn-disabled">»</button>
                    @endif

                </div>
            </div>
        @endif
    </div>

@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let total = 0;

            document.querySelectorAll('#tablaProductosDeposito .item-producto').forEach(row => {
                const subtotal = parseFloat(row.querySelector('.subtotal').dataset.subtotal || 0);
                total += subtotal;
            });

            const el = document.getElementById('totalFinalDeposito');
            if (el) el.textContent = '$' + total.toFixed(2);
        });
    </script>
@endsection
