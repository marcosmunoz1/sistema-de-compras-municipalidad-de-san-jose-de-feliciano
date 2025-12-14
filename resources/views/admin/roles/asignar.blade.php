@extends('layouts.admin')

@section('title', 'Asignar Permiso')

@section('content')

    <div class="max-w-7xl mx-auto px-4">

        {{-- Título --}}
        <h2 class="text-2xl font-semibold mb-6">
            Asignar permisos al rol:
            <span class="font-bold text-primary">{{ $rol->name }}</span>
        </h2>

        <div class="card bg-base-100 shadow-xl border border-base-300">

            {{-- Header --}}
            <div class="card-body border-b border-base-300">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="select-all" class="checkbox checkbox-primary">
                    <span class="font-medium">Seleccionar todos</span>
                </label>
            </div>

            <form action="{{ url('/admin/roles/asignar', $rol->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body space-y-8">

                    {{-- Configuración del sistema --}}
                    <div>
                        <h3 class="text-lg font-semibold text-primary mb-4">⚙️ Configuración del sistema</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach (['Usuarios', 'Roles', 'Permisos'] as $modulo)
                                @if (isset($permisos[$modulo]))
                                    <div class="border border-base-300 rounded-lg p-4">
                                        <h4 class="font-bold mb-3">{{ $modulo }}</h4>

                                        @foreach ($permisosDivididos[$modulo] as $grupo)
                                            <div class="space-y-2">
                                                @foreach ($grupo as $permiso)
                                                    <label class="flex items-center gap-2">
                                                        <input type="checkbox"
                                                            class="checkbox checkbox-sm checkbox-success permiso-checkbox"
                                                            name="permisos[]" value="{{ $permiso->id }}"
                                                            {{ $rol->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                                        <span class="text-sm">{{ $permiso->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Otros módulos --}}
                    <div>
                        <h3 class="text-lg font-semibold text-primary mb-4">🧩 Otros módulos</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($permisos as $modulo => $grupoPermisos)
                                @if (!in_array($modulo, ['Usuarios', 'Roles', 'Permisos']))
                                    <div class="border border-base-300 rounded-lg p-4">
                                        <h4 class="font-bold mb-3">{{ $modulo }}</h4>

                                        @foreach ($permisosDivididos[$modulo] as $grupo)
                                            <div class="space-y-2">
                                                @foreach ($grupo as $permiso)
                                                    <label class="flex items-center gap-2">
                                                        <input type="checkbox"
                                                            class="checkbox checkbox-sm checkbox-success permiso-checkbox"
                                                            name="permisos[]" value="{{ $permiso->id }}"
                                                            {{ $rol->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                                        <span class="text-sm">{{ $permiso->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-actions justify-end border-t border-base-300 p-6 gap-2">
                    <button type="submit" class="btn btn-warning">
                        <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> Guardar
                    </button>

                    <a href="{{ url('admin/roles') }}" class="btn btn-primary">
                        <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('js')
    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.permiso-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
@endsection
