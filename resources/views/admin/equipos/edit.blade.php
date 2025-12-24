@extends('layouts.admin')
@section('title', 'Editar Equipo')
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
                <x-heroicon-o-plus class="w-4 h-4 inline" />
                Editar Equipo
            </li>
        </ul>
    </div>

    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Editar Equipo</h1>
    </div>

    <!-- Card del Formulario -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">

            <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Grid de campos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Área (deshabilitada) -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-medium">Área</span>
                        </label>
                        <input type="text" 
                            value="{{ $equipo->area->nombre }}"
                            class="input input-bordered w-full input-disabled"
                            disabled
                            readonly>
                        <!-- Hidden input para mantener el area_id -->
                        <input type="hidden" name="area_id" value="{{ $equipo->area_id }}">
                    </div>

                    <!-- Equipamiento -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-medium">Equipamiento <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="equipamiento" value="{{ old('equipamiento', $equipo->equipamiento) }}"
                            placeholder="Ej: Computadora de escritorio"
                            class="input input-bordered w-full @error('equipamiento') input-error @enderror" required>
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
                        <input type="text" name="marca" value="{{ old('marca', $equipo->marca) }}"
                            placeholder="Ej: HP, Dell, Lenovo, Samsung"
                            class="input input-bordered w-full @error('marca') input-error @enderror" required>
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
                        <textarea name="descripcion" rows="4"
                            placeholder="Detalles adicionales del equipo: modelo, características, número de serie, etc."
                            class="textarea textarea-bordered w-full @error('descripcion') textarea-error @enderror">{{ old('descripcion', $equipo->descripcion) }}</textarea>
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
                        Actualizar Equipo
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
