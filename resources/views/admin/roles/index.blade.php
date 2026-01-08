@extends('layouts.admin')
@section('title', 'Roles')  
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Listado de Roles</h1>

        {{-- Botón agregar rol --}}
        @can('roles-store')
        <button class="btn btn-primary btn-md" onclick="abrir_modal('ventana_modal','Agregar',0,[],[])">
            <x-heroicon-o-plus class="w-5 h-5" />Nuevo rol
        </button>
        @endcan
    </div>
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4"> 
             <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de roles</h4> 
                </div>
            </div> 

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre del rol</th>
                            <th class="text-center">Permisos</th>
                            <th class="text-center">Fecha y hora de creación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td class="text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                    <button 
                                        onclick="mostrarPermisos(this)" 
                                        data-role-name="{{ $role->name }}"
                                        data-permisos='@json($role->permissions->pluck('name'))'
                                        class="btn btn-sm btn-ghost gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                                            <path d="M9 3v18"></path>
                                        </svg>
                                        <span class="badge badge-primary badge-sm">{{ $role->permissions->count() }}</span>
                                    </button>
                                </td>
                                <td class="text-center"> {{ $role->created_at->format('d/m/Y H:i') }}</td>

                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- Ver --}}
                                        @can('roles-show')
                                        <button class="btn btn-info btn-sm"
                                            onclick="abrir_modal(
                                                'ventana_modal',
                                                'Ver {{ $role->name }}',
                                                1,                  // MODO VER
                                                ['name'],
                                                JSON.parse(this.dataset.role)
                                            )"
                                            data-role='@json($role)'>
                                            <x-heroicon-s-eye class="w-4 h-4" />
                                        </button>
                                        @endcan

                                        {{-- Editar --}}
                                        @can('roles-edit')
                                        <button class="btn btn-warning btn-sm"
                                            onclick="abrir_modal(
                                            'ventana_modal',
                                            'Editar {{ $role->name }}',
                                            2,
                                            ['name'],
                                            JSON.parse(this.dataset.role)
                                        )"
                                            data-role='@json($role)'>
                                            <x-heroicon-s-pencil class="w-4 h-4" />
                                        </button>
                                        @endcan

                                        {{-- Asignar --}}
                                        @can('roles-asignar')
                                        <a class="btn btn-success btn-sm" href="{{ url('/admin/roles/asignar/'.$role->id) }}">
                                            <x-heroicon-s-check-badge class="w-4 h-4"/>
                                        </a> 
                                        @endcan  
                                        {{-- Eliminar --}}
                                        @can('roles-destroy')
                                        <button class="btn btn-error btn-sm"
                                            onclick="confirmarEliminacion({{ $role->id }})">
                                            <x-heroicon-s-trash class="w-4 h-4" />
                                        </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- MODAL -->
    <dialog id="ventana_modal" class="modal">
        <div class="modal-box">

            <form action="{{ route('admin.roles.store') }}" id="form" name="form" method="POST">
                @csrf

                <!-- TÍTULO -->
                <h3 class="font-bold text-lg mb-4" id="ventana_modal_titulo"></h3>

                <!-- CAMPO -->
                <div class="form-control mb-4">
                    <label for="nombre" class="label">
                        <span class="label-text">Nombre del rol<span class="text-red-600">*</span></span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition @error('name') input-error @enderror"
                        placeholder="Nombre del rol" required/> 
                    @error('name')
                        <span class="text-red-500 text-sm error-message">{{ $message }}</span>
                    @enderror

                </div>

                <!-- HIDDENS -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- BOTONES -->
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('ventana_modal').close()" class="btn">
                        Cerrar
                    </button>

                    <button id="btn_guardar" type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>

            </form>
        </div>

        <!-- PARA QUE SE CIERRE HACIENDO CLICK FUERA  -->
        <form method="dialog" class="modal-backdrop">
            <button>Cerrar</button>
        </form>
    </dialog>

    <!-- Modal para ver permisos -->
    <dialog id="modal_permisos" class="modal">
        <div class="modal-box max-w-2xl">
            <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                    <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                    <path d="M9 3v18"></path>
                </svg>
                Permisos del rol: <span id="modal_permisos_rol_nombre" class="text-primary"></span>
            </h3>

            <div id="modal_permisos_contenido" class="max-h-96 overflow-y-auto">
                <!-- Los permisos se cargarán aquí dinámicamente -->
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cerrar</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Cerrar</button>
        </form>
    </dialog>

    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_rol" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este rol?
            <div>
                <span class="text-red-600 font-semibold">Esta acción no se puede deshacer.</span>
            </div>
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarRol" method="POST">
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

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('ventana_modal').showModal();
            });
        </script>
    @endif
@endsection

@section('js')
    <script>
        function abrir_modal(modal, title, accion, campos, dato) {
            const dlg = document.getElementById(modal);
            dlg.showModal();

            document.getElementById(`${modal}_titulo`).textContent = title;
            document.getElementById("accion").value = accion;

            const form = document.getElementById("form");
            const inputs = form.querySelectorAll("input, select, textarea");
            const btnGuardar = document.getElementById("btn_guardar");

            // MODO VER (1) → deshabilitar inputs y ocultar botón
            if (accion === 1) {
                inputs.forEach(input => input.setAttribute("disabled", true));
                btnGuardar.style.display = "none";
            }

            // MODO AGREGAR (0) o EDITAR (2) → habilitar inputs y mostrar botón
            if (accion === 0 || accion === 2) {
                inputs.forEach(input => input.removeAttribute("disabled"));
                btnGuardar.style.display = "inline-flex"; // vuelve a mostrarse
            }

            // Cargar datos si hay campos definidos
            if (campos.length >= 1) {
                campos.forEach((campo) => {
                    document.getElementById(campo).value = dato[campo];
                });
                document.getElementById("id").value = dato['id'];
            } else {
                form.reset();
            }
        }




        function cerrar_modal() {
            document.getElementById('ventana_modal').close();
        }

        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarRol');
            form.action = routeEliminarRol(id);
            document.getElementById('modal_eliminar_rol').showModal();
        }

        // Genera la URL usando el helper de Laravel
        function routeEliminarRol(id) {
            return "{{ url('/admin/roles') }}/" + id;
        }


        function mostrarPermisos(button) {
            const rolNombre = button.dataset.roleName;
            const permisos = JSON.parse(button.dataset.permisos);
            
            document.getElementById('modal_permisos_rol_nombre').textContent = rolNombre;
            
            const contenido = document.getElementById('modal_permisos_contenido');
            
            if (permisos.length === 0) {
                contenido.innerHTML = `
                    <div class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Este rol no tiene permisos asignados</span>
                    </div>
                `;
            } else {
                let html = '<div class="grid grid-cols-2 gap-2">';
                permisos.forEach(permiso => {
                    html += `
                        <div class="flex items-center gap-2 p-2 bg-base-200 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-sm">${permiso}</span>
                        </div>
                    `;
                });
                html += '</div>';
                contenido.innerHTML = html;
            }
            
            document.getElementById('modal_permisos').showModal();
        }

        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('ventana_modal');

            modal.addEventListener('close', () => {

                // Quitar mensajes de error
                document.querySelectorAll('.error-message').forEach(el => el.remove());

                // Quitar clases de error de inputs
                document.querySelectorAll('.input-error').forEach(el => {
                    el.classList.remove('input-error');
                });

            });

        });
    </script>
@endsection
