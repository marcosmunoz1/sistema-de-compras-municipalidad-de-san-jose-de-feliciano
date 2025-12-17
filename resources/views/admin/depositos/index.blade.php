@extends('layouts.admin')
@section('title', 'Depósitos') 
@section('content')

    <!-- Título y botón -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Depósitos</h1>
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
                <a href="{{ route('depositos.index') }}">
                    <x-heroicon-o-home-modern class="w-4 h-4 inline" />
                    Depósitos
                </a>
            </li>
        </ul>
    </div>

    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $nr =  1;
                        @endphp

                        @foreach ($depositos as $deposito)
                            <tr>
                                <td class="text-center">{{ $nr++ }}</td>
                                <td class="text-center">{{ $deposito->nombre }}</td>
                                <td class="text-center">{{ $deposito->descripcion }}</td>
                                <td class="text-center">
                                    {{-- Ver --}}
                                    @can('depositos-show')
                                    <a href="{{ route('depositos.show', $deposito->id) }}" class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4" />
                                    </a> 
                                    @endcan 
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
