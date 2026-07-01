<?php $__env->startSection('title', 'Auditoría'); ?> 

<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Auditoría del Sistema</h1>
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
                <span class="inline-flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clipboard-document-list'); ?>
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
                    Auditoría
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <h2 class="card-title text-lg mb-4">Filtros de búsqueda</h2>
            
            <form method="GET" action="<?php echo e(route('auditoria.index')); ?>" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Usuario</span>
                    </label>
                    <select name="usuario" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todos los usuarios</option>
                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($usuario->id); ?>" <?php echo e(request('usuario') == $usuario->id ? 'selected' : ''); ?>>
                                <?php echo e($usuario->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Módulo</span>
                    </label>
                    <select name="modulo" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todos los módulos</option>
                        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($modulo['value']); ?>" <?php echo e(request('modulo') == $modulo['value'] ? 'selected' : ''); ?>>
                                <?php echo e($modulo['label']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Acción</span>
                    </label>
                    <select name="accion" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                    focus:border-primary transition">
                        <option value="">Todas las acciones</option>
                        <option value="created" <?php echo e(request('accion') == 'created' ? 'selected' : ''); ?>>Creado</option>
                        <option value="updated" <?php echo e(request('accion') == 'updated' ? 'selected' : ''); ?>>Actualizado</option>
                        <option value="deleted" <?php echo e(request('accion') == 'deleted' ? 'selected' : ''); ?>>Eliminado</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fecha desde</span>
                    </label>
                    <input type="date" name="fecha_desde" value="<?php echo e(request('fecha_desde')); ?>" 
                           class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fecha hasta</span>
                    </label>
                    <input type="date" name="fecha_hasta" value="<?php echo e(request('fecha_hasta')); ?>" 
                           class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Búsqueda general</span>
                    </label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                           placeholder="Buscar..." class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition">
                </div>

                <div class="col-span-1 md:col-span-3 flex gap-2 justify-end">
                    <a href="<?php echo e(route('auditoria.index')); ?>" class="btn">
                        Limpiar filtros
                    </a>
                    <button type="submit" class="btn btn-primary">
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
                </div>
            </form>
        </div>
    </div>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
             <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de Auditoría</h4> 
                </div>
            </div> 
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Usuario</th>
                            <th>Acción</th>
                            <th>Módulo</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-sm">
                                    <?php echo e($actividad->created_at->format('d/m/Y H:i:s')); ?>

                                </td>
                                <td>
                                    <?php if($actividad->causer): ?>
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm"><?php echo e($actividad->causer->name); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-sm">Sistema</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $badgeClass = match($actividad->description) {
                                            'Permisos actualizados' => 'badge-warning',
                                            default => match($actividad->event) {
                                                'created' => 'badge-success',
                                                'updated' => 'badge-info',
                                                'deleted' => 'badge-error',
                                                default => 'badge-ghost'
                                            }
                                        };
                                        $eventText = match($actividad->description) {
                                            'Permisos actualizados' => 'Permisos Actualizados',
                                            default => match($actividad->event) {
                                                'created' => 'Creado',
                                                'updated' => 'Actualizado',
                                                'deleted' => 'Eliminado',
                                                default => ucfirst($actividad->event)
                                            }
                                        };
                                    ?>
                                    <span class="badge <?php echo e($badgeClass); ?> badge-sm"><?php echo e($eventText); ?></span>
                                </td>
                                <td class="text-sm">
                                    <span class="badge badge-outline"><?php echo e(class_basename($actividad->subject_type)); ?></span>
                                </td>
                                <td class="text-sm max-w-xs truncate">
                                    <?php echo e($actividad->description ?? 'Sin descripción'); ?>

                                </td>
                                <td>
                                    <a href="<?php echo e(route('auditoria.show', Crypt::encryptString($actividad->id))); ?>" 
                                       class="btn btn-ghost btn-xs">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-eye'); ?>
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
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center gap-2">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-inbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 text-gray-400']); ?>
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
                                        <p class="text-gray-500">No se encontraron registros de auditoría</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if($actividades->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($actividades->firstItem()); ?> - <?php echo e($actividades->lastItem()); ?> de <?php echo e($actividades->total()); ?> registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($actividades->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($actividades->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$actividades->onFirstPage()): ?>
                            <a href="<?php echo e($actividades->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($actividades->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
                            $currentPage = $actividades->currentPage();
                            $totalPages = $actividades->lastPage();
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
                                <a href="<?php echo e($actividades->url($i)); ?>" class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($actividades->currentPage() < $totalPages - 3): ?>
                            <?php if($actividades->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($actividades->url($totalPages)); ?>" class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($actividades->hasMorePages()): ?>
                            <a href="<?php echo e($actividades->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
                        <?php else: ?>
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistema-municipal\resources\views\admin\auditoria\index.blade.php ENDPATH**/ ?>