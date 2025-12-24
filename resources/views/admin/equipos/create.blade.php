@extends('layouts.admin')
@section('title', 'Nuevo Equipo')
@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs text-sm mb-6">
    <ul>
        <li>
            <a href="{{ route('admin.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('equipos.index') }}">
                <x-heroicon-o-wrench-screwdriver class="w-4 h-4 inline" />
                Equipos
            </a>
        </li>
        <li>
            <x-heroicon-o-plus class="w-4 h-4 inline" />
            Nuevo Equipo
        </li>
    </ul>
</div>

<!-- Título -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Nuevo Equipo</h1>
</div>

<!-- Card del Formulario -->
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        
        <form action="{{ route('equipos.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Alert informativo -->
            <div role="alert" class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>La catalogación se generará automáticamente según el área seleccionada (ej: SG-001, OP-002)</span>
            </div>

            <!-- Grid de campos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Área -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Área <span class="text-error">*</span></span>
                    </label>
                    <select name="area_id" 
                            class="select select-bordered w-full @error('area_id') select-error @enderror"
                            required>
                        <option disabled selected value="">Seleccionar área</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->nombre }} ({{ $area->prefijo_catalogacion }})
                            </option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Equipamiento -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Equipamiento <span class="text-error">*</span></span>
                    </label>
                    <input type="text" 
                           name="equipamiento" 
                           value="{{ old('equipamiento') }}"
                           placeholder="Ej: Computadora de escritorio"
                           class="input input-bordered w-full @error('equipamiento') input-error @enderror"
                           required>
                    @error('equipamiento')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Marca -->
                <div class="form-control w-full md:col-span-2">
                    <label class="label">
                        <span class="label-text font-medium">Marca <span class="text-error">*</span></span>
                    </label>
                    <input type="text" 
                           name="marca" 
                           value="{{ old('marca') }}"
                           placeholder="Ej: HP, Dell, Lenovo, Samsung"
                           class="input input-bordered w-full @error('marca') input-error @enderror"
                           required>
                    @error('marca')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control w-full md:col-span-2">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                        <span class="label-text-alt text-base-content/60">(Opcional)</span>
                    </label>
                    <textarea name="descripcion" 
                              rows="4"
                              placeholder="Detalles adicionales del equipo: modelo, características, número de serie, etc."
                              class="textarea textarea-bordered w-full @error('descripcion') textarea-error @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

            </div>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('equipos.index') }}" class="btn btn-ghost">
                    <x-heroicon-o-x-mark class="w-5 h-5" />
                    Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <x-heroicon-o-check class="w-5 h-5" />
                    Guardar Equipo
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Info Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Secretaría de Gobierno</div>
            <div class="stat-value text-primary text-2xl">SG-</div>
            <div class="stat-desc">Prefijo de catalogación</div>
        </div>
    </div>
    
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Obras Públicas</div>
            <div class="stat-value text-secondary text-2xl">OP-</div>
            <div class="stat-desc">Prefijo de catalogación</div>
        </div>
    </div>
    
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Desarrollo Humano</div>
            <div class="stat-value text-accent text-2xl">DH-</div>
            <div class="stat-desc">Prefijo de catalogación</div>
        </div>
    </div>
    
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Servicios Públicos</div>
            <div class="stat-value text-info text-2xl">SP-</div>
            <div class="stat-desc">Prefijo de catalogación</div>
        </div>
    </div>
</div>

@endsection