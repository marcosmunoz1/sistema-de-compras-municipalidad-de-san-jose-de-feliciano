@extends('layouts.admin')

@section('content') 

<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Proveedores</h1>
    <a href="{{ route('proveedores.create') }}" 
       class="btn btn-primary">
        + Nuevo Proveedor
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
      <a href="{{ route('proveedores.index') }}"> 
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
        proveedores
      </a>
    </li>
  </ul>
</div> 

<!-- Buscador -->
<form action="{{ route('proveedores.index') }}" method="GET"> 
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="input input-bordered flex items-center gap-2 w-full">
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por nombre, Cuit, contacto..."
                    class="w-full"
                />
            </label>

            <!-- BOTÓN -->
            <button class="btn btn-primary">
             <x-heroicon-o-magnifying-glass class="w-4 h-4" /> 
                Buscar
            </button>
              @if(request('search'))
                <a href="{{ route('proveedores.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
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
                        <th>Nr</th>
                        <th>Nombre de la empresa</th>
                        <th>Cuit</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $proveedores->currentPage() * $proveedores->perPage() - $proveedores->perPage() + 1; 
                    @endphp
                    @foreach ($proveedores as $proveedor) 
                        <tr>
                            <td>{{ $nr++ }}</td>
                            <td>{{ $proveedor->empresa }}</td>
                            <td>{{ $proveedor->cuit }}</td> 
                            <td>{{ $proveedor->nombre ?? 'N/A' }}</td>
                            <td>{{ $proveedor->telefono ?? 'N/A' }}</td>
                            <td>{{ $proveedor->celular ?? 'N/A' }}</td>
                            <td>{{ $proveedor->email ?? 'N/A' }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    <a href="" 
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>

                                    {{-- Editar --}}
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" 
                                        class="btn btn-warning btn-sm"
                                        
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>




                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                    <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $proveedor->id }})">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
          @if ($proveedores->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $proveedores->firstItem() }} - {{ $proveedores->lastItem() }} de {{ $proveedores->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($proveedores->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $proveedores->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($proveedores->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $proveedores->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if ($proveedores->hasMorePages())
                            <a href="{{ $proveedores->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

    </div>
</div>
@endsection

@section('js')

@endsection
