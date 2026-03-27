
<?php $__env->startSection('title', 'Permisos'); ?> 
<?php $__env->startSection('content'); ?>
 <!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Permisos</h1>
     <div class="flex  gap-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permisos-store')): ?>
        <button  onclick="abrir_modal('crearPermisoModal', 'Crear Nuevo Permiso', '1', ['name'], {})" 
           class="btn btn-primary tooltip tooltip-primary tooltip-bottom mb-1" data-tip="Crear un nuevo permiso">
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
<?php endif; ?> Nuevo permiso
        </button> 
        <?php endif; ?>
    </div>
 </div>
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="<?php echo e(route('admin.index')); ?>">
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
      <a href="<?php echo e(route('permisos.index')); ?>">   
        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shield-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 inline']); ?>
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
        Permisos 
      </a>
    </li>
  </ul>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 pd-6 mb-6">

    <!-- Card 1 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total de Permisos</p>
                    <h3 class="mt-2"><?php echo e($totalPermisos); ?></h3>   
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
</div>
<!-- Buscador -->
<form action="<?php echo e(route('permisos.index')); ?>" method="GET">  
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="<?php echo e(request('search') ?? ''); ?>"
                    type="text" 
                    placeholder="Buscar por nombre de permiso, fecha..."
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                />
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
                <a href="<?php echo e(route('permisos.index')); ?>" class="btn btn-error"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
<?php endif; ?> Limpiar</a>
              <?php endif; ?> 
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
                    <?php
                        $nr = $permisos->currentPage() * $permisos->perPage() - $permisos->perPage() + 1;
                    ?>
                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td class="text-center"><?php echo e($nr++); ?></td>
                            <td class="text-center"><?php echo e($permiso->name); ?></td> 
                            <td class="text-center"><?php echo e($permiso->created_at); ?></td>   
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permisos-show')): ?>
                                    <button
                                        onclick="abrir_modal( 
                                            'crearPermisoModal', 
                                            'Ver Permiso',
                                            'show',
                                            ['name'],
                                            <?php echo e(json_encode($permiso)); ?> 
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
                                    <?php endif; ?> 
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permisos-edit')): ?>
                                    <button
                                            onclick="abrir_modal(
                                                'crearPermisoModal',
                                                'Editar Permiso',
                                                '2',
                                                ['name'],
                                                <?php echo e(json_encode($permiso)); ?>

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
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permisos-destroy')): ?>
                                    <button class="btn btn-error btn-sm"
                                            onclick="confirmarEliminacion(<?php echo e($permiso->id); ?>)">
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
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- PAGINACIÓN -->
        <?php if($permisos->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($permisos->firstItem()); ?> - <?php echo e($permisos->lastItem()); ?> de <?php echo e($permisos->total()); ?> registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($permisos->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($permisos->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$permisos->onFirstPage()): ?>
                            <a href="<?php echo e($permisos->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($permisos->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
                            $currentPage = $permisos->currentPage();
                            $totalPages = $permisos->lastPage();
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
                                <a href="<?php echo e($permisos->url($i)); ?>" class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($permisos->currentPage() < $totalPages - 3): ?>
                            <?php if($permisos->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($permisos->url($totalPages)); ?>" class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($permisos->hasMorePages()): ?>
                            <a href="<?php echo e($permisos->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
                        <?php else: ?>
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>
<!-- Modal para eliminar -->
    <dialog id="modal_eliminar_permiso" class="modal">
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
                ¿Seguro que querés eliminar este permiso?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarPermiso" method="POST">
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

            <form action="<?php echo e(url('/admin/permisos/store')); ?>" method="POST" class="space-y-5" id="form">
                <?php echo csrf_field(); ?>

                <!-- Campo ocultos para acción y ID -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0"> 

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Nombre del permiso (*)</span>
                    </label>

                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>"
                        placeholder="Coloque el nombre del permiso"
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

                    <?php $__errorArgs = ['name'];
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
    <?php if($errors->any()): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('crearPermisoModal').showModal();
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
            return "<?php echo e(url('/admin/permisos')); ?>/" + id;
        }
    </script>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\admin\permisos\index.blade.php ENDPATH**/ ?>