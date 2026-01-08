@extends('layouts.admin')
@section('title', 'Backups')  
@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Gestión de Backups</h1>
    @can('backups-create') 
    <div class="flex gap-2"> 
        <form action="{{ route('backups.create') }}" method="POST" class="inline">
            @csrf
            <input type="hidden" name="only_db" value="1">
            <button type="submit" class="btn btn-info" onclick="return confirm('¿Ejecutar backup de base de datos?')">
                <x-heroicon-o-circle-stack class="w-5 h-5"/>Solo Base de Datos
            </button>
        </form>
        <form action="{{ route('backups.create') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Ejecutar backup completo (DB + archivos)?')">
                <x-heroicon-o-server-stack class="w-5 h-5"/>Backup Completo
            </button>
        </form>
    </div>
    @endcan
</div>

<div class="breadcrumbs text-sm mb-6">
    <ul>
        <li>
            <a href="{{ route('admin.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('backups.index') }}">
                <x-heroicon-o-server-stack class="w-4 h-4 inline" />
                Backups
            </a>
        </li>
    </ul>
</div>

@if(session('success'))
    <div class="alert alert-success mb-6">
        <x-heroicon-o-check-circle class="w-6 h-6"/>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error mb-6">
        <x-heroicon-o-x-circle class="w-6 h-6"/>
        <span>{{ session('error') }}</span>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-70">Total Backups</p>
                    <h3 class="text-3xl font-bold">{{ $stats['total_count'] }}</h3>
                </div>
                <x-heroicon-o-archive-box class="w-12 h-12 opacity-20"/>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-70">Espacio Total</p>
                    <h3 class="text-2xl font-bold">{{ $stats['total_size_formatted'] }}</h3>
                </div>
                <x-heroicon-o-circle-stack class="w-12 h-12 opacity-20"/>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-70">Último Backup</p>
                    <h3 class="text-sm font-bold">
                        @if($stats['newest'])
                            {{ \Carbon\Carbon::createFromTimestamp($stats['newest'])->format('d/m/Y H:i') }}
                        @else
                            Sin backups
                        @endif
                    </h3>
                </div>
                <x-heroicon-o-clock class="w-12 h-12 opacity-20"/>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-70">Backups Programados</p>
                    <h3 class="text-sm font-bold">13:00 y 22:00</h3>
                </div>
                <x-heroicon-o-calendar class="w-12 h-12 opacity-20"/>
            </div>
        </div>
    </div>
</div>

<div class="card bg-base-100 shadow mb-6">
    <div class="card-body p-4">
        <div class="alert alert-info">
            <x-heroicon-o-information-circle class="w-6 h-6"/>
            <div>
                <h3 class="font-bold">Información de Backups Automáticos</h3>
                <div class="text-sm">
                    <p>• <strong>13:00:</strong> Backup de base de datos (solo DB)</p>
                    <p>• <strong>22:00:</strong> Backup completo (DB + archivos del sistema)</p>
                    <p>• Los backups se mantienen según política de retención: 1 día completo, 7 días diarios, 4 semanas semanales, 12 meses mensuales</p>
                    <p>• Si un backup falla, el anterior se mantiene intacto hasta que se ejecute uno exitoso</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-base-100 shadow">
    <div class="card-body p-4">
        <h2 class="text-xl font-semibold mb-4">Lista de Backups Disponibles</h2>

        @if(count($backups) > 0)
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Nombre del Archivo</th>
                        <th class="text-center">Tamaño</th>
                        <th class="text-center">Fecha de Creación</th>
                        <th class="text-center">Antigüedad</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backups as $index => $backup)
                        <tr>
                            <td class="text-center">{{ ($backups->currentPage() - 1) * $backups->perPage() + $index + 1 }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <x-heroicon-o-archive-box class="w-5 h-5 text-primary"/>
                                    <span class="font-mono text-sm">{{ $backup['name'] }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-neutral">
                                    {{ number_format($backup['size'] / 1024 / 1024, 2) }} MB
                                </span>
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::createFromTimestamp($backup['modified'])->timezone(config('app.timezone'))->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="text-center">
                                <span class="text-sm opacity-70">
                                    {{ \Carbon\Carbon::createFromTimestamp($backup['modified'])->timezone(config('app.timezone'))->diffForHumans() }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="flex gap-2 justify-center">
                                    @can('backups-download')
                                    <a href="{{ route('backups.download', $backup['name']) }}" 
                                       class="btn btn-success btn-sm"
                                       title="Descargar">
                                        <x-heroicon-o-arrow-down-tray class="w-4 h-4"/>
                                    </a>
                                    @endcan

                                    @can('backups-verify')
                                    <form action="{{ route('backups.verify', $backup['name']) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-info btn-sm"
                                                title="Verificar integridad">
                                            <x-heroicon-o-shield-check class="w-4 h-4"/>
                                        </button>
                                    </form>
                                    @endcan

                                    @can('backups-delete') 
                                    <button class="btn btn-error btn-sm"
                                            title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $backup['name'] }}')">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                    </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $backups->links() }}
        </div>
        
        @else
        <div class="alert alert-warning">
            <x-heroicon-o-exclamation-triangle class="w-6 h-6"/>
            <span>No hay backups disponibles. Ejecuta un backup manual para comenzar.</span>
        </div>
        @endif
    </div>
</div>
<!-- Modal para eliminar -->
<dialog id="modal_eliminar_backup" class="modal"> 
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-heroicon-o-trash class="w-5 h-5" />
        Confirmar eliminación
    </h3>

    <p class="py-4">
        ¿Seguro que querés eliminar este backup?  
    </p>

    <div class="modal-action">
        <form method="dialog">
            <button class="btn">Cancelar</button>
        </form>

        <!-- Formulario eliminar -->
        <form id="formEliminarBackup" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-error">
                <x-heroicon-o-trash class="w-4 h-4" />
                Eliminar
            </button>
        </form>
    </div>

  </div>
</dialog>
@endsection 
@section('js')
<script>
    function confirmarEliminacion(name) { 
            const form = document.getElementById('formEliminarBackup'); 
            form.action = routeEliminarBackup(name); 
            document.getElementById('modal_eliminar_backup').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarBackup(name) { 
          return "{{ url('/admin/backups/delete') }}/" + name;  
      } 
  </script>
@endsection
