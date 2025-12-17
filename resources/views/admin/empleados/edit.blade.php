@extends('layouts.admin')
@section('title', 'Editar Empleado') 

@section('content')

    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Editar Empleado</h1>
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
                <a href="{{ route('empleados.index') }}">
                    <x-heroicon-o-identification class="w-4 h-4 inline" />
                    Empleados
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-pencil class="w-4 h-4 inline" />
                    Editar Empleado
                </span>
            </li>
        </ul>
    </div>

    <!-- Formulario Empleados -->
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="card bg-base-100 shadow-xl p-6">

            <h2 class="text-lg font-semibold mb-4">Datos del Empleado</h2>

            <div class="grid grid-cols-2 gap-6">

                <!-- Nombre -->
                <div class="space-y-2">
                    <label for="nombre" class="text-sm font-medium">Nombre <span class="text-red-600">*</span></label>
                    <input id="nombre" name="nombre" 
                        value="{{ old('nombre', $empleado->nombre) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('nombre') input-error @enderror"
                        placeholder="Nombre completo..." required>
                    @error('nombre')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- DNI -->
                <div class="space-y-2">
                    <label for="dni" class="text-sm font-medium">DNI <span class="text-red-600">*</span></label>
                    <input id="dni" name="dni" type="number"
                        value="{{ old('dni', $empleado->dni) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('dni') input-error @enderror"
                        placeholder="Solo números..." required>
                    @error('dni')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Celular -->
                <div class="space-y-2">
                    <label for="celular" class="text-sm font-medium">Celular</label>
                    <input id="celular" name="celular"
                        value="{{ old('celular', $empleado->celular) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('celular') input-error @enderror"
                        placeholder="Ej: 3794123456">
                    @error('celular')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input id="email" name="email" type="email"
                        value="{{ old('email', $empleado->email) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('email') input-error @enderror"
                        placeholder="correo@ejemplo.com">
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="col-span-2 space-y-2">
                    <label for="direccion" class="text-sm font-medium">Dirección</label>
                    <input id="direccion" name="direccion"
                        value="{{ old('direccion', $empleado->direccion) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('direccion') input-error @enderror"
                        placeholder="Barrio / Calle / Número">
                    @error('direccion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Puesto -->
                <div class="space-y-2">
                    <label for="puesto" class="text-sm font-medium">Puesto</label>
                    <input id="puesto" name="puesto"
                        value="{{ old('puesto', $empleado->puesto) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('puesto') input-error @enderror"
                        placeholder="Puesto del empleado...">
                    @error('puesto')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Área -->
                <div class="space-y-2">
                    <label for="area" class="text-sm font-medium">Área</label>
                    <input id="area" name="area"
                        value="{{ old('area', $empleado->area) }}"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('area') input-error @enderror"
                        placeholder="Área o sector...">
                    @error('area')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Observaciones -->
                <div class="col-span-2 space-y-2">
                    <label for="observaciones" class="text-sm font-medium">Observaciones</label>
                    <textarea id="observaciones" name="observaciones" rows="3"
                        class="w-full rounded-md border border-base-300 bg-base-200 px-3 py-2 text-sm 
                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('observaciones') input-error @enderror"
                        placeholder="Notas sobre el empleado...">{{ old('observaciones', $empleado->observaciones) }}</textarea>
                    @error('observaciones')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

            </div>

        </div>

        <!-- Botones -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('empleados.index') }}" class="btn btn-warning mr-2">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver
            </a>

            <button type="submit" class="btn btn-primary">
                <x-heroicon-o-check class="w-4 h-4 inline" />
                Actualizar Empleado
            </button>
        </div>

    </form>

@endsection
