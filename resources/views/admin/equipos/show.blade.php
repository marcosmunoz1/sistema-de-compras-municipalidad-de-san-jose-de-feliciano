@extends('layouts.admin')
@section('title', 'Ver Equipo')
@section('content')
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">

        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Equipo:
                {{ $equipo->equipamiento . ' ' . $equipo->marca }}</h1>

            @if ($equipo->estado)
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            @else
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            @endif
        </div>

        <!-- Botones -->
        <div class="flex gap-2">
            @can('equipos-index')
            <a href="{{ route('vehiculos.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Equipos
            </a>
            @endcan
            @can('equipos-edit')
            <a href="{{ route('equipos.edit', $equipo->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Equipo
            </a>
            @endcan
        </div>

    </div>
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
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Equipo
                </span>
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
        </div>
    </div>
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4" id="tabla-productos">
        <h1 class="text-2xl font-semibold">Detalles de productos asignados al equipo</h1><br>
        <form method="GET" action="{{ route('equipos.show', $equipo->id) }}#tabla-productos">
            <input type="text" name="search" value="{{ $search }}" class="input input-bordered"
                placeholder="Buscar...">
            <!-- BOTÓN -->
            <button class="btn btn-primary">
                <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                Buscar
            </button>
            @if (request('search'))
                <a href="{{ route('equipos.show', $equipo->id) }}#tabla-productos" class="btn btn-error">
                    <x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
            @endif
        </form>

        <br>
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th class="text-center">Nr</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Fecha Compra</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Cantidad Asignada</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1;
                @endphp

                @foreach ($productos as $producto)
                    <tr>
                        <td class="text-center">{{ $nr++ }}</td>
                        <td class="text-center">{{ $producto->nombre }}</td>
                        <td class="text-center">
                            {{ $producto->fecha_orden ? \Carbon\Carbon::parse($producto->fecha_orden)->format('d/m/Y') : '—' }}
                        </td>
                        <td class="text-center">${{ number_format($producto->precio ?? 0, 2) }}</td>
                        <td class="text-center">{{ $producto->cantidad_asignada ?? 0 }}</td>
                        <td class="text-center">{{ $producto->stock ?? 0 }}</td>
                        <td class="text-center">${{ number_format($producto->subtotal_real ?? 0, 2) }}</td>
                        <td class="text-center">
                            @if ($producto->compra_id)
                                <a href="{{ route('compras.show', [
                                    'id' => Crypt::encryptString($producto->compra_id),
                                    'from' => 'equipo',
                                    'equipo_id' => $equipo->id
                                ]) }}"
                                class="btn btn-sm btn-primary">
                                    Ver compra
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" class="text-right font-bold text-xl">Total:</td>
                    <td class="font-bold text-xl">${{ number_format($totalGeneral ?? 0, 2) }}</td>
                </tr>
            </tfoot>
        </table>



        @if ($productos->hasPages())
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                <!-- Texto "Mostrando X - Y" -->
                <div class="text-sm text-gray-500">
                    Mostrando {{ $productos->firstItem() }} - {{ $productos->lastItem() }}
                    de {{ $productos->total() }} registros
                </div>

                <!-- Controles de paginación -->
                <div class="join">

                    {{-- Botón Anterior --}}
                    @if ($productos->onFirstPage())
                        <button class="join-item btn btn-square btn-disabled">«</button>
                    @else
                        <a href="{{ $productos->previousPageUrl() }}#tabla-productos"
                            class="join-item btn btn-square">«</a>
                    @endif

                    {{-- Números de página --}}
                    @foreach ($productos->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $productos->currentPage())
                            <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}#tabla-productos"
                                class="join-item btn btn-square">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Botón Siguiente --}}
                    @if ($productos->hasMorePages())
                        <a href="{{ $productos->nextPageUrl() }}#tabla-productos" class="join-item btn btn-square">»</a>
                    @else
                        <button class="join-item btn btn-square btn-disabled">»</button>
                    @endif

                </div>
            </div>
        @endif


    </div>

    <!-- Historial de Actividad -->
    <x-historial-actividad :model="$equipo" :limit="10" />

@endsection
