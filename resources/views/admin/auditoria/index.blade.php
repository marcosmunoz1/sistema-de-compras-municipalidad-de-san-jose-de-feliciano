@extends('layouts.admin')
@section('title', 'Auditoría del Sistema')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Auditoría del Sistema</h1>
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
                <span class="inline-flex items-center gap-2">
                    <x-heroicon-o-clipboard-document-list class="w-4 h-4 inline" />
                    Auditoría
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <h2 class="card-title text-lg mb-4">Filtros de búsqueda</h2>
            
            <form method="GET" action="{{ route('auditoria.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Usuario</span>
                    </label>
                    <select name="usuario" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todos los usuarios</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ request('usuario') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Módulo</span>
                    </label>
                    <select name="modulo" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todos los módulos</option>
                        @foreach($modulos as $modulo)
                            <option value="{{ $modulo['value'] }}" {{ request('modulo') == $modulo['value'] ? 'selected' : '' }}>
                                {{ $modulo['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Acción</span>
                    </label>
                    <select name="accion" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todas las acciones</option>
                        <option value="created" {{ request('accion') == 'created' ? 'selected' : '' }}>Creado</option>
                        <option value="updated" {{ request('accion') == 'updated' ? 'selected' : '' }}>Actualizado</option>
                        <option value="deleted" {{ request('accion') == 'deleted' ? 'selected' : '' }}>Eliminado</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fecha desde</span>
                    </label>
                    <input type="date" name="fecha_desde" value="{{ request('fecha_desde') }}" 
                           class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fecha hasta</span>
                    </label>
                    <input type="date" name="fecha_hasta" value="{{ request('fecha_hasta') }}" 
                           class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Búsqueda general</span>
                    </label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Buscar..." class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="col-span-1 md:col-span-3 flex gap-2 justify-end">
                    <a href="{{ route('auditoria.index') }}" class="btn">
                        Limpiar filtros
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Usuario</th>
                            <th>Acción</th>
                            <th>Módulo</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($actividades as $actividad)
                            <tr>
                                <td class="text-sm">
                                    {{ $actividad->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td>
                                    @if($actividad->causer)
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm">{{ $actividad->causer->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">Sistema</span>
                                    @endif
                                </td>
                                <td>
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
                                    <span class="badge {{ $badgeClass }} badge-sm">{{ $eventText }}</span>
                                </td>
                                <td class="text-sm">
                                    <span class="badge badge-outline">{{ class_basename($actividad->subject_type) }}</span>
                                </td>
                                <td class="text-sm max-w-xs truncate">
                                    {{ $actividad->description ?? 'Sin descripción' }}
                                </td>
                                <td>
                                    <a href="{{ route('auditoria.show', Crypt::encryptString($actividad->id)) }}" 
                                       class="btn btn-ghost btn-xs">
                                        <x-heroicon-o-eye class="w-4 h-4" />
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center gap-2">
                                        <x-heroicon-o-inbox class="w-12 h-12 text-gray-400" />
                                        <p class="text-gray-500">No se encontraron registros de auditoría</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($actividades->hasPages())
                <div class="mt-4">
                    {{ $actividades->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
