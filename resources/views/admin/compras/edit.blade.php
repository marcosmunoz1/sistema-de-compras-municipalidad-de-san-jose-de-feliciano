@extends('layouts.admin')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Creación de la Orden de compra</h1>
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Crear Orden de compra
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
                            <option value="">
                                {{ $compra->destino ? $compra->destino->nombre : 'No asignado' }}
                            </option>


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
                        <textarea type="text" id="observacion" name="observacion"
                            placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('observacion') input-error @enderror"
                            disabled>{{ $compra->observacion }}</textarea>
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
                            <option value="">
                                {{ $compra->destino ? $compra->destino->nombre : 'No asignado' }}
                            </option>


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
                        <textarea type="text" id="observacion" name="observacion"
                            placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('observacion') input-error @enderror"
                            disabled>{{ $compra->observacion }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('compras.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')
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

                                    {{-- PRECIO con $ a la izquierda --}}
                                    <td class="text-center">
                                        <div class="flex items-center gap-1 justify-center">
                                            <span class="text-gray-600 select-none">$</span>
                                            <input
                                                type="text"
                                                class="input input-info precio w-28"
                                                name="precios[{{ $detalle->id }}]"
                                                value="{{ $detalle->precio !== null ? number_format($detalle->precio, 2, ',', '.') : '' }}"
                                            >
                                        </div>
                                    </td>

                                    {{-- CANTIDAD --}}
                                    <td class="text-center">
                                        <input type="number" class="cantidad input input-bordered w-20 text-center"
                                            readonly value="{{ $detalle->cantidad }}">
                                    </td>

                                    {{-- SUBTOTAL --}}
                                    <td class="text-center">
                                        <div class="flex items-center gap-1 justify-center">
                                            <span class="text-gray-600 select-none">$</span>
                                            <input type="number" class="subtotal input input-bordered w-28 text-center"
                                                readonly>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- TOTAL --}}
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right font-bold text-lg">Total:</td>
                                <td class="text-center">
                                    <div class="flex items-center gap-1 justify-center">
                                        <span class="text-gray-600 select-none">$</span>
                                        <input type="number" id="total_compra"
                                            class="input input-bordered w-28 text-center" readonly>
                                    </div>
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
            <button type="submit" class="btn btn-primary">
                <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" />
                Guardar compra
            </button>
        </div>
    </form>
@endsection
@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form'); // el form de edición
    const precioInputs = document.querySelectorAll('input.precio');
    const filas = document.querySelectorAll('tbody tr');
    const totalInput = document.getElementById('total_compra');

    function normalizarPrecio(valor) {
        if (!valor) return 0;
        let raw = valor.toString().replace(/[^0-9,\.]/g, ''); // solo dígitos/coma/punto
        raw = raw.replace(/\./g, '');  // quita puntos de miles
        raw = raw.replace(',', '.');   // coma decimal -> punto
        const num = parseFloat(raw);
        return isNaN(num) ? 0 : num;
    }

    function formatearPrecio(num) {
        if (!num) return '';
        const partes = Number(num).toFixed(2).split('.');
        const entero = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        const decimal = partes[1];
        return `${entero},${decimal}`;
    }

    function calcularTotal() {
        let total = 0;

        filas.forEach(function(row) {
            const precioInput = row.querySelector('.precio');
            const cantidadInput = row.querySelector('.cantidad');
            const subtotalInput = row.querySelector('.subtotal');

            if (!precioInput || !cantidadInput || !subtotalInput) return;

            const precio = normalizarPrecio(precioInput.value);
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const subtotal = precio * cantidad;

            subtotalInput.value = subtotal.toFixed(2);
            total += subtotal;
        });

        if (totalInput) {
            totalInput.value = total.toFixed(2);
        }
    }

    precioInputs.forEach(input => {
    // Inicial: formatear lo que viene del servidor
    if (input.value) {
        const n = normalizarPrecio(input.value);
        input.value = formatearPrecio(n);
    }

    // Mientras escribís: NO formatear, solo recalcular
   input.addEventListener('input', function () {
        // quitar todo lo que no sea dígito
        let digits = input.value.replace(/\D/g, '');

        // eliminar ceros a la izquierda
        digits = digits.replace(/^0+/, '');

        // si no hay nada, limpiar y recalcular
        if (!digits) {
            input.value = '';
            calcularTotal();
            return;
        }

        let entero, centavos;

        if (digits.length === 1) {
            // 1 dígito → 0,0X
            entero = '0';
            centavos = digits.padStart(2, '0'); // '1' -> '01'
        } else if (digits.length === 2) {
            // 2 dígitos → 0,XY
            entero = '0';
            centavos = digits;
        } else {
            // 3+ dígitos: últimos 2 son centavos
            entero = digits.slice(0, -2);
            centavos = digits.slice(-2);
        }

        // formatear parte entera con puntos de miles
        const enteroFormateado = entero.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        input.value = `${enteroFormateado},${centavos}`;

        // recalcular total usando el valor numérico
        calcularTotal(); 
    });

    // Al salir del campo: ahí sí formateamos lindo
      input.addEventListener('blur', function () {
        if (!input.value.trim()) {
            input.value = '';
            calcularTotal();
            return;
        }

        // normalizamos usando la máscara ya aplicada
        const n = normalizarPrecio(input.value);  // "1.234,56" -> 1234.56
        if (!n) {
            input.value = '';
        } else {
            // volvemos a aplicar la máscara de moneda
            let cents = Math.round(n * 100).toString();
            while (cents.length < 3) {
                cents = '0' + cents;
            }
            const entero = cents.slice(0, -2);
            const centavos = cents.slice(-2);
            const enteroFormateado = entero.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            input.value = `${enteroFormateado},${centavos}`;
        }

        calcularTotal();
    });
       });
    });

    // Calcular total al cargar
    calcularTotal();

    // Antes de enviar: pasar todo a "10000.00"
    if (form) {
        form.addEventListener('submit', function () {
            precioInputs.forEach(input => {
                const n = normalizarPrecio(input.value);
                input.value = n ? n.toFixed(2) : '';
            });
        });
    }

</script>
@endsection

