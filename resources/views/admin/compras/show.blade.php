@extends('layouts.admin')
@section('title', 'Ver compra') 

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver datos de la compra</h1>
        @if ($from === 'vehiculo' && $vehiculoId)
            <a href="{{ route('vehiculos.show', $vehiculoId) }}" class="btn btn-secondary mb-3">
                ← Volver al vehículo
            </a>
        @elseif($from === 'obra' && $obraId)
            <a href="{{ route('obras.show', $obraId) }}" class="btn btn-secondary mb-3">
                ← Volver a obra
            </a>
        @elseif($from === 'deposito' && $depositoId)
            <a href="{{ route('depositos.show', $depositoId) }}" class="btn btn-secondary mb-3">
                ← Volver a depósito
            </a>
        @endif

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
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Orden de compra
                </span>
            </li>
        </ul>
    </div>




    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Informacion General</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-3 gap-4">
                    <!-- País -->
                    <div class="space-y-2">
                        <label for="fecha_orden" class="text-sm font-medium">Fecha de Emisión</label>
                        <input type="date" id="fecha_orden" name="fecha_orden" value="{{ $compra->fecha_orden }}"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('fecha_orden') input-error @enderror"
                            disabled>
                    </div>

                    <!-- entregar a -->
                    <div class="space-y-2">
                        <label for="empleado_id" class="text-sm font-medium">Entregar a</label>
                        <select id="empleado_id" name="empleado_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('empleado_id') input-error @enderror"
                            disabled>
                            <option value="">{{ $compra->empleado->nombre }}</option>
                        </select>
                        @error('empleado_id')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta</label>
                        <select id="sub_cuenta" name="sub_cuenta"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('sub_cuenta') input-error @enderror"
                            disabled>
                            <option value="">{{ $compra->sub_cuenta }}</option>
                        </select>
                        @error('sub_cuenta')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Otra seccion -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4 mt-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Informacion General</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label for="proveedor_id" class="text-sm font-medium">Proveedor</label>
                        <select id="proveedor_id" name="proveedor_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('proveedor_id') input-error @enderror"
                            disabled>
                            <option value="">{{ $compra->proveedor->nombre }}</option>
                        </select>
                        @error('proveedor_id')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- entregar a -->
                    <div class="space-y-2">
                        <label for="destino_tipo" class="text-sm font-medium">Destino de la compra</label>
                        <select id="destino_tipo" name="destino_tipo"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('destino_tipo') input-error @enderror"
                            disabled>
                            <option value="">{{ class_basename($compra->destino_tipo) }}</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="destino_id" class="text-sm font-medium">Enviar a:</label>
                        <select id="destino_id" name="destino_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('destino_id') input-error @enderror"
                            disabled>
                            <option value="">{{ $compra->destino_nombre }}</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-2">
                        <label for="asunto_obra_automotor" class="text-sm font-medium">Asunto de la compra</label>
                        <textarea value="" type="text" id="asunto_obra_automotor" name="asunto_obra_automotor"
                            placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('asunto_obra_automotor') input-error @enderror"
                            disabled>{{ $compra->asunto_obra_automotor }}</textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-2">
                        <label for="observacion" class="text-sm font-medium">Observaciones</label>
                        <textarea type="text" id="observacion" name="observacion" placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('observacion') input-error @enderror"
                            disabled>{{ $compra->observacion }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-slot="card" class="card bg-base-100 shadow-xl p-4 mt-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Datos de la compra</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nr = 1; @endphp

                        @foreach ($compra->detalle_compras as $detalle)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $detalle->producto->nombre }}</td>

                                {{-- Precio: input editable --}}
                                <td class="text-center">
                                    ${{ number_format($detalle->precio, 2) ?? '' }}
                                </td>

                                {{-- Cantidad --}}
                                <td class="text-center">
                                    <input type="text" class="text-center cantidad" readonly
                                        value="{{ $detalle->cantidad }}">
                                </td>

                                {{-- Subtotal --}}
                                <td class="text-center">
                                    ${{ number_format($detalle->subtotal, 2) ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    {{-- Total --}}
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right font-bold">Total:</td>
                            <td class="text-center">
                                ${{ number_format($compra->total, 2) }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
    <!-- ========================= -->
    <!-- BOTONES DEL FORMULARIO -->
    <!-- ========================= -->
    <div class="flex justify-end pt-4">
        <a href="{{ route('compras.index') }}" class="btn btn-warning mr-2">
            <x-heroicon-m-arrow-left class="w-4 h-4 inline" />
            Volver
        </a>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function calcularTotal() {
                let total = 0;
                document.querySelectorAll('tbody tr').forEach(function(row) {
                    const precio = parseFloat(row.querySelector('.precio').value) || 0;
                    const cantidad = parseFloat(row.querySelector('.cantidad').value) || 0;
                    const subtotal = precio * cantidad;

                    row.querySelector('.subtotal').value = subtotal.toFixed(2);
                    total += subtotal;
                });

                document.getElementById('total_compra').value = total.toFixed(2);
            }

            // recalcular al cambiar cualquier precio
            document.querySelectorAll('.precio').forEach(function(input) {
                input.addEventListener('input', calcularTotal);
            });

            // calcular al cargar la página
            calcularTotal();
        });
    </script>
@endsection
