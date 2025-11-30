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
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground rounded-xl mb-6">
        <div class="px-6 py-4 border-l-4 border-blue-600">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="lucide lucide-circle-alert w-6 h-6 text-blue-600 shrink-0 mt-0.5" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
            </div>
        </div>
    </div>

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf

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
                            <label for="fecha_orden" class="text-sm font-medium">Fecha de Emisión<span
                                    class="text-red-600">*</span></label>
                            <input type="date" id="fecha_orden" name="fecha_orden" value="{{ old('fecha_orden') }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('fecha_orden') input-error @enderror"
                                required>
                            @error('fecha_orden')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- entregar a -->
                        <div class="space-y-2">
                            <label for="empleado_id" class="text-sm font-medium">Entregar a<span
                                    class="text-red-600">*</span></label>
                            <select id="empleado_id" name="empleado_id"
                                class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('empleado_id') input-error @enderror"
                                required>
                                <option value="">Seleccione un empleado</option>
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }} - {{ $empleado->dni }}
                                    </option>
                                @endforeach
                            </select>
                            @error('empleado_id')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Provincia -->
                        <div class="space-y-2">
                            <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta<span
                                    class="text-red-600">*</span></label>
                            <select id="sub_cuenta" name="sub_cuenta"
                                class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('sub_cuenta') input-error @enderror"
                                required>
                                <option value="">Seleccione la sub cuenta</option>
                                <option>Corralon Municipal</option>
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
                            <label for="proveedor_id" class="text-sm font-medium">Proveedor<span
                                    class="text-red-600">*</span></label>
                            <select id="proveedor_id" name="proveedor_id"
                                class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('proveedor_id') input-error @enderror"
                                required>
                                <option value="">Seleccione un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }} -
                                        {{ $proveedor->razon_social }}</option>
                                @endforeach
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
                                required>
                                <option value="">Seleccione el destino de la compra</option>
                                <option value="deposito">Deposito</option>
                                <option value="equipo">Equipo</option>
                                <option value="vehiculo">Vehiculo</option>
                                <option value="obra">Obra</option>
                            </select>
                            @error('destino_tipo')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="destino_id" class="text-sm font-medium">Enviar a:</label>
                            <select id="destino_id" name="destino_id"
                                class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('destino_id') input-error @enderror"
                                required>
                                <option value="">Seleccione un destino...</option>
                            </select>
                            @error('destino_id')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-2">
                            <label for="asunto_obra_automotor" class="text-sm font-medium">Asunto de la compra<span
                                    class="text-red-600">*</span></label>
                            <textarea value="{{ old('asunto_obra_automotor') }}" type="text" id="asunto_obra_automotor"
                                name="asunto_obra_automotor" placeholder="Ingrese una justificacion breve de la compra"
                                class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('asunto_obra_automotor') input-error @enderror"
                                required></textarea>
                            @error('asunto_obra_automotor')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-2">
                            <label for="observacion" class="text-sm font-medium">Observaciones (Opcional)</label>
                            <textarea type="text" id="observacion" name="observacion"
                                placeholder="Ingrese una justificacion breve de la compra"
                                class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('observacion') input-error @enderror"
                                required></textarea>
                            @error('observacion')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
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

                            @foreach ($compras->detalle_compras as $detalle)
                                <tr>
                                    <td class="text-center">{{ $nr++ }}</td>
                                    <td class="text-center">{{ $detalle->producto->nombre }}</td>

                                    {{-- Precio: input editable --}}
                                    <td class="text-center">
                                        <input type="number" step="0.01" min="0" class="input input-info precio"
                                            name="precios[{{ $detalle->id }}]" value="{{ $detalle->precio ?? '' }}">
                                    </td>

                                    {{-- Cantidad --}}
                                    <td class="text-center">
                                        <input type="number" class="cantidad" readonly
                                            value="{{ $detalle->cantidad }}">
                                    </td>

                                    {{-- Subtotal --}}
                                    <td class="text-center">
                                        <input type="number" class="subtotal" readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- Total --}}
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right font-bold">Total:</td>
                                <td class="text-center">
                                    <input type="number" id="total_compra" readonly>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="bg-base-100 shadow-xl rounded-xl  mt-6">
            <!-- Header -->
            <div class="px-6 pt-6 pb-4">
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Insumos</h4>
                    <div class="flex gap-2">
                        <button type="button" onclick="crearProductoModal.showModal()"
                            class="btn flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-md transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-package-plus w-4 h-4">
                                <path d="M16 16h6"></path>
                                <path d="M19 13v6"></path>
                                <path
                                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14">
                                </path>
                                <path d="m7.5 4.27 9 5.15"></path>
                                <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                <line x1="12" x2="12" y1="22" y2="12"></line>
                            </svg>
                            Nuevo Producto
                        </button>

                        <button type="button" onclick="modalAgregarItem.showModal()"
                            class="btn flex items-center gap-2 bg-info-content hover:bg-info-content/50 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Agregar insumo
                        </button>

                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4" id="tablaContainer">
                <div id="mensajeVacio" class="text-center py-8 text-gray-500">
                    <p>No hay Insumos agregados</p>
                    <p class="text-sm mt-1">Haz clic en "Agregar Insumo" para comenzar</p>
                </div>

                <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                    <div class="overflow-x-auto">
                        <div data-slot="table-container" class="relative w-full overflow-x-auto">
                            <table id="tablaItems" class="w-full caption-bottom text-sm hidden">
                                <thead data-slot="table-header" class="[&_tr]:border-b">
                                    <tr data-slot="table-row" class="border-b border-gray-200 transition-colors">
                                        <th
                                            class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap w-[300px]">
                                            Producto</th>
                                        <th
                                            class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap w-[120px]">
                                            Cantidad</th>
                                        <th
                                            class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">
                                            Observaciones</th>
                                        <th
                                            class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap w-[80px]">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="tablaProductos" data-slot="table-body" class="[&_tr:last-child]:border-0">
                                    <!-- filas dinámicas -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="resumenItems" class="mt-4 p-4 bg-gray-50 rounded-lg hidden">
                        <p class="text-sm text-gray-600"><strong>Total de items:</strong> <span id="totalItems">0</span>
                            producto(s)</p>
                        <p class="text-sm text-gray-600 mt-1"><strong>Cantidad total:</strong> <span
                                id="cantidadTotal">0</span> unidades</p>
                    </div>
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
    <!-- Modal -->
    <!-- Modal para crear -->
    <dialog id="modalAgregarItem" class="modal">

        <div class="modal-box w-9/12 max-w-3xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <!-- Título -->
            <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                Añadir insumo
            </h3>

            <!-- Tabla -->
            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">

                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full" id="mitabla">
                            <thead>
                                <tr>
                                    <th class="text-center">Nr</th>
                                    <th class="text-center">Accion</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Unidad</th>
                                    <th class="text-center">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nr = 1;
                                @endphp
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td class="text-center">{{ $nr++ }}</td>
                                        <td class="text-center">
                                            <button
                                                onclick="agregarProducto({{ $producto->id }}, '{{ $producto->nombre }}')"
                                                class="btn btn-primary btn-sm">
                                                <x-heroicon-o-plus class="w-4 h-4" />
                                                Agregar
                                            </button>
                                        </td>
                                        <td class="text-center">{{ $producto->categoria->nombre }}</td>
                                        <td class="text-center">{{ $producto->nombre }}</td>
                                        <td class="text-center">{{ $producto->descripcion }}</td>
                                        <td class="text-center">{{ $producto->unidad }}</td>
                                        <td class="text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                {{-- Ver --}}
                                                <a href="{{ route('productos.show', $producto->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <x-heroicon-s-eye class="w-4 h-4" />
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- fondo oscuro -->
            <form method="dialog" class="modal-backdrop">
                <button></button>
            </form>
    </dialog>
    <!-- Modal para crear producto -->
    <dialog id="crearProductoModal" class="modal">

        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título -->
            <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-package-plus w-4 h-4">
                    <path d="M16 16h6"></path>
                    <path d="M19 13v6"></path>
                    <path
                        d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14">
                    </path>
                    <path d="m7.5 4.27 9 5.15"></path>
                    <polyline points="3.29 7 12 12 20.71 7"></polyline>
                    <line x1="12" x2="12" y1="22" y2="12"></line>
                </svg>
                Crear Nuevo Producto
            </h3>

            <form action="{{ url('/admin/productos/store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Categoría -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Categoría</span>
                    </label>

                    <select name="categoria_id"
                        class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre del Producto</span>
                    </label>

                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        placeholder="Ej: Aceite Motor 5W-30"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
          text-sm focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>

                    @error('nombre')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                    </label>

                    <textarea name="descripcion" rows="3" placeholder="Ingrese una descripción breve del producto..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Unidad -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Unidad</span>
                    </label>

                    <input type="text" name="unidad" value="{{ old('unidad') }}"
                        placeholder="Ej: Unidad, Caja, Litro, Par..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
          text-sm focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>

                    @error('unidad')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="modal-action">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Producto
                    </button>

                    <button type="button" onclick="crearProductoModal.close()" class="btn btn-neutral">
                        Cancelar
                    </button>
                </div>

            </form>

        </div>

        <!-- fondo oscuro -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>

    </dialog>
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

    <script>
        const oldDestinoId = "{{ old('destino_id') }}"; // <-- Blade se ejecuta acá

        document.getElementById('destino_tipo').addEventListener('change', function() {
            const tipo = this.value;
            const destinoSelect = document.getElementById('destino_id');

            destinoSelect.innerHTML = '<option value="">Cargando...</option>';

            fetch('{{ url('api/destinos') }}/' + tipo)
                .then(res => res.json())
                .then(data => {
                    destinoSelect.innerHTML = '<option value="">Seleccione...</option>';

                    data.forEach(dest => {
                        destinoSelect.innerHTML += `
                        <option value="${dest.id}" ${oldDestinoId == dest.id ? 'selected' : ''}>
                            ${dest.nombre}
                        </option>`;
                    });
                });
        });
    </script>

    <script>
        $('#mitabla').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
    <script>
        // Agregar producto a la tabla
        function agregarProducto(id, nombre) {
            const tabla = document.getElementById('tablaProductos');

            // crear fila con la estructura y clases similares a tu ejemplo
            const fila = document.createElement('tr');
            fila.setAttribute('data-slot', 'table-row');
            fila.className = 'hover:bg-muted/50 transition-colors';

            fila.innerHTML = `
                <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                <div class="flex flex-col">
                    <span class="font-medium text-sm truncate">${escapeHtml(nombre)}</span>
                    <small class="text-xs text-gray-500">ID: ${id}</small>
                    <input type="hidden" name="productos[]" value="${id}">
                </div>
                </td>

                <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap"> 
                <input type="number" name="cantidades[]" min="1" value="1" required
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition"
                    oninput="actualizarTotales()">
                </td>

                <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                <input name="observaciones[]" placeholder="Observaciones del item..." value=""
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                </td>

                <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                <button type="button" class="inline-flex items-center justify-center text-sm font-medium h-8 rounded-md gap-1.5 px-3 text-red-600"
                    onclick="eliminarFila(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                    <path d="M3 6h18"></path>
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </button>
                </td>
            `;

            tabla.appendChild(fila);

            // Mostrar tabla y resumen
            document.getElementById('tablaItems').classList.remove('hidden');
            document.getElementById('mensajeVacio').classList.add('hidden');
            document.getElementById('resumenItems').classList.remove('hidden');

            // actualizar contadores
            actualizarTotales();
        }

        // Eliminar fila (botón)
        function eliminarFila(btn) {
            const tr = btn.closest('tr');
            if (!tr) return;
            tr.remove();
            actualizarTotales();

            // si ya no hay filas, ocultar tabla y mostrar mensaje
            const tabla = document.getElementById('tablaProductos');
            if (!tabla.querySelector('tr')) {
                document.getElementById('tablaItems').classList.add('hidden');
                document.getElementById('mensajeVacio').classList.remove('hidden');
                document.getElementById('resumenItems').classList.add('hidden');
            }
        }

        // Recalcula totales: total items (filas) y suma de cantidades
        function actualizarTotales() {
            const tabla = document.getElementById('tablaProductos');
            const filas = tabla.querySelectorAll('tr');
            const totalItems = filas.length;
            let cantidadTotal = 0;

            filas.forEach(fila => {
                const inputCant = fila.querySelector('input[type="number"][name="cantidades[]"]');
                if (inputCant) {
                    const val = parseInt(inputCant.value) || 0;
                    cantidadTotal += val;
                }
            });

            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('cantidadTotal').textContent = cantidadTotal;
        }

        // Pequeña función para escapar texto (evita inyección al insertar nombre)
        function escapeHtml(text) {
            if (!text) return '';
            return text.replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;')
                .replaceAll("'", '&#39;');
        }
    </script>
@endsection
