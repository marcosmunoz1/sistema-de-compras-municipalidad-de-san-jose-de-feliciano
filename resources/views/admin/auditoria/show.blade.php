@extends('layouts.admin')
@section('title', 'Detalle de Auditoría')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Detalle de Auditoría</h1>
        <a href="{{ route('auditoria.index') }}" class="btn">
            <x-heroicon-m-arrow-left class="w-4 h-4" />
            Volver
        </a>
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
                <a href="{{ route('auditoria.index') }}">
                    <x-heroicon-o-clipboard-document-list class="w-4 h-4 inline" />
                    Auditoría
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Detalle
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl mb-4">
        <div class="card-body">
            <h2 class="card-title">Información General</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="text-sm font-semibold text-gray-600">Fecha y Hora</label>
                    <p class="text-base">{{ $actividad->created_at->format('d/m/Y H:i:s') }}</p>
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-600">Usuario</label>
                    <p class="text-base">
                        @if($actividad->causer)
                            {{ $actividad->causer->name }} ({{ $actividad->causer->email }})
                        @else
                            <span class="text-gray-400">Sistema</span>
                        @endif
                    </p>
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-600">Acción</label>
                    <p class="text-base">
                        @php
                            $badgeClass = match($actividad->event) {
                                'created' => 'badge-success',
                                'updated' => 'badge-info',
                                'deleted' => 'badge-error',
                                default => 'badge-ghost'
                            };
                            $eventText = match($actividad->event) {
                                'created' => 'Creado',
                                'updated' => 'Actualizado',
                                'deleted' => 'Eliminado',
                                default => ucfirst($actividad->event)
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $eventText }}</span>
                    </p>
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-600">Módulo</label>
                    <p class="text-base">
                        <span class="badge badge-outline">{{ class_basename($actividad->subject_type) }}</span>
                    </p>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label class="text-sm font-semibold text-gray-600">Descripción</label>
                    <p class="text-base">{{ $actividad->description ?? 'Sin descripción' }}</p>
                </div>

                @if($actividad->subject_id)
                <div>
                    <label class="text-sm font-semibold text-gray-600">ID del Registro</label>
                    <p class="text-base">{{ $actividad->subject_id }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    @if($actividad->properties && $actividad->properties->count() > 0)
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Cambios Realizados</h2>

                @if($actividad->event === 'updated' && isset($actividad->properties['attributes']) && isset($actividad->properties['old']))
                    <div class="overflow-x-auto mt-4">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Campo</th>
                                    <th>Valor Anterior</th>
                                    <th>Valor Nuevo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actividad->properties['attributes'] as $key => $newValue)
                                    @if(isset($actividad->properties['old'][$key]) && $actividad->properties['old'][$key] != $newValue)
                                        <tr>
                                            <td class="font-semibold">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                            <td>
                                                <span class="badge badge-error badge-outline">
                                                    {{ $actividad->properties['old'][$key] ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success badge-outline">
                                                    {{ $newValue ?? 'N/A' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif($actividad->event === 'created' && isset($actividad->properties['attributes']))
                    <div class="overflow-x-auto mt-4">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Campo</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actividad->properties['attributes'] as $key => $value)
                                    <tr>
                                        <td class="font-semibold">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                        <td>
                                            <span class="badge badge-success badge-outline">
                                                {{ $value ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif($actividad->event === 'deleted' && isset($actividad->properties['old']))
                    <div class="overflow-x-auto mt-4">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Campo</th>
                                    <th>Valor Eliminado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actividad->properties['old'] as $key => $value)
                                    <tr>
                                        <td class="font-semibold">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                        <td>
                                            <span class="badge badge-error badge-outline">
                                                {{ $value ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mt-4">
                        <span>No hay cambios específicos registrados para esta actividad.</span>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
