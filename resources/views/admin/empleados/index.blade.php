@extends('layouts.admin')
@section('title', 'Empleados') 
@section('content') 

<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Empleados</h1>
    @can('empleados-create')
    <a href="{{ route('empleados.create') }}" 
       class="btn btn-primary">
        <x-heroicon-o-plus class="w-5 h-5"/> Nuevo Empleado
    </a>
    @endcan
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
        <x-heroicon-o-identification class="w-4 h-4 inline" />
        Empleados
      </a>
    </li>
  </ul>
</div> 

<!-- Buscador -->
<form action="{{ route('empleados.index') }}" method="GET"> 
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por nombre, dni, area..."
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
                <a href="{{ route('empleados.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
              @endif 
        </div>
    </div>
</form> 

<!-- Tabla -->
<div class="card bg-base-100 shadow">
    <div class="card-body p-4"> 
         <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de empleados</h4> 
                </div>
            </div> 

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">DNI</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Puesto</th>
                        <th class="text-center">Area</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $empleados->currentPage() * $empleados->perPage() - $empleados->perPage() + 1; 
                    @endphp
                    @foreach ($empleados as $empleado) 
                        <tr>
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ $empleado->nombre }}</td>
                            <td class="text-center">{{ $empleado->dni }}</td> 
                            <td class="text-center">{{ $empleado->celular}}</td>
                            <td class="text-center">{{ $empleado->direccion}}</td>
                            <td class="text-center">{{ $empleado->puesto}}</td>
                            <td class="text-center">{{ $empleado->area}}</td>
                            <td class="text-center">
                                    <span class="badge {{ $empleado->estado ? 'badge-success' : 'badge-error' }}">
                                        {{ $empleado->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    @can('empleados-show')
                                    <a href="{{ route('empleados.show', $empleado->id) }}"  
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>
                                     @endcan 
                                    {{-- Editar --}}
                                    @can('empleados-edit')
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" 
                                        class="btn btn-warning btn-sm"
                                        
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>
                                    @endcan 




                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                      {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($empleado->trashed())
                                        {{-- Restaurar --}}
                                            @can('empleados-restore')
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/empleados/'. $empleado->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                            @endcan
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                      @can('empleados-destroy') 
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $empleado->id }})">
                                          <x-heroicon-s-trash class="w-4 h-4"/>
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
          @if ($empleados->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $empleados->firstItem() }} - {{ $empleados->lastItem() }} de {{ $empleados->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($empleados->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $empleados->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Botón Primera página --}}
                        @if (!$empleados->onFirstPage())
                            <a href="{{ $empleados->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($empleados->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $empleados->currentPage();
                            $totalPages = $empleados->lastPage();
                            $start = max(1, $currentPage - 2);
                            $end = min($totalPages, $currentPage + 2);
                            
                            // Ajustar para mostrar siempre 5 páginas cuando sea posible
                            if ($end - $start < 4) {
                                if ($start == 1) {
                                    $end = min($totalPages, 5);
                                } elseif ($end == $totalPages) {
                                    $start = max(1, $totalPages - 4);
                                }
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <button class="join-item btn btn-square btn-active">{{ $i }}</button>
                            @else
                                <a href="{{ $empleados->url($i) }}" class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($empleados->currentPage() < $totalPages - 3)
                            @if ($empleados->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $empleados->url($totalPages) }}" class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

                        {{-- Botón Siguiente --}}
                        @if ($empleados->hasMorePages())
                            <a href="{{ $empleados->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

    </div>
</div>
<!-- Modal para eliminar -->
<dialog id="modal_eliminar_empleado" class="modal">
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-heroicon-o-trash class="w-5 h-5" />
        Confirmar eliminación
    </h3>

    <p class="py-4">
        ¿Seguro que querés eliminar este empleado?
    </p>

    <div class="modal-action">
        <form method="dialog">
            <button class="btn">Cancelar</button>
        </form>

        <!-- Formulario eliminar -->
        <form id="formEliminarEmpleado" method="POST">
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
<dialog id="modal_restaurar_empleado" class="modal">
    <div class="modal-box">

        <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
            <x-heroicon-o-arrow-path class="w-5 h-5" />
            Confirmar restauración
        </h3>

        <p class="py-4">
            ¿Seguro que querés restaurar este empleado?
        </p>

        <div class="modal-action">

            <!-- Botón cancelar -->
            <form method="dialog">
                <button class="btn">Cancelar</button>
            </form>

            <!-- Formulario restaurar -->
            <form id="formRestaurarEmpleado" method="POST">
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
            const form = document.getElementById('formEliminarEmpleado');
            form.action = routeEliminarVehiculo(id);
            document.getElementById('modal_eliminar_empleado').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarVehiculo(id) {
          return "{{ url('/admin/empleados') }}/" + id;
      }
      function abrirModalRestaurar(url) {
        const form = document.getElementById('formRestaurarEmpleado');
        form.action = url;
        modal_restaurar_empleado.showModal();
      }
  </script>
@endsection

