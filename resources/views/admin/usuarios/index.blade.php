@extends('layouts.admin')

@section('content') 

<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Usuarios</h1>
    <button onclick="crearUsuarioModal.showModal()" class="btn btn-primary">
      <x-heroicon-o-plus class="w-5 h-5"/>Nuevo Usuario
    </button>

 </div>
 
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="{{ route('admin.index') }}">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('usuarios.index') }}"> 
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        Usuarios
      </a>
    </li>
  </ul>
</div> 

<!-- Buscador -->
<div class="card bg-base-100 shadow p-6 mb-6">
    <div class="flex items-center gap-3">

        <!-- INPUT -->
        <label class="input input-bordered flex items-center gap-2 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m21 21-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            <input 
                type="text" 
                placeholder="Buscar por nombre, Rol, email..."
                class="w-full"
            />
        </label>

        <!-- BOTÓN -->
        <button class="btn btn-primary">
            Buscar
        </button>
    </div>
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
                        <th class="text-center">Correo electronico</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Ultimo acceso</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="text-center">{{ $contador++ }}</td>
                        <td class="text-center">{{ $usuario->name }}</td>
                        <td class="text-center">{{ $usuario->email }}</td>
                        <td class="text-center">
                          <span class="badge badge-info mr-1">{{ $usuario->roles->pluck('name')->join(', ')  }}</span>
                        </td>
                          <td class="text-center">{{ $usuario->last_login_at?->format('d/m/Y H:i') ?? 'Nunca' }}</td>
                        <td class="text-center">
                            <span class="badge {{ $usuario->estado ? 'badge-success' : 'badge-error' }}">
                              {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                          </span>
                        </td class="text-center">
                        <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Ver --}}
                                    <a href="{{ url('/admin/usuarios/'.$usuario->id) }}" 
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>
                                    {{-- Editar --}}
                                    <a class="btn btn-warning btn-sm" href="{{ url('/admin/usuarios/'.$usuario->id.'/edit') }}">
                                      <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </a>
                                    {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($usuario->trashed())
                                        {{-- Restaurar --}}
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/usuarios/'. $usuario->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $usuario->id }})">
                                          <x-heroicon-s-trash class="w-4 h-4"/>
                                      </button>
                                    @endif
                                </div>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<dialog id="crearUsuarioModal" class="modal">

  <div class="modal-box max-w-xl">

    <h3 class="font-bold text-lg flex items-center gap-2">
      <i class="fas fa-file-alt"></i> Crear Nuevo Usuario
    </h3>

    <form action="{{ url('/admin/usuarios/store') }}" method="POST" class="mt-4">
      @csrf

      <!-- Primera fila -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="form-control">
          <label class="label"><span class="label-text">Nombre de Usuario</span></label>
          <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="input input-bordered w-full"
            placeholder="Ej: Pablo Perez"
            required
          >
          @error('name')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Rol</span></label>
          <select name="role" class="select select-bordered w-full">
            @foreach ($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Correo -->
      <div class="form-control mt-4">
        <label class="label"><span class="label-text">Correo</span></label>
        <input
          type="email"
          name="email"
          value="{{ old('email') }}"
          class="input input-bordered w-full"
          placeholder="Ej: pabloperez@gmail.com"
          required
        >
        @error('email')
          <small class="text-red-500">{{ $message }}</small>
        @enderror
      </div>

      <!-- Contraseñas -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

        <div class="form-control">
          <label class="label"><span class="label-text">Contraseña</span></label>
          <input type="password" name="password" class="input input-bordered w-full" required>
          @error('password')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text">Confirmar contraseña</span></label>
          <input type="password" name="password_confirmation" class="input input-bordered w-full" required>
          @error('password_confirmation')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
        </div>

      </div>

      <div class="modal-action">
        <button class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
        <button type="button" onclick="crearUsuarioModal.close()" class="btn btn-neutral">
          <i class="fas fa-times"></i> Cancelar
        </button>
      </div>

    </form>
  </div>

  <!-- Hace que clic afuera cierre -->
  <form method="dialog" class="modal-backdrop">
    <button></button>
  </form>
</dialog>
<!-- Modal para eliminar -->
<dialog id="modal_eliminar_usuario" class="modal">
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-heroicon-o-trash class="w-5 h-5" />
        Confirmar eliminación
    </h3>

    <p class="py-4">
        ¿Seguro que querés eliminar este usuario?
    </p>

    <div class="modal-action">
        <form method="dialog">
            <button class="btn">Cancelar</button>
        </form>

        <!-- Formulario eliminar -->
        <form id="formEliminarUsuario" method="POST">
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
<!-- Modal para restaurar -->
<dialog id="modal_restaurar_usuario" class="modal">
    <div class="modal-box">

        <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
            <x-heroicon-o-arrow-path class="w-5 h-5" />
            Confirmar restauración
        </h3>

        <p class="py-4">
            ¿Seguro que querés restaurar este usuario?
        </p>

        <div class="modal-action">

            <!-- Botón cancelar -->
            <form method="dialog">
                <button class="btn">Cancelar</button>
            </form>

            <!-- Formulario restaurar -->
            <form id="formRestaurarUsuario" method="POST">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-success">
                    <x-heroicon-o-arrow-path class="w-4 h-4" />
                    Restaurar
                </button>
            </form>

        </div>

    </div>
</dialog>
@endsection

@section('js')
  <script>
    function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarUsuario');
            form.action = routeEliminarUsuario(id);
            document.getElementById('modal_eliminar_usuario').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarUsuario(id) {
          return "{{ url('/admin/usuarios') }}/" + id;
      }
      function abrirModalRestaurar(url) {
        const form = document.getElementById('formRestaurarUsuario');
        form.action = url;
        modal_restaurar_usuario.showModal();
      }
  </script>
@endsection
