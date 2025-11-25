@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Compras</h1>
    
    {{-- Botón agregar compra --}}
    <a href="{{ route('compras.create') }}" 
       class="btn btn-primary">
        + Nueva Compra
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
      <a href="{{ route('compras.index') }}">  
        <x-heroicon-o-shopping-bag class="w-4 h-4 inline" />
        Compras
      </a>
    </li>
  </ul>
</div>


<div class="card bg-base-100 shadow">
    <div class="card-body p-4">

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    {{-- EJEMPLO | Los vas a reemplazar con tus datos --}}
                    <tr>
                        <td>1</td>
                        <td>Proveedor Municipal SRL</td>
                        <td>2025-01-15</td>
                        <td>$ 150.000</td>

                        <td class="text-center">
                            <div class="flex items-center justify-center gap-2">

                                {{-- Ver --}}
                                <a href="" 
                                   class="btn btn-info btn-sm">
                                    Ver
                                </a>

                                {{-- Editar --}}
                                <a href="" 
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                <button class="btn btn-error btn-sm">
                                    Eliminar
                                </button>

                            </div>
                        </td>
                    </tr>
                    {{-- Fin ejemplo --}}

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection