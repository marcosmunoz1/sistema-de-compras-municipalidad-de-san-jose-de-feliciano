@extends('layouts.admin')
@section('title', 'Productos') 
@section('content')
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Productos</h1>
    @can('productos-store') 
      <button onclick="abrir_modal('crearProductoModal', 'Crear Nuevo Producto', 1, [], [])" class="btn btn-primary"> 
        <x-heroicon-o-plus class="w-5 h-5"/>Nuevo Producto
      </button>
    @endcan  
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
        <x-heroicon-o-cube class="w-4 h-4 inline" />
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
                <input name="search" value="{{ $search ?? '' }}" 
                    type="text" 
                    placeholder="Buscar por nombre, categoria, descripción..."
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
        <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de productos</h4> 
                </div>
            </div> 

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Unidad</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1; 
                    @endphp
                    @foreach ($productos as $producto)  
                        <tr>
                            <td class="text-center">{{ $nr++ }}</td>
                            <td class="text-center">{{ $producto->categoria->nombre }}</td>
                            <td class="text-center">{{ $producto->nombre }}</td> 
                            <td class="text-center">{{ $producto->descripcion }}</td>
                            <td class="text-center">{{ $producto->unidad }}</td>
                            <td class="text-center">
                                <span class="badge badge-sm badge-{{ $producto->estado ? 'success' : 'error' }}">
                                {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Ver --}}
                                    @can('productos-show')
                                    <button onclick="abrir_modal('crearProductoModal', 'Detalles del Producto', 3, ['categoria_id', 'nombre', 'descripcion', 'unidad'], {{ $producto }}, true)" class="btn btn-info btn-sm">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                    </button>
                                    @endcan

                                    {{-- Editar --}}
                                    @can('productos-update')
                                    <button class="btn btn-warning btn-sm" onclick="abrir_modal('crearProductoModal', 'Editar Producto', 2, ['categoria_id', 'nombre', 'descripcion', 'unidad'], {{ $producto }})">
                                        <x-heroicon-o-pencil-square class="w-4 h-4"/>
                                    </button> 
                                    @endcan

                                    {{-- Eliminar (después lo convertís en form POST/DELETE) --}}
                                      {{-- Si está eliminado (tiene deleted_at) --}}
                                    @if ($producto->trashed()) 
                                        {{-- Restaurar --}}
                                            @can('productos-restore')
                                            <button class="btn btn-sm btn-success"
                                              onclick="abrirModalRestaurar('{{ url('/admin/productos/'. $producto->id.'/restore') }}')">
                                                <x-heroicon-s-arrow-uturn-left class="w-4 h-4"/>
                                            </button>
                                            @endcan
                                    {{-- Si NO está eliminado --}}
                                    @else
                                        {{-- Eliminar --}}
                                       @can('productos-destroy')
                                      <button class="btn btn-error btn-sm" onclick="confirmarEliminacion({{ $producto->id }})">
                                          <x-heroicon-s-trash class="w-4 h-4"/>
                                      </button>
                                      @endcan
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

                        {{-- Botón Primera página --}}
                        @if (!$productos->onFirstPage())
                            <a href="{{ $productos->url(1) }}" class="join-item btn btn-square">1</a>
                            @if ($productos->currentPage() > 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                        @endif

                        {{-- Números de página con ventana deslizante --}}
                        @php
                            $currentPage = $productos->currentPage();
                            $totalPages = $productos->lastPage();
                            $start = max(1, $currentPage - 2);
                            $end = min($totalPages, $currentPage + 2);
                            
                            // Ajustar para mostrar siempre 5 páginas cuando sea posible
                            if ($end - $start < 4) {
                                if ($start == 1) {
                                    $end = min($totalPages, 5);
                                } elseif ($end == $totalPages) {
                                    $start = max(1, $totalPages - 4);
                                }
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <button class="join-item btn btn-square btn-active">{{ $i }}</button>
                            @else
                                <a href="{{ $productos->url($i) }}" class="join-item btn btn-square">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Botón Última página --}}
                        @if ($productos->currentPage() < $totalPages - 3)
                            @if ($productos->currentPage() < $totalPages - 4)
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            @endif
                            <a href="{{ $productos->url($totalPages) }}" class="join-item btn btn-square">{{ $totalPages }}</a>
                        @endif

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

<!-- Modal para crear/ver -->
<dialog id="crearProductoModal" class="modal">

  <div class="modal-box max-w-xl rounded-xl">

    <!-- Título -->
    <h3 id="crearProductoModal_titulo" class="font-bold text-xl flex items-center gap-3 mb-4">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-package-plus w-4 h-4">
            <path d="M16 16h6"></path>
            <path d="M19 13v6"></path>
            <path
                d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14">
            </path>
            <path d="m7.5 4.27 9 5.15"></path>
            <polyline points="3.29 7 12 12 20.71 7"></polyline>
            <line x1="12" x2="12" y1="22" y2="12"></line>
        </svg> 
      <span>Crear Nuevo Producto</span>
    </h3>

    <form action="{{ route('productos.store') }}" name="formProducto" method="POST" class="space-y-5">
      @csrf
      <input type="hidden" name="accion" id="accion" value="1">
      <input type="hidden" name="id" id="id" value="0">

      <!-- Categoría -->
      <div class="form-control">
        <label class="label">
          <span class="label-text font-medium">Categoría</span>
        </label>

        <select id="categoria_id" name="categoria_id" class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
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

        <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}"
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

        <textarea id="descripcion" name="descripcion" rows="3"
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

        <input id="unidad" type="text" name="unidad" value="{{ old('unidad') }}"
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
        <button type="button" onclick="document.getElementById('crearProductoModal').close()" class="btn btn-neutral">
          Cerrar
        </button>
        <button id="btnGuardar" type="submit" class="btn btn-primary"> 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M4.5 12.75l6 6 9-13.5" />
          </svg>
          Guardar
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
 <script>
function abrir_modal(modal, title, accion, campos, dato, soloVer = false)
{
    $(`#${modal}`).get(0).showModal();
    $(`#${modal}_titulo`).text(title);
    document.getElementById("accion").value = accion;
    
    if(campos.length >= 1)
    {
        campos.forEach(
            (campo) => {
                document.getElementById(campo).value = dato[campo];
            }
        );
        document.getElementById("id").value = dato['id'];
    }
    else
    {
        document.formProducto.reset();
        document.getElementById("accion").value = 1;
        document.getElementById("id").value = 0;
    }
    
    // Si es solo ver (accion 3), deshabilitar campos y ocultar botón guardar
    if(soloVer || accion === 3) {
        $(`#${modal} input, #${modal} select, #${modal} textarea`).not('#accion, #id').prop('disabled', true);
        $('#btnGuardar').hide();
    } else {
        $(`#${modal} input, #${modal} select, #${modal} textarea`).prop('disabled', false);
        $('#btnGuardar').show();
    }
}
</script>

@endsection
