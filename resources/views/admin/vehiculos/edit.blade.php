@extends('layouts.admin')
@section('title', 'Editar Vehículo')

@section('content')
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Editar Vehículo: {{ $vehiculo->modelo . ' ' . $vehiculo->anio }}</h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('vehiculos.index') }}">
                    <x-heroicon-o-truck class="w-4 h-4 inline" />
                    Vehículos
                </a>
            </li>

            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-pencil class="w-4 h-4 inline" />
                    Editar Vehículo
                </span>
            </li>
        </ul>
    </div>

    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PUT')

        <!-- CARD -->
        <div class="card bg-base-100 shadow-xl p-4">

            <div class="px-6 pt-6">
                <h4 class="text-1xl font-semibold">Datos del Vehículo</h4><br>
                <p class="text-muted-foreground">Información general del vehículo</p>
            </div>

            <div class="px-6 pb-6">

                <div class="grid grid-cols-3 gap-6">

                    <!-- ======================= -->
                    <!-- COLUMNA IZQUIERDA -->
                    <!-- ======================= -->
                    <div class="col-span-2 space-y-4">

                        <div class="grid grid-cols-3 gap-4">

                            <!-- Tipo -->
                            <div class="space-y-2">
                                <label for="tipo" class="text-sm font-medium">Tipo <span
                                        class="text-red-600">*</span></label>
                                <select id="tipo" name="tipo" class="select select-bordered w-full h-10 w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition" required>
                                    @php
                                        $tipos = [
                                            'AUTO',
                                            'MOTO',
                                            'CAMIONETA',
                                            'CAMION',
                                            'ACOPLADO',
                                            'Especial',
                                            'COLECTIVO',
                                            'MINI BUS',
                                            'RETRO ESCAVADORA',
                                            'TRACTOR',
                                            'UTILITARIO',
                                        ];
                                    @endphp

                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo }}"
                                            {{ $vehiculo->tipo === $tipo ? 'selected' : '' }}>
                                            {{ $tipo }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Área (deshabilitada) -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">Área</span>
                                </label>
                                <input type="text" value="{{ $vehiculo->area->nombre }}"
                                    class="input input-bordered w-full input-disabled" disabled readonly>
                                <!-- Hidden input para mantener el area_id -->
                                <input type="hidden" name="area_id" value="{{ $vehiculo->area_id }}">
                            </div>

                            <!-- Patente -->
                            <div class="space-y-2">
                                <label for="patente" class="text-sm font-medium">Patente <span
                                        class="text-red-600">*</span></label>
                                <input id="patente" name="patente" value="{{ old('patente', $vehiculo->patente) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('patente') input-error @enderror"
                                    placeholder="ABC123 o AA123BB" required />
                                @error('patente')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">

                            <!-- Marca -->
                            <div class="space-y-2">
                                <label for="marca" class="text-sm font-medium">Marca <span
                                        class="text-red-600">*</span></label>
                                <input id="marca" name="marca" value="{{ old('marca', $vehiculo->marca) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('patente') input-error @enderror"
                                    placeholder="Marca..." required />
                                @error('marca')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Modelo -->
                            <div class="space-y-2">
                                <label for="modelo" class="text-sm font-medium">Modelo <span
                                        class="text-red-600">*</span></label>
                                <input id="modelo" name="modelo" value="{{ old('modelo', $vehiculo->modelo) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('modelo') input-error @enderror"
                                    placeholder="Modelo..." required />
                                @error('modelo')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Año -->
                            <div class="space-y-2">
                                <label for="anio" class="text-sm font-medium">Año <span
                                        class="text-red-600">*</span></label>
                                <input id="anio" name="anio" type="number" min="1900"
                                    max="{{ date('Y') }}" value="{{ old('anio', $vehiculo->anio) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('anio') input-error @enderror"
                                    placeholder="Año..." required />
                                @error('anio')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">

                            <!-- Color -->
                            <div class="space-y-2">
                                <label for="color" class="text-sm font-medium">Color</label>
                                <input id="color" name="color" value="{{ old('color', $vehiculo->color) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('color') input-error @enderror"
                                    placeholder="Color..." />
                                @error('color')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Motor -->
                            <div class="space-y-2">
                                <label for="motor" class="text-sm font-medium">N° de Motor <span
                                        class="text-red-600">*</span></label>
                                <input id="motor" name="motor" value="{{ old('motor', $vehiculo->motor) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('motor') input-error @enderror"
                                    placeholder="Número de Motor..." required />
                                @error('motor')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Chasis -->
                            <div class="space-y-2">
                                <label for="chasis" class="text-sm font-medium">N° de Chasis <span
                                        class="text-red-600">*</span></label>
                                <input id="chasis" name="chasis" value="{{ old('chasis', $vehiculo->chasis) }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('chasis') input-error @enderror"
                                    placeholder="Número de Chasis..." required />
                                @error('chasis')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tipo de combustible -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">
                                        Tipo de combustible <span class="text-error">*</span>
                                    </span>
                                </label>

                                <select name="tipo_combustible_id"
                                    class="select select-bordered w-full w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('tipo_combustible_id') select-error @enderror"
                                    required>

                                    <option disabled value="">Seleccionar tipo de combustible</option>

                                    @foreach ($tiposCombustibles as $tipoCombustible)
                                        <option value="{{ $tipoCombustible->id }}"
                                            {{ old('tipo_combustible_id', $vehiculo->tipo_combustible_id) == $tipoCombustible->id ? 'selected' : '' }}>
                                            {{ $tipoCombustible->nombre }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('tipo_combustible_id')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <!-- ======================= -->
                    <!-- COLUMNA DERECHA — IMAGEN -->
                    <!-- ======================= -->
                    <div class="col-span-1">
                        <label for="imagen" class="text-sm font-medium">Imagen del Vehículo</label>

                        <!-- INPUT FILE -->
                        <input id="imagen" name="imagen" type="file"
                            class="file-input file-input-bordered w-full mt-2" />

                        <!-- PREVIEW -->
                        <div id="preview-container"
                            class="w-full h-55 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">

                            @if ($vehiculo->imagen)
                                <img id="preview-image" src="{{ asset('storage/' . $vehiculo->imagen) }}"
                                    class="max-h-full object-cover">
                            @else
                                <span class="text-gray-500 text-sm">Vista previa</span>
                            @endif

                        </div>
                        @error('imagen')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>
        </div>

        <!-- BOTONES -->
        <div class="flex justify-end pt-4">
            <a href="{{ route('vehiculos.index') }}" class="btn btn-warning mr-2">
                <x-heroicon-m-arrow-left class="w-4 h-4 inline" />
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" />
                Guardar Vehículo
            </button>
        </div>

    </form>
@endsection
@section('js')
    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('preview-container');

            // Si hay un archivo seleccionado
            if (file) {
                // Crear lector
                const reader = new FileReader();

                reader.onload = function(event) {
                    // Si ya existe una imagen previa, la reemplaza
                    let img = document.getElementById('preview-image');

                    if (!img) {
                        // Si no existe, la creamos y la insertamos
                        img = document.createElement('img');
                        img.id = 'preview-image';
                        img.className = 'max-h-full object-cover';
                        previewContainer.innerHTML = ''; // Limpia el "Vista previa"
                        previewContainer.appendChild(img);
                    }

                    // Setea la imagen
                    img.src = event.target.result;
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
