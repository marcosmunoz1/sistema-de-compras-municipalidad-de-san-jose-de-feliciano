@extends('layouts.admin')
@section('title', 'Depósitos') 
@section('content')

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-base-content">Depósitos</h1>
        <p class="text-base-content/60 mt-1">Gestiona tus espacios de almacenamiento</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" class="flex items-center gap-2 hover:text-primary transition-colors">
                    <x-heroicon-o-home class="w-4 h-4" />
                    Home
                </a>
            </li>
            <li class="flex items-center gap-2">
                <x-heroicon-o-home-modern class="w-4 h-4" />
                <span class="font-medium">Depósitos</span>
            </li>
        </ul>
    </div>

    <!-- Grid de Cards para Depósitos -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($depositos as $index => $deposito)
            <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-base-300">
                <div class="card-body">
                    <!-- Header del card con número -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="avatar placeholder">
                                <div class="bg-primary text-primary-content rounded-full w-12 h-12">
                                    <span class="text-xl font-bold">{{ $index + 1 }}</span>
                                </div>
                            </div>
                            <div>
                                <h2 class="card-title text-xl">{{ $deposito->nombre }}</h2>
                                <div class="badge badge-primary badge-sm mt-1">Depósito</div>
                            </div>
                        </div>
                        
                        <!-- Icono de almacén -->
                        <x-heroicon-o-home-modern class="w-8 h-8 text-base-content/20" />
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <p class="text-base-content/70 leading-relaxed">
                            {{ $deposito->descripcion ?? 'Sin descripción' }}
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="divider my-2"></div>

                    <!-- Acciones -->
                    <div class="card-actions justify-end">
                        @can('depositos-show')
                            <a href="{{ route('depositos.show', $deposito->id) }}" 
                               class="btn btn-primary btn-sm gap-2">
                                <x-heroicon-s-eye class="w-4 h-4" />
                                Ver Detalle
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <!-- Estado vacío -->
            <div class="col-span-full">
                <div class="card bg-base-100 shadow border border-dashed border-base-300">
                    <div class="card-body items-center text-center py-12">
                        <x-heroicon-o-home-modern class="w-16 h-16 text-base-content/20 mb-4" />
                        <h3 class="text-lg font-semibold text-base-content/60">No hay depósitos</h3>
                        <p class="text-base-content/40">Aún no se han registrado depósitos en el sistema</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Información adicional (opcional) -->
    @if($depositos->count() > 0)
        <div class="alert alert-info shadow-lg mt-6">
            <x-heroicon-o-information-circle class="w-6 h-6" />
            <div>
                <h3 class="font-bold">Total de depósitos</h3>
                <div class="text-sm">Actualmente tienes {{ $depositos->count() }} depósito(s) registrado(s)</div>
            </div>
        </div>
    @endif

@endsection

@section('js')
    @if(session('mensaje'))
        <script>
            Swal.fire({
                title: '{{ session("titulo") ?? (session("icono") == "success" ? "¡Éxito!" : "Error") }}',
                text: '{{ session("mensaje") }}',
                icon: '{{ session("icono") }}',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3B82F6'
            });
        </script>
    @endif
@endsection