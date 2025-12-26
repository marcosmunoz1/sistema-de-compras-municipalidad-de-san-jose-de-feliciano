@props(['model', 'limit' => 10])

@php
    $actividades = \Spatie\Activitylog\Models\Activity::where('subject_type', get_class($model))
        ->where('subject_id', $model->id)
        ->with('causer')
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();
@endphp

<div class="card bg-base-100 shadow-xl mt-4">
    <div class="card-body">
        <div class="flex items-center justify-between mb-4">
            <h2 class="card-title">
                <x-heroicon-o-clock class="w-5 h-5" />
                Historial de Cambios
            </h2>
            @if($actividades->count() > 0)
                <a href="{{ route('auditoria.index', ['modulo' => get_class($model), 'search' => $model->id]) }}" 
                   class="btn btn-ghost btn-sm">
                    Ver historial completo
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            @endif
        </div>

        @if($actividades->count() > 0)
            <div class="space-y-3">
                @foreach($actividades as $actividad)
                    <div class="border border-base-300 rounded-lg p-4 hover:bg-base-200 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
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
                                    
                                    @if($actividad->causer)
                                        <span class="text-sm text-gray-600">
                                            por <strong>{{ $actividad->causer->name }}</strong>
                                        </span>
                                    @endif
                                    
                                    <span class="text-xs text-gray-500">
                                        {{ $actividad->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                @if($actividad->event === 'updated' && isset($actividad->properties['attributes']) && isset($actividad->properties['old']))
                                    <div class="text-sm">
                                        <p class="font-semibold mb-1">Campos modificados:</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($actividad->properties['attributes'] as $key => $newValue)
                                                @if(isset($actividad->properties['old'][$key]) && $actividad->properties['old'][$key] != $newValue)
                                                    <span class="badge badge-outline badge-sm">
                                                        {{ ucfirst(str_replace('_', ' ', $key)) }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif($actividad->event === 'created')
                                    <p class="text-sm text-gray-600">Registro creado en el sistema</p>
                                @elseif($actividad->event === 'deleted')
                                    <p class="text-sm text-gray-600">Registro eliminado del sistema</p>
                                @endif
                            </div>

                            <a href="{{ route('auditoria.show', Crypt::encryptString($actividad->id)) }}" 
                               class="btn btn-ghost btn-xs">
                                <x-heroicon-o-eye class="w-4 h-4" />
                            </a>
                        </div>

                        @if($actividad->event === 'updated' && isset($actividad->properties['attributes']) && isset($actividad->properties['old']))
                            <details class="mt-2">
                                <summary class="cursor-pointer text-xs text-primary hover:underline">
                                    Ver cambios detallados
                                </summary>
                                <div class="mt-2 overflow-x-auto">
                                    <table class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th>Campo</th>
                                                <th>Anterior</th>
                                                <th>Nuevo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($actividad->properties['attributes'] as $key => $newValue)
                                                @if(isset($actividad->properties['old'][$key]) && $actividad->properties['old'][$key] != $newValue)
                                                    <tr>
                                                        <td class="font-semibold">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                                        <td>
                                                            <span class="text-error">
                                                                {{ $actividad->properties['old'][$key] ?? 'N/A' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success">
                                                                {{ $newValue ?? 'N/A' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </details>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <x-heroicon-o-information-circle class="w-5 h-5" />
                <span>No hay historial de cambios para este registro.</span>
            </div>
        @endif
    </div>
</div>
