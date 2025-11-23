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
                <div class="space-y-2">
                    <label for="codigo" class="text-sm font-medium">Código de Orden<span class="text-red-600">*</span></label>
                    <input 
                        id="codigo"
                        name="codigo"
                        placeholder="Ejemplo: OCB-001..."
                        value="{{ old('codigo') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('codigo') input-error @enderror"> 
                        @error('codigo')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                </div>

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
                    <label for="user_id" class="text-sm font-medium">Usuario que Autoriza<span class="text-red-600">*</span></label>

                    <select 
                        id="user_id"
                        name="user_id"
                        class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('user_id') input-error @enderror" required> 
                        <option value="">Seleccione un usuario</option>   
                        @foreach ($users as $usuario) 
                            <option value="{{ $usuario->id }}">{{ $usuario->name }} - {{ $usuario->roles->pluck('name')->join(', ') }}</option>  
                        @endforeach 
                    </select>
                    @error('user_id')
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
<h4 class="text-1xl font-semibold">Datos del Vehículo y Conductor</h4>
<p class="text-muted-foreground">Información del vehículo a cargar combustible</p>
</div>


<!-- CONTENT -->
<div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
<div class="grid gap-4">


<!-- FILA SELECT VEHÍCULO & SELECT CHOFER -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">


<!-- Select Vehículo -->
<div class="space-y-2">
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
        data-combustible="{{ $vehiculo->tipo_combustible }}" 
        data-ultima="{{ $vehiculo->created_at }}">
        Patente: {{ $vehiculo->patente }} 
        - Marca: {{ $vehiculo->marca }}  
        - Modelo: {{ $vehiculo->modelo }}</option> 
    @endforeach
</select>
 @error('vehiculo_id') 
    <small class="text-red-500 error-message">{{ $message }}</small>
@enderror
</div>


<!-- Select Conductor / Chofer -->
<div class="space-y-2">
<label for="empleado_id" class="text-sm font-medium">Conductor / Chofer<span class="text-red-600">*</span></label>
<select
id="empleado_id"
name="empleado_id"
class="w-full h-10 rounded-md border border-base-300 bg-base-200
px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
focus:border-primary transition @error('empleado_id') input-error @enderror" required>
<option selected>Seleccione un conductor</option>
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
                         <option value="{{ $combustible_tipo->nombre }}">{{$combustible_tipo->nombre }}</option>  
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
                        focus:border-primary @error('precio') input-error @enderror transition" required>
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
                        <option>YPF Ruta 14</option> 
                        <option>SHELL Centro</option>
                        <option>AXION Norte</option>
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
@endsection

 