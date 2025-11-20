@extends('layouts.admin')

@section('content') 

<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Vehiculos</h1>
    <a href="{{ route('vehiculos.create') }}" 
       class="btn btn-primary">
        + Nuevo Vehiculo
    </a>
 </div>
 
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="{{ route('admin.index') }}">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('vehiculos.index') }}"> 
        <x-heroicon-o-truck class="w-4 h-4 inline" />
        Vehiculos
      </a>
    </li>
  </ul>
</div> 

<!-- Buscador -->
<form action="{{ route('vehiculos.index') }}" method="GET"> 
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por patente, tipo, modelo..."
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                />
            </label>

            <!-- BOTÓN -->
            <button class="btn btn-primary">
             <x-heroicon-o-magnifying-glass class="w-4 h-4" /> 
                Buscar
            </button>
              @if(request('search'))
                <a href="{{ route('vehiculos.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
              @endif 
        </div>
    </div>
</form> 

<!-- Tabla -->
<div class="card bg-base-100 shadow">
    <div class="card-body p-4">

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Modelo</th>
                        <th class="text-center">Patente</th>
                        <th class="text-center">Año</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $vehiculos->currentPage() * $vehiculos->perPage() - $vehiculos->perPage() + 1; 
                    @endphp
                    @foreach ($vehiculos as $vehiculo) 
                        <tr>
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ $vehiculo->tipo }}</td>
                            <td class="text-center">{{ $vehiculo->marca }}</td> 
                            <td class="text-center">{{ $vehiculo->modelo}}</td>
                            <td class="text-center">{{ $vehiculo->patente}}</td>
                            <td class="text-center">{{ $vehiculo->anio}}</td>
                            <td class="text-center">
                                    <span class="badge {{ $vehiculo->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $vehiculo->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    <a href="{{ route('vehiculos.show', $vehiculo->id) }}"  
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>

                                    {{-- Editar --}}
                                    <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" 
                                        class="btn btn-warning btn-sm"
                                        
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>




                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                      {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($vehiculo->trashed())
                                        {{-- Restaurar --}}
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/vehiculos/'. $vehiculo->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $vehiculo->id }})">
                                          <x-heroicon-s-trash class="w-4 h-4"/>
                                      </button>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
          @if ($vehiculos->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $vehiculos->firstItem() }} - {{ $vehiculos->lastItem() }} de {{ $vehiculos->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($vehiculos->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $vehiculos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($vehiculos->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $vehiculos->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if ($vehiculos->hasMorePages())
                            <a href="{{ $vehiculos->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

    </div>
</div>
<!-- Modal para eliminar -->
<dialog id="modal_eliminar_vehiculo" class="modal">
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-heroicon-o-trash class="w-5 h-5" />
        Confirmar eliminación
    </h3>

    <p class="py-4">
        ¿Seguro que querés eliminar este vehículo?
    </p>

    <div class="modal-action">
        <form method="dialog">
            <button class="btn">Cancelar</button>
        </form>

        <!-- Formulario eliminar -->
        <form id="formEliminarVehiculo" method="POST">
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
<dialog id="modal_restaurar_vehiculo" class="modal">
    <div class="modal-box">

        <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
            <x-heroicon-o-arrow-path class="w-5 h-5" />
            Confirmar restauración
        </h3>

        <p class="py-4">
            ¿Seguro que querés restaurar este vehículo?
        </p>

        <div class="modal-action">

            <!-- Botón cancelar -->
            <form method="dialog">
                <button class="btn">Cancelar</button>
            </form>

            <!-- Formulario restaurar -->
            <form id="formRestaurarVehiculo" method="POST">
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
    function confirmarEliminacion(id) { 
            const form = document.getElementById('formEliminarVehiculo');
            form.action = routeEliminarVehiculo(id);
            document.getElementById('modal_eliminar_vehiculo').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarVehiculo(id) {
          return "{{ url('/admin/vehiculos') }}/" + id;
      }
      function abrirModalRestaurar(url) {
        const form = document.getElementById('formRestaurarVehiculo');
        form.action = url;
        modal_restaurar_vehiculo.showModal();
      }
  </script>
@endsection

