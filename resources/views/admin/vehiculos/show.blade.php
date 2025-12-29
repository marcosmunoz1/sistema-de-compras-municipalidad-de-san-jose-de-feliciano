@extends('layouts.admin')
@section('title', 'Ver Vehículo') 

@section('content')
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">

        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Vehículo:
                {{ $vehiculo->marca . ' ' . $vehiculo->modelo . ' ' . $vehiculo->anio }}</h1>

            @if ($vehiculo->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>
            
        <!-- Botones -->
        <div class="flex gap-2">
            @can('vehiculos-index')
            <a href="{{ route('vehiculos.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Vehículos
            </a>
            @endcan
            @can('vehiculos-edit')
            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Vehículo
            </a>
            @endcan
        </div>
        
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('vehiculos.index') }}">
                    <x-heroicon-o-truck class="w-4 h-4 inline" />
                    Vehículos
                </a>
            </li>

            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Vehículo
                </span>
            </li>
        </ul>
    </div>

    <!-- =========================== -->
    <!-- CARD — DATOS DEL VEHÍCULO -->
    <!-- =========================== -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Datos del Vehículo</h4><br>
            <p class="text-muted-foreground">Información general del vehículo</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">

            <!-- GRID GENERAL: CAMPOS IZQUIERDA — IMAGEN DERECHA -->
            <div class="grid grid-cols-3 gap-6">

                <!-- ======================= -->
                <!-- COLUMNA IZQUIERDA -->
                <!-- ======================= -->
                <div class="col-span-2 space-y-4">

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Tipo -->
                        <div class="space-y-2">
                            <label for="tipo" class="text-sm font-medium">Tipo</label>
                            <select id="tipo" name="tipo" class="select select-bordered w-full h-10" disabled>
                                @php
                                    $tipos = [
                                        'AUTO',
                                        'MOTO',
                                        'CAMIONETA',
                                        'CAMION',
                                        'ACOPLADO',
                                        'Especial',
                                        'COLECTIVO',
                                        'MINI BUS',
                                        'RETRO ESCAVADORA',
                                        'TRACTOR',
                                        'UTILITARIO',
                                    ];
                                @endphp

                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo }}" {{ $vehiculo->tipo === $tipo ? 'selected' : '' }}>
                                        {{ $tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Área -->
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text font-medium">Área
                            </label>
                            <select name="area_id"
                                class="select select-bordered w-full @error('area_id') select-error @enderror"
                                disabled
                            >
                                <option disabled value="">Seleccionar área</option>

                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}"
                                        {{ old('area_id', $vehiculo->area_id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->nombre }} ({{ $area->prefijo_catalogacion }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Patente -->
                        <div class="space-y-2">
                            <label for="patente" class="text-sm font-medium">Patente</label>
                            <input id="patente" name="patente" value="{{ $vehiculo->patente }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                   px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                   focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Marca -->
                        <div class="space-y-2">
                            <label for="marca" class="text-sm font-medium">Marca</label>
                            <input id="marca" name="marca" value="{{ $vehiculo->marca }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Modelo -->
                        <div class="space-y-2">
                            <label for="modelo" class="text-sm font-medium">Modelo</label>
                            <input id="modelo" name="modelo" value="{{ $vehiculo->modelo }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Año -->
                        <div class="space-y-2">
                            <label for="anio" class="text-sm font-medium">Año</label>
                            <input id="anio" name="anio" type="number" min="1900" max="{{ date('Y') }}"
                                value="{{ $vehiculo->anio }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Color -->
                        <div class="space-y-2">
                            <label for="color" class="text-sm font-medium">Color</label>
                            <input id="color" name="color" value="{{ $vehiculo->color }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Motor -->
                        <div class="space-y-2">
                            <label for="motor" class="text-sm font-medium">N° de Motor</label>
                            <input id="motor" name="motor" value="{{ $vehiculo->motor }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Catalogacion -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Catalogación</span>
                            </label>
                            <input type="text" name="catalogacion" value="{{ $vehiculo->catalogacion }}"
                                placeholder="Ej: HP, Dell, Lenovo, Samsung"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition" readonly>
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <!-- Chasis -->
                        <div class="space-y-2">
                            <label for="chasis" class="text-sm font-medium">N° de Chasis</label>
                            <input id="chasis" name="chasis" value="{{ $vehiculo->chasis }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                </div>

                <!-- ======================= -->
                <!-- COLUMNA DERECHA — IMAGEN -->
                <!-- ======================= -->
                <div id="preview-container"
                    class="w-full h-72 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">

                    @if ($vehiculo->imagen)
                        <img src="{{ asset('storage/' . $vehiculo->imagen) }}" alt="Imagen del vehículo"
                            id="preview-image" class="max-h-full object-cover">
                    @else
                        <span class="text-gray-500 text-sm">Sin imagen</span>
                    @endif

                </div>


            </div>

        </div>
    </div>
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4" id="tabla-productos">
        <h1 class="text-2xl font-semibold">Detalles de productos asignados al vehiculo</h1><br>
        <form method="GET" action="{{ route('vehiculos.show', $vehiculo->id) }}#tabla-productos">
            <input type="text" name="search" value="{{ $search }}" class="input input-bordered"
                placeholder="Buscar...">
            <!-- BOTÓN -->
            <button class="btn btn-primary">
                <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                Buscar
            </button>
            @if (request('search'))
                <a href="{{ route('vehiculos.show', $vehiculo->id) }}#tabla-productos" class="btn btn-error">
                    <x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
            @endif
        </form>

        <br>
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
                                <a href="{{ route('compras.show', [
                                    'id' => Crypt::encryptString($producto->compra_id),
                                    'from' => 'vehiculo',
                                    'vehiculo_id' => $vehiculo->id
                                ]) }}"
                                class="btn btn-sm btn-primary">
                                    Ver compra
                                </a>
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

    <!-- Historial de Actividad -->
    <x-historial-actividad :model="$vehiculo" :limit="10" />
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Parseador robusto de moneda que soporta formatos con . y , (es-AR y en-US)
            function parseCurrency(str) {
                if (!str) return NaN;

                // quitar todo menos dígitos, puntos y comas
                str = String(str).replace(/[^\d\.,-]/g, '').trim();

                if (str === '') return NaN;

                const hasDot = str.indexOf('.') !== -1;
                const hasComma = str.indexOf(',') !== -1;

                // Si tiene ambos, asumimos que el separador decimal es el que aparece más a la derecha
                if (hasDot && hasComma) {
                    if (str.lastIndexOf(',') > str.lastIndexOf('.')) {
                        // formato tipo 1.234.567,89 -> eliminar puntos y cambiar coma por punto
                        str = str.replace(/\./g, '').replace(/,/g, '.');
                    } else {
                        // formato tipo 1,234,567.89 -> eliminar comas
                        str = str.replace(/,/g, '');
                    }
                } else if (hasComma && !hasDot) {
                    // solo coma: puede ser 1000,50 (decimal) o 1,000 (miles). Si hay más de 1 coma, son miles.
                    const commas = (str.match(/,/g) || []).length;
                    if (commas > 1) {
                        str = str.replace(/,/g, ''); // 1,000,000 -> 1000000
                    } else {
                        // 1000,50 -> 1000.50
                        str = str.replace(/,/g, '.');
                    }
                } else if (hasDot && !hasComma) {
                    // solo punto: similar a arriba (puede ser miles o decimal)
                    const dots = (str.match(/\./g) || []).length;
                    if (dots > 1) {
                        str = str.replace(/\./g, ''); // 1.000.000 -> 1000000
                    } // si solo 1 punto, lo dejamos como decimal
                }

                // Ahora parseamos
                const num = parseFloat(str);
                return isNaN(num) ? NaN : num;
            }

            let total = 0;

            document.querySelectorAll('.item-producto').forEach(row => {

                const precioText = row.querySelector('.precio').textContent || '';
                const cantidadText = row.querySelector('.cantidad').textContent || '';

                const precioUnitario = parseCurrency(precioText);
                const cantidad = parseFloat(
                    String(cantidadText).replace(/\s+/g, '').replace(',', '.')
                );

                if (!isNaN(precioUnitario) && !isNaN(cantidad)) {
                    const subtotal = precioUnitario * cantidad;
                    total += subtotal;

                    // mostrar subtotal con formateo es-AR
                    row.querySelector('.subtotal').textContent =
                        '$' + subtotal.toLocaleString('es-AR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                    // opcional: si querés también mostrar el precio unitario formateado
                    // row.querySelector('.precio').textContent =
                    //     '$' + precioUnitario.toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                } else {
                    row.querySelector('.subtotal').textContent = '-';
                }
            });

            const totalEl = document.getElementById('totalFinal');
            if (totalEl) {
                totalEl.textContent = '$' + total.toLocaleString('es-AR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        });
    </script>
@endsection
