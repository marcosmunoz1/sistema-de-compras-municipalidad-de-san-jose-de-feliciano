@extends('layouts.admin')

@section('content')
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">

        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Vehículo: {{ $vehiculo->modelo }}</h1>

            @if ($vehiculo->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>

        <!-- Botones -->
        <div class="flex gap-2">
            <a href="{{ route('vehiculos.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Vehículos
            </a>
            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Vehículo
            </a>
        </div>

    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
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
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Vehículo
                </span>
            </li>
        </ul>
    </div>

    <!-- =========================== -->
    <!-- CARD — DATOS DEL VEHÍCULO -->
    <!-- =========================== -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Datos del Vehículo</h4><br>
            <p class="text-muted-foreground">Información general del vehículo</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">

            <!-- GRID GENERAL: CAMPOS IZQUIERDA — IMAGEN DERECHA -->
            <div class="grid grid-cols-3 gap-6">

                <!-- ======================= -->
                <!-- COLUMNA IZQUIERDA -->
                <!-- ======================= -->
                <div class="col-span-2 space-y-4">

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Tipo -->
                        <div class="space-y-2">
                            <label for="tipo" class="text-sm font-medium">Tipo</label>
                            <select id="tipo" name="tipo" class="select select-bordered w-full h-10" disabled>
                                @php
                                    $tipos = ['Auto', 'Moto', 'Camioneta', 'Camión', 'Acoplado', 'Especial'];
                                @endphp

                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo }}" {{ $vehiculo->tipo === $tipo ? 'selected' : '' }}>
                                        {{ $tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Patente -->
                        <div class="space-y-2">
                            <label for="patente" class="text-sm font-medium">Patente</label>
                            <input id="patente" name="patente" value="{{ $vehiculo->patente }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                   px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                   focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Marca -->
                        <div class="space-y-2">
                            <label for="marca" class="text-sm font-medium">Marca</label>
                            <input id="marca" name="marca" value="{{ $vehiculo->marca }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Modelo -->
                        <div class="space-y-2">
                            <label for="modelo" class="text-sm font-medium">Modelo</label>
                            <input id="modelo" name="modelo" value="{{ $vehiculo->modelo }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Año -->
                        <div class="space-y-2">
                            <label for="anio" class="text-sm font-medium">Año</label>
                            <input id="anio" name="anio" type="number" min="1900" max="{{ date('Y') }}"
                                value="{{ $vehiculo->anio }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Color -->
                        <div class="space-y-2">
                            <label for="color" class="text-sm font-medium">Color</label>
                            <input id="color" name="color" value="{{ $vehiculo->color }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Motor -->
                        <div class="space-y-2">
                            <label for="motor" class="text-sm font-medium">N° de Motor</label>
                            <input id="motor" name="motor" value="{{ $vehiculo->motor }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <!-- Chasis -->
                        <div class="space-y-2">
                            <label for="chasis" class="text-sm font-medium">N° de Chasis</label>
                            <input id="chasis" name="chasis" value="{{ $vehiculo->chasis }}"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                </div>

                <!-- ======================= -->
                <!-- COLUMNA DERECHA — IMAGEN -->
                <!-- ======================= -->
                <div id="preview-container"
                    class="w-full h-72 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">

                    @if ($vehiculo->imagen)
                        <img src="{{ asset('storage/' . $vehiculo->imagen) }}" alt="Imagen del vehículo"
                            id="preview-image" class="max-h-full object-cover">
                    @else
                        <span class="text-gray-500 text-sm">Sin imagen</span>
                    @endif

                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
