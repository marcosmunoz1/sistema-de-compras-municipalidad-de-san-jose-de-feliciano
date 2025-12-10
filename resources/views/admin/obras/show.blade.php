@extends('layouts.admin')

@section('content')
    <!-- Título y botón volver -->
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Información de la obra: {{ $obra->nombre }}</h1>

            @if ($obra->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>
        <!-- Botones -->
        <div class="flex gap-2">
            <a href="{{ route('obras.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Obras
            </a>
            <a href="{{ route('obras.edit', $obra->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Obra
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
                <a href="{{ route('obras.index') }}">
                    <x-heroicon-o-briefcase class="w-4 h-4 inline" />
                    Obras
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver obra
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-md rounded-xl p-6">
        <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <div class="bg-blue-500 p-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-building2 lucide-building-2 size-8 text-white" aria-hidden="true">
                        <path d="M10 12h4"></path>
                        <path d="M10 8h4"></path>
                        <path d="M14 21v-3a2 2 0 0 0-4 0v3"></path>
                        <path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2"></path>
                        <path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"></path>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-3xl">Obra {{ $obra->nombre }}</h1>
                    </div>
                    <p class="text-gray-500 mb-1">{{ $obra->descripcion }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span data-slot="badge"
                            class="inline-flex items-center justify-center 
                        rounded-md px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 
                        gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 
                        focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 
                        aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 
                        bg-green-100 text-green-700 border-0">{{ $obra->estado_obra }}</span>
                        <span data-slot="badge"
                            class="inline-flex items-center justify-center 
                       rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap 
                       shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none 
                       focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] 
                       aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 
                       aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden 
                       [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground bg-purple-50
                        text-purple-700 border-purple-200">Decrecreto
                            NRº {{ $obra->resolucion_decreto }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">
        <div data-slot="card" class="bg-base-100 shadow-md rounded-xl">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user size-5" aria-hidden="true">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>Responsables</h4>
            </div>
            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                <div class="space-y-1">
                    <p class="text-sm text-gray-500">Responsable del Área</p>
                    <p class="text-lg">{{ $obra->responsable }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-sm text-gray-500">Ejecutado Por</p>
                    <p class="text-lg">{{ $obra->ejecutado_por }}</p>
                </div>
            </div>
        </div>
        <div data-slot="card" class="bg-base-100 shadow-md rounded-xl">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-calendar size-5" aria-hidden="true">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>Fechas Importantes</h4>
            </div>
            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <p class="text-sm text-gray-500">Fecha Inicio</p>
                        <p class="text-lg">
                            {{ $obra->fecha_inicio ? \Carbon\Carbon::parse($obra->fecha_inicio)->format('d/m/Y') : '—' }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-sm text-gray-500">Fecha Est. Fin</p>
                        <p class="text-lg">
                            {{ $obra->fecha_fin ? \Carbon\Carbon::parse($obra->fecha_fin)->format('d/m/Y') : '—' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-slot="card" class="bg-base-100 shadow-md rounded-xl mt-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-file-text size-5" aria-hidden="true">
                    <path
                        d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z">
                    </path>
                    <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
                    <path d="M10 9H8"></path>
                    <path d="M16 13H8"></path>
                    <path d="M16 17H8"></path>
                </svg>Observaciones</h4>
        </div>
        <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
            <p class="text-sm leading-relaxed p-3 rounded-md bg-base-200 dark:bg-base-300">{{ $obra->observaciones }}</p>
        </div>
    </div>

    <div class="card bg-base-100 shadow-xl p-4 mt-6" id="tabla-productos">

        <br>

        <!-- BUSCADOR -->
        <form method="GET" action="{{ route('obras.show', $obra->id) }}#tabla-productos">
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
                        <a href="{{ route('obras.show', $obra->id) }}#tabla-productos"
                            class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
                    @endif
                </div>
            </div>
        </form>
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 
             px-4  has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex items-center justify-between">
                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-package size-5" aria-hidden="true">
                        <path
                            d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z">
                        </path>
                        <path d="M12 22V12"></path>
                        <polyline points="3.29 7 12 12 20.71 7"></polyline>
                        <path d="m7.5 4.27 9 5.15"></path>
                    </svg>Productos Asignados a la Obra</h4> 
                <div class="text-right">
                    <p class="text-sm text-gray-500">Total Invertido</p>
                    <p class="text-xl">$ 1.052.000,00</p>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Fecha Compra</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad asignada</th>
                        <th class="text-center">Cantidad/Stock</th>
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

                            <td class="text-center">{{ \Carbon\Carbon::parse($producto->fecha_orden)->format('d/m/Y') }}
                            </td>

                            <td class="text-center">${{ number_format($producto->precio, 2) }}</td>

                            <td class="text-center">{{ $producto->cantidad_original }}</td>

                            <td class="text-center">{{ $producto->cantidad_usada }}</td>

                            <td class="text-center">
                                ${{ number_format($producto->subtotal_original, 2) }}
                            </td>

                            <td class="text-center">
                                @if ($producto->compra_id)
                                    <a href="{{ route('compras.show', ['id' => $producto->compra_id, 'from' => 'obra', 'obra_id' => $obra->id]) }}"
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
                        <td colspan="6" class="text-right font-bold text-2xl">Total:</td>
                        <td class="font-bold text-2xl">
                            ${{ number_format($totalGeneral, 2) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
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
