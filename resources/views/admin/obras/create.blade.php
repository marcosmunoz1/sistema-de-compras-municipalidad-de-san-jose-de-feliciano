@extends('layouts.admin')
@section('title', 'Nueva Obra') 

@section('content')
    <!-- Título y botón volver -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Crear Obra</h1>
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
                <a href="{{ route('obras.index') }}">
                    <x-bi-building class="w-4 h-4 inline" />

                    Obras
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Crear Obra
                </span>
            </li>
        </ul>
    </div>

    <!-- FORMULARIO -->
    <div class="space-y-6">
        <form action="{{ route('obras.store') }}" method="POST"> 
            @csrf

        <!-- CARD 1: Información general -->
        <div class="card bg-base-100 shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Información General</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> 

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label font-semibold">
                        Nombre de la Obra <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Predio Multi-Eventos" required>
                        @error('nombre')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Descripción -->
                <div class="form-control"> 
                    <label class="label font-semibold">Descripción (Opcional)</label>
                    <textarea name="descripcion" rows="3"
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Mejoras y expansión del predio">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Responsable -->
                <div class="form-control">
                    <label class="label font-semibold">Responsable <span class="text-red-600">*</span></label>
                    <input type="text" name="responsable" value="{{ old('responsable') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Carlos Pérez">
                        @error('responsable')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Ejecutado por -->
                <div class="form-control">
                    <label class="label font-semibold">Ejecutado por <span class="text-red-600">*</span></label>
                    <input type="text" name="ejecutado_por" value="{{ old('ejecutado_por') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Damián Arévalo" required>
                        @error('ejecutado_por')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Resolución -->
                <div class="form-control">
                    <label class="label font-semibold">Resolución o decreto</label>
                    <input type="text" name="resolucion_decreto"
                        value="{{ old('resolucion_decreto') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="DECRETO MUNICIPAL N° 98/2024">
                        @error('resolucion_decreto')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>
            </div>
        </div>

        <!-- CARD 2: Ubicación -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Ubicación</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Dirección -->
                <div class="form-control">
                    <label class="label font-semibold">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Calle Buenos Aires 150">
                        @error('direccion')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Barrio -->
                <div class="form-control">
                    <label class="label font-semibold">Barrio</label>
                    <input type="text" name="barrio" value="{{ old('barrio') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Barrio Córdoba">
                        @error('barrio')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Ciudad (ocupa ambas columnas) -->
                <div class="form-control md:col-span-2">
                    <label class="label font-semibold">Ciudad</label>
                    <input type="text" name="ciudad"
                        value="{{ old('ciudad', 'San José de Feliciano') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="San José de Feliciano">
                        @error('ciudad')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>
            </div>
        </div>

        <!-- CARD 3: Fechas -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Fechas</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Fecha inicio -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        @error('fecha_inicio')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Fecha estimada -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha Estimada</label>
                    <input type="date" name="fecha_estimada_fin"
                        value="{{ old('fecha_estimada_fin') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        @error('fecha_estimada_fin')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>

                <!-- Fecha fin -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin"
                        value="{{ old('fecha_fin') }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        @error('fecha_fin')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>
            </div>
        </div>

        <!-- CARD 4: Estado, observaciones y botones -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Estado y Observaciones</h2>

            <div class="grid grid-cols-1 gap-6">

                <!-- Estado -->
                <div class="form-control">
                    <label class="label font-semibold">Estado de la Obra *</label>
                    <select name="estado_obra"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        <option value="planificada">Planificada</option>
                        <option value="en_ejecucion">En ejecución</option>
                        <option value="demorada">Demorada</option>
                        <option value="finalizada">Finalizada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                    @error('estado_obra')
                        <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                    @enderror 
                </div>

                <!-- Observaciones -->
                <div class="form-control">
                    <label class="label font-semibold">Observaciones</label>
                    <textarea name="observaciones" rows="4"
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Notas o aclaraciones">{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <span class="text-red-600 mt-2 text-sm">{{ $message }}</span>
                        @enderror 
                </div>
            </div>

            <!-- Botones -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('obras.index') }}" class="btn btn-warning mr-2">
                   <x-heroicon-m-arrow-left class="w-4 h-4 inline" />  Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> Guardar Obra
                </button>
            </div>
        </div>

     </form>
</div> 
@endsection 