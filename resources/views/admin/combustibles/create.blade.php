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
                    <label for="codigo" class="text-sm font-medium">Código de Orden</label>
                    <input 
                        id="codigo"
                        name="codigo"
                        placeholder="OCB-001"
                        value="OCB-847186"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <!-- Fecha -->
                <div class="space-y-2">
                    <label for="fecha_emision" class="text-sm font-medium">Fecha de Emisión</label>
                    <input 
                        type="date"
                        id="fecha_emision"
                        name="fecha_emision"
                        value="2025-11-20"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <!-- Usuario -->
                <div class="space-y-2">
                    <label for="usuario_autoriza" class="text-sm font-medium">Usuario que Autoriza</label>

                    <select 
                        id="usuario_autoriza"
                        name="usuario_autoriza"
                        class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                        <option selected>María Sánchez - Supervisor</option>
                        <option>Pedro Gómez - Encargado</option>
                        <option>Laura Martínez - Administración</option>
                    </select>
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
<label for="vehiculo" class="text-sm font-medium">Vehículo</label>
<select
id="vehiculo"
name="vehiculo"
class="w-full h-10 rounded-md border border-base-300 bg-base-200
px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
focus:border-primary transition">
<option selected>Seleccione un vehículo</option>
@foreach ($vehiculos as $vehiculo)
<option>{{ $vehiculo->patente }} - {{ $vehiculo->marca }} {{ $vehiculo->modelo }}</option> 
@endforeach
</select>
</div>


<!-- Select Conductor / Chofer -->
<div class="space-y-2">
<label for="chofer" class="text-sm font-medium">Conductor / Chofer</label>
<select
id="chofer"
name="chofer"
class="w-full h-10 rounded-md border border-base-300 bg-base-200
px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
focus:border-primary transition">
<option selected>Seleccione un conductor</option>
<option>Carlos Pérez - DNI 87654321</option>
<option>Mariana López - DNI 55443322</option>
<option>Juan García - DNI 11223344</option>
</select>
</div>


</div>


</div>

<!-- CARD DATOS DEL VEHÍCULO OCULTO  -->  
<div class="hidden p-4 card bg-base-100 shadow-xl mt-6"> 
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
            <p class="font-medium">Toyota Hilux 2020</p>
        </div>
        <div>
            <span class="text-muted-foreground">Tipo:</span>
            <p class="font-medium">Camioneta</p>
        </div>
        <div>
            <span class="text-muted-foreground">Kilometraje:</span>
            <p class="font-medium">45,680 km</p>
        </div>
        <div>
            <span class="text-muted-foreground">Combustible:</span>
            <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium 
                           w-fit whitespace-nowrap shrink-0 mt-1 bg-secondary text-secondary-foreground">
                Diesel
            </span>
        </div>
        <div>
            <span class="text-muted-foreground">Última Carga:</span>
            <p class="font-medium">2024-11-12 (42L)</p>
        </div>
        <div>
            <span class="text-muted-foreground">Promedio:</span>
            <p class="font-medium">12.5 km/L</p>
        </div>
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
                    <label for="tipo_combustible" class="text-sm font-medium">Tipo de Combustible</label>
                    <select id="tipo_combustible" name="tipo_combustible"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition">
                        <option value="">Seleccionar</option>
                        <option value="nafta">Nafta Súper</option>
                        <option value="premium">Nafta Premium</option>
                        <option value="diesel">Diesel</option>
                        <option value="euro">Diesel Euro</option>
                    </select>
                </div>

                <!-- Litros Estimados -->
                <div class="space-y-2">
                    <label for="litros_estimados" class="text-sm font-medium">Litros Estimados (Opcional)</label>
                    <input type="number" id="litros_estimados" name="litros_estimados" placeholder="0"
                        step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition">
                    <p class="text-xs text-gray-500">Dejar vacío para carga completa</p>
                </div>

                <!-- Monto Máximo -->
                <div class="space-y-2">
                    <label for="monto_maximo" class="text-sm font-medium">Monto Máximo Estimado</label>
                    <input type="number" id="monto_maximo" name="monto_maximo"
                        placeholder="$0.00" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition">
                </div>

            </div>

            <!-- FILA: 2 SELECT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Estación sugerida -->
                <div class="space-y-2">
                    <label for="estacion_sugerida" class="text-sm font-medium">
                        Estación Sugerida (Opcional)
                    </label>
                    <select id="estacion_sugerida" name="estacion_sugerida"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition">
                        <option value="">Cualquier estación autorizada</option>
                        <option>YPF Ruta 14</option>
                        <option>SHELL Centro</option>
                        <option>AXION Norte</option>
                    </select>
                </div>

                <!-- Tipo de Pago -->
                <div class="space-y-2">
                    <label for="tipo_pago" class="text-sm font-medium">Tipo de Pago Autorizado</label>
                    <select id="tipo_pago" name="tipo_pago"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition">
                        <option value="">Seleccionar</option>
                        <option value="contado">Pago en efectivo</option>
                        <option value="cuenta_corriente">Cuenta corriente</option>
                        <option value="tarjeta">Tarjeta corporativa</option>
                    </select>
                </div>

            </div>

            <!-- MOTIVO -->
            <div class="space-y-2">
                <label for="motivo" class="text-sm font-medium">Motivo / Justificación</label>
                <textarea id="motivo" name="motivo" rows="2"
                    placeholder="Describa el motivo o justificación..."
                    class="w-full rounded-md border border-base-300 bg-base-200
                    px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                    focus:border-primary transition resize-none"></textarea>
            </div>

            <!-- OBSERVACIONES -->
            <div class="space-y-2">
                <label for="observaciones" class="text-sm font-medium">
                    Observaciones / Instrucciones Especiales
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



</form>
@endsection
 