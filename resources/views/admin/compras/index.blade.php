@extends('layouts.admin')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Compras</h1>

        {{-- Botón agregar compra --}}
        @can('compras-create')
        <a href="{{ route('compras.create') }}" class="btn btn-primary">
            + Nueva Compra
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
                <a href="{{ route('compras.index') }}">
                    <x-heroicon-o-shopping-bag class="w-4 h-4 inline" />
                    Compras
                </a>
            </li>
        </ul>
    </div>


    <!-- Buscador -->
    <form action="{{ route('compras.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por vehiculo, combustible, fecha..."
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
                    <a href="{{ route('compras.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" />
                        Limpiar</a>
                @endif
            </div>
        </div>
    </form>
    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">
            <!-- HEADER COMPLETO -->
            <div class="flex flex-col gap-3">
                <!-- TÍTULO + BUSCADOR -->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de Compras</h4>
                    <!-- BUSCADOR -->
                    <div class="relative">
                        <!-- BOTÓN IMPRIMIR -->
                        <div class="flex justify-start">
                            <button onclick="window.print()" class="btn btn-outline btn-sm">
                                <x-heroicon-o-printer class="w-4 h-4 mr-2" />
                                Imprimir Historial
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLA -->
            <div class="overflow-x-auto mt-4">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr orden</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Proveedor</th>
                            <th class="text-center">insumos</th>
                            <th class="text-center">total</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nr = $compras->firstItem();
                        @endphp

                        @foreach ($compras as $compra)
                            <tr>
                                <td class="text-center">{{ $compra->nr_orden }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y') }}
                                </td>
                                <td class="text-center">{{ $compra->proveedor->nombre ?? 'N/A' }}</td>
                                <td class="text-center">{{ $compra->detalle_compras->count() ?? 'N/A' }}</td>
                                <td class="text-center">${{ number_format($compra->total, 2) ?? 'N/A' }}</td>
                                <td class="text-center">{{ $compra->estado_compra }}</td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        @can('compras-show')
                                        <a href="{{ route('compras.show', Crypt::encrypt($compra->id)) }}" class="btn btn-info btn-sm">
                                            <x-heroicon-s-eye class="w-4 h-4" />
                                        </a>
                                        @endcan
                                        @can('compras-edit')
                                        @if ($compra->estado_compra == 'Pendiente de factura')
                                            <a href="{{ route('compras.edit', Crypt::encrypt($compra->id)) }}" class="btn btn-warning btn-sm">
                                                <x-heroicon-s-pencil class="w-4 h-4" />
                                            </a>
                                        @endif
                                        @endcan

                                        {{--  <a href="{{ route('compras.report', $compra->id ) }}"  
                                       class="btn bg-primary btn-sm" 
                                       target="_blank">
                                        <x-heroicon-o-printer class="w-4 h-4"/>
                                    </a> --}}

                                    @can('compras-report')
                                     <a href="{{ route('compras.report', $compra->id ) }}"  
                                        class="btn bg-primary btn-sm" 
                                        target="_blank">
                                            <x-heroicon-o-printer class="w-4 h-4"/> 
                                     </a>
                                     @endcan

                                   {{--  @if ($compra->trashed())
                                        <button class="btn btn-success btn-sm"
                                                onclick="abrirModalRestaurar('{{ url('/admin/compras/'. $compra->id.'/restore') }}')">
                                            <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                        </button>
                                    @else
                                        <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion({{ $compra->id }})">
                                            <x-heroicon-s-trash class="w-4 h-4"/>
                                        </button>
                                    @endif --}}

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- PAGINACIÓN -->
            @if ($compras->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <div class="text-sm text-gray-500">
                        Mostrando {{ $compras->firstItem() }} - {{ $compras->lastItem() }}
                        de {{ $compras->total() }} registros
                    </div>

                    <div class="join">
                        @if ($compras->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $compras->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        @foreach ($compras->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $compras->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($compras->hasMorePages())
                            <a href="{{ $compras->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
