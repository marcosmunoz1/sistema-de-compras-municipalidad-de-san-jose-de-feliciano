<?php $__env->startSection('title', 'Categorías'); ?>  

<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Categorias</h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias-store')): ?> 
        <button
            onclick="abrir_modal('crearCategoriaModal', 'Crear Nueva Categoría', '1', ['nombre','slug','descripcion'], {})"
            class="btn btn-primary">
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
<?php endif; ?>
            Nueva Categoría
        </button>
        <?php endif; ?>
    </div>

    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('categorias.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-tag'); ?>
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
                    Categorias
                </a>
            </li>
        </ul>
    </div>
    <!-- Buscador -->
    <form action="<?php echo e(route('categorias.index')); ?>" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="<?php echo e(request('search') ?? ''); ?>" type="text"
                        placeholder="Buscar por nombre, descripción, estado..."
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
                    <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-error"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
                    <h4 class="text-lg font-semibold">Historial de categorías</h4> 
                </div>
            </div>  

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Fecha y hora de creación</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nr = $categorias->currentPage() * $categorias->perPage() - $categorias->perPage() + 1;
                        ?>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($nr++); ?></td>
                                <td class="text-center"><?php echo e($categoria->nombre); ?></td>
                                <td class="text-center"><?php echo e($categoria->descripcion); ?></td>
                                <td class="text-center"><?php echo e($categoria->created_at->format('d/m/Y H:i')); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-sm <?php echo e($categoria->estado ? 'badge-success' : 'badge-error'); ?>">
                                        <?php echo e($categoria->estado ? 'Activo' : 'Inactivo'); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">

                                        
                                        <button
                                            onclick="abrir_modal(
                                                'crearCategoriaModal',
                                                'Ver Categoría',
                                                'show',
                                                ['nombre','slug','descripcion'],
                                                <?php echo e(json_encode($categoria)); ?>

                                            )"
                                            class="btn btn-info btn-sm">
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


                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias-edit')): ?>
                                        <button
                                            onclick="abrir_modal(
                                                'crearCategoriaModal',
                                                'Editar Categoría',
                                                '2',
                                                ['nombre','slug','descripcion'],
                                                <?php echo e(json_encode($categoria)); ?>

                                            )"
                                            class="btn btn-warning btn-sm">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-pencil'); ?>
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


                                        
                                        
                                        <?php if($categoria->trashed()): ?>
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias-restore')): ?>
                                            <button class="btn btn-sm btn-success"
                                                onclick="abrirModalRestaurar('<?php echo e(url('/admin/categorias/' . $categoria->id . '/restore')); ?>')">
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
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias-destroy')): ?>
                                            <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion(<?php echo e($categoria->id); ?>)">
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
             <?php if($categorias->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($categorias->firstItem()); ?> - <?php echo e($categorias->lastItem()); ?> de <?php echo e($categorias->total()); ?> registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($categorias->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($categorias->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$categorias->onFirstPage()): ?>
                            <a href="<?php echo e($categorias->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($categorias->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
                            $currentPage = $categorias->currentPage();
                            $totalPages = $categorias->lastPage();
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
                                <a href="<?php echo e($categorias->url($i)); ?>" class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($categorias->currentPage() < $totalPages - 3): ?>
                            <?php if($categorias->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($categorias->url($totalPages)); ?>" class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($categorias->hasMorePages()): ?>
                            <a href="<?php echo e($categorias->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
                        <?php else: ?>
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_categoria" class="modal">
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
                ¿Seguro que querés eliminar esta categoria?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarCategoria" method="POST">
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
    <dialog id="modal_restaurar_categoria" class="modal">
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
                ¿Seguro que querés restaurar esta categoria?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarCategoria" method="POST">
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
    <dialog id="crearCategoriaModal" class="modal">
        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título dinámico -->
            <h3 id="crearCategoriaModal_titulo" class="font-bold text-xl flex items-center gap-3 mb-4">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
                </svg>
                <!-- El título será cambiado por JS -->
                Crear Nueva Categoria
            </h3>

            <form action="<?php echo e(url('/admin/categorias/store')); ?>" method="POST" class="space-y-5" id="form">
                <?php echo csrf_field(); ?>

                <!-- Campo ocultos para acción y ID -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre de la Categoria (*)</span>
                    </label>

                    <input type="text" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>"
                        placeholder="Ej: Repuestos, Herramientas, Materiales..."
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        required>

                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500 error-message"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Slug -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Slug (Se completa automáticamente)</span>
                    </label>

                    <input type="text" id="slug" name="slug" value="<?php echo e(old('slug')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        required readonly>

                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500 error-message"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Descripción (*)</span>
                    </label>

                    <textarea name="descripcion" id="descripcion" rows="3"
                        placeholder="Ingrese una descripción breve de la categoría..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 
                 focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        required><?php echo e(old('descripcion')); ?></textarea>

                    <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-red-500 error-message"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Botones -->
                <div class="modal-action">

                    <!-- Guardar -->
                    <button id="btnGuardarCategoria" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Guardar Categoria
                    </button>

                    <!-- Cancelar -->
                    <button type="button" onclick="crearCategoriaModal.close()" class="btn btn-neutral">
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
    <?php if($errors->any()): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('crearCategoriaModal').showModal();
            });
        </script>
    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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

            const guardarBtn = document.getElementById("btnGuardarCategoria");
            const slugInput = document.getElementById("slug");

            // --- SHOW MODE ---
            if (accion === "show") {

                guardarBtn.style.display = "none";

                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).setAttribute("readonly", true);
                    }
                });

                if (document.querySelector("textarea[name='descripcion']")) {
                    document.querySelector("textarea[name='descripcion']")
                        .setAttribute("readonly", true);
                }

                // 🔒 Slug también readonly en modo show
                if (slugInput) slugInput.setAttribute("readonly", true);

            } else {
                // --- EDITAR / CREAR ---

                guardarBtn.style.display = "inline-flex";

                campos.forEach(campo => {
                    if (document.getElementById(campo)) {
                        document.getElementById(campo).removeAttribute("readonly");
                    }
                });

                if (document.querySelector("textarea[name='descripcion']")) {
                    document.querySelector("textarea[name='descripcion']")
                        .removeAttribute("readonly");
                }

                // 🔒 Slug también readonly en modo editar/crear
                if (slugInput) slugInput.setAttribute("readonly", true);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('crearCategoriaModal');

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
            const form = document.getElementById('formEliminarCategoria');
            form.action = routeEliminarCategoria(id);
            document.getElementById('modal_eliminar_categoria').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarCategoria(id) {
            return "<?php echo e(url('/admin/categorias')); ?>/" + id;
        }

        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarCategoria');
            form.action = url;
            modal_restaurar_categoria.showModal();
        }
        document.getElementById('nombre').addEventListener('input', function() {
            const nombre = this.value.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = nombre;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\admin\categorias\index.blade.php ENDPATH**/ ?>