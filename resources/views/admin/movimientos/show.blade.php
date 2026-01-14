@extends('layouts.admin')
@section('title', 'Ver Movimiento') 

@section('content')
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver Movimiento</h1>
         <!-- Botones -->
        <a href="{{ route('movimientos.index') }}" class="btn btn-sm sm:btn-md btn-warning mr-2">
            <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
            Volver
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
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-plus class="w-4 h-4 inline" />
                    Ver Movimiento
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl p-6 mb-4">

        <h2 class="text-lg font-semibold mb-4">Datos del Movimiento</h2>

        <div class="space-y-6">

            <!-- FILA 1: ORIGEN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                <!-- ORIGEN TIPO -->
                <div class="space-y-2">
                    <label class="text-sm font-medium">Origen</label>
                    <input type="text" value="{{ $movimiento->origen_label }}" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transitionw-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

                <!-- TIPO DE MOVIMIENTO -->
                <div class="space-y-1">
                    <label class="text-sm font-medium">Tipo de movimiento</label>
                    <input type="text" value="{{ ucfirst($movimiento->tipo) }}" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

            </div>

            <!-- FILA 2: DESTINO -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                <!-- DESTINO TIPO -->
                <div class="space-y-1">
                    <label class="text-sm font-medium">Destino</label>
                    <input type="text" value="{{ $movimiento->destino_label }}" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

                <!-- FECHA -->
                <div class="space-y-1">
                    <label for="fecha" class="text-sm font-medium">Fecha</label>
                    <input id="fecha" name="fecha" type="date" value="{{ $movimiento->fecha }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" readonly>
                </div>

            </div>

            <!-- FILA 3: OBSERVACIONES -->
            <div class="space-y-2">
                <label for="observacion" class="text-sm font-medium">Observaciones</label>
                <textarea id="observacion" name="observacion" rows="3"
                    class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                    placeholder="Comentarios sobre el movimiento..." readonly>{{ $movimiento->observacion }}</textarea>
            </div>

        </div>


    </div>
    @if ($movimiento->tipo != 'entrada')
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-2xl font-semibold">Productos</h1>
            <br>

            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Cantidad Original</th>
                            <th class="text-center">Cantidad Movida / Consumida</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nr = 1; @endphp

                    @foreach ($movimiento->detalles as $detalle)
                        <tr>
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">
                                {{ $detalle->producto->nombre ?? 'Sin nombre' }}
                            </td>

                            {{-- Cantidad original (desde la compra asociada al movimiento) --}}
                            <td class="text-center">
                                {{ $detalle->detalle_compra->cantidad ?? 'N/A' }}
                            </td>

                            {{-- Cantidad movida --}}
                            <td class="text-center">{{ $detalle->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-2xl font-semibold">Productos</h1>
            <br>

            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Cantidad Comprada</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nr = 1; @endphp

                        @if ($movimiento->compra)
                            @foreach ($movimiento->compra->detalle_compras as $detalle)
                                <tr>
                                    <td class="text-center">{{ $nr++ }}</td>
                                    <td class="text-center">
                                        {{ $detalle->producto->nombre ?? 'Sin nombre' }}
                                    </td>
                                    <td class="text-center">{{ $detalle->cantidad }}</td>
                                    <td class="text-center">${{ number_format($detalle->precio, 2) }}</td>
                                    <td class="text-center">${{ number_format($detalle->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center text-gray-500">
                                    Movimiento sin compra asociada
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
