@extends('layouts.admin')

@section('content')
 <!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Combustibles</h1>
    <a href="{{ route('combustibles.create') }}" 
       class="btn btn-primary">
        + Nuevo Combustible 
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
      <a href="{{ route('combustibles.index') }}">  
        <x-heroicon-o-truck class="w-4 h-4 inline" />
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
                    <h3 class="mt-2">$718.20</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-blue-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Litros Consumidos</p>
                    <h3 class="mt-2">185 L</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-green-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
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
    </div>

    <!-- Card 4 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Cargas</p>
                    <h3 class="mt-2">4</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
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
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por vehiculo, combustible, fecha..."
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
                <a href="{{ route('combustibles.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
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
                        <th class="text-center">Nr orden</th> 
                        <th class="text-center">fecha</th>
                        <th class="text-center">Vehiculo</th> 
                        <th class="text-center">Conductor</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Litros</th>
                        <th class="text-center">Importe</th>
                        <th class="text-center">Estacion</th> 
                        <th class="text-center">Tipo de pago</th>
                        <th class="text-center">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $combustibles->currentPage() * $combustibles->perPage() - $combustibles->perPage() + 1; 
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
                            <td class="text-center">{{ $combustible->tipo_de_pago }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    <a href="{{ route('combustibles.show', $combustible->id) }}"  
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>

                                    {{-- Editar --}}
                                    <a href="{{ route('combustibles.edit', $combustible->id) }}" 
                                        class="btn btn-warning btn-sm"
                                        
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>




                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                      {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($combustible->trashed())
                                        {{-- Restaurar --}}
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/combustibles/'. $combustible->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $combustible->id }})">
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
          @if ($combustibles->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $combustibles->firstItem() }} - {{ $combustibles->lastItem() }} de {{ $combustibles->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($combustibles->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $combustibles->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($combustibles->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $combustibles->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
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


@endsection
