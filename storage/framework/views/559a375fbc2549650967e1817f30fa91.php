<?php $__env->startSection('title', 'Productos'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-2xl font-semibold">Productos</h1>
        <div class="flex gap-2">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-store')): ?>
                <button onclick="abrirModalOcr()" class="btn btn-sm sm:btn-md bg-green-500">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-camera'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>Cargar desde Factura
                </button>
                <button onclick="abrir_modal('crearProductoModal', 'Crear Nuevo Producto', 1, [], [])" class="btn btn-primary">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>Nuevo Producto
                </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('productos.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cube'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    Productos
                </a>
            </li>
        </ul>
    </div>
    <!-- Buscador -->
    <form action="<?php echo e(route('productos.index')); ?>" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="<?php echo e($search ?? ''); ?>" type="text"
                        placeholder="Buscar por nombre, categoria, descripción..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" />
                </label>

                <!-- BOTÓN -->
                <button class="btn btn-primary">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    Buscar
                </button>
                <?php if(request('search')): ?>
                    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-error"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        Limpiar</a>
                <?php endif; ?>
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

                    <!-- Filtro por estado -->
                    <div class="dropdown dropdown-end">
                        <label tabindex="0"
                            class="btn btn-sm btn-ghost gap-2 <?php echo e(request('estado') == 'inactivo' || request('estado') == 'todos' ? 'text-primary' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            <?php if(request('estado') == 'inactivo'): ?>
                                <span class="badge badge-error badge-sm">Inactivos</span>
                            <?php elseif(request('estado') == 'todos'): ?>
                                <span class="badge badge-neutral badge-sm">Todos</span>
                            <?php endif; ?>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow-lg bg-base-100 rounded-box w-52 border border-base-300">
                            <li class="menu-title">
                                <span>Filtrar por estado</span>
                            </li>
                            <li>
                                <a href="<?php echo e(route('productos.index', array_merge(request()->except('estado', 'page'), []))); ?>"
                                    class="<?php echo e(!request('estado') || request('estado') == 'activo' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    Solo Activos
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('productos.index', array_merge(request()->except('page'), ['estado' => 'inactivo']))); ?>"
                                    class="<?php echo e(request('estado') == 'inactivo' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-error">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                    Solo Inactivos
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('productos.index', array_merge(request()->except('page'), ['estado' => 'todos']))); ?>"
                                    class="<?php echo e(request('estado') == 'todos' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                    </svg>
                                    Todos
                                </a>
                            </li>
                        </ul>
                    </div>
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
                        <?php
                            $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1;
                        ?>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($nr++); ?></td>
                                <td class="text-center"><?php echo e($producto->categoria->nombre); ?></td>
                                <td class="text-center"><?php echo e($producto->nombre); ?></td>
                                <td class="text-center"><?php echo e($producto->descripcion); ?></td>
                                <td class="text-center"><?php echo e($producto->unidad); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-sm badge-<?php echo e($producto->estado ? 'success' : 'error'); ?>">
                                        <?php echo e($producto->estado ? 'Activo' : 'Inactivo'); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-show')): ?>
                                            <button
                                                onclick="abrir_modal('crearProductoModal', 'Detalles del Producto', 3, ['categoria_id', 'nombre', 'descripcion', 'unidad'], <?php echo e($producto); ?>, true)"
                                                class="btn btn-info btn-sm" title="Ver producto">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </button>
                                        <?php endif; ?>

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-update')): ?>
                                            <button class="btn btn-warning btn-sm" title="Editar producto"
                                                onclick="abrir_modal('crearProductoModal', 'Editar Producto', 2, ['categoria_id', 'nombre', 'descripcion', 'unidad'], <?php echo e($producto); ?>)">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-pencil-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </button>
                                        <?php endif; ?>

                                        
                                        
                                        <?php if($producto->trashed()): ?>
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-restore')): ?>
                                                <button class="btn btn-sm btn-success" title="Restaurar producto"
                                                    onclick="abrirModalRestaurar('<?php echo e(url('/admin/productos/' . $producto->id . '/restore')); ?>')">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-arrow-uturn-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                            
                                        <?php else: ?>
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-destroy')): ?>
                                                <button class="btn btn-error btn-sm" title="Eliminar producto"
                                                    onclick="confirmarEliminacion(<?php echo e($producto->id); ?>)">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
            <?php if($productos->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($productos->firstItem()); ?> - <?php echo e($productos->lastItem()); ?> de
                        <?php echo e($productos->total()); ?> registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($productos->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($productos->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$productos->onFirstPage()): ?>
                            <a href="<?php echo e($productos->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($productos->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
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
                        ?>

                        <?php for($i = $start; $i <= $end; $i++): ?>
                            <?php if($i == $currentPage): ?>
                                <button class="join-item btn btn-square btn-active"><?php echo e($i); ?></button>
                            <?php else: ?>
                                <a href="<?php echo e($productos->url($i)); ?>"
                                    class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($productos->currentPage() < $totalPages - 3): ?>
                            <?php if($productos->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($productos->url($totalPages)); ?>"
                                class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($productos->hasMorePages()): ?>
                            <a href="<?php echo e($productos->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
                        <?php else: ?>
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_producto" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-error">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
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
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <button type="submit" class="btn btn-success">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
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

            <form action="<?php echo e(route('productos.store')); ?>" name="formProducto" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- Categoría -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Categoría</span>
                    </label>

                    <select id="categoria_id" name="categoria_id"
                        class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>
                        <option value="">Seleccione una categoría</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre del Producto</span>
                    </label>

                    <input id="nombre" type="text" name="nombre" value="<?php echo e(old('nombre')); ?>"
                        placeholder="Ej: Aceite Motor 5W-30"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
          text-sm focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required>

                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                    </label>

                    <textarea id="descripcion" name="descripcion" rows="3"
                        placeholder="Ingrese una descripción breve del producto..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
          focus:border-primary transition"
                        required><?php echo e(old('descripcion')); ?></textarea>

                    <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Unidad -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Unidad</span>
                    </label>

                    <select id="unidad" name="unidad"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                        required>

                        <option value="" disabled <?php echo e(old('unidad') ? '' : 'selected'); ?>>
                            Seleccioná una unidad
                        </option>

                        <option value="Unidad" <?php echo e(old('unidad') == 'Unidad' ? 'selected' : ''); ?>>Unidad</option>
                        <option value="Caja" <?php echo e(old('unidad') == 'Caja' ? 'selected' : ''); ?>>Caja</option>
                        <option value="Paquete" <?php echo e(old('unidad') == 'Paquete' ? 'selected' : ''); ?>>Paquete</option>
                        <option value="Litro" <?php echo e(old('unidad') == 'Litro' ? 'selected' : ''); ?>>Litro</option>
                        <option value="Kilogramo" <?php echo e(old('unidad') == 'Kilogramo' ? 'selected' : ''); ?>>Kilogramo</option>
                        <option value="Gramo" <?php echo e(old('unidad') == 'Gramo' ? 'selected' : ''); ?>>Gramo</option>
                        <option value="Metro" <?php echo e(old('unidad') == 'Metro' ? 'selected' : ''); ?>>Metro</option>
                        <option value="Par" <?php echo e(old('unidad') == 'Par' ? 'selected' : ''); ?>>Par</option>
                        <option value="Docena" <?php echo e(old('unidad') == 'Docena' ? 'selected' : ''); ?>>Docena</option>

                    </select>

                    <?php $__errorArgs = ['unidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>


                <!-- Botones -->
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('crearProductoModal').close()"
                        class="btn btn-neutral">
                        Cerrar
                    </button>
                    <button id="btnGuardar" type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
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
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-camera'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <span>Cargar Productos desde Factura</span>
            </h3>

            <!-- Zona de carga de imagen -->
            <div id="zonaDropOcr"
                class="border-2 border-dashed border-base-300 rounded-lg p-8 text-center cursor-pointer hover:border-primary transition mb-4">
                <input type="file" id="inputImagenOcr" accept="image/*,.pdf" class="hidden">
                <div id="previewContainer" class="hidden">
                    <img id="previewImagen" class="max-h-64 mx-auto rounded-lg shadow mb-4" alt="Preview">
                    <button type="button" onclick="limpiarArchivo()" class="btn btn-sm btn-error">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> Quitar archivo
                    </button>
                </div>
                <div id="uploadPlaceholder">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cloud-arrow-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 mx-auto text-base-300 mb-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <p class="text-base-content/70">Arrastrá una imagen o PDF aquí o hacé clic para seleccionar</p>
                    <p class="text-sm text-base-content/50 mt-1">Formatos: JPG, PNG, GIF, BMP, WEBP, PDF (máx. 5MB)</p>
                </div>
            </div>

            <!-- Botón procesar -->
            <div class="flex justify-center mb-4">
                <button type="button" id="btnProcesarOcr" onclick="procesarImagenOcr()" class="btn btn-primary"
                    disabled>
                    <span id="btnOcrTexto">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cpu-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> Procesar con OCR
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
                                    <input type="checkbox" id="checkTodos" class="checkbox checkbox-sm" checked
                                        onchange="toggleTodos()">
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
                <button type="button" id="btnGuardarOcr" onclick="guardarProductosOcr()"
                    class="btn btn-success hidden">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> Guardar Productos Seleccionados
                </button>
            </div>

        </div>

        <!-- fondo oscuro -->
        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarProducto');
            form.action = routeEliminarProducto(id);
            document.getElementById('modal_eliminar_producto').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarProducto(id) {
            return "<?php echo e(url('/admin/productos')); ?>/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarProducto');
            form.action = url;
            modal_restaurar_producto.showModal();
        }
    </script>
    <script>
        function abrir_modal(modal, title, accion, campos, dato, soloVer = false) {
            $(`#${modal}`).get(0).showModal();
            $(`#${modal}_titulo`).text(title);
            document.getElementById("accion").value = accion;

            if (campos.length >= 1) {
                campos.forEach(
                    (campo) => {
                        document.getElementById(campo).value = dato[campo];
                    }
                );
                document.getElementById("id").value = dato['id'];
            } else {
                document.formProducto.reset();
                document.getElementById("accion").value = 1;
                document.getElementById("id").value = 0;
            }

            // Si es solo ver (accion 3), deshabilitar campos y ocultar botón guardar
            if (soloVer || accion === 3) {
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
                previewImagen.src =
                    'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ef4444" width="128" height="128"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zM8.5 13h1v4h-1v-4zm2.5 0h1.5c.83 0 1.5.67 1.5 1.5v1c0 .83-.67 1.5-1.5 1.5H11v-4zm1 3h.5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H12v2zm3-3h2v1h-1v.5h1v1h-1v1.5h-1v-4z"/></svg>';
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
                formData.append('_token', '<?php echo e(csrf_token()); ?>');

                const response = await fetch('<?php echo e(route('ocr.procesar-factura')); ?>', {
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
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        id: <?php echo e($categoria->id); ?>,
                        nombre: "<?php echo e(addslashes($categoria->nombre)); ?>"
                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    formData.append('_token', '<?php echo e(csrf_token()); ?>');
                    formData.append('accion', '1');
                    formData.append('categoria_id', prod.categoria_id);
                    formData.append('nombre', prod.nombre);
                    formData.append('descripcion', prod.descripcion || 'Cargado desde OCR');
                    formData.append('unidad', prod.unidad);

                    const response = await fetch('<?php echo e(route('productos.store')); ?>', {
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\productos\index.blade.php ENDPATH**/ ?>