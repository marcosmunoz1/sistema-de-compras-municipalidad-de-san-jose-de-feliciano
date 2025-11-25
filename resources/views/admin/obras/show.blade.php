@extends('layouts.admin')

@section('content')
    <!-- Título y botón volver -->
    <div>
        <h1 class="text-2xl font-semibold">Información de la obra: {{ $obra->nombre }}</h1>

        @if ($obra->estado)
            <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
        @else
            <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
        @endif
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
                    <x-heroicon-o-briefcase class="w-4 h-4 inline" />
                    Obras
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver
                </span>
            </li>
        </ul>
    </div>

    <!-- FORMULARIO -->
    <div class="card bg-base-100 shadow p-6">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Nombre -->
            <div class="form-control">
                <label class="label font-semibold">
                    Nombre de la Obra
                </label>
                <input type="text" name="nombre" value="{{ $obra->nombre }}" class="input input-bordered w-full"
                    disabled>
            </div>

            <!-- Descripción -->
            <div class="form-control">
                <label class="label font-semibold">Descripción</label>
                <input type="text" name="descripcion" value="{{ $obra->descripcion }}"
                    class="input input-bordered w-full" disabled>
            </div>

            <!-- Responsable -->
            <div class="form-control">
                <label class="label font-semibold">Responsable</label>
                <input type="text" name="responsable" value="{{ $obra->responsable }}"
                    class="input input-bordered w-full" disabled>
            </div>

            <!-- Teléfono responsable -->
            <div class="form-control">
                <label class="label font-semibold">Teléfono Responsable</label>
                <input type="text" name="telefono_responsable" value="{{ $obra->telefono_responsable }}"
                    class="input input-bordered w-full" disabled>
            </div>

            <!-- Presupuesto -->
            <div class="form-control">
                <label class="label font-semibold">Presupuesto</label>
                <input type="number" name="presupuesto" min="0" step="0.01" value="{{ $obra->presupuesto }}"
                    class="input input-bordered w-full" disabled>
            </div>

            <!-- Monto ejecutado -->
            <div class="form-control">
                <label class="label font-semibold">Monto Ejecutado</label>
                <input type="number" name="monto_ejecutado" min="0" step="0.01"
                    value="{{ $obra->monto_ejecutado }}" class="input input-bordered w-full" disabled>
            </div>

            <!-- Dirección -->
            <div class="form-control">
                <label class="label font-semibold">Dirección</label>
                <input type="text" name="direccion" value="{{ $obra->direccion }}" class="input input-bordered w-full"
                    disabled>

            </div>

            <!-- Barrio -->
            <div class="form-control">
                <label class="label font-semibold">Barrio</label>
                <input type="text" name="barrio" value="{{ $obra->barrio }}" class="input input-bordered w-full"
                    disabled>

            </div>

            <!-- Ciudad - ocupa toda la fila -->
            <div class="form-control md:col-span-2">
                <label class="label font-semibold">Ciudad</label>
                <input type="text" name="ciudad" value="{{ $obra->ciudad }}" class="input input-bordered w-full"
                    disabled>
            </div>


            <!-- Fechas agrupadas -->
            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Fecha inicio -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $obra->fecha_inicio?->format('Y-m-d') }}"
                        class="input input-bordered w-full" disabled>

                </div>

                <!-- Fecha Estimada -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha Estimada de Finalización</label>
                    <input type="date" name="fecha_estimada_fin"
                        value="{{ $obra->fecha_estimada_fin?->format('Y-m-d') }}" class="input input-bordered w-full"
                        disabled>
                </div>

                <!-- Fecha fin -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin" value="{{ $obra->fecha_fin?->format('Y-m-d') }}"
                        class="input input-bordered w-full" disabled>
                </div>
            </div>

            <!-- Estado obra -->
            <div class="form-control md:col-span-2">
                <label class="label font-semibold">
                    Estado de la Obra
                </label>
                <select name="estado_obra" class="select select-bordered w-full" disabled>
                    <option value="planificada" @selected($obra->estado_obra === 'planificada')>Planificada</option>
                    <option value="en_ejecucion" @selected($obra->estado_obra === 'en_ejecucion')>En ejecución</option>
                    <option value="demorada" @selected($obra->estado_obra === 'demorada')>Demorada</option>
                    <option value="finalizada" @selected($obra->estado_obra === 'finalizada')>Finalizada</option>
                    <option value="cancelada" @selected($obra->estado_obra === 'cancelada')>Cancelada</option>
                </select>
            </div>

            <!-- Observaciones -->
            <div class="form-control md:col-span-2">
                <label class="label font-semibold">Observaciones</label>
                <textarea name="observaciones" rows="4" class="textarea textarea-bordered w-full" disabled>{{ $obra->observaciones }}</textarea>
            </div>

        </div>

        <!-- BOTONES -->
        <div class="mt-6 flex justify-end gap-3">
            <a href="{{ route('obras.index') }}" class="btn btn-neutral">
                <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> Volver
            </a>
        </div>

    </div>
@endsection
