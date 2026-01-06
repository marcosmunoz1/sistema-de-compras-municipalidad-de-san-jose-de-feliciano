@extends('layouts.admin')
@section('title', 'Crear Vehículo') 
@section('content')
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Crear Vehículo</h1>
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Crear Vehículo
                </span>
            </li>
        </ul>
    </div>

    <!-- Formulario -->
    <form action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- Alert informativo -->
        <div role="alert" class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>La catalogación se generará automáticamente según el área seleccionada (ej: SG-001, OP-002)</span>
        </div>
        <!-- =========================== -->
        <!-- CARD — DATOS DEL VEHÍCULO -->
        <!-- =========================== -->
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Datos del Vehículo</h4>
                <p class="text-muted-foreground">Información general del vehículo</p>
            </div>

            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">

                <!-- GRID GENERAL: CAMPOS IZQUIERDA — IMAGEN DERECHA -->
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

                                <select id="tipo" name="tipo"
                                    class="select select-bordered w-full h-10 w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('tipo') input-error @enderror"
                                    required>
                                    <option value="" disabled selected>Seleccione un tipo...</option>

                                    @php
                                        $tipos = ['Auto', 'Moto', 'Camioneta', 'Camión', 'Acoplado', 'Especial'];
                                    @endphp

                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                                    @endforeach
                                </select>
                                @error('tipo')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Área -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">Área <span class="text-error">*</span></span>
                                </label>
                                <select name="area_id" 
                                        class="select select-bordered w-full w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('area_id') select-error @enderror"
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



                            <!-- Patente -->
                            <div class="space-y-2">
                                <label for="patente" class="text-sm font-medium">Patente <span
                                        class="text-red-600">*</span></label>
                                <input id="patente" name="patente" value="{{ old('patente') }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                   px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                   focus:border-primary transition @error('patente') input-error @enderror"
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
                                <input id="marca" name="marca" value="{{ old('marca') }}"
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
                                <input id="modelo" name="modelo" value="{{ old('modelo') }}"
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
                                    max="{{ date('Y') }}" value="{{ old('anio') }}"
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
                                <label for="color" class="text-sm font-medium">Color (Opcional)</label>
                                <input id="color" name="color" value="{{ old('color') }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('color') input-error @enderror"
                                    placeholder="Color..." />
                                @error('color')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Motor -->
                            <div class="space-y-2">
                                <label for="motor" class="text-sm font-medium">N° de Motor (Opcional)</label>
                                <input id="motor" name="motor" value="{{ old('motor') }}"
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
                                <label for="chasis" class="text-sm font-medium">N° de Chasis (Opcional)</label>
                                <input id="chasis" name="chasis" value="{{ old('chasis') }}"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('chasis') input-error @enderror"
                                    placeholder="Número de Chasis..." required />
                                @error('chasis')
                                    <small class="text-red-500 error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">Tipo de combustible <span class="text-error">*</span></span>
                                </label>
                                <select name="tipo_combustible_id" 
                                        class="select select-bordered w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition @error('tipo_combustible_id') select-error @enderror"
                                        required>
                                    <option disabled selected value="">Seleccionar tipo de combustible</option>
                                    @foreach($tiposCombustibles as $tipoCombustible)
                                        <option value="{{ $tipoCombustible->id }}" {{ old('tipo_combustible_id') == $tipoCombustible->id ? 'selected' : '' }}>
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
                        <label for="imagen" class="text-sm font-medium">Imagen del Vehículo (Opcional)</label>

                        <!-- INPUT FILE -->
                        <input id="imagen" name="imagen" type="file"
                            class="file-input file-input-bordered w-full mt-2 @error('imagen') input-error @enderror" />

                        <!-- PREVIEW -->
                        <div id="preview-container"
                            class="w-full h-55 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">
                            <!-- Aquí se mostrará la vista previa -->
                            <span class="text-gray-500 text-sm">Vista previa</span>
                        </div>
                        @error('imagen')
                            <small class="text-red-500 error-message">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>
        </div>



        <!-- ========================= -->
        <!-- BOTONES -->
        <!-- ========================= -->
        <div class="flex justify-end pt-4">
            <a href="{{ route('vehiculos.index') }}" class="btn btn-warning mr-2">
                <x-heroicon-m-arrow-left class="w-4 h-4 inline" />
                Volver
            </a>

            <button type="submit" class="btn btn-primary">
                <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" />
                Guardar Vehículo
            </button>
        </div>

    </form>
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
@section('js')
    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview-container');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    preview.innerHTML =
                        `<img src="${evt.target.result}" class="h-full w-full object-cover rounded-md">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `<span class="text-gray-500 text-sm">Vista previa</span>`;
            }
        });
    </script>
@endsection
