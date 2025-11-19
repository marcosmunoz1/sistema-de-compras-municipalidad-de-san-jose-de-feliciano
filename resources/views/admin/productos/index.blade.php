@extends('layouts.admin')

@section('content')
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Productos</h1>
    <button onclick="crearProductoModal.showModal()" class="btn btn-primary"> 
      <x-heroicon-o-plus class="w-5 h-5"/>Nuevo Producto
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
      <a href="{{ route('productos.index') }}"> 
        <x-heroicon-o-truck class="w-4 h-4 inline" />
        Productos
      </a>
    </li>
  </ul>
</div>
<!-- Buscador -->
<form action="{{ route('productos.index') }}" method="GET"> 
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por nombre, Cuit, contacto..."
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
                <a href="{{ route('productos.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
              @endif 
        </div>
    </div>
</form> 

<!-- Tabla -->
<div class="card bg-base-100 shadow">
    <div class="card-body p-4">

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Unidad</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1; 
                    @endphp
                    @foreach ($productos as $producto)  
                        <tr>
                            <td>{{ $nr++ }}</td>
                            <td>{{ $producto->categoria->nombre }}</td>
                            <td>{{ $producto->nombre }}</td> 
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->unidad }}</td>
                            <td class="text-center">
                                <span class="badge {{ $producto->estado ? 'badge-success' : 'badge-error' }}">
                                {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    <a href="{{ route('productos.show', $producto->id) }}"  
                                    class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </a>

                                    {{-- Editar --}}
                                    <button onclick="abrirModalEditar('{{ url('/admin/productos/'. $producto->id.'/edit') }}')" 
                                        class="btn btn-warning btn-sm"
                                        
                                    >
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                    </button>




                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                      {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($producto->trashed())
                                        {{-- Restaurar --}}
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/productos/'. $producto->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $producto->id }})">
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
          @if ($productos->hasPages())
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando {{ $productos->firstItem() }} - {{ $productos->lastItem() }} de {{ $productos->total() }} registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        {{-- Botón Anterior --}}
                        @if ($productos->onFirstPage())
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        @else
                            <a href="{{ $productos->previousPageUrl() }}" class="join-item btn btn-square">«</a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($productos->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $productos->currentPage())
                                <button class="join-item btn btn-square btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn btn-square">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if ($productos->hasMorePages())
                            <a href="{{ $productos->nextPageUrl() }}" class="join-item btn btn-square">»</a>
                        @else
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        @endif

                    </div>
                </div>
            @endif

    </div>
</div>
<!-- Modal para eliminar -->
<dialog id="modal_eliminar_producto" class="modal">
  <div class="modal-box">

    <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
        <x-heroicon-o-trash class="w-5 h-5" />
        Confirmar eliminación
    </h3>

    <p class="py-4">
        ¿Seguro que querés eliminar este producto?
    </p>

    <div class="modal-action">
        <form method="dialog">
            <button class="btn">Cancelar</button>
        </form>

        <!-- Formulario eliminar -->
        <form id="formEliminarProducto" method="POST">
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
<dialog id="modal_restaurar_producto" class="modal">
    <div class="modal-box">

        <h3 class="font-bold text-lg flex items-center gap-2 text-green-600">
            <x-heroicon-o-arrow-path class="w-5 h-5" />
            Confirmar restauración
        </h3>

        <p class="py-4">
            ¿Seguro que querés restaurar este producto?
        </p>

        <div class="modal-action">

            <!-- Botón cancelar -->
            <form method="dialog">
                <button class="btn">Cancelar</button>
            </form>

            <!-- Formulario restaurar -->
            <form id="formRestaurarProducto" method="POST">
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
<dialog id="crearProductoModal" class="modal">

  <div class="modal-box max-w-xl rounded-xl">

    <!-- Título -->
    <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
      </svg>
      Crear Nuevo Producto
    </h3>

    <form action="{{ url('/admin/productos/store') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Categoría -->
      <div class="form-control">
        <label class="label">
          <span class="label-text font-medium">Categoría</span>
        </label>

        <select name="categoria_id" class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition" required>
            <option value="">Seleccione una categoría</option>
          @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option> 
          @endforeach
        </select>

        @error('categoria_id')
          <small class="text-red-500">{{ $message }}</small>
        @enderror
      </div>

      <!-- Nombre -->
      <div class="form-control">
        <label class="label">
          <span class="label-text font-medium">Nombre del Producto</span>
        </label>

        <input type="text" name="nombre" value="{{ old('nombre') }}"
          placeholder="Ej: Aceite Motor 5W-30"
          class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
          text-sm focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition" 
          required>

        @error('nombre')
          <small class="text-red-500">{{ $message }}</small>
        @enderror
      </div>

      <!-- Descripción -->
      <div class="form-control">
        <label class="label">
          <span class="label-text font-medium">Descripción</span>
        </label>

        <textarea name="descripcion" rows="3"
          placeholder="Ingrese una descripción breve del producto..."
          class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition" required>{{ old('descripcion') }}</textarea>

        @error('descripcion')
          <small class="text-red-500">{{ $message }}</small>
        @enderror
      </div>

      <!-- Unidad -->
      <div class="form-control">
        <label class="label">
          <span class="label-text font-medium">Unidad</span>
        </label>

        <input type="text" name="unidad" value="{{ old('unidad') }}"
          placeholder="Ej: Unidad, Caja, Litro, Par..."
          class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
          text-sm focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
          required>

        @error('unidad')
          <small class="text-red-500">{{ $message }}</small>
        @enderror
      </div>

      <!-- Botones -->
      <div class="modal-action">
        <button class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M4.5 12.75l6 6 9-13.5" />
          </svg>
          Guardar Producto
        </button>

        <button type="button" onclick="crearProductoModal.close()" class="btn btn-neutral">
          Cancelar
        </button>
      </div>

    </form>

  </div>

  <!-- fondo oscuro -->
  <form method="dialog" class="modal-backdrop">
    <button></button>
  </form>

</dialog>


@endsection 

@section('js')
  <script>
    function confirmarEliminacion(id) { 
            const form = document.getElementById('formEliminarProducto');
            form.action = routeEliminarProducto(id);
            document.getElementById('modal_eliminar_producto').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarProducto(id) {
          return "{{ url('/admin/productos') }}/" + id;
      }
      function abrirModalRestaurar(url) {
        const form = document.getElementById('formRestaurarProducto');
        form.action = url;
        modal_restaurar_producto.showModal();
      }
  </script>
@endsection
