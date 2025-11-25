@extends('layouts.admin')

@section('content')
 <!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Permisos</h1>
     <div class="flex  gap-2">
       {{--  <button onclick="crearCombustible.showModal()" class="btn btn-warning tooltip tooltip-warning mb-1" data-tip="Actualizar los precios de los combustibles">   
            <x-heroicon-s-cloud-arrow-up class="w-4 h-4 inline" /> 
            Actulizar Precios 
        </button> --}} 
        <button  onclick="abrir_modal('crearPermisoModal', 'Crear Nuevo Permiso', '1', ['name'], {})" 
           class="btn btn-primary tooltip tooltip-primary tooltip-bottom mb-1" data-tip="Crear un nuevo permiso">
            + Nuevo permiso
        </button> 
    </div>
 </div>
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="{{ route('admin.index') }}">
       <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5"
        fill="none" 
        viewBox="0 0 24 24"
        stroke="currentColor">
        <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('permisos.index') }}">   
        <x-heroicon-o-shield-check class="w-6 h-6 inline" />
        Permisos 
      </a>
    </li>
  </ul>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 pd-6 mb-6">

    <!-- Card 1 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total de Permisos</p>
                    <h3 class="mt-2">{{$totalPermisos}}</h3>   
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" 
                width="24" height="24" 
                viewBox="0 0 24 24" fill="none" 
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-shield-check w-10 h-10 text-blue-600">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                <path d="m9 12 2 2 4-4" />
            </svg>

            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Litros Consumidos</p>
                    <h3 class="mt-2"> L</h3> 
                </div>
               <svg xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" 
                    viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shield-check w-10 h-10 text-green-600 "> 
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    <path d="m9 12 2 2 4-4" />
                </svg>

            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Precio Promedio</p>
                    <h3 class="mt-2">$3.88</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" 
                    viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shield-check w-10 h-10 text-yellow-600"> 
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    <path d="m9 12 2 2 4-4" />
                </svg>

            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Cargas</p>
                    <h3 class="mt-2"></h3>  
                </div>
                 <svg xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" 
                    viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shield-check w-10 h-10 text-red-600"> 
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    <path d="m9 12 2 2 4-4" />
                </svg>
            </div>
        </div>
    </div>

</div>
<!-- Buscador -->
<form action="{{ route('permisos.index') }}" method="GET">  
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por nombre de permiso, fecha..."
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                />
            </label>

            <!-- BOTÓN -->
            <button class="btn btn-primary">
             <x-heroicon-o-magnifying-glass class="w-4 h-4" /> 
                Buscar
            </button>
              @if(request('search'))
                <a href="{{ route('permisos.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
              @endif 
        </div>
    </div>
</form>
<!-- Tabla -->
<div class="card bg-base-100 shadow">
    <div class="card-body p-4">
        <!-- HEADER COMPLETO -->
        <div class="flex flex-col gap-3">
            <!-- TÍTULO + BUSCADOR -->
            <div class="flex items-center justify-between">
                <h4 class="text-lg font-semibold">Historial de Permisos</h4>
                <!-- BUSCADOR -->
                <div class="relative">
                      <!-- BOTÓN IMPRIMIR -->
                        <div class="flex justify-start">
                            <button onclick="window.print()" class="btn btn-outline btn-sm">
                                <x-heroicon-o-printer class="w-4 h-4 mr-2"/>
                                Imprimir Historial 
                            </button>
                        </div>
                </div>
            </div>
        </div>
        <!-- TABLA -->
        <div class="overflow-x-auto mt-4">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Nombre</th> 
                         <th class="text-center">Fecha</th>  
                        <th class="text-center">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nr = $permisos->currentPage() * $permisos->perPage() - $permisos->perPage() + 1;
                    @endphp
                    @foreach ($permisos as $permiso)
                        <tr> 
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ $permiso->name }}</td> 
                            <td class="text-center">{{ $permiso->created_at }}</td>   
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    <button
                                        onclick="abrir_modal( 
                                            'crearPermisoModal', 
                                            'Ver Permiso',
                                            'show',
                                            ['name'],
                                            {{ json_encode($permiso) }} 
                                        )"
                                        class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </button>

                                    <button
                                            onclick="abrir_modal(
                                                'crearPermisoModal',
                                                'Editar Permiso',
                                                '2',
                                                ['name'],
                                                {{ json_encode($permiso) }}
                                            )" 
                                            class="btn btn-warning btn-sm">
                                            <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </button>
                                    <button class="btn btn-error btn-sm"
                                            onclick="confirmarEliminacion({{ $permiso->id }})">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- PAGINACIÓN -->
        @if ($permisos->hasPages())
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4"> 
                <div class="text-sm text-gray-500">
                    Mostrando {{ $permisos->firstItem() }} - {{ $permisos->lastItem() }} 
                    de {{ $permisos->total() }} registros
                </div>
                <div class="join">
                    @if ($permisos->onFirstPage())
                        <button class="join-item btn btn-square btn-disabled">«</button>
                    @else
                        <a href="{{ $permisos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                    @endif

                    @foreach ($permisos->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $permisos->currentPage())
                            <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($permisos->hasMorePages())
                        <a href="{{ $permisos->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                    @else
                        <button class="join-item btn btn-square btn-disabled">»</button>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Modal para eliminar -->
    <dialog id="modal_eliminar_permiso" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <x-heroicon-o-trash class="w-5 h-5" />
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este permiso?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarPermiso" method="POST">
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
<dialog id="crearPermisoModal" class="modal">
        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título dinámico -->
            <h3 id="crearPermisoModal_titulo" class="font-bold text-xl flex items-center gap-3 mb-4">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
                </svg>
                <!-- El título será cambiado por JS -->
                Crear Nuevo permiso 
            </h3>

            <form action="{{ url('/admin/permisos/store') }}" method="POST" class="space-y-5" id="form">
                @csrf

                <!-- Campo ocultos para acción y ID -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0"> 

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre del permiso (*)</span>
                    </label>

                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Coloque el nombre del permiso"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                        text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition @error('nombre') input-error @enderror"
                        required> 

                    @error('name')
                        <small class="text-red-500 error-message">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Botones -->
                <div class="modal-action">

                    <!-- Guardar -->
                    <button id="btnGuardarPermiso" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Permiso
                    </button>

                    <!-- Cancelar -->
                    <button type="button" onclick="crearPermisoModal.close()"
                        class="btn btn-neutral">
                        Cancelar
                    </button>
                </div>

            </form>

        </div>

        <!-- Fondo oscuro -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('crearPermisoModal').showModal();
            });
        </script>
    @endif
@endsection
@section('js')
    <script>
        function abrir_modal(modal, title, accion, campos, dato) {

            const dlg = document.getElementById(modal);
            dlg.showModal();

            // TÍTULO
            document.getElementById(`${modal}_titulo`).textContent = title;

            // ACCIÓN
            document.getElementById("accion").value = accion;

            // CAMPOS
            if (campos.length >= 1) {
                campos.forEach((campo) => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).value = dato[campo] ?? "";
                    }
                });
                document.getElementById("id").value = dato['id'] ?? 0;

            } else {
                document.getElementById("form").reset();
                document.getElementById("id").value = 0;
            }

            const guardarBtn = document.getElementById("btnGuardarPermiso");

            // --- SHOW MODE ---
            if (accion === "show") {

                // Ocultar botón Guardar
                guardarBtn.style.display = "none";

                // Bloquear inputs
                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).setAttribute("readonly", true);
                    }
                });

            } else {
                // --- MODO EDITAR / CREAR ---
                guardarBtn.style.display = "inline-flex";

                // Desbloquear inputs
                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).removeAttribute("readonly");
                    }
                });
            }
        }
        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('crearPermisoModal');

            modal.addEventListener('close', () => {

                // Quitar mensajes de error
                document.querySelectorAll('.error-message').forEach(el => el.remove());

                // Quitar clases de error de inputs
                document.querySelectorAll('.input-error').forEach(el => {
                    el.classList.remove('input-error');
                });

            });

        });

        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarPermiso');
            form.action = routeEliminarPermiso(id);
            document.getElementById('modal_eliminar_permiso').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarPermiso(id) {
            return "{{ url('/admin/permisos') }}/" + id;
        }
    </script>