@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Compras</h1>

    {{-- Botón agregar compra --}}
    <a href="" 
       class="btn btn-primary">
        + Nueva Compra
    </a>
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