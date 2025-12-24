@extends('layouts.admin')
@section('title', 'Ver Equipo')
@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
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
                <x-heroicon-o-eye class="w-4 h-4 inline" />
                Ver Equipo
            </li>
        </ul>
    </div>

    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver Equipo</h1>
    </div>

    <!-- Card del Formulario -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">



            <!-- Grid de campos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Área -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Área
                    </label>
                    <select name="area_id"
                        class="select select-bordered w-full @error('area_id') select-error @enderror"
                        disabled
                    >
                        <option disabled value="">Seleccionar área</option>

                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                {{ old('area_id', $equipo->area_id) == $area->id ? 'selected' : '' }}>
                                {{ $area->nombre }} ({{ $area->prefijo_catalogacion }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Equipamiento -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Equipamiento
                    </label>
                    <input type="text" name="equipamiento" value="{{ $equipo->equipamiento }}"
                        placeholder="Ej: Computadora de escritorio"
                        class="input input-bordered w-full @error('equipamiento') input-error @enderror" readonly>
                </div>

                <!-- Marca -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Marca
                    </label>
                    <input type="text" name="marca" value="{{ $equipo->marca }}"
                        placeholder="Ej: HP, Dell, Lenovo, Samsung"
                        class="input input-bordered w-full @error('marca') input-error @enderror" readonly>
                </div>

                <!-- Catalogacion -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Catalogación</span>
                    </label>
                    <input type="text" name="catalogacion" value="{{ $equipo->catalogacion }}"
                        placeholder="Ej: HP, Dell, Lenovo, Samsung"
                        class="input input-bordered w-full @error('catalogacion') input-error @enderror" readonly>
                </div>

                <!-- Descripción -->
                <div class="form-control w-full md:col-span-2">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                    </label>
                    <textarea name="descripcion" rows="4"
                        placeholder="Detalles adicionales del equipo: modelo, características, número de serie, etc."
                        class="textarea textarea-bordered w-full @error('descripcion') textarea-error @enderror">{{ $equipo->descripcion }}</textarea>
                </div>

            </div>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">
                    <x-heroicon-o-arrow-left class="w-5 h-5" />
                    Volver
                </a>
            </div>


        </div>
    </div>

@endsection
