@extends('layouts.admin')

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
    <div class="card bg-base-100 shadow p-6">
        <form action="{{ route('obras.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label font-semibold">
                        Nombre de la Obra <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="input input-bordered w-full"
                        required placeholder="Ej: Predio Multi-Eventos">
                    @error('nombre')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label font-semibold">Descripción (Opcional)</label>
                    <input type="text" name="descripcion" value="{{ old('descripcion') }}"
                        class="input input-bordered w-full" placeholder="Ej: Mejoras y expansión del predio">
                    @error('descripcion')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Responsable -->
                <div class="form-control">
                    <label class="label font-semibold">Responsable (Opcional)</label>
                    <input type="text" name="responsable" value="{{ old('responsable') }}"
                        class="input input-bordered w-full" placeholder="Ej: Carlos Pérez">
                    @error('responsable')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teléfono responsable -->
                <div class="form-control">
                    <label class="label font-semibold">Teléfono Responsable (Opcional)</label>
                    <input type="text" name="telefono_responsable" value="{{ old('telefono_responsable') }}"
                        class="input input-bordered w-full" placeholder="Ej: 3458452814">
                    @error('telefono_responsable')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Presupuesto -->
                <div class="form-control">
                    <label class="label font-semibold">Presupuesto (Opcional)</label>
                    <input type="number" name="presupuesto" min="0" step="0.01" value="{{ old('presupuesto') }}"
                        class="input input-bordered w-full" placeholder="Ej: 10000000">
                    @error('presupuesto')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Monto ejecutado -->
                <div class="form-control">
                    <label class="label font-semibold">Monto Ejecutado</label>
                    <input type="number" name="monto_ejecutado" min="0" step="0.01"
                        value="{{ old('monto_ejecutado', 0) }}" class="input input-bordered w-full"
                        placeholder="Ej: 2500000">
                    @error('monto_ejecutado')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="form-control">
                    <label class="label font-semibold">Dirección (Opcional)</label>
                    <input type="text" name="direccion" value="{{ old('direccion') }}"
                        class="input input-bordered w-full" placeholder="Ej: Calle Buenos Aires 150">
                    @error('direccion')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Barrio -->
                <div class="form-control">
                    <label class="label font-semibold">Barrio (Opcional)</label>
                    <input type="text" name="barrio" value="{{ old('barrio') }}" class="input input-bordered w-full"
                        placeholder="Ej: Barrio Córdoba">
                    @error('barrio')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ciudad - ocupa toda la fila -->
                <div class="form-control md:col-span-2">
                    <label class="label font-semibold">Ciudad (Opcional)</label>
                    <input type="text" name="ciudad" value="{{ old('ciudad', 'San José de Feliciano') }}"
                        class="input input-bordered w-full" placeholder="Ej: San José de Feliciano">
                    @error('ciudad')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Fechas agrupadas -->
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Fecha inicio -->
                    <div class="form-control">
                        <label class="label font-semibold">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                            class="input input-bordered w-full">
                        @error('fecha_inicio')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha Estimada -->
                    <div class="form-control">
                        <label class="label font-semibold">Fecha Estimada de Finalización</label>
                        <input type="date" name="fecha_estimada_fin" value="{{ old('fecha_estimada_fin') }}"
                            class="input input-bordered w-full">
                        @error('fecha_estimada_fin')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha fin -->
                    <div class="form-control">
                        <label class="label font-semibold">Fecha de Finalización (Opcional)</label>
                        <input type="date" name="fecha_fin" value="{{ old('fecha_fin') }}"
                            class="input input-bordered w-full">
                        @error('fecha_fin')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Estado obra -->
                <div class="form-control md:col-span-2">
                    <label class="label font-semibold">
                        Estado de la Obra <span class="text-red-600">*</span>
                    </label>
                    <select name="estado_obra" class="select select-bordered w-full">
                        <option value="planificada">Planificada</option>
                        <option value="en_ejecucion">En ejecución</option>
                        <option value="demorada">Demorada</option>
                        <option value="finalizada">Finalizada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                    @error('estado_obra')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Observaciones -->
                <div class="form-control md:col-span-2">
                    <label class="label font-semibold">Observaciones (Opcional)</label>
                    <textarea name="observaciones" rows="4" class="textarea textarea-bordered w-full"
                        placeholder="Notas o aclaraciones">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- BOTONES -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('obras.index') }}" class="btn btn-neutral">
                    <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> Guardar Obra
                </button>
            </div>

        </form>
    </div>
@endsection
