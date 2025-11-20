@extends('layouts.admin')

@section('content')

    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Empleado: {{ $empleado->nombre }}</h1>

            @if ($empleado->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>

        <!-- Botones -->
        <div class="flex gap-2">
            <a href="{{ route('empleados.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Empleados
            </a>
            <a href="{{ route('empleados.edit', $empleado->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Empleado
            </a>
        </div>
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
                    <x-heroicon-o-user-group class="w-4 h-4 inline" />
                    Empleados
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Empleado
                </span>
            </li>
        </ul>
    </div>

    <!-- Card -->
    <div class="card bg-base-100 shadow-xl p-6">

        <h2 class="text-lg font-semibold mb-4">Datos del Empleado</h2>

        <div class="grid grid-cols-2 gap-6">

            <!-- Nombre -->
            <div class="space-y-1">
                <p class="text-sm font-medium">Nombre</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->nombre }}</p>
            </div>

            <!-- DNI -->
            <div class="space-y-1">
                <p class="text-sm font-medium">DNI</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->dni }}</p>
            </div>

            <!-- Celular -->
            <div class="space-y-1">
                <p class="text-sm font-medium">Celular</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->celular ?? '—' }}</p>
            </div>

            <!-- Email -->
            <div class="space-y-1">
                <p class="text-sm font-medium">Email</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->email ?? '—' }}</p>
            </div>

            <!-- Dirección -->
            <div class="col-span-2 space-y-1">
                <p class="text-sm font-medium">Dirección</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->direccion ?? '—' }}</p>
            </div>

            <!-- Puesto -->
            <div class="space-y-1">
                <p class="text-sm font-medium">Puesto</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->puesto ?? '—' }}</p>
            </div>

            <!-- Área -->
            <div class="space-y-1">
                <p class="text-sm font-medium">Área</p>
                <p class="bg-base-200 border border-base-300 p-2 rounded-md">{{ $empleado->area ?? '—' }}</p>
            </div>   
            <!-- Observaciones -->
            <div class="col-span-2 space-y-1">
                <p class="text-sm font-medium">Observaciones</p>
                <div class="bg-base-200 border border-base-300 p-3 rounded-md min-h-[60px]">
                    {!! nl2br(e($empleado->observaciones ?? '—')) !!}
                </div>
            </div>

        </div>

    </div>

@endsection
