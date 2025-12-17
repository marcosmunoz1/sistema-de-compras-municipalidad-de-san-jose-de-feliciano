@extends('layouts.admin')
@section('title', 'Combustibles')
@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Combustibles</h1>
        <div class="flex  gap-2">
            @can('combustibles-update')
                <button onclick="crearCombustible.showModal()" class="btn btn-warning tooltip tooltip-warning mb-1"
                    data-tip="Actualizar los precios de los combustibles">
                    <x-heroicon-s-cloud-arrow-up class="w-4 h-4 inline" />
                    Actualizar Precios
                </button>
            @endcan
            @can('combustibles-create')
                <a href="{{ route('combustibles.create') }}" class="btn btn-primary tooltip tooltip-primary tooltip-bottom mb-1"
                    data-tip="Crear orden de carga">
                    + Nueva Orden de Carga
                </a>
            @endcan
        </div>
    </div>
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('combustibles.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-5 h-5" aria-hidden="true">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                    Combustibles
                </a>
            </li>
        </ul>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 pd-6 mb-6">

        <!-- Card 1 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total del Mes</p>
                        <h3 class="mt-2">{{ $totalMonto }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-10 h-10 text-blue-600">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
            </div>
        </div>

   {{--  <!-- Card 3 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Precio Promedio</p>
                    <h3 class="mt-2">$3.88</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-yellow-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div> --}} 

        <!-- Card 4 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Cargas</p>
                        <h3 class="mt-2">{{ $totalCargas }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-10 h-10 text-red-600">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <!-- Buscador -->
    <form action="{{ route('combustibles.index') }}" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="{{ request('search') ?? '' }}" type="text"
                        placeholder="Buscar por vehiculo, combustible, fecha..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                </label>

                <!-- BOTÓN -->
                <button class="btn btn-primary">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    Buscar
                </button>
                @if (request('search'))
                    <a href="{{ route('combustibles.index') }}" class="btn btn-error"><x-heroicon-o-trash
                            class="w-4 h-4" /> Limpiar</a>
                @endif
            </div>
        </div>
    </form>
    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">
            <!-- HEADER COMPLETO -->
            <div class="flex flex-col gap-3">
                <!-- TÍTULO + BUSCADOR -->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de Cargas</h4>
                    <!-- BUSCADOR -->
                    <div class="relative">
                        <!-- BOTÓN IMPRIMIR -->
                        <div class="flex justify-start">
                            <button onclick="window.print()" class="btn btn-outline btn-sm">
                                <x-heroicon-o-printer class="w-4 h-4 mr-2" />
                                Imprimir Historial
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLA -->
            <div class="overflow-x-auto mt-4">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nr orden</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Vehículo</th>
                            <th class="text-center">Conductor</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Litros</th>
                            <th class="text-center">Importe</th>
                            <th class="text-center">Estación</th>
                            <th class="text-center">Acciones</th>
        </div>
        <!-- TABLA -->
        <div class="overflow-x-auto mt-4">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Nr orden</th> 
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Vehículo</th> 
                        <th class="text-center">Conductor</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Litros</th>
                        <th class="text-center">Importe</th>
                        <th class="text-center">Estación</th> 
                        <th class="text-center">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nr = $combustibles->firstItem();
                    @endphp

                    @foreach ($combustibles as $combustible)
                        <tr> 
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ $combustible->codigo }}</td> 
                            <td class="text-center">{{ $combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—' }}</td> 
                            <td class="text-center">{{ $combustible->destino->marca ?? 'N/A' }}</td> 
                            <td class="text-center">{{ $combustible->empleado->nombre ?? 'N/A' }}</td> 
                            <td class="text-center">{{ $combustible->tipo }}</td> 
                            <td class="text-center">{{ $combustible->litros }}</td>
                            <td class="text-center">${{ number_format($combustible->monto,2,'.',',') }}</td>
                            <td class="text-center">{{ $combustible->estacion }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2"> 
                                    @can('combustibles-show') 
                                    <a href="{{ route('combustibles.show', Crypt::encrypt($combustible->id)) }}"  
                                       class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>
                                    @endcan 
                                     @can('combustibles-edit')
                                    <a href="{{ route('combustibles.edit', $combustible->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>
                                    @endcan 
                                    @can('combustibles-report')
                                    <a href="{{ route('combustibles.report', Crypt::encrypt($combustible->id)) }}" 
                                       class="btn bg-primary btn-sm" 
                                       target="_blank">
                                        <x-heroicon-o-printer class="w-4 h-4"/>
                                    </a>
                                    @endcan
                                    @if ($combustible->trashed())
                                        @can('combustibles-restore')
                                        <button class="btn btn-success btn-sm"
                                                onclick="abrirModalRestaurar('{{ url('/admin/combustibles/'. $combustible->id.'/restore') }}')">
                                            <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                        </button>
                                        @endcan 
                                    @else 
                                        @can('combustibles-destroy') 
                                        <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion({{ $combustible->id }})">
                                            <x-heroicon-s-trash class="w-4 h-4"/>
                                        </button>
                                        @endcan 
                                    @endif

                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nr = $combustibles->firstItem();
                        @endphp

                        @foreach ($combustibles as $combustible)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $combustible->codigo }}</td>
                                <td class="text-center">{{ $combustible->fecha }}</td>
                                <td class="text-center">{{ $combustible->vehiculo->marca ?? 'N/A' }}</td>
                                <td class="text-center">{{ $combustible->empleado->nombre ?? 'N/A' }}</td>
                                <td class="text-center">{{ $combustible->tipo }}</td>
                                <td class="text-center">{{ $combustible->litros }}</td>
                                <td class="text-center">{{ $combustible->monto }}</td>
                                <td class="text-center">{{ $combustible->estacion }}</td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        @can('combustibles-show')
                                            <a href="{{ route('combustibles.show', Crypt::encrypt($combustible->id)) }}"
                                                class="btn btn-info btn-sm">
                                                <x-heroicon-s-eye class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        @can('combustibles-edit')
                                            <a href="{{ route('combustibles.edit', $combustible->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <x-heroicon-s-pencil class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        @can('combustibles-report')
                                            <a href="{{ route('combustibles.report', Crypt::encrypt($combustible->id)) }}"
                                                class="btn bg-primary btn-sm" target="_blank">
                                                <x-heroicon-o-printer class="w-4 h-4" />
                                            </a>
                                        @endcan
                                        @if ($combustible->trashed())
                                            @can('combustibles-restore')
                                                <button class="btn btn-success btn-sm"
                                                    onclick="abrirModalRestaurar('{{ url('/admin/combustibles/' . $combustible->id . '/restore') }}')">
                                                    <x-heroicon-s-arrow-uturn-left class="w-4 h-4" />
                                                </button>
                                            @endcan
                                        @else
                                            @can('combustibles-destroy')
                                                <button class="btn btn-error btn-sm"
                                                    onclick="confirmarEliminacion({{ $combustible->id }})">
                                                    <x-heroicon-s-trash class="w-4 h-4" />
                                                </button>
                                            @endcan
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- PAGINACIÓN -->
            @if ($combustibles->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <div class="text-sm text-gray-500">
                        Mostrando {{ $combustibles->firstItem() }} - {{ $combustibles->lastItem() }}
                        de {{ $combustibles->total() }} registros
                    </div>

                    <div class="join">
                        @if ($combustibles->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $combustibles->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        @foreach ($combustibles->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $combustibles->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($combustibles->hasMorePages())
                            <a href="{{ $combustibles->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
    <dialog id="crearCombustible" class="modal">
        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título dinámico -->
            <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
                </svg>
                <!-- El título será cambiado por JS -->
                Actualizar precios de los combustibles
            </h3>

            <form action="{{ url('/admin/combustibles/update-prices') }}" method="POST" class="space-y-5"
                id="form">
                @csrf
                @method('post')
                <!-- Nombre -->
                <div class="form-control">
                    <label class="text-sm font-medium">Nombre<span class="text-red-600">*</span></label>
                    <select id="id" name="id"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('id') input-error @enderror transition"
                        required>>
                        <option value="">Seleccionar</option>
                        @foreach ($tipos_combustibles as $combustible_tipo)
                            <option value="{{ $combustible_tipo->id }}"
                                data-combustible="{{ $combustible_tipo->valor }}">{{ $combustible_tipo->nombre ?? '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('id')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Nombre -->
                <div id="combustible_info" class="hidden form-control">
                    <label class="text-sm font-medium">Precio actual del combustible seleccionado</label>
                    <input type="number" id="combustible_id" min="0" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary "
                        readonly>
                </div>
                <!-- Monto Máximo -->
                <div class="space-y-2">
                    <label for="precio" class="text-sm font-medium">Nuevo precio del combustible<span
                            class="text-red-600">*</span></label>
                    <input type="number" id="precio" min="0" name="precio" placeholder="0" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary @error('precio') input-error @enderror transition"
                        required>
                    @error('precio')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción (Opcional) </span>
                    </label>

                    <textarea name="descripcion" id="descripcion" rows="3"
                        placeholder="Ingrese una descripción breve de la actulizacion del combustible..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 
                 focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition @error('descripcion') input-error @enderror">{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="modal-action">

                    <!-- Guardar -->
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar precio
                    </button>

                    <!-- Cancelar -->
                    <button type="button" onclick="crearCombustible.close()" class="btn btn-neutral">
                        Cancelar
                    </button>
                </div>

            </form>
        </div>

    </dialog>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_combustible" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este orden de carga de combustible?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarCombustible" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-error">
                        <x-heroicon-o-trash class="w-4 h-4" />
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
    </dialog>
    <!-- Modal para restaurar -->
    <dialog id="modal_restaurar_combustible" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
                <x-heroicon-o-arrow-path class="w-5 h-5" />
                Confirmar restauración
            </h3>

            <p class="py-4">
                ¿Seguro que querés restaurar este combustible?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarCombustible" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-success">
                        <x-heroicon-o-arrow-path class="w-4 h-4" />
                        Restaurar
                    </button>
                </form>

            </div>

        </div>
    </dialog>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            function actualizarDatosdelcombustible() {
                var selected = $('#id option:selected');
                var id = selected.val();

                if (!id) {
                    $('#combustible_info').addClass('hidden');
                    return;
                }

                // Mostrar card
                $('#combustible_info').removeClass('hidden');

                // Cargar datos reales
                $('#combustible_id').val(selected.data('combustible'));
            }

            $('#id').change(actualizarDatosdelcombustible);

            actualizarDatosdelcombustible(); // por si ya viene seleccionado
        });
    </script>
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarCombustible');
            form.action = routeEliminarCombustible(id);
            document.getElementById('modal_eliminar_combustible').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarCombustible(id) {
            return "{{ url('/admin/combustibles') }}/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarCombustible');
            form.action = url;
            modal_restaurar_combustible.showModal();
        }
    </script>
@endsection
