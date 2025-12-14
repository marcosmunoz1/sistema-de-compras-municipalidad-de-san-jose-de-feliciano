@extends('layouts.admin')

@section('content')
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Creación de Orden de Combustible</h1> 
 </div>
 
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="{{ route('admin.index') }}">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('combustibles.index') }}">
        <x-heroicon-o-truck class="w-4 h-4 inline" />
        Combustibles
      </a>
    </li>
    <li>
      <span class="inline-flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        Crear Orden de Combustible  
      </span>
    </li>
  </ul>
</div> 
<!-- Formulario --> 
<form action="{{ route('combustibles.store') }}" method="POST" class="space-y-6">
    @csrf 
    @method('POST')
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
    
    <!-- HEADER -->
    <div data-slot="card-header"
         class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
         gap-1.5 px-6 pt-6">
        <h4 class="text-1xl font-semibold">Información de la Orden de Carga</h4>
        <p class="text-muted-foreground">Autorización para carga de combustible</p>
    </div>

    <!-- CONTENT -->
    <div data-slot="card-content" class="px-6 [&:last-child]:pb-6"> 
        <div class="grid gap-4"> 

            <!-- FILA 3 INPUTS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> 

                <!-- Código --> 
                <!-- Fecha --> 
                <div class="space-y-2">
                    <label for="fecha" class="text-sm font-medium">Fecha de Emisión<span class="text-red-600">*</span></label>
                    <input 
                        type="date" 
                        id="fecha"
                        name="fecha" 
                        value="{{ old('fecha') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('fecha') input-error @enderror" required>
                        @error('fecha')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                </div>
                <!-- Usuario -->
                <div class="space-y-2">
                    <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta<span class="text-red-600">*</span></label>
                    <select 
                        id="sub_cuenta"
                        name="sub_cuenta"
                        class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('sub_cuenta') input-error @enderror" required> 
                        <option value="">Seleccione una sub cuenta</option>
                        <option value="Secretaria de obras publicas">Secretaria de obras publicas</option>
                        <option value="Secretaria de desarrollos humanos">Secretaria de desarrollos humanos</option>
                        <option value="Secretaria de gobierno">Secretaria de gobierno</option>
                        <option value="Departamento ejecutivo municipal">Departamento ejecutivo municipal</option> 
                    </select>
                    @error('sub_cuenta')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CARD DE DATOS DE VEHÍCULO Y CONDUCTOR -->
<div data-slot="card" class="card bg-base-100 shadow-xl p-4"> 


<!-- HEADER -->
<div data-slot="card-header"
    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start
    gap-1.5 px-6 pt-6">
    <div class="flex items-center justify-between w-full mb-6">
        <h4 class="text-1xl font-semibold">Datos del Destino de la carga</h4>   

        {{-- Botón para abrir el modal de nuevo destino --}}
        <label for="crear_destino_modal" class="btn btn-sm btn-success">
            + Nuevo destino
        </label>
    </div>
</div> 

<!-- CONTENT -->
<div data-slot="card-content" class="px-6 [&:last-child]:pb-6"> 
<div class="grid gap-4">

<!-- FILA SELECT VEHÍCULO & SELECT CHOFER -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

<!-- Select Vehículo -->
{{-- <div class="space-y-2">
<label for="vehiculo_id" class="text-sm font-medium">Vehículo<span class="text-red-600">*</span></label>
<select id="vehiculo_id" name="vehiculo_id"
    class="w-full h-10 rounded-md border border-base-300 bg-base-200
    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
    focus:border-primary transition @error('vehiculo_id') input-error @enderror" required>
    <option value="">Seleccione un vehículo</option>
    @foreach ($vehiculos as $vehiculo) 
    <option value="{{ $vehiculo->id }}"
        data-marca="{{ $vehiculo->marca }}"
        data-modelo="{{ $vehiculo->modelo }}"
        data-tipo="{{ $vehiculo->tipo }}" 
        data-combustible="{{ $vehiculo->tipo_combustible_id }}" 
        data-ultima="{{ $vehiculo->created_at }}">
        Patente: {{ $vehiculo->patente }} 
        - Marca: {{ $vehiculo->marca }}  
        - Modelo: {{ $vehiculo->modelo }}</option> 
    @endforeach
</select>
 @error('vehiculo_id') 
    <small class="text-red-500 error-message">{{ $message }}</small>
@enderror
</div> --}} 
 <div class="space-y-2 mb-2">
    <label for="destino_tipo" class="text-sm font-medium">Tipo de destino <span class="text-red-600">*</span></label> 
    <select id="destino_tipo" name="destino_tipo"
        class="select w-full h-10 rounded-md border-base-300 bg-base-200
        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
        focus:border-primary transition @error('destino_tipo') input-error @enderror" required>
        <option  value="">Seleccione el destino de la carga</option>
        <option  value="vehiculo">Vehiculo</option> 
        <option  value="equipo">Equipo</option>  
        <option  value="destino">Otros (Acuerdo policial, Área de obras públicas, Personas)</option>    
    </select>  
    @error('destino_tipo')
        <small class="text-red-500 error-message">{{ $message }}</small> 
    @enderror
</div>  
<div class="space-y-2 -mt-4">
    <div class="flex items-center justify-between gap-4">
        <label class="text-sm font-medium mb-0">Destinar a: <span class="text-red-600">*</span></label>
        <button type="button" id="btn_elegir_destino" class="btn btn-sm btn-warning"
            onclick="document.getElementById('modal_elegir_destino').checked = true">
            Buscar / seleccionar destino
        </button>
    </div>

    {{-- id oculto que se envía en el request --}}
    <input type="hidden" id="destino_id" name="destino_id" value="{{ old('destino_id') }}">

    {{-- campo solo lectura mostrando el nombre elegido --}}
    <input type="text" id="destino_nombre_visble"
        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm"
        placeholder="Ningún destino seleccionado" readonly>

    @error('destino_id') 
        <small class="text-red-500 error-message">{{ $message }}</small>
    @enderror
</div>
<input type="checkbox" id="modal_elegir_destino" class="modal-toggle" />
<div class="modal">
  <div class="modal-box max-w-4xl">
    <h3 class="font-bold text-lg mb-4" id="titulo_modal_destinos">
      Seleccionar destino
    </h3>
    <input type="text" id="buscador_destinos"
    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
    placeholder="Buscar por nombre, patente, etc."> 

    <div class="overflow-x-auto">
      <table class="table table-zebra w-full text-sm">
       <thead>
            <tr id="tabla_destinos_head">
            {{-- cabeceras generadas por JS --}}
            </tr>
        </thead> 
        <tbody id="tabla_destinos_body">
          {{-- Se llena por JS --}}
        </tbody>
      </table>
      <div class="flex justify-between items-center mt-3 text-xs">
            <button type="button" class="btn btn-xs" id="destinos_prev_page">
                « Anterior
            </button>

            <span id="destinos_pagination_info" class="mx-2">
                {{-- se completa por JS --}}
            </span>

            <button type="button" class="btn btn-xs" id="destinos_next_page">
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
<!-- Select Conductor / Chofer -->
<div id="empleado-card" class="space-y-2 hidden"> 
<label for="empleado_id" class="text-sm font-medium">Empleado que efectua la carga<span class="text-red-600">*</span></label>
<select
id="empleado_id"
name="empleado_id"
class="w-full h-10 rounded-md border border-base-300 bg-base-200
px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
focus:border-primary transition @error('empleado_id') input-error @enderror">
<option value="">Seleccione un conductor</option> 
@foreach ($empleados as $empleado) 
<option value="{{ $empleado->id }}">Nombre: {{ $empleado->nombre }} - DNI: {{ $empleado->dni }}</option> 
@endforeach
</select>
 @error('empleado_id')  
    <small class="text-red-500 error-message">{{ $message }}</small>
@enderror
</div> 
</div>

</div>

<!-- CARD DATOS DEL VEHÍCULO OCULTO  -->  
<div id="vehiculo_info" class="hidden p-4 card bg-base-100 shadow-xl mt-6"> 
    <div class="flex items-center gap-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
             stroke-linejoin="round" class="lucide lucide-fuel w-5 h-5">
            <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
            <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
            <path d="M2 21h13"></path>
            <path d="M3 9h11"></path>
        </svg>
        <span class="font-medium">Información del Vehículo</span>
    </div>

    <div class="grid grid-cols-3 gap-4 text-sm">
        <div>
            <span class="text-muted-foreground">Marca/Modelo:</span>
            <p class="font-medium" id="v_marca_modelo"></p>
        </div>
        <div>
            <span class="text-muted-foreground">Tipo:</span>
            <p class="font-medium" id="v_tipo"></p>
        </div>
        {{-- <div>
            <span class="text-muted-foreground">Kilometraje:</span>
            <p class="font-medium">45,680 km</p>
        </div> --}} 
        <div>
            <span class="text-muted-foreground">Combustible:</span>
            <span id="v_tipo_combustible" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium 
                           w-fit whitespace-nowrap shrink-0 mt-1 bg-secondary text-secondary-foreground">
            </span>
        </div>
        <div>
            <span class="text-muted-foreground">Última Carga:</span>
            <p id="v_ultima_carga" class="font-medium"> (42L)</p> 
        </div>
        {{-- <div>
            <span class="text-muted-foreground">Promedio:</span>
            <p id="v_promedio" class="font-medium">12.5 km/L</p>
        </div> --}} 
    </div>
</div>

</div>

</div>
<!-- FIN DE CARD DE DATOS DE VEHICULO Y CONDUCTOR -->
<!-- DETALLES DE LA CARGA AUTORIZADA -->  
<div data-slot="card" class="card bg-base-100 shadow-xl p-4"> 

    <!-- HEADER -->
    <div data-slot="card-header"
         class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
         gap-1.5 px-6 pt-6">
        <h4 class="text-1xl font-semibold">Detalles de la Carga Autorizada</h4>
        <p class="text-muted-foreground">Especificaciones de la carga de combustible</p>
    </div>

    <!-- CONTENT -->
    <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
        <div class="grid gap-4">

            <!-- FILA: 3 COLUMNAS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Tipo Combustible -->
                <div class="space-y-2">
                    <label for="combustible" class="text-sm font-medium">Tipo de Combustible<span class="text-red-600">*</span></label>
                    <select id="combustible" name="combustible"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('combustible') input-error @enderror transition" required>
                        <option value="">Seleccionar</option>
                        @foreach ($tipo_combustible as $combustible_tipo)
                         <option value="{{ $combustible_tipo->nombre }}"  
                         data-valor="{{ $combustible_tipo->valor }}">{{$combustible_tipo->nombre }}</option>  
                        @endforeach
                    </select> 
                     @error('combustible')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Litros Estimados -->
                <div class="space-y-2">
                    <label for="litros" class="text-sm font-medium">Litros Estimados <span class="text-red-600">*</span></label>
                    <input type="number" id="litros" min="0" max="1000" name="litros" placeholder="0"
                        step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('litros') input-error @enderror transition" required>
                    <p class="text-xs text-gray-500">Dejar vacío para carga completa</p>
                     @error('litros')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror 
                </div>

                <!-- Monto Máximo -->
                <div class="space-y-2"> 
                    <label for="precio" class="text-sm font-medium">Precio del combustible<span class="text-red-600">*</span></label>
                    <input type="number" id="precio" min="0" name="precio"
                        placeholder="0" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('precio') input-error @enderror transition" required readonly> 
                    @error('precio')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror   
                </div> 
            </div>

            <!-- FILA: 2 SELECT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Estación sugerida -->
                <div class="space-y-2">
                    <label for="estacion" class="text-sm font-medium">
                        Estación Sugerida <span class="text-red-600">*</span>
                    </label>
                    <select id="estacion" name="estacion"  
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('estacion') input-error @enderror transition" required>
                        <option value="">Cualquier estación autorizada</option>
                        <option>YPF Feliciano</option> 
                    </select>
                    @error('estacion')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tipo de Pago -->
                <div class="space-y-2">
                    <label for="tipo_de_pago" class="text-sm font-medium">Tipo de Pago Autorizado<span class="text-red-600">*</span></label>
                    <select id="tipo_de_pago" name="tipo_de_pago"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('tipo_de_pago') input-error @enderror transition" required>
                        <option value="">Seleccionar</option>
                        <option value="contado">Pago en efectivo</option>
                        <option value="cuenta_corriente">Cuenta corriente</option> 
                    </select>
                    @error('tipo_de_pago')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

            </div>

           {{--  <!-- MOTIVO -->
            <div class="space-y-2">
                <label for="motivo" class="text-sm font-medium">Motivo / Justificación</label>
                <textarea id="motivo" name="motivo" rows="2"
                    placeholder="Describa el motivo o justificación..."
                    class="w-full rounded-md border border-base-300 bg-base-200
                    px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                    focus:border-primary transition resize-none"></textarea>
            </div> --}}

            <!-- OBSERVACIONES -->
            <div class="space-y-2">
                <label for="observaciones" class="text-sm font-medium">
                    Observaciones / Instrucciones Especiales(Opcional) 
                </label>
                <textarea id="observaciones" name="observaciones" rows="3"
                    placeholder="Ingrese observaciones o instrucciones..."
                    class="w-full rounded-md border border-base-300 bg-base-200
                    px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                    focus:border-primary transition resize-none"></textarea>
            </div>
            
        </div>
    </div> 
</div>
<!-- FIN DE DETALLES DE LA CARGA AUTORIZADA -->
 <!-- ========================= -->
    <!-- BOTONES DEL FORMULARIO -->
    <!-- ========================= -->
    <div class="flex justify-end pt-4">
        <a href="{{ route('combustibles.index') }}" class="btn btn-warning mr-2"> 
            <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> 
            Volver 
        </a>  
        <button type="submit" class="btn btn-primary">
            <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> 
            Guardar Carga De Combustible 
        </button>
    </div>
</form>
{{-- Modal para crear un nuevo destino --}}
<input type="checkbox" id="crear_destino_modal" class="modal-toggle" />
<div class="modal" role="dialog">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Nuevo destino</h3>

        <form method="POST" action="{{ route('destinos.store') }}"> 
            @csrf

            {{-- Nombre --}}
            <div class="form-control mb-3">
                <label for="nuevo_destino_nombre" class="label">
                    <span class="label-text font-medium">Nombre <span class="text-red-600">*</span></span>
                </label>
                <input type="text" id="nuevo_destino_nombre" name="nombre"
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition"
                    placeholder="Ej: Juan Pérez, Policía Local, Walter Motos" required>
            </div>

            {{-- Tipo --}}
            <div class="form-control mb-3">
                <label for="nuevo_destino_tipo" class="label">
                    <span class="label-text font-medium">Tipo <span class="text-red-600">*</span></span>
                </label>
                <select id="nuevo_destino_tipo" name="tipo"
                    class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="persona">Persona</option>
                    <option value="organismo_publico">Organismo público</option>
                    <option value="empresa">Empresa</option>
                    <option value="institucion">Institución</option>
                    <option value="policia">Policía</option>
                </select>
            </div>

            {{-- Descripción --}}
            <div class="form-control mb-4">
                <label for="nuevo_destino_descripcion" class="label">
                    <span class="label-text font-medium">Descripción <span class="text-red-600">*</span></span>
                </label>
                <textarea id="nuevo_destino_descripcion" name="descripcion" rows="3"
                    class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition"
                    placeholder="Ej: Acuerdo policial, Apoyo operativo, Empleado municipal, etc."></textarea>
            </div>

            <div class="modal-action">
                <label for="crear_destino_modal" class="btn btn-ghost">
                    Cancelar
                </label>
                <button type="submit" class="btn btn-primary">
                    Guardar destino
                </button>
            </div>
        </form>
    </div>

    <label class="modal-backdrop" for="crear_destino_modal">Close</label>
</div>
@endsection

@section('js')
    <script> 
     $(document).ready(function () { 

        function actualizarDatosVehiculo() {
            var selected = $('#vehiculo_id option:selected');
            var id = selected.val();

            if (!id) { 
                $('#vehiculo_info').addClass('hidden'); 
                return;
            }

            // Mostrar card
            $('#vehiculo_info').removeClass('hidden');

            // Cargar datos reales
            $('#v_marca_modelo').text(selected.data('marca') + " " + selected.data('modelo'));
            $('#v_tipo').text(selected.data('tipo'));
            $('#v_tipo_combustible').text(selected.data('combustible')); 
            $('#v_ultima_carga').text(selected.data('ultima')); 
        }

        $('#vehiculo_id').change(actualizarDatosVehiculo);

        actualizarDatosVehiculo(); // por si ya viene seleccionado
    });
</script>
<script>
    let destinosCache = [];
    let columnasGlobal = [];
    let tipoActual     = null;
    let paginaActual    = 1;
    const itemsPorPagina = 5; // o 10, como prefieras

    function cargarDestinosEnTabla(tipo) {
        const tbody  = document.getElementById('tabla_destinos_body');
        const thead  = document.getElementById('tabla_destinos_head');
        const titulo = document.getElementById('titulo_modal_destinos');

        tipoActual = tipo;

        if (!tipo) {
            columnasGlobal = [];
            thead.innerHTML = '';
            tbody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500">Primero seleccione un tipo de destino.</td></tr>';
            return;
        }

        // Título según tipo
        if (tipo === 'vehiculo') titulo.textContent = 'Seleccionar vehículo';
        else if (tipo === 'equipo') titulo.textContent = 'Seleccionar equipo';
        else titulo.textContent = 'Seleccionar destino';

        // Definir columnas por tipo
        if (tipo === 'vehiculo') {
            columnasGlobal = [
                { key: 'patente', label: 'Patente' },
                { key: 'marca',   label: 'Marca' },
                { key: 'modelo',  label: 'Modelo' },
                { key: 'anio',    label: 'Año' },
                { key: 'color',   label: 'Color' },
                { key: 'tipo',    label: 'Tipo' },
            ];
        } else if (tipo === 'equipo') {
            columnasGlobal = [
                { key: 'nombre',      label: 'Nombre' }, 
                { key: 'tipo_equipo', label: 'Tipo equipo' },
                { key: 'marca',       label: 'Marca' },
                { key: 'modelo',      label: 'Modelo' },
                { key: 'numero_serie',label: 'N° serie' },
            ];
        } else { // destino / otros
            columnasGlobal = [
                { key: 'nombre',      label: 'Nombre' },
                { key: 'tipo',        label: 'Tipo' },
                { key: 'descripcion', label: 'Descripción' },
            ];
        }

        // Pintar cabecera
        thead.innerHTML = columnasGlobal.map(col => `<th>${col.label}</th>`).join('');

        tbody.innerHTML = '<tr><td class="py-4 text-center text-sm" colspan="'+columnasGlobal.length+'">Cargando...</td></tr>';

        fetch('{{ url('api/destinos/combustible') }}/' + tipo) 
            .then(res => res.json())
            .then(data => {
                destinosCache = data;
                paginaActual = 1;   
                renderTablaDestinos(destinosCache);
            });
    }

    function renderTablaDestinos(data) {
        const tbody = document.getElementById('tabla_destinos_body');
        const info  = document.getElementById('destinos_pagination_info');
        tbody.innerHTML = ''; 

        const total = data.length; 

       if (!total) {
        tbody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500" colspan="'+columnasGlobal.length+'">No se encontraron destinos.</td></tr>';
        if (info) info.textContent = '0 de 0';
        return;
        } 

        const totalPaginas = Math.ceil(total / itemsPorPagina) 
        // asegurar que paginaActual esté en rango
        if (paginaActual > totalPaginas) paginaActual = totalPaginas;
        if (paginaActual < 1) paginaActual = 1;

        const inicio = (paginaActual - 1) * itemsPorPagina;
        const fin    = inicio + itemsPorPagina;

        const pagina = data.slice(inicio, fin);


        pagina .forEach(dest => { 
            const tr = document.createElement('tr');
            tr.classList.add('cursor-pointer','hover:bg-base-300'); 

            tr.innerHTML = columnasGlobal.map(col => `<td>${dest[col.key] ?? ''}</td>`).join('');

            tr.addEventListener('click', function () {
                // Setear valores en el formulario principal
                document.getElementById('destino_id').value = dest.id;

                // Texto visible amigable
                const visibleName =
                    tipoActual === 'vehiculo'
                        ? (dest.patente
                            ? `${dest.patente} - ${dest.marca ?? ''} ${dest.modelo ?? ''}`.trim()
                            : (dest.nombre ?? 'Sin datos'))
                    : tipoActual === 'equipo'
                        ? (dest.nombre
                            ? `${dest.nombre} - ${dest.tipo_equipo ?? ''} ${dest.marca ?? ''} ${dest.modelo ?? ''}`.trim()
                            : 'Sin datos')
                    : (dest.nombre ?? 'Sin datos'); 

                document.getElementById('destino_nombre_visble').value = visibleName;
                document.getElementById('modal_elegir_destino').checked = false;
            });

            tbody.appendChild(tr);
        });

        if (info) {
        const desde = inicio + 1;
        const hasta = Math.min(fin, total);
        info.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
       }
    }

    // Cambio de tipo
    document.getElementById('destino_tipo').addEventListener('change', function () {
        const tipo = this.value;
        cargarDestinosEnTabla(tipo);
        document.getElementById('destino_id').value = '';
        document.getElementById('destino_nombre_visble').value = '';
        document.getElementById('buscador_destinos').value = '';
    });

    // Botón para abrir modal
    document.getElementById('btn_elegir_destino').addEventListener('click', function () {
        const tipo = document.getElementById('destino_tipo').value;
        cargarDestinosEnTabla(tipo);
    });

    // Buscador
    document.getElementById('buscador_destinos').addEventListener('input', function () {
        const term = this.value.toLowerCase();

        const filtrados = destinosCache.filter(dest => {
            const texto = Object.values(dest).join(' ').toLowerCase();
            return texto.includes(term);
        });

        renderTablaDestinos(filtrados);
    });

    document.getElementById('destinos_prev_page').addEventListener('click', function () {
    if (paginaActual > 1) {
        paginaActual--;
        renderTablaDestinos(destinosCache);
    }
   });

    document.getElementById('destinos_next_page').addEventListener('click', function () {
        const totalPaginas = Math.ceil(destinosCache.length / itemsPorPagina);
        if (paginaActual < totalPaginas) {
            paginaActual++;
            renderTablaDestinos(destinosCache);
        }
    });
</script>
<script> 
document.getElementById('buscador_destinos').addEventListener('input', function () {
    const term = this.value.toLowerCase();

    const filtrados = destinosCache.filter(dest => {
        // Concatenar campos relevantes a un string
        const texto = Object.values(dest).join(' ').toLowerCase();
        return texto.includes(term);
    });

      paginaActual = 1;   

    renderTablaDestinos(filtrados, document.getElementById('destino_tipo').value);
}); 
</script> 
 <script>
    $(document).ready(function () {

        function toggleEmpleadoCard() {
            const tipo = $('#destino_tipo').val(); 

            if (tipo === 'vehiculo' || tipo === 'equipo' ) {  
                // Mostrar solo cuando el destino es vehiculo
                $('#empleado-card').removeClass('hidden');
            } else {
                // Ocultar para equipo / destino / vacío
                $('#empleado-card').addClass('hidden');
            }
        }

        // Cuando cambie el select
        $('#destino_tipo').on('change', toggleEmpleadoCard);

        // Para aplicar la lógica si viene con old('destino_tipo')
        toggleEmpleadoCard();
    });
</script>
<script>
    $(document).ready(function () {
    function MostrarValorDelCombustible() {
        var selected = $('#combustible option:selected');  
            
         $('#precio').val(selected.data('valor'));    
        }
        $('#combustible').change(MostrarValorDelCombustible); 
        // Para aplicar la lógica si viene con old('destino_tipo')
        MostrarValorDelCombustible();  
    });
</script>
@endsection 