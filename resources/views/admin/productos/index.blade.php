@extends('layouts.admin')
@section('title', 'Productos') 
@section('content')
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Productos</h1>
    <div class="flex gap-2">
      @can('productos-store') 
        <button onclick="abrirModalOcr()" class="btn bg-green-500"> 
          <x-heroicon-o-camera class="w-5 h-5"/>Cargar desde Factura
        </button>
        <button onclick="abrir_modal('crearProductoModal', 'Crear Nuevo Producto', 1, [], [])" class="btn btn-primary"> 
          <x-heroicon-o-plus class="w-5 h-5"/>Nuevo Producto
        </button>
      @endcan  
    </div>
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

<!-- Modal para OCR de Facturas -->
<dialog id="ocrFacturaModal" class="modal">
  <div class="modal-box max-w-4xl rounded-xl">
    
    <!-- Título -->
    <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
      <x-heroicon-o-camera class="w-6 h-6 text-primary"/> 
      <span>Cargar Productos desde Factura</span> 
    </h3>

    <!-- Zona de carga de imagen -->
    <div id="zonaDropOcr" class="border-2 border-dashed border-base-300 rounded-lg p-8 text-center cursor-pointer hover:border-primary transition mb-4">
      <input type="file" id="inputImagenOcr" accept="image/*,.pdf" class="hidden">
      <div id="previewContainer" class="hidden">
        <img id="previewImagen" class="max-h-64 mx-auto rounded-lg shadow mb-4" alt="Preview">
        <button type="button" onclick="limpiarArchivo()" class="btn btn-sm btn-error">
          <x-heroicon-o-trash class="w-4 h-4"/> Quitar archivo
        </button>
      </div>
      <div id="uploadPlaceholder">
        <x-heroicon-o-cloud-arrow-up class="w-16 h-16 mx-auto text-base-300 mb-2"/>
        <p class="text-base-content/70">Arrastrá una imagen o PDF aquí o hacé clic para seleccionar</p>
        <p class="text-sm text-base-content/50 mt-1">Formatos: JPG, PNG, GIF, BMP, WEBP, PDF (máx. 5MB)</p>
      </div>
    </div>

    <!-- Botón procesar -->
    <div class="flex justify-center mb-4">
      <button type="button" id="btnProcesarOcr" onclick="procesarImagenOcr()" class="btn btn-primary" disabled>
        <span id="btnOcrTexto">
          <x-heroicon-o-cpu-chip class="w-5 h-5"/> Procesar con OCR
        </span>
        <span id="btnOcrLoading" class="hidden">
          <span class="loading loading-spinner loading-sm"></span> Procesando...
        </span>
      </button>
    </div>

    <!-- Resultados OCR -->
    <div id="resultadosOcr" class="hidden">
      <div class="divider">Productos Detectados</div>
      
      <!-- Tabla de productos detectados -->
      <div class="overflow-x-auto max-h-80">
        <table class="table table-sm w-full">
          <thead>
            <tr>
              <th class="w-10">
                <input type="checkbox" id="checkTodos" class="checkbox checkbox-sm" checked onchange="toggleTodos()">
              </th>
              <th>Categoría</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th class="w-28">Unidad</th>
            </tr>
          </thead>
          <tbody id="tablaProductosOcr">
            <!-- Se llena dinámicamente -->
          </tbody>
        </table>
      </div>

      <!-- Texto raw (colapsable) -->
      <div class="collapse collapse-arrow bg-base-200 mt-4">
        <input type="checkbox" />
        <div class="collapse-title text-sm font-medium">
          Ver texto extraído (raw)
        </div>
        <div class="collapse-content">
          <pre id="textoRawOcr" class="text-xs whitespace-pre-wrap bg-base-300 p-3 rounded max-h-40 overflow-auto"></pre>
        </div>
      </div>
    </div>

    <!-- Botones -->
    <div class="modal-action">
      <button type="button" onclick="cerrarModalOcr()" class="btn btn-neutral">
        Cerrar
      </button>
      <button type="button" id="btnGuardarOcr" onclick="guardarProductosOcr()" class="btn btn-success hidden">
        <x-heroicon-o-check class="w-5 h-5"/> Guardar Productos Seleccionados
      </button>
    </div>

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

// ==================== OCR FUNCIONES ====================
let archivoImagenOcr = null;
let productosDetectados = [];

function abrirModalOcr() {
    document.getElementById('ocrFacturaModal').showModal();
    limpiarImagen();
    document.getElementById('resultadosOcr').classList.add('hidden');
    document.getElementById('btnGuardarOcr').classList.add('hidden');
}

function cerrarModalOcr() {
    document.getElementById('ocrFacturaModal').close();
    limpiarImagen();
}

// Zona de drop
const zonaDropOcr = document.getElementById('zonaDropOcr');
const inputImagenOcr = document.getElementById('inputImagenOcr');

zonaDropOcr.addEventListener('click', () => inputImagenOcr.click());

zonaDropOcr.addEventListener('dragover', (e) => {
    e.preventDefault();
    zonaDropOcr.classList.add('border-primary', 'bg-primary/10');
});

zonaDropOcr.addEventListener('dragleave', () => {
    zonaDropOcr.classList.remove('border-primary', 'bg-primary/10');
});

zonaDropOcr.addEventListener('drop', (e) => {
    e.preventDefault();
    zonaDropOcr.classList.remove('border-primary', 'bg-primary/10');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        manejarArchivo(files[0]);
    }
});

inputImagenOcr.addEventListener('change', (e) => {
    if (e.target.files.length > 0) {
        manejarArchivo(e.target.files[0]);
    }
});

function manejarArchivo(file) {
    // Validar tipo (imágenes y PDF)
    const tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'application/pdf'];
    if (!tiposPermitidos.includes(file.type)) {
        Swal.fire({
            icon: 'warning',
            title: 'Formato no permitido',
            text: 'Use: JPG, PNG, GIF, BMP, WEBP o PDF',
            confirmButtonColor: '#3085d6'
        });
        return;
    }
    
    // Validar tamaño (5MB)
    if (file.size > 5 * 1024 * 1024) {
        Swal.fire({
            icon: 'warning',
            title: 'Archivo muy grande',
            text: 'El archivo no puede superar los 5MB',
            confirmButtonColor: '#3085d6'
        });
        return;
    }
    
    archivoImagenOcr = file;
    const esPdf = file.type === 'application/pdf';
    
    // Mostrar preview
    const previewContainer = document.getElementById('previewContainer');
    const previewImagen = document.getElementById('previewImagen');
    
    if (esPdf) {
        // Para PDF mostrar icono en lugar de imagen
        previewImagen.src = 'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ef4444" width="128" height="128"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zM8.5 13h1v4h-1v-4zm2.5 0h1.5c.83 0 1.5.67 1.5 1.5v1c0 .83-.67 1.5-1.5 1.5H11v-4zm1 3h.5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H12v2zm3-3h2v1h-1v.5h1v1h-1v1.5h-1v-4z"/></svg>';
        previewImagen.alt = file.name;
        previewContainer.innerHTML = `
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-error mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <p class="font-medium mb-2">${file.name}</p>
                <button type="button" onclick="limpiarArchivo()" class="btn btn-sm btn-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    Quitar archivo
                </button>
            </div>
        `;
        previewContainer.classList.remove('hidden');
        document.getElementById('uploadPlaceholder').classList.add('hidden');
        document.getElementById('btnProcesarOcr').disabled = false;
    } else {
        // Para imágenes mostrar preview normal
        const reader = new FileReader();
        reader.onload = (e) => {
            previewContainer.innerHTML = `
                <img id="previewImagen" class="max-h-64 mx-auto rounded-lg shadow mb-4" src="${e.target.result}" alt="Preview">
                <button type="button" onclick="limpiarArchivo()" class="btn btn-sm btn-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    Quitar archivo
                </button>
            `;
            previewContainer.classList.remove('hidden');
            document.getElementById('uploadPlaceholder').classList.add('hidden');
            document.getElementById('btnProcesarOcr').disabled = false;
        };
        reader.readAsDataURL(file);
    }
}

function limpiarArchivo() {
    archivoImagenOcr = null;
    inputImagenOcr.value = '';
    // Restaurar preview container original
    document.getElementById('previewContainer').innerHTML = `
        <img id="previewImagen" class="max-h-64 mx-auto rounded-lg shadow mb-4" alt="Preview">
        <button type="button" onclick="limpiarArchivo()" class="btn btn-sm btn-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            Quitar archivo
        </button>
    `;
    document.getElementById('previewContainer').classList.add('hidden');
    document.getElementById('uploadPlaceholder').classList.remove('hidden');
    document.getElementById('btnProcesarOcr').disabled = true;
    document.getElementById('resultadosOcr').classList.add('hidden');
    document.getElementById('btnGuardarOcr').classList.add('hidden');
    productosDetectados = [];
}

async function procesarImagenOcr() {
    if (!archivoImagenOcr) return;
    
    const btnTexto = document.getElementById('btnOcrTexto');
    const btnLoading = document.getElementById('btnOcrLoading');
    const btnProcesar = document.getElementById('btnProcesarOcr');
    
    // Mostrar loading
    btnTexto.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    btnProcesar.disabled = true;
    
    try {
        const formData = new FormData();
        formData.append('archivo', archivoImagenOcr);
        formData.append('_token', '{{ csrf_token() }}');
        
        const response = await fetch('{{ route("ocr.procesar-factura") }}', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            productosDetectados = data.productos;
            mostrarResultadosOcr(data.productos, data.texto_raw);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error de OCR',
                text: data.mensaje || 'No se pudo procesar la imagen',
                confirmButtonColor: '#3085d6'
            });
        }
    } catch (error) {
        console.error('Error OCR:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al procesar la imagen. Intente nuevamente.',
            confirmButtonColor: '#3085d6'
        });
    } finally {
        btnTexto.classList.remove('hidden');
        btnLoading.classList.add('hidden');
        btnProcesar.disabled = false;
    }
}

function mostrarResultadosOcr(productos, textoRaw) {
    const tabla = document.getElementById('tablaProductosOcr');
    const resultados = document.getElementById('resultadosOcr');
    const btnGuardar = document.getElementById('btnGuardarOcr');
    
    // Mostrar texto raw
    document.getElementById('textoRawOcr').textContent = textoRaw;
    
    if (productos.length === 0) {
        tabla.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-warning py-4">
                    No se detectaron productos. Puede ver el texto extraído abajo y agregar productos manualmente.
                </td>
            </tr>
        `;
        resultados.classList.remove('hidden');
        return;
    }
    
    // Categorías disponibles como array
    const categorias = [
        @foreach ($categorias as $categoria)
        { id: {{ $categoria->id }}, nombre: "{{ addslashes($categoria->nombre) }}" },
        @endforeach
    ];
    
    // Función para normalizar texto (quitar acentos y convertir a mayúsculas)
    function normalizarTexto(texto) {
        return (texto || '').normalize('NFD').replace(/[\u0300-\u036f]/g, '').toUpperCase().trim();
    }
    
    // Función para generar opciones del select con categoría pre-seleccionada
    function generarOpcionesCategorias(categoriaSugerida) {
        let options = '<option value="">Seleccionar</option>';
        const sugerida = normalizarTexto(categoriaSugerida);
        
        categorias.forEach(cat => {
            const catNombre = normalizarTexto(cat.nombre);
            // Comparar si alguno contiene al otro (parcial)
            const coincide = sugerida && sugerida.length > 2 && (
                catNombre.includes(sugerida) || 
                sugerida.includes(catNombre) ||
                catNombre.startsWith(sugerida.substring(0, 4)) ||
                sugerida.startsWith(catNombre.substring(0, 4))
            );
            const selected = coincide ? 'selected' : '';
            options += `<option value="${cat.id}" ${selected}>${cat.nombre}</option>`;
        });
        
        return options;
    }
    
    // Llenar tabla con campos: categoría, nombre, descripción, unidad
    tabla.innerHTML = productos.map((p, i) => `
        <tr>
            <td>
                <input type="checkbox" class="checkbox checkbox-sm checkProductoOcr" data-index="${i}" checked>
            </td>
            <td>
                <select class="select select-sm select-bordered w-full" id="categoriaOcr_${i}">
                    ${generarOpcionesCategorias(p.categoria_sugerida)}
                </select>
            </td>
            <td>
                <input type="text" class="input input-sm input-bordered w-full" 
                       id="nombreOcr_${i}" value="${escapeHtml(p.nombre || '')}">
            </td>
            <td>
                <input type="text" class="input input-sm input-bordered w-full" 
                       id="descripcionOcr_${i}" value="${escapeHtml(p.descripcion || '')}">
            </td>
            <td>
                <input type="text" class="input input-sm input-bordered w-full" 
                       id="unidadOcr_${i}" value="${escapeHtml(p.unidad || 'Unidad')}">
            </td>
        </tr>
    `).join('');
    
    resultados.classList.remove('hidden');
    btnGuardar.classList.remove('hidden');
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function toggleTodos() {
    const checkTodos = document.getElementById('checkTodos').checked;
    document.querySelectorAll('.checkProductoOcr').forEach(cb => cb.checked = checkTodos);
}

async function guardarProductosOcr() {
    // Obtener productos seleccionados con sus datos
    const productosAGuardar = [];
    let sinCategoria = false;
    
    document.querySelectorAll('.checkProductoOcr:checked').forEach(cb => {
        const i = cb.dataset.index;
        const categoriaId = document.getElementById(`categoriaOcr_${i}`).value;
        
        if (!categoriaId) {
            sinCategoria = true;
        }
        
        productosAGuardar.push({
            categoria_id: categoriaId,
            nombre: document.getElementById(`nombreOcr_${i}`).value,
            descripcion: document.getElementById(`descripcionOcr_${i}`).value,
            unidad: document.getElementById(`unidadOcr_${i}`).value || 'Unidad'
        });
    });
    
    if (productosAGuardar.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Sin selección',
            text: 'Debe seleccionar al menos un producto',
            confirmButtonColor: '#3085d6'
        });
        return;
    }
    
    if (sinCategoria) {
        Swal.fire({
            icon: 'warning',
            title: 'Categoría requerida',
            text: 'Todos los productos seleccionados deben tener una categoría asignada',
            confirmButtonColor: '#3085d6'
        });
        return;
    }
    
    // Guardar cada producto
    let guardados = 0;
    let errores = 0;
    
    for (const prod of productosAGuardar) {
        try {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('accion', '1');
            formData.append('categoria_id', prod.categoria_id);
            formData.append('nombre', prod.nombre);
            formData.append('descripcion', prod.descripcion || 'Cargado desde OCR');
            formData.append('unidad', prod.unidad);
            
            const response = await fetch('{{ route("productos.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            });
            
            const data = await response.json();
            if (data.success) {
                guardados++;
            } else {
                errores++;
            }
        } catch (e) {
            errores++;
        }
    }
    
    if (guardados > 0) {
        // Cerrar modal primero
        document.getElementById('ocrFacturaModal').close();
        
        // Mostrar SweetAlert y luego recargar
        Swal.fire({
            icon: 'success',
            title: '¡Productos guardados!',
            text: `Se guardaron ${guardados} producto(s) exitosamente.${errores > 0 ? ` ${errores} fallaron.` : ''}`,
            confirmButtonColor: '#3085d6'
        }).then(() => {
            location.reload();
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar ningún producto.',
            confirmButtonColor: '#3085d6'
        });
    }
}
</script>

@endsection
