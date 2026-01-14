@extends('layouts.admin')
@section('title', 'Nueva compra')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl sm:text-2xl font-semibold">Creación de la Orden de compra</h1>
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

                <div class="text-sm">
                    <p class="font-semibold text-gray-700">Importante</p>
                    <p class="text-gray-600">
                        Este formulario es solo para solicitar insumos internamente.
                        <strong class="text-blue-600">No incluye precios</strong>
                        y no es válido como orden de compra.
                        Los precios se registran posteriormente cuando se recibe la factura
                        del proveedor en el módulo de Compras.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf
        
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Informacion General</h4>
                <p class="text-muted-foreground"></p>
            </div>

            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                <div class="grid gap-4">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- País -->
                        <div class="space-y-2">
                            <label for="fecha_orden" class="text-sm font-medium">Fecha de Emisión<span
                                    class="text-red-600">*</span></label>
                            <input type="date" id="fecha_orden" name="fecha_orden"
                                value="{{ old('fecha_orden', date('Y-m-d')) }}"
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

                            <!-- ID oculto que se envía en el request -->
                            <input type="hidden" id="empleado_id" name="empleado_id" value="{{ old('empleado_id') }}">

                            <!-- Campo solo lectura mostrando el nombre elegido -->
                            <input type="text" id="empleado_nombre_visible"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary cursor-pointer transition @error('empleado_id') input-error @enderror"
                                placeholder="Seleccione un empleado" value="" readonly>

                            @error('empleado_id')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Provincia -->
                        <div class="space-y-2">
                            <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta<span
                                    class="text-red-600">*</span></label>
                            <div x-data="selectSearch({
                                options: @js([['value' => 'Secretaria de obras publicas', 'label' => 'Secretaria de Obras Publicas'], ['value' => 'Secretaria de desarrollos humanos', 'label' => 'Secretaria de Desarrollo Humano'], ['value' => 'Secretaria de gobierno', 'label' => 'Secretaria de Gobierno'], ['value' => 'Departamento ejecutivo municipal', 'label' => 'Departamento Ejecutivo Municipal']]),
                                placeholder: 'Seleccione la sub cuenta',
                                value: @js(old('sub_cuenta'))
                            })" x-init="init()" class="relative w-full">
                                <button type="button" @click="open = !open"
                                    class="select w-full h-10 rounded-md border-base-300 bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition flex items-center justify-between @error('sub_cuenta') input-error @enderror">
                                    <span x-text="selected?.label ?? placeholder" class="truncate"></span>
                                </button>

                                <div x-show="open" x-transition @click.outside="open = false"
                                    class="absolute z-50 mt-1 w-full bg-base-100 border border-base-300 rounded-md shadow">
                                    <input type="text" x-model="search"
                                        class="input w-full border-0 border-b border-base-300 bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                        placeholder="Buscar...">

                                    <ul class="max-h-60 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="select(option)"
                                                class="px-3 py-2 cursor-pointer hover:bg-primary hover:text-primary-content"
                                                x-text="option.label"></li>
                                        </template>

                                        <li x-show="filtered.length === 0" class="px-3 py-2 opacity-50">
                                            Sin resultados
                                        </li>
                                    </ul>
                                </div>

                                <select id="sub_cuenta" name="sub_cuenta" class="hidden" x-model="selectedValue"
                                    required>
                                    <option value="">Seleccione la sub cuenta</option>
                                    <option value="Secretaria de obras publicas" @selected(old('sub_cuenta') == 'Secretaria de obras publicas')>Secretaria de
                                        Obras Publicas</option>
                                    <option value="Secretaria de desarrollos humanos" @selected(old('sub_cuenta') == 'Secretaria de desarrollos humanos')>
                                        Secretaria de Desarrollo Humano</option>
                                    <option value="Secretaria de gobierno" @selected(old('sub_cuenta') == 'Secretaria de gobierno')>Secretaria de
                                        Gobierno</option>
                                    <option value="Departamento ejecutivo municipal" @selected(old('sub_cuenta') == 'Departamento ejecutivo municipal')>
                                        Departamento Ejecutivo Municipal</option>
                                </select>
                            </div>
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

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between gap-4">
                                <label class="text-sm font-medium mb-0">Proveedor <span
                                        class="text-red-600">*</span></label>
                            </div>

                            <!-- ID oculto que se envía en el request -->
                            <input type="hidden" id="proveedor_id" name="proveedor_id"
                                value="{{ old('proveedor_id') }}">

                            <!-- Campo solo lectura mostrando el nombre elegido -->
                            <input type="text" id="proveedor_nombre_visible"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary cursor-pointer transition @error('proveedor_id') input-error @enderror"
                                placeholder="Seleccione un proveedor desde el buscador" value="" readonly>

                            @error('proveedor_id')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- DESTINO TIPO -->
                        <div class="space-y-1">
                            <label class="text-sm font-medium">Destino <span class="text-red-600">*</span></label>
                            <select id="destino_tipo" name="destino_tipo"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary @error('destino_tipo') input-error @enderror transition"
                                required>
                                <option value="">Seleccione destino...</option>
                                <option value="App\Models\Deposito">Depósito</option>
                                <option value="App\Models\Obra">Obra</option>
                                <option value="App\Models\Vehiculo">Vehículo</option>
                                <option value="App\Models\Equipo">Equipo</option>
                            </select>
                            @error('destino_tipo')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- DESTINO ID -->
                        <div class="space-y-2 -mt-4">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <label class="text-sm font-medium mb-0">Elemento <span
                                        class="text-red-600">*</span></label>
                                <button type="button" id="btn_elegir_destino" class="btn btn-sm btn-warning">
                                    Buscar / seleccionar destino
                                </button>
                            </div>

                            <!-- ID oculto que se envía en el request -->
                            <input type="hidden" id="destino_id" name="destino_id" value="{{ old('destino_id') }}">

                            <!-- Campo solo lectura mostrando el nombre elegido -->
                            <input type="text" id="destino_nombre_visible"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary cursor-pointer transition @error('destino_id') input-error @enderror"
                                placeholder="Seleccione un elemento desde el buscador" value="" readonly>

                            @error('destino_id')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div> 
                    </div> 
                     <!-- CARD DATOS DEL DESTINO OCULTO  -->   
                        <div id="destino_info" class="hidden card bg-gradient-to-br from-base-100 to-base-200 shadow-xl mt-6 border border-base-300">  
                            <div class="card-body p-6">
                                <div class="flex items-center gap-3 mb-4 pb-3 border-b border-base-300">
                                    <div id="destino_info_icono" class="p-2 rounded-lg bg-primary/10">
                                        <!-- Icono dinámico -->
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg" id="destino_info_titulo">Información del Destino</h3>
                                        <p class="text-xs text-muted-foreground" id="destino_info_subtitulo">Detalles del destino seleccionado</p>
                                    </div>
                                </div>

                                <div id="destino_info_contenido" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <!-- Contenido dinámico generado por JavaScript -->
                                </div>
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
                        focus:border-primary transition @error('observacion') input-error @enderror"></textarea>
                            @error('observacion')
                                <small class="text-red-500 error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-base-100 shadow-xl rounded-xl  mt-6">
            <!-- Header -->
            <div class="px-4 sm:px-6 pt-6 pb-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <h4 class="text-lg font-semibold">Insumos</h4>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="crearProductoModal.showModal()"
                            class="btn btn-sm flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-2 rounded-md transition">
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
                            class="btn btn-sm flex items-center gap-2 bg-info-content hover:bg-info-content/50 text-white text-sm font-medium px-3 py-2 rounded-md transition">
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

                    <div id="resumenItems"
                        class="mt-4 p-4 rounded-lg hidden
                                bg-gray-50 text-gray-700
                                dark:bg-gray-800 dark:text-gray-200">
                        <p class="text-sm text-gray-400"><strong>Total de items:</strong> <span id="totalItems">0</span>
                            producto(s)</p>
                        <p class="text-sm text-gray-400 mt-1"><strong>Cantidad total:</strong> <span
                                id="cantidadTotal">0</span> unidades</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= -->
        <!-- BOTONES DEL FORMULARIO -->
        <!-- ========================= -->
        <div class="flex flex-wrap justify-end gap-2 pt-4">
            <a href="{{ route('compras.index') }}" class="btn btn-warning">
                <x-heroicon-m-arrow-left class="w-4 h-4 inline" />
                Volver
            </a>
            <button type="submit" class="btn btn-primary">
                <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" />
                Guardar compra
            </button>
        </div>
    </form>
    <!-- Modal para agregar producto -->
    <dialog id="modalAgregarItem" class="modal">
        <div class="modal-box w-11/12 max-w-5xl max-h-[85vh] overflow-y-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-lg mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                Seleccionar producto
            </h3>

            <!-- Buscador -->
            <input type="text" id="buscador_producto"
                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition mb-3"
                placeholder="Buscar por nombre, categoría, descripción...">

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Unidad</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_productos_body">
                        {{-- filas generadas por JS --}}
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="flex flex-wrap justify-center sm:justify-between items-center mt-3 gap-2 text-xs">
                    <button type="button" class="btn btn-xs" id="producto_prev_page">
                        « Anterior
                    </button>

                    <span id="producto_pagination_info" class="mx-2">
                        {{-- se completa por JS --}}
                    </span>

                    <button type="button" class="btn btn-xs" id="producto_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <form method="dialog" class="modal-backdrop">
                <button></button>
            </form>
        </div>
    </dialog>
    <!-- Modal para crear producto -->
    <dialog id="crearProductoModal" class="modal">

        <div class="modal-box max-w-xl rounded-xl max-h-[85vh] overflow-y-auto">

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

            <form id="crearProductoForm" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="accion" value="1">
                <input type="hidden" name="redirect_to" value="compras.create">

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
                    <button class="btn btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Producto
                    </button>

                    <button type="button" onclick="crearProductoModal.close()" class="btn btn-sm btn-neutral">
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

    <!-- Modal para ver detalle del producto -->
    <dialog id="modalDetalleProducto" class="modal">
        <div class="modal-box max-w-lg rounded-xl max-h-[85vh] overflow-y-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-xl flex items-center gap-3 mb-6">
                <div class="p-2 rounded-lg bg-info/10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-info">
                        <path d="m7.5 4.27 9 5.15"></path>
                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path>
                        <polyline points="3.29 7 12 12 20.71 7"></polyline>
                        <line x1="12" x2="12" y1="22" y2="12"></line>
                    </svg>
                </div>
                Detalle del Producto
            </h3>

            <div class="space-y-4">
                <!-- Nombre -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" class="text-primary">
                            <path d="M4 7V4h16v3"></path>
                            <path d="M5 20h6"></path>
                            <path d="M13 4 8 20"></path>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Nombre</span>
                    </div>
                    <p class="font-semibold text-lg" id="detalle_producto_nombre">-</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Categoría -->
                    <div class="bg-base-200 p-4 rounded-lg">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"></path>
                                <path d="M7 7h.01"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Categoría</span>
                        </div>
                        <p class="font-semibold" id="detalle_producto_categoria">-</p>
                    </div>

                    <!-- Unidad -->
                    <div class="bg-base-200 p-4 rounded-lg">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3 3v18h18"></path>
                                <rect width="4" height="7" x="7" y="10" rx="1"></rect>
                                <rect width="4" height="12" x="15" y="5" rx="1"></rect>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Unidad</span>
                        </div>
                        <p class="font-semibold" id="detalle_producto_unidad">-</p>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" class="text-primary">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" x2="8" y1="13" y2="13"></line>
                            <line x1="16" x2="8" y1="17" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Descripción</span>
                    </div>
                    <p class="text-sm" id="detalle_producto_descripcion">-</p>
                </div>

                <!-- Fecha de creación -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" class="text-primary">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                            <line x1="16" x2="16" y1="2" y2="6"></line>
                            <line x1="8" x2="8" y1="2" y2="6"></line>
                            <line x1="3" x2="21" y1="10" y2="10"></line>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Fecha registro</span>
                    </div>
                    <p class="text-sm" id="detalle_producto_fecha">-</p>
                </div>
                <p class="hidden" id="detalle_producto_id">-</p>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-sm btn-neutral">Cerrar</button>
                </form>
            </div>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>

    <!-- Modal para seleccionar proveedor -->
    <input type="checkbox" id="modal_elegir_proveedor" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-4xl max-h-[85vh] overflow-y-auto">
            <h3 class="font-bold text-lg mb-4" id="titulo_modal_proveedor">
                Seleccionar proveedor
            </h3>

            <input type="text" id="buscador_proveedor"
                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                placeholder="Buscar por nombre, razón social, CUIT...">

            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr id="tabla_proveedor_head">
                            <th>Nombre</th>
                            <th>Razón Social</th>
                            <th>CUIT</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_proveedor_body">
                        {{-- filas generadas por JS --}}
                    </tbody>
                </table>
                <div class="flex flex-wrap justify-center sm:justify-between items-center mt-3 gap-2 text-xs">
                    <button type="button" class="btn btn-xs" id="proveedor_prev_page">
                        « Anterior
                    </button>

                    <span id="proveedor_pagination_info" class="mx-2">
                        {{-- se completa por JS --}}
                    </span>

                    <button type="button" class="btn btn-xs" id="proveedor_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <div class="modal-action">
                <label for="modal_elegir_proveedor" class="btn btn-sm btn-neutral">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_proveedor">Close</label>
    </div>

    <!-- Modal para seleccionar empleado -->
    <input type="checkbox" id="modal_elegir_empleado" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-4xl max-h-[85vh] overflow-y-auto">
            <h3 class="font-bold text-lg mb-4" id="titulo_modal_empleado">
                Seleccionar empleado
            </h3>

            <input type="text" id="buscador_empleado"
                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                placeholder="Buscar por nombre, DNI, email, área...">

            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr id="tabla_empleado_head">
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Área</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_empleado_body">
                        {{-- filas generadas por JS --}}
                    </tbody>
                </table>
                <div class="flex flex-wrap justify-center sm:justify-between items-center mt-3 gap-2 text-xs">
                    <button type="button" class="btn btn-xs" id="empleado_prev_page">
                        « Anterior
                    </button>

                    <span id="empleado_pagination_info" class="mx-2">
                        {{-- se completa por JS --}}
                    </span>

                    <button type="button" class="btn btn-xs" id="empleado_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <div class="modal-action">
                <button type="button" onclick="crearEmpleadoModal.showModal()" class="btn btn-sm btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <line x1="19" x2="19" y1="8" y2="14"></line>
                        <line x1="22" x2="16" y1="11" y2="11"></line>
                    </svg>
                    Crear Empleado
                </button>
                <label for="modal_elegir_empleado" class="btn btn-sm btn-neutral">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_empleado">Close</label>
    </div>

    <!-- Modal para crear empleado -->
    <dialog id="crearEmpleadoModal" class="modal">
        <div class="modal-box max-w-2xl max-h-[85vh] overflow-y-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <line x1="19" x2="19" y1="8" y2="14"></line>
                    <line x1="22" x2="16" y1="11" y2="11"></line>
                </svg>
                Crear Nuevo Empleado
            </h3>

            <form action="{{ route('empleados.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="redirect_to" value="compras.create">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nombre -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Nombre <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" name="nombre" required
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="Nombre completo">
                    </div>

                    <!-- DNI -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">DNI <span class="text-red-600">*</span></span>
                        </label>
                        <input type="text" name="dni" required
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="DNI sin puntos">
                    </div>

                    <!-- Celular -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Celular</span>
                        </label>
                        <input type="text" name="celular"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="Número de celular">
                    </div>

                    <!-- Email -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Email</span>
                        </label>
                        <input type="email" name="email"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="correo@ejemplo.com">
                    </div>

                    <!-- Puesto -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Puesto</span>
                        </label>
                        <input type="text" name="puesto"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="Ej: Mecánico, Chofer">
                    </div>

                    <!-- Área -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Área</span>
                        </label>
                        <input type="text" name="area"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                            placeholder="Ej: Taller, Logística">
                    </div>
                </div>

                <!-- Dirección -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Dirección</span>
                    </label>
                    <input type="text" name="direccion"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                        text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                        placeholder="Dirección completa">
                </div>

                <!-- Observaciones -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Observaciones</span>
                    </label>
                    <textarea name="observaciones" rows="3"
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 
                        focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                        placeholder="Observaciones adicionales..."></textarea>
                </div>

                <!-- Botones -->
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Empleado
                    </button>
                    <button type="button" onclick="crearEmpleadoModal.close()" class="btn btn-neutral">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>

    <!-- Modal para seleccionar destino -->
    <input type="checkbox" id="modal_elegir_destino" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-4xl">
            <h3 class="font-bold text-lg mb-4" id="titulo_modal_destino">
                Seleccionar destino
            </h3>

            <input type="text" id="buscador_destino"
                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                placeholder="Buscar por nombre, patente, etc.">

            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr id="tabla_destino_head">
                            {{-- cabeceras generadas por JS --}}
                        </tr>
                    </thead>
                    <tbody id="tabla_destino_body">
                        {{-- filas generadas por JS --}}
                    </tbody>
                </table>
                <div class="flex flex-wrap justify-center sm:justify-between items-center mt-3 gap-2 text-xs">
                    <button type="button" class="btn btn-xs" id="destino_prev_page">
                        « Anterior
                    </button>

                    <span id="destino_pagination_info" class="mx-2">
                        {{-- se completa por JS --}}
                    </span>

                    <button type="button" class="btn btn-xs" id="destino_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <div class="modal-action">
                <label for="modal_elegir_destino" class="btn btn-sm btn-neutral">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_destino">Close</label>
    </div>

@endsection
@section('js')
    <!-- Script para crear producto vía AJAX -->
    <script>
        document.getElementById('crearProductoForm').addEventListener('submit', function(e) {
            e.preventDefault(); // 🚫 no recargar

            const form = this;
            const formData = new FormData(form);

            fetch("{{ url('/admin/productos/store') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(async response => {
                    let data;

                    try {
                        data = await response.json();
                    } catch (e) {
                        throw {
                            message: 'Respuesta inválida del servidor'
                        };
                    }

                    if (!response.ok) {
                        throw data;
                    }

                    return data;
                })
                .then(data => {
                    // ✅ ÉXITO
                    Swal.fire({
                        icon: 'success',
                        title: '¡Listo!',
                        text: data.mensaje,
                        timer: 2000,
                        showConfirmButton: false
                    });

                    crearProductoModal.close();
                    document.getElementById('btnNuevoProducto')?.focus();
                    form.reset();

                    
                    // opcional: actualizar select
                    // agregarProductoAlSelect(data.producto);
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        text: error.message || 'Ocurrió un error inesperado'
                    });
                });
            });
    </script>
    <!-- Fin script crear producto -->
    <script>
        // Agregar producto a la tabla
        // Colocá esto arriba de agregarProducto(), en el mismo scope global
        function escapeHtml(text) {
            if (text === null || text === undefined) return '';
            return String(text)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#39;');
        }

        // Cache de productos agregados para el modal de detalle
        let productosAgregadosCache = {};

        function agregarProducto(id, nombre, productoData = null) {
            const tabla = document.getElementById('tablaProductos');
            
            // Guardar datos del producto en cache para el modal
            if (productoData) {
                productosAgregadosCache[id] = productoData;
            }
            
            // ✅ Buscar si ya existe el producto
            const filaExistente = [...tabla.querySelectorAll('tr')].find(fila => {
                const inputHidden = fila.querySelector('input[type="hidden"][name="productos[]"]');
                return inputHidden && inputHidden.value == id;
            });

            // ✅ Si ya existe: aumentar cantidad
            if (filaExistente) {
                const inputCant = filaExistente.querySelector('input[type="number"][name="cantidades[]"]');
                inputCant.value = parseInt(inputCant.value) + 1;

                // pequeño efecto visual
                filaExistente.classList.add("bg-green-100");
                setTimeout(() => filaExistente.classList.remove("bg-green-100"), 300);

                actualizarTotales();
                return; // ✅ NO crear nueva fila
            }

            // ✅ Si NO existe crear la fila con TUS ESTILOS
            const fila = document.createElement('tr');
            fila.setAttribute('data-slot', 'table-row');
            fila.className = 'hover:bg-muted/50 transition-colors';

            fila.innerHTML = `
                <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                 <div class="flex items-center gap-1">
                    <button type="button" class="btn btn-ghost btn-sm text-info" title="Ver detalle"
                            onclick="verDetalleProducto(${id})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    <div class="flex flex-col">
                        <span class="font-medium text-sm truncate">${escapeHtml(nombre)}</span>
                        <input type="hidden" name="productos[]" value="${id}">
                    </div> 
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
                <div class="flex items-center gap-1">
                    <button type="button" class="btn btn-ghost btn-sm text-red-600" title="Eliminar"
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
                </div>
                </td>
            `;

            tabla.appendChild(fila);

            // ✅ Mostrar tabla y resumen
            document.getElementById('tablaItems').classList.remove('hidden');
            document.getElementById('mensajeVacio').classList.add('hidden');
            document.getElementById('resumenItems').classList.remove('hidden');

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

        // Función para ver detalle del producto (desde la tabla de insumos agregados)
        function verDetalleProducto(id) {
            const producto = productosAgregadosCache[id];
            
            if (!producto) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sin información',
                    text: 'No se encontró información detallada del producto.'
                });
                return;
            }

            verDetalleProductoModal(producto);
        }

        // Función para ver detalle del producto (recibe el objeto producto directamente)
        function verDetalleProductoModal(producto) {
            if (!producto) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sin información',
                    text: 'No se encontró información detallada del producto.'
                });
                return;
            }

            const categoriaNombre = producto.categoria ? producto.categoria.nombre : '-';
            
            // Actualizar contenido del modal
            document.getElementById('detalle_producto_nombre').textContent = producto.nombre || '-';
            document.getElementById('detalle_producto_categoria').textContent = categoriaNombre;
            document.getElementById('detalle_producto_descripcion').textContent = producto.descripcion || '-';
            document.getElementById('detalle_producto_unidad').textContent = producto.unidad || '-';
            document.getElementById('detalle_producto_id').textContent = producto.id || '-';
            
            // Mostrar fecha de creación si existe
            const fechaCreacion = producto.created_at ? new Date(producto.created_at).toLocaleDateString('es-AR') : '-';
            document.getElementById('detalle_producto_fecha').textContent = fechaCreacion;
            
            // Abrir modal
            document.getElementById('modalDetalleProducto').showModal();
        }
    </script>

    <script>
        // ==============================
        //  MODAL DE SELECCIÓN DE PROVEEDOR
        // ==============================
        document.addEventListener("DOMContentLoaded", function() {
            const proveedoresData = @json($proveedores);
            let proveedoresCache = proveedoresData;
            let paginaProveedor = 1;
            const itemsPorPaginaProveedor = 5;

            const tablaProveedorBody = document.getElementById('tabla_proveedor_body');
            const proveedorPrev = document.getElementById('proveedor_prev_page');
            const proveedorNext = document.getElementById('proveedor_next_page');
            const proveedorInfo = document.getElementById('proveedor_pagination_info');
            const buscadorProveedor = document.getElementById('buscador_proveedor');
            const btnElegirProveedor = document.getElementById('btn_elegir_proveedor');
            const proveedorInput = document.getElementById('proveedor_id');
            const proveedorNombreVisible = document.getElementById('proveedor_nombre_visible');

            function formatearCelda(valor) {
                if (valor === null || valor === undefined || valor === '') return '-';
                return String(valor);
            }

            function renderTablaProveedor(data) {
                if (!tablaProveedorBody) return;

                tablaProveedorBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaProveedorBody.innerHTML =
                        `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="4">No se encontraron proveedores.</td></tr>`;
                    if (proveedorInfo) proveedorInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaProveedor);
                if (paginaProveedor > totalPaginas) paginaProveedor = totalPaginas;
                if (paginaProveedor < 1) paginaProveedor = 1;

                const inicio = (paginaProveedor - 1) * itemsPorPaginaProveedor;
                const fin = inicio + itemsPorPaginaProveedor;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(proveedor => {
                    const tr = document.createElement('tr');
                    tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                    tr.innerHTML = `
                <td>${formatearCelda(proveedor.nombre)}</td>
                <td>${formatearCelda(proveedor.razon_social)}</td>
                <td>${formatearCelda(proveedor.cuit)}</td>
                <td>${formatearCelda(proveedor.telefono)}</td>
            `;

                    tr.addEventListener('click', function() {
                        if (!proveedorInput) return;

                        proveedorInput.value = proveedor.id;

                        if (proveedorNombreVisible) {
                            const texto =
                                `${proveedor.nombre || ''} - ${proveedor.razon_social || ''}`;
                            proveedorNombreVisible.value = texto.trim();
                        }

                        const modalCheckbox = document.getElementById('modal_elegir_proveedor');
                        if (modalCheckbox) modalCheckbox.checked = false;
                    });

                    tablaProveedorBody.appendChild(tr);
                });

                if (proveedorInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    proveedorInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            function abrirModalProveedor() {
                const modalCheckbox = document.getElementById('modal_elegir_proveedor');
                if (modalCheckbox) modalCheckbox.checked = true;
                paginaProveedor = 1;
                renderTablaProveedor(proveedoresCache);
                if (buscadorProveedor) buscadorProveedor.value = '';
            }

            if (btnElegirProveedor) {
                btnElegirProveedor.addEventListener('click', function() {
                    abrirModalProveedor();
                });
            }

            if (proveedorNombreVisible) {
                proveedorNombreVisible.addEventListener('click', function() {
                    abrirModalProveedor();
                });
                proveedorNombreVisible.addEventListener('focus', function() {
                    abrirModalProveedor();
                });
            }

            if (buscadorProveedor) {
                buscadorProveedor.addEventListener('input', function() {
                    const term = this.value.toLowerCase();
                    const filtrados = proveedoresData.filter(proveedor => {
                        const texto =
                            `${proveedor.nombre || ''} ${proveedor.razon_social || ''} ${proveedor.cuit || ''} ${proveedor.telefono || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    });
                    paginaProveedor = 1;
                    renderTablaProveedor(filtrados);
                });
            }

            if (proveedorPrev) {
                proveedorPrev.addEventListener('click', function() {
                    if (paginaProveedor > 1) {
                        paginaProveedor--;
                        const term = buscadorProveedor ? buscadorProveedor.value.toLowerCase() : '';
                        const filtrados = term ? proveedoresData.filter(p => {
                            const texto =
                                `${p.nombre || ''} ${p.razon_social || ''} ${p.cuit || ''} ${p.telefono || ''}`
                                .toLowerCase();
                            return texto.includes(term);
                        }) : proveedoresCache;
                        renderTablaProveedor(filtrados);
                    }
                });
            }

            if (proveedorNext) {
                proveedorNext.addEventListener('click', function() {
                    const term = buscadorProveedor ? buscadorProveedor.value.toLowerCase() : '';
                    const filtrados = term ? proveedoresData.filter(p => {
                        const texto =
                            `${p.nombre || ''} ${p.razon_social || ''} ${p.cuit || ''} ${p.telefono || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    }) : proveedoresCache;
                    const totalPaginas = Math.ceil(filtrados.length / itemsPorPaginaProveedor);
                    if (paginaProveedor < totalPaginas) {
                        paginaProveedor++;
                        renderTablaProveedor(filtrados);
                    }
                });
            }
        });
    </script>

    <script>
        // ==============================
        //  MODAL DE SELECCIÓN DE EMPLEADO
        // ==============================
        document.addEventListener("DOMContentLoaded", function() {
            const empleadosData = @json($empleados);
            let empleadosCache = empleadosData;
            let paginaEmpleado = 1;
            const itemsPorPaginaEmpleado = 5;

            const tablaEmpleadoBody = document.getElementById('tabla_empleado_body');
            const empleadoPrev = document.getElementById('empleado_prev_page');
            const empleadoNext = document.getElementById('empleado_next_page');
            const empleadoInfo = document.getElementById('empleado_pagination_info');
            const buscadorEmpleado = document.getElementById('buscador_empleado');
            const empleadoInput = document.getElementById('empleado_id');
            const empleadoNombreVisible = document.getElementById('empleado_nombre_visible');

            function formatearCelda(valor) {
                if (valor === null || valor === undefined || valor === '') return '-';
                return String(valor);
            }

            function renderTablaEmpleado(data) {
                if (!tablaEmpleadoBody) return;

                tablaEmpleadoBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaEmpleadoBody.innerHTML =
                        `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="5">No se encontraron empleados.</td></tr>`;
                    if (empleadoInfo) empleadoInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaEmpleado);
                if (paginaEmpleado > totalPaginas) paginaEmpleado = totalPaginas;
                if (paginaEmpleado < 1) paginaEmpleado = 1;

                const inicio = (paginaEmpleado - 1) * itemsPorPaginaEmpleado;
                const fin = inicio + itemsPorPaginaEmpleado;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(empleado => {
                    const tr = document.createElement('tr');
                    tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                    tr.innerHTML = `
                <td>${formatearCelda(empleado.nombre)}</td>
                <td>${formatearCelda(empleado.dni)}</td>
                <td>${formatearCelda(empleado.celular)}</td>
                <td>${formatearCelda(empleado.email)}</td>
                <td>${formatearCelda(empleado.area)}</td>
            `;

                    tr.addEventListener('click', function(e) {
                        if (!empleadoInput) return;

                        empleadoInput.value = empleado.id;

                        if (empleadoNombreVisible) {
                            const texto = `${empleado.nombre || ''} - ${empleado.dni || ''}`;
                            empleadoNombreVisible.value = texto.trim();
                        }

                        const modalCheckbox = document.getElementById('modal_elegir_empleado');
                        if (modalCheckbox) modalCheckbox.checked = false;
                    });

                    tablaEmpleadoBody.appendChild(tr);
                });

                if (empleadoInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    empleadoInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            function abrirModalEmpleado() {
                const modalCheckbox = document.getElementById('modal_elegir_empleado');
                if (modalCheckbox) modalCheckbox.checked = true;
                paginaEmpleado = 1;
                renderTablaEmpleado(empleadosCache);
                if (buscadorEmpleado) buscadorEmpleado.value = '';
            }

            if (empleadoNombreVisible) {
                empleadoNombreVisible.addEventListener('click', function() {
                    abrirModalEmpleado();
                });
                empleadoNombreVisible.addEventListener('focus', function() {
                    abrirModalEmpleado();
                });
            }

            if (buscadorEmpleado) {
                buscadorEmpleado.addEventListener('input', function() {
                    const term = this.value.toLowerCase();
                    const filtrados = empleadosData.filter(empleado => {
                        const texto =
                            `${empleado.nombre || ''} ${empleado.dni || ''} ${empleado.celular || ''} ${empleado.email || ''} ${empleado.area || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    });
                    paginaEmpleado = 1;
                    renderTablaEmpleado(filtrados);
                });
            }

            if (empleadoPrev) {
                empleadoPrev.addEventListener('click', function() {
                    if (paginaEmpleado > 1) {
                        paginaEmpleado--;
                        const term = buscadorEmpleado ? buscadorEmpleado.value.toLowerCase() : '';
                        const filtrados = term ? empleadosData.filter(e => {
                            const texto =
                                `${e.nombre || ''} ${e.dni || ''} ${e.celular || ''} ${e.email || ''} ${e.area || ''}`
                                .toLowerCase();
                            return texto.includes(term);
                        }) : empleadosCache;
                        renderTablaEmpleado(filtrados);
                    }
                });
            }

            if (empleadoNext) {
                empleadoNext.addEventListener('click', function() {
                    const term = buscadorEmpleado ? buscadorEmpleado.value.toLowerCase() : '';
                    const filtrados = term ? empleadosData.filter(e => {
                        const texto =
                            `${e.nombre || ''} ${e.dni || ''} ${e.celular || ''} ${e.email || ''} ${e.area || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    }) : empleadosCache;
                    const totalPaginas = Math.ceil(filtrados.length / itemsPorPaginaEmpleado);
                    if (paginaEmpleado < totalPaginas) {
                        paginaEmpleado++;
                        renderTablaEmpleado(filtrados);
                    }
                });
            }
        });
    </script>

    <script>
        // ==============================
        //  MODAL DE SELECCIÓN DE DESTINO
        // ==============================
        document.addEventListener("DOMContentLoaded", function() {

            const baseUrlListar = "{{ url('origen/listar') }}";

            const destinoTipoSelect = document.getElementById("destino_tipo");
            const destinoInput = document.getElementById("destino_id");
            const destinoNombreVisible = document.getElementById("destino_nombre_visible");

            // DESTINO (cache y elementos del modal)
            let destinosCache = [];
            let columnasDestino = [];
            let paginaDestino = 1;
            const itemsPorPaginaDestino = 5;

            // Cache por tipo para que el modal abra instantáneo
            const destinoCachePorTipo = {};
            const destinoPrefetchEnCursoPorTipo = {};

            const tablaDestinoHead = document.getElementById('tabla_destino_head');
            const tablaDestinoBody = document.getElementById('tabla_destino_body');
            const destinoPrev = document.getElementById('destino_prev_page');
            const destinoNext = document.getElementById('destino_next_page');
            const destinoInfo = document.getElementById('destino_pagination_info');
            const buscadorDestino = document.getElementById('buscador_destino');
            const btnElegirDestino = document.getElementById('btn_elegir_destino');
            const tituloModalDestino = document.getElementById('titulo_modal_destino');

            function formatearCelda(valor) {
                if (valor === null || valor === undefined || valor === '') return '-';
                return String(valor);
            }

            function esParteVisibleValida(valor) {
                return !(valor === null || valor === undefined || valor === '');
            }

            function tipoShortDesdeClase(clase) {
                if (!clase) return null;
                if (clase.includes('Obra')) return 'obra';
                if (clase.includes('Deposito')) return 'deposito';
                if (clase.includes('Equipo')) return 'equipo';
                if (clase.includes('Vehiculo')) return 'vehiculo';
                return null;
            }

            function prefetchListado(tipoShort, cachePorTipo, prefetchEnCursoPorTipo, onOk) {
                if (!tipoShort) return null;

                if (cachePorTipo[tipoShort]) {
                    if (typeof onOk === 'function') onOk(cachePorTipo[tipoShort]);
                    return Promise.resolve(cachePorTipo[tipoShort]);
                }

                if (prefetchEnCursoPorTipo && prefetchEnCursoPorTipo[tipoShort]) {
                    const p = prefetchEnCursoPorTipo[tipoShort];
                    if (typeof onOk === 'function') p.then(onOk).catch(() => {});
                    return p;
                }

                const p = fetch(`${baseUrlListar}/${tipoShort}`)
                    .then(res => res.json())
                    .then(data => {
                        const lista = Array.isArray(data) ? data : [];
                        cachePorTipo[tipoShort] = lista;
                        return lista;
                    })
                    .catch(() => {
                        return [];
                    })
                    .finally(() => {
                        if (prefetchEnCursoPorTipo) delete prefetchEnCursoPorTipo[tipoShort];
                    });

                if (prefetchEnCursoPorTipo) prefetchEnCursoPorTipo[tipoShort] = p;
                if (typeof onOk === 'function') p.then(onOk).catch(() => {});
                return p;
            }

            function configurarColumnasDestino(tipoShort) {
                if (tipoShort === 'vehiculo') {
                    columnasDestino = [{
                            key: 'patente',
                            label: 'Patente'
                        },
                        {
                            key: 'marca',
                            label: 'Marca'
                        },
                        {
                            key: 'modelo',
                            label: 'Modelo'
                        },
                        {
                            key: 'anio',
                            label: 'Año'
                        },
                        {
                            key: 'color',
                            label: 'Color'
                        },
                        {
                            key: 'tipo',
                            label: 'Tipo'
                        },
                        {
                            key: 'catalogacion',
                            label: 'Catalogación'
                        }
                    ];
                    tituloModalDestino.textContent = 'Seleccionar vehículo destino';
                } else if (tipoShort === 'obra') {
                    columnasDestino = [{
                            key: 'nombre',
                            label: 'Nombre'
                        },
                        {
                            key: 'direccion',
                            label: 'Dirección'
                        },
                        {
                            key: 'barrio',
                            label: 'Barrio'
                        },
                        {
                            key: 'responsable',
                            label: 'Responsable'
                        },
                        {
                            key: 'ejecutado_por',
                            label: 'Ejecutado por'
                        },
                        {
                            key: 'estado_obra',
                            label: 'Estado'
                        },
                    ];
                    tituloModalDestino.textContent = 'Seleccionar obra destino';
                } else if (tipoShort === 'deposito') {
                    columnasDestino = [{
                        key: 'nombre',
                        label: 'Depósito'
                    }];
                    tituloModalDestino.textContent = 'Seleccionar depósito destino';
                } else if (tipoShort === 'equipo') {
                    columnasDestino = [{
                            key: 'equipamiento',
                            label: 'Equipamiento'
                        },
                        {
                            key: 'marca',
                            label: 'Marca'
                        },
                        {
                            key: 'descripcion',
                            label: 'Descripción'
                        },
                        {
                            key: 'area_nombre',
                            label: 'Área'
                        },
                        {
                            key: 'catalogacion',
                            label: 'Catalogación'
                        },
                    ];
                    tituloModalDestino.textContent = 'Seleccionar equipo destino';
                } else {
                    columnasDestino = [{
                        key: 'nombre',
                        label: 'Nombre'
                    }];
                    tituloModalDestino.textContent = 'Seleccionar destino';
                }

                if (tablaDestinoHead) {
                    tablaDestinoHead.innerHTML = columnasDestino
                        .map(col => `<th>${col.label}</th>`)
                        .join('');
                }
            }

            function renderTablaDestino(data) {
                if (!tablaDestinoBody) return;

                tablaDestinoBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaDestinoBody.innerHTML =
                        `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="${columnasDestino.length || 1}">No se encontraron elementos.</td></tr>`;
                    if (destinoInfo) destinoInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaDestino);
                if (paginaDestino > totalPaginas) paginaDestino = totalPaginas;
                if (paginaDestino < 1) paginaDestino = 1;

                const inicio = (paginaDestino - 1) * itemsPorPaginaDestino;
                const fin = inicio + itemsPorPaginaDestino;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(dest => {
                    const tr = document.createElement('tr');
                    tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                    tr.innerHTML = columnasDestino
                        .map(col => `<td>${formatearCelda(dest[col.key])}</td>`)
                        .join('');

                    tr.addEventListener('click', function() {
                        if (!destinoInput) return;

                        destinoInput.value = dest.id;

                        if (destinoNombreVisible) {
                            const texto = columnasDestino
                                .map(col => dest[col.key])
                                .filter(esParteVisibleValida)
                                .map(v => String(v))
                                .join(' - ');
                            destinoNombreVisible.value = texto || (dest.nombre ??
                                'Elemento seleccionado');
                        }

                        // Mostrar información del destino seleccionado
                        const tipoSeleccionado = destinoTipoSelect ? destinoTipoSelect.value : null;
                        const tipoShort = tipoShortDesdeClase(tipoSeleccionado);
                        if (tipoShort && typeof mostrarInfoDestino === 'function') {
                            mostrarInfoDestino(dest, tipoShort);
                        }

                        const modalCheckbox = document.getElementById('modal_elegir_destino');
                        if (modalCheckbox) modalCheckbox.checked = false;
                    });

                    tablaDestinoBody.appendChild(tr);
                });

                if (destinoInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    destinoInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            function cargarDestinosEnTabla() {
                if (!tablaDestinoBody || !tablaDestinoHead) return;

                const clase = destinoTipoSelect ? destinoTipoSelect.value : null;
                const tipoShort = tipoShortDesdeClase(clase);

                if (!clase || !tipoShort) {
                    columnasDestino = [];
                    tablaDestinoHead.innerHTML = '';
                    tablaDestinoBody.innerHTML =
                        '<tr><td class="py-4 text-center text-sm text-gray-500">Primero seleccione un tipo de destino.</td></tr>';
                    if (destinoInfo) destinoInfo.textContent = '';
                    return;
                }

                configurarColumnasDestino(tipoShort);

                // Si ya está en cache, renderizar instantáneo
                if (destinoCachePorTipo[tipoShort]) {
                    destinosCache = destinoCachePorTipo[tipoShort];
                    paginaDestino = 1;
                    renderTablaDestino(destinosCache);
                    return;
                }

                tablaDestinoBody.innerHTML =
                    `<tr><td class="py-4 text-center text-sm" colspan="${columnasDestino.length}">Cargando...</td></tr>`;

                prefetchListado(tipoShort, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo)
                    .then(lista => {
                        destinosCache = lista;
                        paginaDestino = 1;
                        renderTablaDestino(destinosCache);
                    })
                    .catch(err => {
                        console.error('Error en fetch DESTINO:', err);
                        tablaDestinoBody.innerHTML =
                            `<tr><td class="py-4 text-center text-sm text-red-500" colspan="${columnasDestino.length}">Error al cargar los elementos.</td></tr>`;
                        if (destinoInfo) destinoInfo.textContent = '';
                    });
            }

            function abrirModalDestino() {
                const modalCheckbox = document.getElementById('modal_elegir_destino');
                if (modalCheckbox) modalCheckbox.checked = true;
                cargarDestinosEnTabla();
                if (buscadorDestino) buscadorDestino.value = '';
            }

            if (btnElegirDestino) {
                btnElegirDestino.addEventListener('click', function() {
                    abrirModalDestino();
                });
            }

            if (destinoNombreVisible) {
                destinoNombreVisible.addEventListener('click', function() {
                    abrirModalDestino();
                });
                destinoNombreVisible.addEventListener('focus', function() {
                    abrirModalDestino();
                });
            }

            if (buscadorDestino) {
                buscadorDestino.addEventListener('input', function() {
                    const term = this.value.toLowerCase();
                    const filtrados = destinosCache.filter(dest => {
                        const texto = Object.values(dest).join(' ').toLowerCase();
                        return texto.includes(term);
                    });
                    paginaDestino = 1;
                    renderTablaDestino(filtrados);
                });
            }

            if (destinoPrev) {
                destinoPrev.addEventListener('click', function() {
                    if (paginaDestino > 1) {
                        paginaDestino--;
                        const term = buscadorDestino ? buscadorDestino.value.toLowerCase() : '';
                        const filtrados = term ? destinosCache.filter(dest => {
                            const texto = Object.values(dest).join(' ').toLowerCase();
                            return texto.includes(term);
                        }) : destinosCache;
                        renderTablaDestino(filtrados);
                    }
                });
            }

            if (destinoNext) {
                destinoNext.addEventListener('click', function() {
                    const term = buscadorDestino ? buscadorDestino.value.toLowerCase() : '';
                    const filtrados = term ? destinosCache.filter(dest => {
                        const texto = Object.values(dest).join(' ').toLowerCase();
                        return texto.includes(term);
                    }) : destinosCache;
                    const totalPaginas = Math.ceil(filtrados.length / itemsPorPaginaDestino);
                    if (paginaDestino < totalPaginas) {
                        paginaDestino++;
                        renderTablaDestino(filtrados);
                    }
                });
            }

            destinoTipoSelect?.addEventListener('change', function() {
                const tipo = this.value;
                const tipoShort = tipoShortDesdeClase(tipo);
                prefetchListado(tipoShort, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo);

                if (destinoInput) destinoInput.value = '';
                if (destinoNombreVisible) {
                    destinoNombreVisible.value = '';
                    destinoNombreVisible.placeholder = 'Seleccione un elemento desde el buscador';
                }
            });

            const tipoDestinoInicial = tipoShortDesdeClase(destinoTipoSelect ? destinoTipoSelect.value : null);
            prefetchListado(tipoDestinoInicial, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo);
        });
    </script>

    <script>
        // ==============================
        //  MODAL DE SELECCIÓN DE PRODUCTOS
        // ==============================
        document.addEventListener("DOMContentLoaded", function() {

            let productosCache = [];
            let productosData = [];

            let paginaProducto = 1;
            const itemsPorPaginaProducto = 5;

            const tablaProductosBody = document.getElementById('tabla_productos_body');
            const productoPrev = document.getElementById('producto_prev_page');
            const productoNext = document.getElementById('producto_next_page');
            const productoInfo = document.getElementById('producto_pagination_info');
            const buscadorProducto = document.getElementById('buscador_producto');

            function cargarProductosAjax() {
                fetch("{{ route('productos.ajax.listar') }}", {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        productosCache = data;
                        productosData = data;
                        paginaProducto = 1;
                        renderTablaProductos(productosCache);
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudieron cargar los productos'
                        });
                    });
            }


            function formatearCelda(valor) {
                if (valor === null || valor === undefined || valor === '') return '-';
                return String(valor);
            }

            function renderTablaProductos(data) {
                if (!tablaProductosBody) return;

                tablaProductosBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaProductosBody.innerHTML =
                        `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="5">No se encontraron productos.</td></tr>`;
                    if (productoInfo) productoInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaProducto);
                if (paginaProducto > totalPaginas) paginaProducto = totalPaginas;
                if (paginaProducto < 1) paginaProducto = 1;

                const inicio = (paginaProducto - 1) * itemsPorPaginaProducto;
                const fin = inicio + itemsPorPaginaProducto;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(producto => {
                    const tr = document.createElement('tr');
                    tr.classList.add('hover:bg-base-300');

                    const categoriaNombre = producto.categoria ? producto.categoria.nombre : '-';
                    
                    // Serializar producto para pasarlo a la función
                    const productoJSON = JSON.stringify(producto).replace(/'/g, "\\'").replace(/"/g, '&quot;');

                    tr.innerHTML = `
                <td class="text-center">${formatearCelda(categoriaNombre)}</td>
                <td class="text-center">${formatearCelda(producto.nombre)}</td>
                <td class="text-center">${formatearCelda(producto.descripcion)}</td>
                <td class="text-center">${formatearCelda(producto.unidad)}</td>
                <td class="text-center">
                    <div class="flex items-center justify-center gap-1">
                        <button type="button" class="btn btn-ghost btn-sm text-info btn-ver-detalle" 
                            title="Ver detalle"
                            data-producto-json="${productoJSON}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm btn-agregar-producto" 
                            data-producto-id="${producto.id}"
                            data-producto-json="${productoJSON}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Agregar
                        </button>
                    </div>
                </td>
            `;
                    
                    // Agregar evento click al botón de ver detalle
                    const btnVerDetalle = tr.querySelector('.btn-ver-detalle');
                    btnVerDetalle.addEventListener('click', function() {
                        const productoData = JSON.parse(this.dataset.productoJson.replace(/&quot;/g, '"'));
                        verDetalleProductoModal(productoData);
                    });

                    // Agregar evento click al botón de agregar
                    const btnAgregar = tr.querySelector('.btn-agregar-producto');
                    btnAgregar.addEventListener('click', function() {
                        const productoData = JSON.parse(this.dataset.productoJson.replace(/&quot;/g, '"'));
                        agregarProducto(producto.id, producto.nombre, productoData);
                    });

                    tablaProductosBody.appendChild(tr);
                });

                if (productoInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    productoInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            if (buscadorProducto) {
                buscadorProducto.addEventListener('input', function() {
                    const term = this.value.toLowerCase();
                    const filtrados = productosData.filter(producto => {
                        const categoriaNombre = producto.categoria ? producto.categoria.nombre : '';
                        const texto =
                            `${producto.nombre || ''} ${categoriaNombre} ${producto.descripcion || ''} ${producto.unidad || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    });
                    paginaProducto = 1;
                    renderTablaProductos(filtrados);
                });
            }

            if (productoPrev) {
                productoPrev.addEventListener('click', function() {
                    if (paginaProducto > 1) {
                        paginaProducto--;
                        const term = buscadorProducto ? buscadorProducto.value.toLowerCase() : '';
                        const filtrados = term ? productosData.filter(p => {
                            const categoriaNombre = p.categoria ? p.categoria.nombre : '';
                            const texto =
                                `${p.nombre || ''} ${categoriaNombre} ${p.descripcion || ''} ${p.unidad || ''}`
                                .toLowerCase();
                            return texto.includes(term);
                        }) : productosCache;
                        renderTablaProductos(filtrados);
                    }
                });
            }

            if (productoNext) {
                productoNext.addEventListener('click', function() {
                    const term = buscadorProducto ? buscadorProducto.value.toLowerCase() : '';
                    const filtrados = term ? productosData.filter(p => {
                        const categoriaNombre = p.categoria ? p.categoria.nombre : '';
                        const texto =
                            `${p.nombre || ''} ${categoriaNombre} ${p.descripcion || ''} ${p.unidad || ''}`
                            .toLowerCase();
                        return texto.includes(term);
                    }) : productosCache;
                    const totalPaginas = Math.ceil(filtrados.length / itemsPorPaginaProducto);
                    if (paginaProducto < totalPaginas) {
                        paginaProducto++;
                        renderTablaProductos(filtrados);
                    }
                });
            }

            // Renderizar inicial cuando se abre el modal
            const modalAgregarItem = document.getElementById('modalAgregarItem');
            if (modalAgregarItem) {
                // Observar cuando el modal se abre
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'open' && modalAgregarItem.open) {
                            paginaProducto = 1;
                            if (buscadorProducto) buscadorProducto.value = '';
                            cargarProductosAjax();
                        }
                    });
                });

                observer.observe(modalAgregarItem, {
                    attributes: true,
                    attributeFilter: ['open']
                });
            }

            // También agregar listener al botón que abre el modal
            const btnAbrirModal = document.querySelector('button[onclick*="modalAgregarItem.showModal"]');
            if (btnAbrirModal) {
                btnAbrirModal.addEventListener('click', function() {
                    setTimeout(() => {
                        paginaProducto = 1;
                        if (buscadorProducto) buscadorProducto.value = '';
                        cargarProductosAjax();
                    }, 50);
                });
            }
        });

        // Función para mostrar información del destino
        function mostrarInfoDestino(dest, tipo) {
            const infoCard = document.getElementById('destino_info');
            const infoTitulo = document.getElementById('destino_info_titulo');
            const infoSubtitulo = document.getElementById('destino_info_subtitulo');
            const infoIcono = document.getElementById('destino_info_icono');
            const infoContenido = document.getElementById('destino_info_contenido');

            if (!dest || !tipo) {
                infoCard.classList.add('hidden');
                return;
            }

            let htmlContent = '';
            let titulo = '';
            let subtitulo = '';
            let icono = '';

            if (tipo === 'vehiculo') {
                titulo = 'Información del Vehículo';
                subtitulo = 'Datos del vehículo seleccionado como destino';
                icono = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round" class="text-primary">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <path d="M9 17h6"></path>
                        <circle cx="17" cy="17" r="2"></circle>
                    </svg>
                `;
                htmlContent = `
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <rect width="18" height="12" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="2" x2="22" y1="20" y2="20"></line>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Patente</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.patente || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Marca/Modelo</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.marca || '-'} ${dest.modelo || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Año</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.anio || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3 3v18h18"></path>
                                <path d="m19 9-5 5-4-4-3 3"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Tipo</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.tipo || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                                <path d="M8.5 8.5v.01"></path>
                                <path d="M16 15.5v.01"></path>
                                <path d="M12 12v.01"></path>
                                <path d="M11 17v.01"></path>
                                <path d="M7 14v.01"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Color</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.color || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Catalogación</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.catalogacion || '-'}</p>
                    </div>
                `;
            } else if (tipo === 'equipo') {
                titulo = 'Información del Equipo';
                subtitulo = 'Datos del equipo seleccionado como destino';
                icono = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round" class="text-primary">
                        <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"></path>
                        <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"></path>
                        <path d="M12 3v6"></path>
                    </svg>
                `;
                htmlContent = `
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"></path>
                                <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Equipamiento</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.equipamiento || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Marca</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.marca || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M4 7V4h16v3"></path>
                                <path d="M5 20h6"></path>
                                <path d="M13 4 8 20"></path>
                                <path d="m15 15 5 5"></path>
                                <path d="m20 15-5 5"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Descripción</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.descripcion || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Catalogación</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.catalogacion || '-'}</p>
                    </div>
                `;
            } else if (tipo === 'obra') {
                titulo = 'Información de la Obra';
                subtitulo = 'Datos de la obra seleccionada como destino';
                icono = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round" class="text-primary">
                        <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                        <path d="M9 22v-4h6v4"></path>
                        <path d="M8 6h.01"></path>
                        <path d="M16 6h.01"></path>
                        <path d="M12 6h.01"></path>
                        <path d="M12 10h.01"></path>
                        <path d="M12 14h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M16 14h.01"></path>
                        <path d="M8 10h.01"></path>
                        <path d="M8 14h.01"></path>
                    </svg>
                `;
                htmlContent = `
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M4 7V4h16v3"></path>
                                <path d="M5 20h6"></path>
                                <path d="M13 4 8 20"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Nombre</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.nombre || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Dirección</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.direccion || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Barrio</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.barrio || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Responsable</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.responsable || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Ejecutado por</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.ejecutado_por || '-'}</p>
                    </div>
                `;
            } else if (tipo === 'deposito') {
                titulo = 'Información del Depósito';
                subtitulo = 'Datos del depósito seleccionado como destino';
                icono = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round" class="text-primary">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                `;
                htmlContent = `
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M4 7V4h16v3"></path>
                                <path d="M5 20h6"></path>
                                <path d="M13 4 8 20"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Nombre</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.nombre || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Dirección</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.direccion || '-'}</p>
                    </div>
                    <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium">Responsable</span>
                        </div>
                        <p class="font-semibold text-sm">${dest.responsable || '-'}</p>
                    </div>
                `;
            }

            // Actualizar contenido
            infoTitulo.textContent = titulo;
            infoSubtitulo.textContent = subtitulo;
            infoIcono.innerHTML = icono;
            infoContenido.innerHTML = htmlContent;

            // Mostrar la card
            infoCard.classList.remove('hidden');
        }
    </script>

@endsection
