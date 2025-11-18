@extends('layouts.admin')

@section('content') 

<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Proveedores</h1>
    <a href="{{ route('admin.proveedores.create') }}" 
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
      <a href="{{ route('admin.proveedores.index') }}"> 
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
<div class="card bg-base-100 shadow p-6 mb-6">
    <div class="flex items-center gap-3">

        <!-- INPUT -->
        <label class="input input-bordered flex items-center gap-2 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m21 21-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            <input 
                type="text" 
                placeholder="Buscar por nombre, RUC, contacto..."
                class="w-full"
            />
        </label>

        <!-- BOTÓN -->
        <button class="btn btn-primary">
            Buscar
        </button>
    </div>
</div>

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
                        $contador = 1;
                    @endphp
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $contador++ }}</td>
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
                                    <button 
                                        class="btn btn-warning btn-sm"
                                        onclick="abrir_modal(
                                            'ventana_modal',
                                            'Editar {{ $proveedor->nombre }}',
                                            2,
                                            ['name'],
                                            JSON.parse(this.dataset.proveedor)
                                        )"
                                        data-proveedor='@json($proveedor)'
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </button>




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

    </div>
</div>
@endsection

@section('js')

@endsection
