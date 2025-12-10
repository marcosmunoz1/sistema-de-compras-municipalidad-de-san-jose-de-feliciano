@extends('layouts.admin')

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
                            class="select select-bordered w-full @error('origen_tipo') select-error @enderror" required>
                            <option value="">Seleccione origen...</option>
                            <option value="App\Models\Obra">Obra</option>
                            <option value="App\Models\Deposito">Depósito</option>
                            <option value="App\Models\Vehiculo">Vehículo</option>
                        </select>
                        @error('origen_tipo')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- ORIGEN ID -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Elemento <span class="text-red-600">*</span></label>
                        <select id="origen_id" name="origen_id"
                            class="select select-bordered w-full @error('origen_id') select-error @enderror" required>
                            <option value="">Seleccione un tipo...</option>
                        </select>
                        @error('origen_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TIPO DE MOVIMIENTO -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Tipo de movimiento <span class="text-red-600">*</span></label>
                        <select id="tipo" name="tipo"
                            class="select select-bordered w-full @error('tipo') select-error @enderror" required>
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
                            class="select select-bordered w-full @error('destino_tipo') select-error @enderror" required>
                            <option value="">Seleccione destino...</option>
                            <option value="App\Models\Deposito">Depósito</option>
                            <option value="App\Models\Obra">Obra</option>
                            <option value="App\Models\Vehiculo">Vehículo</option>
                        </select>
                        @error('destino_tipo')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- DESTINO ID -->
                    <div class="space-y-1">
                        <label class="text-sm font-medium">Elemento <span class="text-red-600">*</span></label>
                        <select id="destino_id" name="destino_id"
                            class="select select-bordered w-full @error('destino_id') select-error @enderror" required>
                            <option value="">Seleccione una opción...</option>

                            @foreach ($depositos as $depo)
                                <option value="{{ $depo->id }}" data-tipo="App\Models\Deposito">
                                    Depósito: {{ $depo->nombre }}
                                </option>
                            @endforeach
                            @foreach ($obras as $obra)
                                <option value="{{ $obra->id }}" data-tipo="App\Models\Obra">
                                    Obra: {{ $obra->nombre }}
                                </option>
                            @endforeach
                            @foreach ($vehiculos as $veh)
                                <option value="{{ $veh->id }}" data-tipo="App\Models\Vehiculo">
                                    Vehículo: {{ $veh->patente }} - {{ $veh->modelo }}
                                </option>
                            @endforeach
                        </select>

                        @error('destino_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- FECHA -->
                    <div class="space-y-1">
                        <label for="fecha" class="text-sm font-medium">Fecha</label>
                        <input id="fecha" name="fecha" type="date" value="{{ old('fecha', date('Y-m-d')) }}"
                            class="input input-bordered w-full @error('fecha') input-error @enderror">
                        @error('fecha')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- FILA 3: OBSERVACIONES -->
                <div class="space-y-2">
                    <label for="observacion" class="text-sm font-medium">Observaciones</label>
                    <textarea id="observacion" name="observacion" rows="3"
                        class="textarea textarea-bordered w-full @error('observacion') textarea-error @enderror"
                        placeholder="Comentarios sobre el movimiento...">{{ old('observacion') }}</textarea>
                    @error('observacion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

            </div>


        </div>
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-2xl font-semibold">Productos</h1>
            <br>
            <table class="table table-bordered" id="tablaProductos">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Cantidad a mover</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody id="tbodyProductos"></tbody>
            </table>

        </div>
        
        <!-- Botones -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('movimientos.index') }}" class="btn btn-warning mr-2">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver
            </a>

            <button type="submit" class="btn btn-primary">
                <x-heroicon-o-check class="w-4 h-4 inline" />
                Guardar Movimiento
            </button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const baseUrlListar = "{{ url('origen/listar') }}";
            const baseUrlProductos = "{{ url('origen') }}";

            const tipoSelect = document.getElementById("origen_tipo");
            const origenSelect = document.getElementById("origen_id");
            const tbody = document.getElementById("tbodyProductos");

            // --- AGRUPADOR DE PRODUCTOS (se mantiene igual) ---
            function agruparProductos(lista) {
                const mapa = {};

                lista.forEach(item => {
                    if (!mapa[item.id]) {
                        mapa[item.id] = {
                            id: item.id,
                            nombre: item.nombre,
                            stock: 0
                        };
                    }
                    mapa[item.id].stock += parseFloat(item.stock);
                });

                return Object.values(mapa);
            }
            // ---------------------------------------------------

            tipoSelect?.addEventListener("change", function() {
                const tipo = this.value;

                if (!origenSelect || !tbody) return; // <-- evita el error

                origenSelect.innerHTML = `<option>Cargando...</option>`;

                tbody.innerHTML =
                    `<tr><td colspan="5" class="text-center">Seleccione un elemento...</td></tr>`;

                if (!tipo) return;

                let tipoShort = tipo.includes('Obra') ? 'obra' :
                    tipo.includes('Deposito') ? 'deposito' :
                    'vehiculo';

                fetch(`${baseUrlListar}/${tipoShort}`)
                    .then(r => r.json())
                    .then(items => {
                        origenSelect.innerHTML = `<option value="">Seleccione...</option>`;
                        items.forEach(it => {
                            origenSelect.innerHTML +=
                                `<option value="${it.id}">${it.nombre}</option>`;
                        });
                    })
                    .catch(err => console.error(err));
            });

            origenSelect?.addEventListener("change", function() {
                const id = this.value;
                const tipo = tipoSelect.value;

                tbody.innerHTML = `<tr><td colspan="5" class="text-center">Cargando productos...</td></tr>`;

                let tipoShort = tipo.includes('Obra') ? 'obra' :
                    tipo.includes('Deposito') ? 'deposito' :
                    'vehiculo';

                fetch(`${baseUrlProductos}/${tipoShort}/${id}/productos`)
                    .then(r => r.json())
                    .then(productos => {

                        const productosAgrupados = agruparProductos(productos);

                        tbody.innerHTML = "";
                        let nr = 1;

                        productosAgrupados.forEach(p => {

                            const stock = parseFloat(p.stock);

                            tbody.innerHTML += `
                        <tr>
                            <td class="text-center">${nr++}</td>
                            <td class="text-center">${p.nombre}</td>

                            <!-- STOCK -->
                            <td class="text-center">
                                <span class="badge badge-info">${stock}</span>
                            </td>

                            <!-- CANTIDAD A MOVER -->
                            <td class="text-center">
                                <!-- Hidden para mandar array con los productos seleccionados -->
                                <input type="hidden" name="productos[${p.id}][id]" value="${p.id}">
                                <input 
                                    type="number"
                                    class="form-control cantidad-mover"
                                    name="productos[${p.id}][cantidad]"
                                    data-id="${p.id}"
                                    disabled
                                    min="1"
                                    max="${stock}"
                                    placeholder="0"
                                >
                            </td>

                            <!-- BOTÓN -->
                            <td class="text-center">
                                <button
                                    type="button" 
                                    class="btn btn-primary seleccionar-producto"
                                    data-id="${p.id}"
                                    data-stock="${p.stock}">
                                    Seleccionar
                                </button>
                            </td>
                        </tr>
                    `;
                        });

                        activarSeleccion();
                    })
                    .catch(err => console.error(err));
            });

            // --- HABILITAR INPUT AL SELECCIONAR ---
            function activarSeleccion() {
                document.querySelectorAll(".seleccionar-producto").forEach(btn => {
                    btn.addEventListener("click", function() {
                        const id = this.dataset.id;

                        const input = document.querySelector(
                            `.cantidad-mover[data-id="${id}"]`
                        );

                        input.disabled = false;
                        input.focus();

                        this.closest("tr").classList.add("table-success");
                    });
                });
            }
            // --- VALIDAR QUE NO SUPERE EL STOCK ---
            document.addEventListener("input", function(e) {
                if (e.target.classList.contains("cantidad-mover")) {

                    let input = e.target;
                    let stockMax = parseFloat(input.getAttribute("max"));
                    let valor = parseFloat(input.value);

                    if (isNaN(valor) || valor < 1) {
                        input.value = "";
                        return;
                    }

                    if (valor > stockMax) {
                        input.value = stockMax;
                    }
                }
            });


        });
        document.addEventListener("DOMContentLoaded", function () {
            const tipoMovimiento = document.getElementById("tipo"); // CAMBIAR si se llama distinto
            const destinoTipo = document.getElementById("destino_tipo");
            const destinoId = document.getElementById("destino_id");

            function actualizarCampos() {
                const tipo = tipoMovimiento.value;

                if (tipo === "transferencia") {

                    // HABILITAR CAMPOS
                    destinoTipo.disabled = false;
                    destinoId.disabled = false;

                    // MARCAR COMO OBLIGATORIOS
                    destinoTipo.setAttribute("required", true);
                    destinoId.setAttribute("required", true);

                } else if (tipo === "consumo") {

                    // DESHABILITAR + QUITAR REQUIRED
                    destinoTipo.disabled = true;
                    destinoId.disabled = true;

                    destinoTipo.removeAttribute("required");
                    destinoId.removeAttribute("required");

                    // LIMPIAR selección
                    destinoTipo.value = "";
                    destinoId.value = "";

                } else {

                    // OTROS TIPOS: habilitados pero sin required
                    destinoTipo.disabled = false;
                    destinoId.disabled = false;

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
