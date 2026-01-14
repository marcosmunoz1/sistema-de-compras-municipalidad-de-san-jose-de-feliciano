@extends('layouts.admin')
@section('title', 'Movimientos') 
@section('content')

<!-- Título -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Movimientos</h1>
    @can('movimientos-create')
    <a href="{{ route('movimientos.create') }}" class="btn btn-sm sm:btn-md btn-primary">
        <x-heroicon-o-plus class="w-5 h-5"/> Nuevo Movimiento
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
            <a href="{{ route('movimientos.index') }}">
                <x-heroicon-o-arrow-path class="w-4 h-4 inline" />
                Movimientos
            </a>
        </li>
    </ul>
</div>
 <div class="grid grid-cols-1 md:grid-cols-3 pd-6 mb-6">

        <!-- Card 1 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mr-2">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total de Movimientos</p> 
                        <h3 class="mt-2">{{ $movimientos->count() }}</h3>  
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-right-left text-blue-600 w-10 h-10" aria-hidden="true">
                        <path d="m16 3 4 4-4 4"></path>
                        <path d="M20 7H4"></path>
                        <path d="m8 21-4-4 4-4"></path>
                        <path d="M4 17h16"></path>
                    </svg>
                </div>
            </div>
        </div>
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
     <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de movimientos</h4> 
                </div>
            </div> 
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Origen</th>
                        <th class="text-center">Destino</th>
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
                            <td class="text-center">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @can('movimientos-show')
                                    <a href="{{ route('movimientos.show', $mov->id) }}"
                                        class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>
                                    @endcan
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

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $movimientos->firstItem() }} - {{ $movimientos->lastItem() }} de {{ $movimientos->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($movimientos->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $movimientos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Botón Primera página --}}
                        @if (!$movimientos->onFirstPage())
                            <a href="{{ $movimientos->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($movimientos->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $movimientos->currentPage();
                            $totalPages = $movimientos->lastPage();
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
                                <a href="{{ $movimientos->url($i) }}" class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($movimientos->currentPage() < $totalPages - 3)
                            @if ($movimientos->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $movimientos->url($totalPages) }}" class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

                        {{-- Botón Siguiente --}}
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
