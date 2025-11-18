@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Listado de Roles</h1>

    {{-- Botón agregar rol --}}
    <button 
        class="btn btn-primary btn-md"
        onclick="abrir_modal('ventana_modal','Agregar',1,[],[])">
        <x-heroicon-o-plus class="w-5 h-5"/>Agregar rol
    </button>


</div>

<div class="card bg-base-100 shadow">
    <div class="card-body p-4">

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Nombre del rol</th>
                        <th class="text-center">Fecha y hora de creación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td style="text-align: center">{{ $contador++ }}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center"> {{ $role->created_at->format('d/m/Y H:i') }}</td>

                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Ver --}}
                                    <a href="" 
                                    class="btn btn-info btn-sm">
                                        <x-bi-eye-fill class="w-4 h-4"/>
                                    </a>
                                    {{-- Editar --}}
                                    <button 
                                        class="btn btn-warning btn-sm"
                                        onclick="abrir_modal(
                                            'ventana_modal',
                                            'Editar {{ $role->name }}',
                                            2,
                                            ['name'],
                                            JSON.parse(this.dataset.role)
                                        )"
                                        data-role='@json($role)'
                                    >
                                        <x-bi-pencil-square class="w-4 h-4"/>
                                    </button>
                                    {{-- Eliminar --}}
                                    <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $role->id }})">
                                        <x-bi-trash-fill class="w-4 h-4"/>
                                    </button>
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
                    <span class="label-text">Nombre del rol</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="input input-bordered w-full @error('name') input-error @enderror" placeholder="Nombre del rol" />
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

                <button type="submit" class="btn btn-primary">
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

<!-- Modal para eliminar -->
<dialog id="modal_eliminar_rol" class="modal">
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-bi-trash-fill class="w-5 h-5" />
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
                <x-bi-trash-fill class="w-4 h-4" />
                Eliminar
            </button>
        </form>
    </div>

  </div>
</dialog>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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

            if (campos.length >= 1) {
                campos.forEach((campo) => {
                    document.getElementById(campo).value = dato[campo];
                });
                document.getElementById("id").value = dato['id'];
            } else {
                document.getElementById("form").reset();
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