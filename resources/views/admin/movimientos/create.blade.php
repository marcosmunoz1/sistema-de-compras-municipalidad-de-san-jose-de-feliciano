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

            <div class="grid grid-cols-2 gap-6">

                <!-- PRODUCTO (DINÁMICO SEGÚN ORIGEN) -->
                <div class="space-y-2">
                    <button id="abrirModalProductos" class="btn btn-primary" disabled>
                        Seleccionar Productos
                    </button>

                    <label for="producto_id" class="text-sm font-medium">
                        Producto <span class="text-red-600">*</span>
                    </label>
                    <select id="producto_id" name="producto_id"
                        class="select select-bordered w-full @error('producto_id') select-error @enderror" required
                        disabled>
                        <option value="">Seleccione un origen primero...</option>
                    </select>
                    @error('producto_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- TIPO -->
                <div class="space-y-2">
                    <label for="tipo" class="text-sm font-medium">
                        Tipo de movimiento <span class="text-red-600">*</span>
                    </label>
                    <select id="tipo" name="tipo"
                        class="select select-bordered w-full @error('tipo') select-error @enderror" required>
                        <option value="">Seleccione tipo...</option>
                        <option value="entrada">Entrada</option>
                        <option value="salida">Salida</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                    @error('tipo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- ORIGEN -->
                <div class="space-y-2">
                    <label class="text-sm font-medium">Origen <span class="text-red-600">*</span></label>

                    <!-- Tipo -->
                    <select id="origen_tipo" name="origen_tipo"
                        class="select select-bordered w-full @error('origen_tipo') select-error @enderror" required>
                        <option value="">Seleccione origen...</option>
                        <option value="App\Models\Obra">Obra</option>
                        <option value="App\Models\Deposito">Depósito</option>
                        <option value="App\Models\Vehiculo">Vehículo</option>
                    </select>

                    <!-- ID -->
                    <select id="origen_id" name="origen_id"
                        class="select select-bordered w-full mt-2 @error('origen_id') select-error @enderror" required>
                        <option value="">Seleccione un tipo...</option>
                    </select>

                    @error('origen_tipo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    @error('origen_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- DESTINO -->
                <div class="space-y-2">
                    <label class="text-sm font-medium">Destino <span class="text-red-600">*</span></label>

                    <select id="destino_tipo" name="destino_tipo"
                        class="select select-bordered w-full @error('destino_tipo') select-error @enderror" required>
                        <option value="">Seleccione destino...</option>
                        <option value="App\Models\Deposito">Depósito</option>
                        <option value="App\Models\Obra">Obra</option>
                        <option value="App\Models\Vehiculo">Vehículo</option>
                    </select>

                    <select id="destino_id" name="destino_id"
                        class="select select-bordered w-full mt-2 @error('destino_id') select-error @enderror" required>
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

                    @error('destino_tipo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    @error('destino_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Cantidad -->
                <div class="space-y-2">
                    <label for="cantidad" class="text-sm font-medium">Cantidad <span class="text-red-600">*</span></label>
                    <input id="cantidad" name="cantidad" value="{{ old('cantidad') }}" type="number"
                        class="input input-bordered w-full @error('cantidad') input-error @enderror"
                        placeholder="Cantidad..." required>
                    @error('cantidad')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Fecha -->
                <div class="space-y-2">
                    <label for="fecha" class="text-sm font-medium">Fecha</label>
                    <input id="fecha" name="fecha" type="date" value="{{ old('fecha', date('Y-m-d')) }}"
                        class="input input-bordered w-full @error('fecha') input-error @enderror">
                    @error('fecha')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Observaciones -->
                <div class="col-span-2 space-y-2">
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
    <!-- Modal DaisyUI con <dialog> -->
    <dialog id="modalProductos" class="modal">
        <form method="dialog" class="modal-box w-3/4 max-w-5xl">
            <h3 class="font-bold text-lg">Productos asignados al origen</h3>

            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Producto</th>
                        <th>Cantidad disponible</th>
                        <th>Cantidad a mover</th>
                    </tr>
                </thead>
                <tbody id="tablaProductos">
                    <!-- Filas generadas por JS -->
                </tbody>
            </table>

            <div class="modal-action">
                <button type="button" class="btn btn-primary" id="guardarProductosSeleccionados">Guardar
                    selección</button>
                <button type="button" class="btn" id="cerrarModal">Cerrar</button>
            </div>
        </form>
    </dialog>

    <!-- Input oculto en el formulario principal para enviar productos seleccionados -->
    <input type="hidden" name="productos_seleccionados" id="productosSeleccionadosInput">
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnModal = document.getElementById('abrirModalProductos');
            const modal = document.getElementById('modalProductos');
            const tablaProductos = document.getElementById('tablaProductos');
            const productosSeleccionadosInput = document.getElementById('productosSeleccionadosInput');
            const origenTipoSelect = document.getElementById('origen_tipo');
            const origenIdSelect = document.getElementById('origen_id');

            // ================================
            // Base URLs
            // ================================
            const URL_ORIGEN = {
                "App\\Models\\Obra": "{{ url('admin/obras') }}",
                "App\\Models\\Vehiculo": "{{ url('admin/vehiculos') }}",
                "App\\Models\\Deposito": "{{ url('admin/depositos') }}"
            };

            const URL_PRODUCTOS = {
                "App\\Models\\Obra": "{{ url('admin/obras/ID/productos') }}",
                "App\\Models\\Vehiculo": "{{ url('admin/vehiculos/ID/productos') }}",
                "App\\Models\\Deposito": "{{ url('admin/depositos/ID/productos') }}"
            };

            // ================================
            // Cargar opciones de origen_id según tipo
            // ================================
            origenTipoSelect.addEventListener('change', function() {
                const tipo = this.value;
                origenIdSelect.innerHTML = `<option value="">Cargando...</option>`;
                btnModal.disabled = true;

                if (!tipo || !URL_ORIGEN[tipo]) {
                    origenIdSelect.innerHTML = `<option value="">Seleccione un tipo válido</option>`;
                    return;
                }

                fetch(URL_ORIGEN[tipo])
                    .then(res => res.json())
                    .then(data => {
                        origenIdSelect.innerHTML = `<option value="">Seleccione...</option>`;
                        data.forEach(item => {
                            let texto = '';
                            if (tipo === "App\\Models\\Obra") texto = `Obra: ${item.nombre}`;
                            if (tipo === "App\\Models\\Vehiculo") texto =
                                `Vehículo: ${item.patente} - ${item.modelo}`;
                            if (tipo === "App\\Models\\Deposito") texto =
                                `Depósito: ${item.nombre}`;
                            origenIdSelect.innerHTML +=
                                `<option value="${item.id}">${texto}</option>`;
                        });
                    })
                    .catch(err => {
                        console.error(err);
                        origenIdSelect.innerHTML = `<option value="">Error al cargar opciones</option>`;
                    });
            });

            // ================================
            // Habilitar botón solo si hay origen
            // ================================
            origenIdSelect.addEventListener('change', function() {
                btnModal.disabled = !this.value;
            });

            // =========================================
            // Abrir modal y cargar productos según origen
            // =========================================
            btnModal.addEventListener('click', function() {
                const origenTipo = origenTipoSelect.value;
                const origenId = origenIdSelect.value;

                if (!origenId) return;

                const urlTemplate = URL_PRODUCTOS[origenTipo];
                if (!urlTemplate) return;

                const url = urlTemplate.replace('ID', origenId);

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        tablaProductos.innerHTML = '';
                        if (!data.length) {
                            tablaProductos.innerHTML =
                                `<tr><td colspan="4" class="text-center">No hay productos asignados</td></tr>`;
                            modal.showModal();
                            return;
                        }

                        data.forEach((p, index) => {
                            tablaProductos.innerHTML += `
                        <tr>
                            <td><input type="checkbox" class="checkProducto" data-index="${index}" value="${p.id}"></td>
                            <td>${p.nombre}</td>
                            <td>${p.cantidad_asignada}</td>
                            <td>
                                <input type="number" class="cantidadMover input input-bordered w-20" 
                                    min="1" max="${p.cantidad_asignada}" value="1" data-index="${index}" disabled>
                            </td>
                        </tr>
                    `;
                        });

                        // Habilitar input cantidad solo si el checkbox está marcado
                        document.querySelectorAll('.checkProducto').forEach(cb => {
                            cb.addEventListener('change', function() {
                                const idx = this.dataset.index;
                                document.querySelector(
                                        `.cantidadMover[data-index="${idx}"]`)
                                    .disabled = !this.checked;
                            });
                        });

                        modal.showModal();
                    })
                    .catch(err => {
                        console.error(err);
                    });
            });

            // ================================
            // Guardar selección en input oculto
            // ================================
            document.getElementById('guardarProductosSeleccionados').addEventListener('click', function() {
                const seleccion = [];
                document.querySelectorAll('.checkProducto:checked').forEach(cb => {
                    const idx = cb.dataset.index;
                    const cantidad = document.querySelector(`.cantidadMover[data-index="${idx}"]`)
                        .value;
                    seleccion.push({
                        id: cb.value,
                        cantidad
                    });
                });
                productosSeleccionadosInput.value = JSON.stringify(seleccion);
                modal.close();
            });

            // ================================
            // Cerrar modal
            // ================================
            document.getElementById('cerrarModal').addEventListener('click', function() {
                modal.close();
            });
        });
    </script>
@endsection
