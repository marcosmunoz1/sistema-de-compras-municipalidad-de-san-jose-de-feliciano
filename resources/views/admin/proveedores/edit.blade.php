@extends('layouts.admin')

@section('content')
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Editar Proveedor: {{ $proveedor->empresa }}</h1> 
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
      <a href="{{ route('proveedores.index') }}">
        <x-heroicon-o-truck class="w-4 h-4 inline" />
        Proveedores
      </a>
    </li>
    <li>
      <span class="inline-flex items-center gap-2">
        <x-heroicon-o-pencil class="w-4 h-4 inline" />
        Editar Proveedor
      </span>
    </li>
  </ul>
</div>
<!-- Formulario -->
<form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="space-y-6">
 @csrf
 @method('PUT')
    <!-- ============================= -->
    <!-- CARD 1 — DATOS DE LA EMPRESA -->
    <!-- ============================= -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
             class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 data-slot="card-title" class="text-1xl font-semibold">Datos de la Empresa</h4>
            <p data-slot="card-description" class="text-muted-foreground">Información básica del proveedor</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-2 gap-4">
                    <!-- Empresa -->
                    <div class="space-y-2">
                        <label for="empresa" class="text-sm font-medium">Nombre de la Empresa <span class="text-red-600">*</span></label>
                        <input id="empresa" name="empresa" value="{{ $proveedor->empresa, old('empresa') }}" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" required />
                    </div>

                    <!-- Razon Social -->
                    <div class="space-y-2">
                        <label for="razon_social" class="text-sm font-medium">Razón Social</label>
                        <input id="razon_social" name="razon_social" value="{{ $proveedor->razon_social, old('razon_social') }}" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label for="cuit" class="text-sm font-medium">CUIT / RUC</label>
                        <input id="cuit" name="cuit" value="{{ $proveedor->cuit, old('cuit') }}" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium">Email</label>
                        <input id="email" name="email" type="email" value="{{ $proveedor->email, old('email') }}" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                    </div>

                    <div class="space-y-2">
                        <label for="codigo_postal" class="text-sm font-medium">Código Postal</label>
                        <input id="codigo_postal" name="codigo_postal" value="{{ $proveedor->codigo_postal, old('codigo_postal') }}" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                    </div>
                </div>

                <div class="pt-4 mt-2">
                    <h4 class="mb-4 ">Datos de Contacto</h4>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label for="nombre" class="text-sm font-medium">Nombre del Contacto <span class="text-red-600">*</span></label>
                            <input id="nombre" name="nombre" value="{{ $proveedor->nombre, old('nombre') }}" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" required />
                        </div>

                        <div class="space-y-2">
                            <label for="telefono" class="text-sm font-medium">Teléfono</label>
                            <input id="telefono" name="telefono" value="{{ $proveedor->telefono, old('telefono') }}" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" />
                        </div>

                        <div class="space-y-2">
                            <label for="celular" class="text-sm font-medium">Celular <span class="text-red-600">*</span></label>
                            <input id="celular" name="celular" value="{{ $proveedor->celular, old('celular') }}" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" required />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ========================= -->
    <!-- CARD 2 — UBICACIÓN -->
    <!-- ========================= -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
             class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Ubicación</h4>
            <p class="text-muted-foreground">Dirección y ubicación del proveedor</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-3 gap-4">
                    <!-- País -->
                    <div class="space-y-2">
                        <label for="pais" class="text-sm font-medium">País <span class="text-red-600">*</span></label>
                        <select id="pais" value="{{ $proveedor->pais, old('pais') }}" name="pais" class="select select-bordered w-full h-9">
                            <option>Argentina</option>
                            <option>Uruguay</option>
                            <option>Chile</option>
                        </select>
                    </div>

                    <!-- Provincia -->
                    <div class="space-y-2">
                        <label for="provincia" class="text-sm font-medium">Provincia <span class="text-red-600">*</span></label>
                        <select id="provincia" value="{{ $proveedor->provincia, old('provincia') }}" name="provincia" class="select select-bordered w-full h-9">
                            <option>Entre Ríos</option>
                            <option>Corrientes</option>
                            <option>Buenos Aires</option>
                        </select>
                    </div>

                    <!-- Localidad -->
                    <div class="space-y-2">
                        <label for="localidad" class="text-sm font-medium">Localidad <span class="text-red-600">*</span></label>
                        <input id="localidad" name="localidad" value="{{ $proveedor->localidad, old('localidad') }}"    
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                    </div>
                </div>

                <!-- Dirección -->
                <div class="space-y-2">
                    <label for="direccion" class="text-sm font-medium">Dirección</label>
                    <input id="direccion" name="direccion" value="{{ $proveedor->direccion, old('direccion') }}" 
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" />
                </div>
            </div>
        </div>
        </div>
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h3 class="text-1xl font-semibold">
                Observaciones
            </h3>

            <p class="">
                Información adicional del proveedor
            </p>

            <div>
                <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-1">
                    Observaciones / Notas
                </label>

                <textarea id="observaciones" name="observaciones" rows="5"
                    placeholder="Ingrese cualquier observación o nota relevante sobre el proveedor..."
                    value="{{ $proveedor->observaciones, old('observaciones') }}"
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                
                </textarea>
            </div>
        </div>
    </div>

    <!-- ========================= -->
    <!-- BOTONES DEL FORMULARIO -->
    <!-- ========================= -->
    <div class="flex justify-end pt-4">
        <a href="{{ route('proveedores.index') }}" class="btn btn-warning mr-2"> 
            <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> 
            Volver 
        </a>  
        <button type="submit" class="btn btn-primary">
            <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> 
            Guardar Proveedor 
        </button>
    </div>

</form>

@endsection
