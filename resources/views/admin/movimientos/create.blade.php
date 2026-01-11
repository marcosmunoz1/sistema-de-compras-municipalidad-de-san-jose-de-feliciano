@extends('layouts.admin')
@section('title', 'Registrar Movimiento') 

@section('content')
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Registrar Movimiento</h1>
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
                    Nuevo Movimiento
                </span>
            </li>
        </ul>
    </div>

    <!-- Formulario -->
    <form action="{{ route('movimientos.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="card bg-base-100 shadow-xl p-6">

            <h2 class="text-lg font-semibold mb-4">Datos del Movimiento</h2>

            <div class="space-y-6">

                <!-- FILA 1: ORIGEN -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    <!-- ORIGEN TIPO -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Origen <span class="text-red-600">*</span></label>
                        <select id="origen_tipo" name="origen_tipo"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('origen_tipo') input-error @enderror transition" required>
                            <option value="">Seleccione origen...</option>  
                            <option value="App\Models\Obra">Obra</option>  
                            <option value="App\Models\Deposito">Depósito</option> 
                            <option value="App\Models\Vehiculo">Vehículo</option> 
                            <option value="App\Models\Equipo">Equipo</option>
                        </select>
                        @error('origen_tipo')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- ORIGEN ID -->
                    <div class="space-y-2 -mt-4">
                        <div class="flex items-center justify-between gap-4">
                            <label class="text-sm font-medium mb-0">Elemento <span class="text-red-600">*</span></label>
                            <button type="button" id="btn_elegir_origen" class="btn btn-sm btn-warning">
                                Buscar / seleccionar elemento
                            </button>
                        </div>

                        <!-- ID oculto que se envía en el request -->
                        <input type="hidden" id="origen_id" name="origen_id" value="{{ old('origen_id') }}">

                        <!-- Campo solo lectura mostrando el nombre elegido -->
                        <input type="text" id="origen_nombre_visible"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary cursor-pointer transition @error('origen_id') input-error @enderror"
                            placeholder="Seleccione un elemento desde el buscador"
                            value=""
                            readonly>

                        @error('origen_id') 
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TIPO DE MOVIMIENTO -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Tipo de movimiento <span class="text-red-600">*</span></label>
                        <select id="tipo" name="tipo"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary @error('tipo') input-error @enderror transition" required>
                            <option value="">Seleccione tipo...</option>
                            <option value="consumo">Consumo</option>
                            <option value="transferencia">Transferencia</option>
                        </select>
                        @error('tipo')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FILA 2: DESTINO -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    <!-- DESTINO TIPO -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Destino <span class="text-red-600">*</span></label>
                        <select id="destino_tipo" name="destino_tipo" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary @error('destino_tipo') input-error @enderror transition" required>
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
                        <div class="flex items-center justify-between gap-4">
                            <label class="text-sm font-medium mb-0">Elemento <span class="text-red-600">*</span></label>
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
                            placeholder="Seleccione un elemento desde el buscador"
                            value=""
                            readonly>

                        @error('destino_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- FECHA -->
                    <div class="space-y-1">
                        <label for="fecha" class="text-sm font-medium">Fecha</label> 
                        <input id="fecha" name="fecha" type="date" value="{{ old('fecha', date('Y-m-d')) }}" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary @error('fecha') input-error @enderror transition" required>
                        @error('fecha')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FILA 3: OBSERVACIONES -->
                <div class="space-y-2">
                    <label for="observacion" class="text-sm font-medium">Observaciones <span class="text-red-600">*</span></label>
                    <textarea id="observacion" name="observacion" rows="3"
                        class="w-full rounded-md border border-base-300 bg-base-200
                                px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary transition resize-none" required placeholder="Comentarios sobre el movimiento..." required>{{ old('observacion') }}</textarea>
                    @error('observacion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>  

            </div>


        </div>
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-xl sm:text-2xl font-semibold mb-4">Productos</h1>
            
            <div class="overflow-x-auto">
                <table class="table table-bordered text-sm" id="tablaProductos">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center hidden sm:table-cell">Cantidad asignada</th>
                            <th class="text-center hidden md:table-cell">Stock</th>
                            <th class="text-center">Cantidad a mover</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyProductos"></tbody>
                </table>
            </div>

        </div>
        
        <!-- Botones -->
        <div class="flex flex-wrap gap-2 justify-end mt-4">
            <a href="{{ route('movimientos.index') }}" class="btn btn-sm sm:btn-md btn-warning">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver
            </a>

            <button type="submit" class="btn btn-sm sm:btn-md btn-primary">
                <x-heroicon-o-check class="w-4 h-4 inline" />
                Guardar Movimiento
            </button>
        </div>
    </form>

    <!-- Modal para seleccionar origen -->
    <input type="checkbox" id="modal_elegir_origen" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-4xl">
            <h3 class="font-bold text-lg mb-4" id="titulo_modal_origen">
                Seleccionar elemento de origen
            </h3>

            <input type="text" id="buscador_origen"
                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                placeholder="Buscar por nombre, patente, etc.">

            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr id="tabla_origen_head">
                            {{-- cabeceras generadas por JS --}}
                        </tr>
                    </thead>
                    <tbody id="tabla_origen_body">
                        {{-- filas generadas por JS --}}
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-3 text-xs">
                    <button type="button" class="btn btn-xs" id="origen_prev_page">
                        « Anterior
                    </button>

                    <span id="origen_pagination_info" class="mx-2">
                        {{-- se completa por JS --}}
                    </span>

                    <button type="button" class="btn btn-xs" id="origen_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <div class="modal-action">
                <label for="modal_elegir_origen" class="btn btn-ghost">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_origen">Close</label>
    </div>

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
                <div class="flex justify-between items-center mt-3 text-xs">
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
                <label for="modal_elegir_destino" class="btn btn-ghost">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_destino">Close</label>
    </div>

@endsection

@section('js')
    <script> 
        document.addEventListener("DOMContentLoaded", function() {

            const baseUrlListar = "{{ url('origen/listar') }}"; 
            const baseUrlProductos = "{{ url('origen') }}";

            const tipoSelect = document.getElementById("origen_tipo");
            const origenInput = document.getElementById("origen_id");
            const origenNombreVisible = document.getElementById("origen_nombre_visible");
            const tbody = document.getElementById("tbodyProductos");

            const destinoTipoSelect = document.getElementById("destino_tipo");
            const destinoInput = document.getElementById("destino_id");
            const destinoNombreVisible = document.getElementById("destino_nombre_visible");

            // ==============================
            //  MODAL DE SELECCIÓN DE ORIGEN
            // ==============================

            let origenesCache = [];
            let columnasOrigen = [];
            let paginaOrigen = 1;
            const itemsPorPaginaOrigen = 5; 

            // Cache por tipo para que el modal abra instantáneo
            const origenCachePorTipo = {};
            const origenPrefetchEnCursoPorTipo = {};

            const tablaOrigenHead = document.getElementById('tabla_origen_head');
            const tablaOrigenBody = document.getElementById('tabla_origen_body');
            const origenPrev = document.getElementById('origen_prev_page');
            const origenNext = document.getElementById('origen_next_page');
            const origenInfo = document.getElementById('origen_pagination_info');
            const buscadorOrigen = document.getElementById('buscador_origen');
            const btnElegirOrigen = document.getElementById('btn_elegir_origen');
            const tituloModalOrigen = document.getElementById('titulo_modal_origen');

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
                return 'vehiculo';
            } 

            function prefetchListado(tipoShort, cachePorTipo, prefetchEnCursoPorTipo, onOk) {
                if (!tipoShort) return null;

                if (cachePorTipo[tipoShort]) {
                    if (typeof onOk === 'function') onOk(cachePorTipo[tipoShort]);
                    return Promise.resolve(cachePorTipo[tipoShort]);
                }

                // Si ya hay una request en curso para este tipo, la reutilizamos.
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

            function configurarColumnasOrigen(tipoShort) {
                if (tipoShort === 'vehiculo') {
                    columnasOrigen = [
                        { key: 'patente', label: 'Patente' },
                        { key: 'marca', label: 'Marca' },
                        { key: 'modelo', label: 'Modelo' },
                        { key: 'anio', label: 'Año' },
                        { key: 'color', label: 'Color' },
                        { key: 'tipo', label: 'Tipo' },
                    ];
                    tituloModalOrigen.textContent = 'Seleccionar vehículo';
                } else if (tipoShort === 'obra') {
                    columnasOrigen = [
                        { key: 'nombre', label: 'Nombre' },
                        { key: 'direccion', label: 'Dirección' },
                        { key: 'barrio', label: 'Barrio' },
                        { key: 'responsable', label: 'Responsable' },
                        { key: 'ejecutado_por', label: 'Ejecutado por' },
                        { key: 'estado_obra', label: 'Estado' },
                    ];
                    tituloModalOrigen.textContent = 'Seleccionar obra';
                } else if (tipoShort === 'deposito') {
                    columnasOrigen = [{ key: 'nombre', label: 'Depósito' }];
                    tituloModalOrigen.textContent = 'Seleccionar depósito';
                }else if (tipoShort === 'equipo') {
                    columnasOrigen = [
                        { key: 'equipamiento', label: 'Equipamiento' },
                        { key: 'marca', label: 'Marca' },
                        { key: 'descripcion', label: 'Descripcion' },
                        { key: 'catalogacion', label: 'Catalogación' },
                        { key: 'estado', label: 'Estado' },
                    ];
                    tituloModalOrigen.textContent = 'Seleccionar equipo';
                } else {
                    columnasOrigen = [{ key: 'nombre', label: 'Nombre' }];
                    tituloModalOrigen.textContent = 'Seleccionar elemento';
                }

                if (tablaOrigenHead) {
                    tablaOrigenHead.innerHTML = columnasOrigen
                        .map(col => `<th>${col.label}</th>`)
                        .join('');
                }
            }

            function renderTablaDestino(data) {
                if (!tablaDestinoBody) return;

                tablaDestinoBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaDestinoBody.innerHTML = `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="${columnasDestino.length || 1}">No se encontraron elementos.</td></tr>`;
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

                    tr.addEventListener('click', function () {
                        if (!destinoInput) return;

                        destinoInput.value = dest.id;

                        if (destinoNombreVisible) {
                            const texto = columnasDestino
                                .map(col => dest[col.key])
                                .filter(esParteVisibleValida)
                                .map(v => String(v))
                                .join(' - ');
                            destinoNombreVisible.value = texto || (dest.nombre ?? 'Elemento seleccionado');
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

            function configurarColumnasDestino(tipoShort) {
                if (tipoShort === 'vehiculo') {
                    columnasDestino = [
                        { key: 'patente', label: 'Patente' },
                        { key: 'marca', label: 'Marca' },
                        { key: 'modelo', label: 'Modelo' },
                        { key: 'anio', label: 'Año' },
                        { key: 'color', label: 'Color' },
                        { key: 'tipo', label: 'Tipo' },
                    ];
                    tituloModalDestino.textContent = 'Seleccionar vehículo destino';
                } else if (tipoShort === 'obra') {
                    columnasDestino = [
                        { key: 'nombre', label: 'Nombre' },
                        { key: 'direccion', label: 'Dirección' },
                        { key: 'barrio', label: 'Barrio' },
                        { key: 'responsable', label: 'Responsable' },
                        { key: 'ejecutado_por', label: 'Ejecutado por' },
                        { key: 'estado_obra', label: 'Estado' },
                    ];
                    tituloModalDestino.textContent = 'Seleccionar obra destino';
                } else if (tipoShort === 'deposito') {
                    columnasDestino = [{ key: 'nombre', label: 'Depósito' }];
                    tituloModalDestino.textContent = 'Seleccionar depósito destino';
                } else if (tipoShort === 'equipo') {
                    columnasDestino = [
                        { key: 'equipamiento', label: 'Equipamiento' },
                        { key: 'marca', label: 'Marca' },
                        { key: 'descripcion', label: 'Descripcion' },
                        { key: 'catalogacion', label: 'Catalogación' },
                        { key: 'estado', label: 'Estado' },
                    ];
                    tituloModalDestino.textContent = 'Seleccionar equipo destino';
                } else {
                    columnasDestino = [{ key: 'nombre', label: 'Nombre' }];
                    tituloModalDestino.textContent = 'Seleccionar destino';
                }

                if (tablaDestinoHead) {
                    tablaDestinoHead.innerHTML = columnasDestino
                        .map(col => `<th>${col.label}</th>`)
                        .join('');
                }
            }

            function renderTablaOrigen(data) {
                if (!tablaOrigenBody) return; 

                tablaOrigenBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaOrigenBody.innerHTML = `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="${columnasOrigen.length || 1}">No se encontraron elementos.</td></tr>`;
                    if (origenInfo) origenInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaOrigen);
                if (paginaOrigen > totalPaginas) paginaOrigen = totalPaginas;
                if (paginaOrigen < 1) paginaOrigen = 1;

                const inicio = (paginaOrigen - 1) * itemsPorPaginaOrigen;
                const fin = inicio + itemsPorPaginaOrigen;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(origen => {
                    const tr = document.createElement('tr');
                    tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                    tr.innerHTML = columnasOrigen
                        .map(col => `<td>${formatearCelda(origen[col.key])}</td>`)
                        .join('');

                    tr.addEventListener('click', function () {
                        if (!origenInput) return;

                        // Guardar ID en el input hidden
                        origenInput.value = origen.id;

                        // Mostrar nombre amigable en el input visible
                        if (origenNombreVisible) {
                            const texto = columnasOrigen
                                .map(col => origen[col.key])
                                .filter(esParteVisibleValida)
                                .map(v => String(v))
                                .join(' - ');
                            origenNombreVisible.value = texto || (origen.nombre ?? 'Elemento seleccionado');
                        }

                        // Cargar productos para este origen
                        cargarProductosDesdeOrigen(origen.id);

                        const modalCheckbox = document.getElementById('modal_elegir_origen');
                        if (modalCheckbox) modalCheckbox.checked = false;
                    });

                    tablaOrigenBody.appendChild(tr);
                });

                if (origenInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    origenInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            function cargarOrigenesEnTabla() {
                if (!tablaOrigenBody || !tablaOrigenHead) return; 

                const clase = tipoSelect ? tipoSelect.value : null;
                const tipoShort = tipoShortDesdeClase(clase);

                if (!clase || !tipoShort) {
                    columnasOrigen = [];
                    tablaOrigenHead.innerHTML = '';
                    tablaOrigenBody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500">Primero seleccione un tipo de origen.</td></tr>';
                    if (origenInfo) origenInfo.textContent = '';
                    return;
                }

                configurarColumnasOrigen(tipoShort);

                // Si ya está en cache, renderizar instantáneo
                if (origenCachePorTipo[tipoShort]) {
                    origenesCache = origenCachePorTipo[tipoShort];
                    paginaOrigen = 1;
                    renderTablaOrigen(origenesCache);
                    return;
                }

                tablaOrigenBody.innerHTML = `<tr><td class="py-4 text-center text-sm" colspan="${columnasOrigen.length}">Cargando...</td></tr>`;

                // Si hay prefetch en curso (por cambio de tipo), esperar esa promesa.
                // Si no, iniciar una y reutilizarla.
                prefetchListado(tipoShort, origenCachePorTipo, origenPrefetchEnCursoPorTipo)
                    .then(lista => {
                        origenesCache = lista;
                        paginaOrigen = 1;
                        renderTablaOrigen(origenesCache);
                    })
                    .catch(err => {
                        console.error('Error en fetch ORIGEN:', err);
                        tablaOrigenBody.innerHTML = `<tr><td class="py-4 text-center text-sm text-red-500" colspan="${columnasOrigen.length}">Error al cargar los elementos.</td></tr>`;
                        if (origenInfo) origenInfo.textContent = '';
                    });
            }

            function abrirModalOrigen() {
                const modalCheckbox = document.getElementById('modal_elegir_origen');
                if (modalCheckbox) modalCheckbox.checked = true;
                cargarOrigenesEnTabla();
                if (buscadorOrigen) buscadorOrigen.value = '';
            }

            if (btnElegirOrigen) {
                btnElegirOrigen.addEventListener('click', function () {
                    abrirModalOrigen();
                });
            }

            if (origenNombreVisible) {
                origenNombreVisible.addEventListener('click', function () {
                    abrirModalOrigen();
                });
                origenNombreVisible.addEventListener('focus', function () {
                    abrirModalOrigen();
                });
            }

            if (buscadorOrigen) {
                buscadorOrigen.addEventListener('input', function () {
                    const term = this.value.toLowerCase();
                    const filtrados = origenesCache.filter(origen => {
                        const texto = Object.values(origen).join(' ').toLowerCase();
                        return texto.includes(term);
                    });
                    paginaOrigen = 1;
                    renderTablaOrigen(filtrados);
                });
            }

            if (origenPrev) {
                origenPrev.addEventListener('click', function () {
                    if (paginaOrigen > 1) {
                        paginaOrigen--;
                        renderTablaOrigen(origenesCache);
                    }
                });
            }

            if (origenNext) {
                origenNext.addEventListener('click', function () {
                    const totalPaginas = Math.ceil(origenesCache.length / itemsPorPaginaOrigen);
                    if (paginaOrigen < totalPaginas) {
                        paginaOrigen++;
                        renderTablaOrigen(origenesCache);
                    }
                });
            }
            //Filtro para que el destino no sea el mismo que el origen
            function filtrarDestinoIgualAlOrigen(lista) {
                const origenId = origenInput?.value;
                const tipoOrigen = tipoShortDesdeClase(tipoSelect?.value);
                const tipoDestino = tipoShortDesdeClase(destinoTipoSelect?.value);

                // Si no hay origen seleccionado o no es el mismo tipo → no filtrar
                if (!origenId || tipoOrigen !== tipoDestino) {
                    return lista;
                }

                return lista.filter(dest => String(dest.id) !== String(origenId));
            }

            function cargarDestinosEnTabla() {
                if (!tablaDestinoBody || !tablaDestinoHead) return;

                const clase = destinoTipoSelect ? destinoTipoSelect.value : null;
                const tipoShort = tipoShortDesdeClase(clase);

                if (!clase || !tipoShort) {
                    columnasDestino = [];
                    tablaDestinoHead.innerHTML = '';
                    tablaDestinoBody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500">Primero seleccione un tipo de destino.</td></tr>';
                    if (destinoInfo) destinoInfo.textContent = '';
                    return;
                }

                configurarColumnasDestino(tipoShort);

                // Si ya está en cache, renderizar instantáneo
                if (destinoCachePorTipo[tipoShort]) {
                    destinosCache = filtrarDestinoIgualAlOrigen(destinoCachePorTipo[tipoShort]);
                    paginaDestino = 1;
                    renderTablaDestino(destinosCache);
                    return;
                }

                tablaDestinoBody.innerHTML = `<tr><td class="py-4 text-center text-sm" colspan="${columnasDestino.length}">Cargando...</td></tr>`;

                // Si hay prefetch en curso (por cambio de tipo), esperar esa promesa.
                // Si no, iniciar una y reutilizarla.
                prefetchListado(tipoShort, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo)
                    .then(lista => {
                        destinosCache = filtrarDestinoIgualAlOrigen(lista);
                        paginaDestino = 1;
                        renderTablaDestino(destinosCache);
                    })
                    .catch(err => {
                        console.error('Error en fetch DESTINO:', err);
                        tablaDestinoBody.innerHTML = `<tr><td class="py-4 text-center text-sm text-red-500" colspan="${columnasDestino.length}">Error al cargar los elementos.</td></tr>`;
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
                btnElegirDestino.addEventListener('click', function () {
                    abrirModalDestino();
                });
            }

            if (destinoNombreVisible) {
                destinoNombreVisible.addEventListener('click', function () {
                    abrirModalDestino();
                });
                destinoNombreVisible.addEventListener('focus', function () {
                    abrirModalDestino();
                });
            }

            if (buscadorDestino) {
                buscadorDestino.addEventListener('input', function () {
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
                destinoPrev.addEventListener('click', function () {
                    if (paginaDestino > 1) {
                        paginaDestino--;
                        renderTablaDestino(destinosCache);
                    }
                });
            }

            if (destinoNext) {
                destinoNext.addEventListener('click', function () {
                    const totalPaginas = Math.ceil(destinosCache.length / itemsPorPaginaDestino);
                    if (paginaDestino < totalPaginas) {
                        paginaDestino++;
                        renderTablaDestino(destinosCache);
                    }
                });
            }

            function prepararProductos(lista) {
                // NO agrupar, devolver tal cual vienen del backend
                return lista.map(item => ({
                    pivot_id: item.pivot_id,
                    producto_id: item.producto_id,
                    nombre: item.nombre,
                    cantidad_asignada: parseFloat(item.cantidad_asignada || 0),
                    stock: parseFloat(item.stock || 0),
                    detalle_compra_id: item.detalle_compra_id,
                    fecha_asignacion: item.fecha_asignacion
                }));
            }
            // ---------------------------------------------------

            tipoSelect?.addEventListener("change", function() {
                const tipo = this.value;

                if (!origenInput || !tbody) return; // <-- evita el error

                const tipoShort = tipoShortDesdeClase(tipo);
                prefetchListado(tipoShort, origenCachePorTipo, origenPrefetchEnCursoPorTipo);

                // Reiniciar origen seleccionado y tabla de productos
                origenInput.value = "";
                if (origenNombreVisible) {
                    origenNombreVisible.value = "";
                    origenNombreVisible.placeholder = "Seleccione un elemento desde el buscador";
                }

                tbody.innerHTML =
                    `<tr><td colspan="5" class="text-center">Seleccione un elemento...</td></tr>`;

                // La carga de elementos se hace exclusivamente desde el modal.
            });

            destinoTipoSelect?.addEventListener('change', function () {
                const tipo = this.value;
                const tipoShort = tipoShortDesdeClase(tipo);
                prefetchListado(tipoShort, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo);

                if (destinoInput) destinoInput.value = '';
                if (destinoNombreVisible) {
                    destinoNombreVisible.value = '';
                    destinoNombreVisible.placeholder = 'Seleccione un elemento desde el buscador';
                }
            });

            const tipoOrigenInicial = tipoShortDesdeClase(tipoSelect ? tipoSelect.value : null);
            prefetchListado(tipoOrigenInicial, origenCachePorTipo, origenPrefetchEnCursoPorTipo);

            const tipoDestinoInicial = tipoShortDesdeClase(destinoTipoSelect ? destinoTipoSelect.value : null);
            prefetchListado(tipoDestinoInicial, destinoCachePorTipo, destinoPrefetchEnCursoPorTipo);

           function cargarProductosDesdeOrigen(id) {
                const tipo = tipoSelect ? tipoSelect.value : "";
                if (!id || !tipo || !tbody) return;

                tbody.innerHTML = `<tr><td colspan="5" class="text-center">Cargando productos...</td></tr>`;

                let tipoShort = tipo.includes('Obra') ? 'obra' :
                    tipo.includes('Deposito') ? 'deposito' :
                    tipo.includes('Equipo') ? 'equipo' :
                    'vehiculo';

                fetch(`${baseUrlProductos}/${tipoShort}/${id}/productos`)
                    .then(r => r.json())
                    .then(productos => {
                        const productosPreparados = prepararProductos(productos);

                        tbody.innerHTML = "";
                        let nr = 1;

                        productosPreparados.forEach((p, index) => {
                            const stock = parseFloat(p.stock);
                            const cantidadAsignada = parseFloat(p.cantidad_asignada);
                            
                            // 🔧 FORMATEAR LA FECHA
                            let infoExtra = '';
                            if (p.fecha_asignacion) {
                                const fecha = new Date(p.fecha_asignacion);
                                const fechaFormateada = fecha.toLocaleDateString('es-AR', {
                                    year: 'numeric',
                                    month: '2-digit',
                                    day: '2-digit',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                                infoExtra = `<small class="text-muted d-block">Asignado: ${fechaFormateada}</small>`;
                            }

                            tbody.innerHTML += `
                                <tr>
                                    <td class="text-center">${nr++}</td>
                                    <td class="text-center">
                                        ${p.nombre}
                                        ${infoExtra}
                                    </td>

                                    <!-- CANTIDAD ASIGNADA -->
                                    <td class="text-center hidden sm:table-cell">
                                        <span class="badge badge-secondary">${cantidadAsignada}</span>
                                    </td>

                                    <!-- STOCK DISPONIBLE -->
                                    <td class="text-center hidden md:table-cell">
                                        <span class="badge badge-info">${stock}</span>
                                    </td>

                                    <!-- CANTIDAD A MOVER -->
                                    <td class="text-center">
                                        <!-- ✅ Usar index único, no producto_id -->
                                        <input type="hidden" name="productos[${index}][pivot_id]" value="${p.pivot_id}">
                                        <input type="hidden" name="productos[${index}][producto_id]" value="${p.producto_id}">
                                        
                                        <input 
                                            type="number"
                                            class="form-control cantidad-mover"
                                            name="productos[${index}][cantidad]"
                                            data-index="${index}"
                                            data-pivot-id="${p.pivot_id}"
                                            disabled
                                            min="0.01"
                                            max="${cantidadAsignada}"
                                            step="0.01"
                                            placeholder="0"
                                        >
                                    </td>

                                    <!-- BOTÓN -->
                                    <td class="text-center">
                                        <button
                                            type="button" 
                                            class="btn btn-primary seleccionar-producto"
                                            data-index="${index}"
                                            data-pivot-id="${p.pivot_id}"
                                            data-cantidad-asignada="${cantidadAsignada}"
                                            data-stock="${stock}">
                                            Seleccionar
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });

                        activarSeleccion();
                    })
                    .catch(err => console.error(err));
            }

            // --- HABILITAR INPUT AL SELECCIONAR ---
            function activarSeleccion() {
                document.querySelectorAll(".seleccionar-producto").forEach(btn => {
                    btn.addEventListener("click", function() {
                        // ✅ Usar data-index en lugar de data-id
                        const index = this.dataset.index;
                        const cantidadAsignada = parseFloat(this.dataset.cantidadAsignada);

                        // ✅ Buscar por data-index
                        const input = document.querySelector(
                            `.cantidad-mover[data-index="${index}"]`
                        );

                        if (input) {
                            input.disabled = false;
                            input.focus();
                            
                            // ✅ Actualizar el max con cantidad_asignada (no stock)
                            input.setAttribute('max', cantidadAsignada);
                            
                            this.closest("tr").classList.add("table-success");
                            
                            // Opcional: Cambiar texto del botón
                            this.textContent = "Seleccionado ✓";
                            this.classList.remove("btn-primary");
                            this.classList.add("btn-success");
                            this.disabled = true;
                        }
                    });
                });
            }

            // --- VALIDAR QUE NO SUPERE LA CANTIDAD ASIGNADA ---
            document.addEventListener("input", function(e) {
                if (e.target.classList.contains("cantidad-mover")) {
                    let input = e.target;
                    let cantidadMax = parseFloat(input.getAttribute("max"));
                    let valor = parseFloat(input.value);

                    // Permitir valores decimales
                    if (isNaN(valor) || valor <= 0) {
                        input.value = "";
                        return;
                    }

                    // No permitir más de la cantidad asignada
                    if (valor > cantidadMax) {
                        input.value = cantidadMax;
                        
                        // ✅ Mostrar alerta visual
                        input.classList.add("is-invalid");
                        setTimeout(() => {
                            input.classList.remove("is-invalid");
                        }, 2000);
                    }
                }
            });

            // --- OPCIONAL: Permitir deseleccionar productos ---
            function permitirDeseleccionar() {
                document.querySelectorAll(".seleccionar-producto").forEach(btn => {
                    btn.addEventListener("dblclick", function() {
                        const index = this.dataset.index;
                        const input = document.querySelector(`.cantidad-mover[data-index="${index}"]`);
                        
                        if (input) {
                            input.disabled = true;
                            input.value = "";
                            this.closest("tr").classList.remove("table-success");
                            
                            this.textContent = "Seleccionar";
                            this.classList.remove("btn-success");
                            this.classList.add("btn-primary");
                            this.disabled = false;
                        }
                    });
                });
            }


        });
        document.addEventListener("DOMContentLoaded", function () {
            const tipoMovimiento = document.getElementById("tipo"); // CAMBIAR if se llama distinto
            const destinoTipo = document.getElementById("destino_tipo");
            const destinoId = document.getElementById("destino_id");
            const destinoNombreVisible = document.getElementById("destino_nombre_visible");
            const btnElegirDestino = document.getElementById("btn_elegir_destino");

            function actualizarCampos() {
                const tipo = tipoMovimiento.value;

                if (tipo === "transferencia") {

                    // HABILITAR CAMPOS
                    destinoTipo.disabled = false;
                    if (destinoNombreVisible) destinoNombreVisible.disabled = false;
                    if (btnElegirDestino) btnElegirDestino.disabled = false;

                    // MARCAR COMO OBLIGATORIOS
                    destinoTipo.setAttribute("required", true);
                    destinoId.setAttribute("required", true);

                } else if (tipo === "consumo") {

                    // DESHABILITAR + QUITAR REQUIRED
                    destinoTipo.disabled = true;
                    if (destinoNombreVisible) destinoNombreVisible.disabled = true;
                    if (btnElegirDestino) btnElegirDestino.disabled = true;

                    destinoTipo.removeAttribute("required");
                    destinoId.removeAttribute("required");

                    // LIMPIAR selección
                    destinoTipo.value = "";
                    destinoId.value = "";
                    if (destinoNombreVisible) destinoNombreVisible.value = "";

                } else {

                    // OTROS TIPOS: habilitados pero sin required
                    destinoTipo.disabled = false;
                    if (destinoNombreVisible) destinoNombreVisible.disabled = false;
                    if (btnElegirDestino) btnElegirDestino.disabled = false;

                    destinoTipo.removeAttribute("required");
                    destinoId.removeAttribute("required");
                }
            }

            tipoMovimiento.addEventListener("change", actualizarCampos);

            // Ejecutar al cargar la página
            actualizarCampos();
        });
    </script> 
@endsection
