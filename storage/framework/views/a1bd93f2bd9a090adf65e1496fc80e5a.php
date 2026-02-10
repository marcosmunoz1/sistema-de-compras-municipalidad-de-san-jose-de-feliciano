<?php $__env->startSection('title', 'Combustibles'); ?>
<?php $__env->startSection('content'); ?> 
    <!-- Titulo y boton --> 
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-xl sm:text-2xl font-semibold">Combustibles</h1>
        <div class="flex flex-wrap gap-2">
            <button onclick="modalPreciosActuales.showModal()" class="btn btn-sm sm:btn-md btn-info tooltip tooltip-info"
                data-tip="Ver precios actuales de combustibles">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-currency-dollar'); ?>
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
                Ver Precios 
            </button>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-update-prices')): ?>
                <button onclick="crearCombustible.showModal()" class="btn btn-sm sm:btn-md btn-warning tooltip tooltip-warning" 
                    data-tip="Actualizar los precios de los combustibles">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-cloud-arrow-up'); ?>
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
                    Actualizar Precios
                </button> 
            <?php endif; ?> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-create')): ?> 
                <a href="<?php echo e(route('combustibles.create')); ?>" class="btn btn-sm sm:btn-md btn-primary tooltip tooltip-primary tooltip-bottom"
                    data-tip="Crear orden de carga">
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
                    Nueva Carga
                </a>
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
                <a href="<?php echo e(route('combustibles.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-5 h-5" aria-hidden="true">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                    Combustibles
                </a>
            </li>
        </ul>
        <form method="GET" action="<?php echo e(route('combustibles.index')); ?>" class="flex gap-4 items-end mb-6 mt-3">
            <div>
                <label class="text-sm text-gray-500">Desde</label>
                <input type="date" name="desde" class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" value="<?php echo e(request('desde')); ?>">
            </div>

            <div>
                <label class="text-sm text-gray-500">Hasta</label>
                <input type="date" name="hasta" class="w-full h-10 rounded-md border border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" value="<?php echo e(request('hasta')); ?>"> 
            </div>

            <div class="flex gap-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="<?php echo e(route('combustibles.index')); ?>" class="btn btn-outline">Limpiar</a>
            </div>

        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6"> 

        <!-- Card 1 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total del Mes</p>
                        <h3 class="mt-2">$<?php echo e(number_format($totalMonto, 2)); ?></h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-10 h-10 text-blue-600">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path> 
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Litros Consumidos</p>
                        <h3 class="mt-2"><?php echo e($totalLitros); ?> L</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-10 h-10 text-green-600">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Cargas</p>
                        <h3 class="mt-2"><?php echo e($totalCargas); ?></h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-10 h-10 text-red-600">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <!-- Buscador -->
    <form action="<?php echo e(route('combustibles.index')); ?>" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="<?php echo e(request('search') ?? ''); ?>" type="text"
                        placeholder="Buscar por vehiculo, combustible, fecha..."
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
                    <a href="<?php echo e(route('combustibles.index')); ?>" class="btn btn-error"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
                <!-- TÍTULO + FILTRO -->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de Cargas</h4>
                    
                    <!-- Filtro por estado -->
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-sm btn-ghost gap-2 <?php echo e(request('estado') == 'eliminados' || request('estado') == 'todos' ? 'text-primary' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            <?php if(request('estado') == 'eliminados'): ?>
                                <span class="badge badge-error badge-sm">Eliminados</span>
                            <?php elseif(request('estado') == 'todos'): ?>
                                <span class="badge badge-neutral badge-sm">Todos</span>
                            <?php endif; ?>
                        </label>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-lg bg-base-100 rounded-box w-52 border border-base-300">
                            <li class="menu-title">
                                <span>Filtrar por estado</span>
                            </li>
                            <li>
                                <a href="<?php echo e(route('combustibles.index', array_merge(request()->except('estado', 'page'), []))); ?>" 
                                   class="<?php echo e(!request('estado') || request('estado') == 'activo' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" 
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    Solo Activos
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('combustibles.index', array_merge(request()->except('page'), ['estado' => 'eliminados']))); ?>"
                                   class="<?php echo e(request('estado') == 'eliminados' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" 
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-error">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                    Solo Eliminados
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('combustibles.index', array_merge(request()->except('page'), ['estado' => 'todos']))); ?>"
                                   class="<?php echo e(request('estado') == 'todos' ? 'active' : ''); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" 
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    </svg>
                                    Todos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- TABLA -->
        <div class="overflow-x-auto mt-4">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="text-center">Nr orden</th> 
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Vehículo</th> 
                        <th class="text-center">Conductor</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Litros</th>
                        <th class="text-center">Importe</th>
                        <th class="text-center">Estado</th> 
                        <th class="text-center">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $combustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combustible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td class="text-center"><?php echo e($combustible->codigo); ?></td> 
                            <td class="text-center"><?php echo e($combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—'); ?></td> 
                            <td class="text-center"><?php echo e($combustible->destino->marca ?? 'N/A'); ?></td> 
                            <td class="text-center"><?php echo e($combustible->empleado->nombre ?? 'N/A'); ?></td> 
                            <td class="text-center"><?php echo e($combustible->tipo); ?></td> 
                            <td class="text-center"><?php echo e($combustible->litros ?? 'N/A'); ?></td>
                            <td class="text-center">$<?php echo e(number_format($combustible->monto,2,'.',',')); ?></td>
                            <td class="text-center">
                                    <?php
                                        $badgeClass = match ($combustible->estado_carga) { 
                                            'Pendiente' => 'badge badge-outline badge-warning', 
                                            'Pendiente de factura' => 'badge badge-outline badge-error',
                                            'Finalizada' => 'badge badge-outline badge-success',
                                            'Cancelada' => 'badge badge-outline badge-error',
                                            'Aprobada' => 'badge badge-outline badge-primary',
                                            default => 'badge-ghost', 
                                        }; 
                                    ?>
                                    <span class="badge <?php echo e($badgeClass); ?> badge-sm whitespace-nowrap overflow-hidden text-ellipsis max-w-[120px]" title="<?php echo e($combustible->estado_carga); ?>">
                                        <?php echo e($combustible->estado_carga); ?>

                                    </span>
                            </td> 
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2"> 
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-show')): ?> 
                                    <a href="<?php echo e(route('combustibles.show', Crypt::encrypt($combustible->id))); ?>"  
                                       class="btn btn-info btn-sm" title="ver carga">
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
                                    </a>
                                    <?php endif; ?> 

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-edit')): ?>
                                        <?php if($combustible->estado_carga !== 'Finalizada'): ?>
                                            <a href="<?php echo e(route('combustibles.edit', Crypt::encrypt($combustible->id))); ?>"
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
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-report')): ?>
                                    <button onclick="abrirModalPDFCarga(<?php echo e($combustible->id); ?>)"  
                                       class="btn bg-primary btn-sm" title="Imprimir orden"> 
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-printer'); ?>
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

                                    <?php if($combustible->trashed()): ?>
                                    
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-restore')): ?>
                                        <button class="btn btn-success btn-sm"
                                                onclick="abrirModalRestaurar('<?php echo e(url('/admin/combustibles/'. $combustible->id.'/restore')); ?>')">
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

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-destroy')): ?> 
                                        <button class="btn btn-error btn-sm"
                                                onclick="confirmarEliminacion(<?php echo e($combustible->id); ?>)">
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
            <!-- PAGINACIÓN -->
            <?php if($combustibles->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($combustibles->firstItem()); ?> - <?php echo e($combustibles->lastItem()); ?> de
                        <?php echo e($combustibles->total()); ?> registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($combustibles->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($combustibles->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$combustibles->onFirstPage()): ?>
                            <a href="<?php echo e($combustibles->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($combustibles->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
                            $currentPage = $combustibles->currentPage();
                            $totalPages = $combustibles->lastPage();
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
                                <a href="<?php echo e($combustibles->url($i)); ?>"
                                    class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($combustibles->currentPage() < $totalPages - 3): ?>
                            <?php if($combustibles->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($combustibles->url($totalPages)); ?>"
                                class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($combustibles->hasMorePages()): ?>
                            <a href="<?php echo e($combustibles->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
                        <?php else: ?>
                            <button class="join-item btn btn-square btn-disabled">»</button>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- Sección de Gráficos - Estadísticas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 mb-6">
        
        <!-- Gráfico: Consumo Mensual -->
        <div class="card bg-base-100 shadow">
            <div class="card-body p-5">
                <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"></path>
                        <path d="m19 9-5 5-4-4-3 3"></path>
                    </svg>
                    Consumo Mensual (Últimos 6 meses)
                </h2>
                <div class="h-64">
                    <canvas id="chartConsumoMensual"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico: Distribución por Tipo de Combustible -->
        <div class="card bg-base-100 shadow">
            <div class="card-body p-5">
                <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>
                    Distribución por Tipo de Combustible
                </h2>
                <div class="h-64">
                    <canvas id="chartTipoCombustible"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Gráfico: Top Destinos -->
    <div class="card bg-base-100 shadow mb-6">
        <div class="card-body p-5">
            <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <path d="M9 17h6"></path>
                    <circle cx="17" cy="17" r="2"></circle>
                </svg>
                Top 5 Destinos con Mayor Consumo
            </h2>
            <div class="h-72">
                <canvas id="chartTopVehiculos"></canvas>
            </div>
        </div>
    </div>
    <dialog id="crearCombustible" class="modal">
        <div class="modal-box max-w-xl rounded-xl">

            <!-- Título dinámico -->
            <h3 class="font-bold text-xl flex items-center gap-3 mb-4">
                <!-- Icono -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6 21 6m-15 0L3 6m6 0L9 3m6 3 0 3m-6 9 6-9H6l6 9Z" />
                </svg>
                <!-- El título será cambiado por JS -->
                Actualizar precios de los combustibles
            </h3>

            <form action="<?php echo e(url('/admin/combustibles/update-prices')); ?>" method="POST" class="space-y-5"
                id="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>
                <!-- Nombre -->
                <div class="form-control">
                    <label class="text-sm font-medium">Nombre<span class="text-red-600">*</span></label>
                    <select id="id" name="id"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition"
                        required>>
                        <option value="">Seleccionar</option>
                        <?php $__currentLoopData = $tipos_combustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combustible_tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($combustible_tipo->id); ?>"
                                data-combustible="<?php echo e($combustible_tipo->valor); ?>"><?php echo e($combustible_tipo->nombre ?? ''); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['id'];
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
                <!-- Nombre -->
                <div id="combustible_info" class="hidden form-control">
                    <label class="text-sm font-medium">Precio actual del combustible seleccionado</label>
                    <input type="number" id="combustible_id" min="0" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary "
                        readonly>
                </div>
                <!-- Monto Máximo -->
                <div class="space-y-2">
                    <label for="precio" class="text-sm font-medium">Nuevo precio del combustible<span
                            class="text-red-600">*</span></label>
                    <input type="number" id="precio" min="0" name="precio" placeholder="0" step="0.01"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition"
                        required>
                    <?php $__errorArgs = ['precio'];
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
                    <label class="text-sm font-medium"> 
                        <span class="label-text font-medium">Descripción (Opcional) </span>
                    </label>

                    <textarea name="descripcion" id="descripcion" rows="3"
                        placeholder="Ingrese una descripción breve de la actualización del combustible..."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 
                 focus:outline-none focus:ring-2 focus:ring-primary 
                 focus:border-primary transition <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('descripcion')); ?></textarea>

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
                    <button class="btn btn-primary btn-sm">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-arrow-down-tray'); ?>
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
                        Guardar precio
                    </button>

                    <!-- Cancelar -->
                    <button type="button" onclick="crearCombustible.close()" class="btn btn-neutral btn-sm">
                        Cancelar
                    </button>
                </div>

            </form>
        </div>
    </dialog>
    <!-- Modal para ver precios actuales -->
    <dialog id="modalPreciosActuales" class="modal">
        <div class="modal-box max-w-2xl rounded-xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-xl flex items-center gap-3 mb-6">
                <div class="p-2 rounded-lg bg-info/10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-info">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                        <path d="M12 18V6"></path>
                    </svg>
                </div>
                Precios Actuales de Combustibles
            </h3>

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th class="text-left">Tipo de Combustible</th>
                            <th class="text-right">Precio por Litro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $tipos_combustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 rounded-lg bg-warning/10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-warning">
                                                <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                                                <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                                                <path d="M2 21h13"></path>
                                                <path d="M3 9h11"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold"><?php echo e($tipo->nombre); ?></p>
                                            <?php if($tipo->descripcion): ?>
                                                <p class="text-xs text-gray-500"><?php echo e($tipo->descripcion); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <span class="text-lg font-bold text-success">$<?php echo e(number_format($tipo->valor, 2, ',', '.')); ?></span>
                                    <span class="text-xs text-gray-500">/L</span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="2" class="text-center py-8 text-gray-500">
                                    No hay tipos de combustibles registrados
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 p-3 bg-base-200 rounded-lg">
                <p class="text-xs text-gray-500 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" class="text-info">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                    Los precios mostrados son los valores actuales registrados en el sistema.
                </p>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-sm btn-neutral">Cerrar</button>
                </form>
            </div>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button></button>
        </form>
    </dialog>

    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_combustible" class="modal">
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
                ¿Seguro que querés eliminar este orden de carga de combustible?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarCombustible" method="POST">
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
    <dialog id="modal_restaurar_combustible" class="modal">
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
                ¿Seguro que querés restaurar este combustible?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarCombustible" method="POST">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {

            function actualizarDatosdelcombustible() {
                var selected = $('#id option:selected');
                var id = selected.val();

                if (!id) {
                    $('#combustible_info').addClass('hidden');
                    return;
                }

                // Mostrar card
                $('#combustible_info').removeClass('hidden');

                // Cargar datos reales
                $('#combustible_id').val(selected.data('combustible'));
            }

            $('#id').change(actualizarDatosdelcombustible);

            actualizarDatosdelcombustible(); // por si ya viene seleccionado
        });
    </script>
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarCombustible');
            form.action = routeEliminarCombustible(id);
            document.getElementById('modal_eliminar_combustible').showModal();
        }
      // Genera la URL usando el helper de Laravel
      function routeEliminarCombustible(id) { 
          return "<?php echo e(url('/admin/combustibles')); ?>/" + id; 
      }
      function abrirModalRestaurar(url) {
        const form = document.getElementById('formRestaurarCombustible');
        form.action = url; 
        modal_restaurar_combustible.showModal(); 
      }
  </script>

    <!-- Modal para visualizar PDF de Orden de Carga -->
    <dialog id="modalPDFCarga" class="modal">
        <div class="modal-box w-11/12 max-w-5xl h-[90vh] p-0 flex flex-col">
            <!-- Header del Modal -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="font-bold text-lg">Vista Previa - Orden de Carga de Combustible</h3>
                <div class="flex gap-2">
                    <a id="btnDescargarPDFCarga" href="#" class="btn btn-success btn-sm" download>
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-down-tray'); ?>
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
                        Descargar
                    </a>
                    <button onclick="cerrarModalPDFCarga()" class="btn btn-sm btn-circle">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-x-mark'); ?>
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
                    </button>
                </div>
            </div>
            
            <!-- Contenedor del iframe -->
            <div class="flex-1 overflow-auto bg-base-200 relative">
                <!-- Spinner de carga personalizado -->
                <div id="loadingSpinnerCarga" class="absolute inset-0 flex items-center justify-center bg-base-100 z-10 transition-all duration-300">
                    <div class="text-center space-y-4">
                        <!-- Spinner animado -->
                        <div class="relative">
                            <span class="loading loading-spinner loading-lg text-primary"></span>
                            <div class="absolute inset-0 loading loading-ring loading-lg text-primary opacity-30"></div>
                        </div>
                        <!-- Texto con animación -->
                        <div class="space-y-2">
                            <p class="text-base font-bold text-base-content animate-pulse">
                                Generando PDF
                            </p>
                            <p class="text-sm text-base-content/70 font-medium">
                                Orden de Carga de Combustible
                            </p>
                        </div>
                        <!-- Barra de progreso decorativa -->
                        <div class="w-48 h-1 bg-base-300 rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full animate-pulse" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>
                <iframe id="iframePDFCarga" src="" class="w-full h-full border-0" style="min-height: 100%;"></iframe>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button onclick="cerrarModalPDFCarga()">close</button>
        </form>
    </dialog>

    <script>
        function abrirModalPDFCarga(combustibleId) {
            const modal = document.getElementById('modalPDFCarga');
            const iframe = document.getElementById('iframePDFCarga');
            const btnDescargar = document.getElementById('btnDescargarPDFCarga');
            const loadingSpinner = document.getElementById('loadingSpinnerCarga');
            
            // Mostrar spinner
            loadingSpinner.style.display = 'flex';
            
            // Construir las URLs usando route de Laravel
            const previewUrl = "<?php echo e(url('admin/combustibles')); ?>/" + combustibleId + "/preview";
            const downloadUrl = "<?php echo e(url('admin/combustibles')); ?>/" + combustibleId + "/download";
            
            // Asignar URLs
            iframe.src = previewUrl;
            btnDescargar.href = downloadUrl;
            
            // Ocultar spinner cuando el iframe termine de cargar
            iframe.onload = function() {
                loadingSpinner.style.display = 'none';
            };
            
            // Abrir modal
            modal.showModal();
        }

        function cerrarModalPDFCarga() {
            const modal = document.getElementById('modalPDFCarga');
            const iframe = document.getElementById('iframePDFCarga');
            const loadingSpinner = document.getElementById('loadingSpinnerCarga');
            
            // Limpiar iframe al cerrar
            iframe.src = '';
            
            // Resetear spinner para próxima apertura
            loadingSpinner.style.display = 'flex';
            
            // Cerrar modal
            modal.close();
        }
    </script>

    <!-- Estilos para forzar colores en gráficos -->
    <style>
        [data-theme="light"] canvas {
            color: #000000 !important;
        }
        [data-theme="dark"] canvas,
        [data-theme="synthwave"] canvas {
            color: #ffffff !important;
        }
    </style>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Detectar tema desde localStorage (donde app.js lo guarda)
            const savedTheme = localStorage.getItem('theme');
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const isDark = savedTheme === 'dark' || currentTheme === 'dark' || currentTheme === 'synthwave';
            
            // Colores según el tema
            const gridColor = isDark ? '#374151' : '#e5e7eb';
            const textColor = isDark ? '#f9fafb' : '#111827';
            const labelColor = isDark ? '#f9fafb' : '#111827';
            const tooltipBg = isDark ? '#1f2937' : '#ffffff';
            const tooltipBorder = isDark ? '#4b5563' : '#d1d5db';
            
            const colors = {
                primary: isDark ? '#60a5fa' : '#2563eb',
                secondary: isDark ? '#a78bfa' : '#7c3aed',
                accent: isDark ? '#34d399' : '#059669',
                success: isDark ? '#4ade80' : '#16a34a',
                warning: isDark ? '#fbbf24' : '#d97706',
                error: isDark ? '#f87171' : '#dc2626',
                info: isDark ? '#38bdf8' : '#0284c7',
            };

            // Listener para recargar cuando cambie el tema
            const themeToggle = document.getElementById('themeToggle');
            if (themeToggle) {
                themeToggle.addEventListener('change', function() {
                    setTimeout(() => location.reload(), 100);
                });
            }

            // Configuración global - USAR LABELCOLOR PARA TODOS LOS TEXTOS
            Chart.defaults.font.family = 'system-ui, -apple-system, sans-serif';
            Chart.defaults.font.size = 11;
            Chart.defaults.color = labelColor;
            Chart.defaults.borderColor = gridColor;

            // 📊 GRÁFICO 1: Consumo Mensual (Línea con doble eje)
            const dataConsumo = <?php echo json_encode($consumoPorMes, 15, 512) ?>;
            const meses = dataConsumo.map(item => {
                const [year, month] = item.mes.split('-');
                const fecha = new Date(year, month - 1);
                return fecha.toLocaleDateString('es-ES', { month: 'short', year: 'numeric' });
            });
            const litrosMes = dataConsumo.map(item => parseFloat(item.total_litros) || 0);
            const montosMes = dataConsumo.map(item => parseFloat(item.total_monto) || 0);

            const ctxConsumo = document.getElementById('chartConsumoMensual').getContext('2d');
            new Chart(ctxConsumo, {
                type: 'line', 
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Litros',
                        data: litrosMes,
                        borderColor: colors.primary,
                        backgroundColor: isDark ? 'rgba(96, 165, 250, 0.1)' : 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        pointBackgroundColor: colors.primary,
                        pointBorderColor: isDark ? '#1f2937' : '#ffffff',
                        pointBorderWidth: 2,
                        pointHoverBackgroundColor: colors.primary,
                        pointHoverBorderColor: isDark ? '#1f2937' : '#ffffff',
                        yAxisID: 'y',
                    }, {
                        label: 'Monto ($)',
                        data: montosMes,
                        borderColor: colors.accent,
                        backgroundColor: isDark ? 'rgba(52, 211, 153, 0.1)' : 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        pointBackgroundColor: colors.accent,
                        pointBorderColor: isDark ? '#1f2937' : '#ffffff',
                        pointBorderWidth: 2,
                        pointHoverBackgroundColor: colors.accent,
                        pointHoverBorderColor: isDark ? '#1f2937' : '#ffffff',
                        yAxisID: 'y1',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: labelColor,
                                font: { size: 11 },
                                usePointStyle: true,
                                boxWidth: 8,
                                boxHeight: 8,
                                padding: 15,
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: textColor,
                            bodyColor: textColor,
                            borderColor: tooltipBorder,
                            borderWidth: 1,
                            padding: 10,
                            displayColors: true,
                            titleFont: { size: 11, weight: '600' },
                            bodyFont: { size: 11 },
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            position: 'left',
                            beginAtZero: true,
                            border: { display: false },
                            ticks: {
                                color: labelColor,
                                font: { size: 10 },
                                callback: function(value) {
                                    return value.toFixed(0) + ' L';
                                }
                            },
                            grid: {
                                color: gridColor,
                                drawTicks: false,
                            }
                        },
                        y1: {
                            type: 'linear',
                            position: 'right',
                            beginAtZero: true,
                            border: { display: false },
                            ticks: {
                                color: labelColor,
                                font: { size: 10 },
                                callback: function(value) {
                                    return '$' + (value / 1000).toFixed(0) + 'k';
                                }
                            },
                            grid: {
                                display: false,
                            }
                        },
                        x: {
                            border: { display: false },
                            ticks: {
                                color: labelColor,
                                font: { size: 10 }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 📊 GRÁFICO 2: Distribución por Tipo de Combustible (Dona)
            const dataTipo = <?php echo json_encode($consumoPorTipo, 15, 512) ?>;
            const tipos = dataTipo.map(item => item.tipo);
            const litrosTipo = dataTipo.map(item => parseFloat(item.total_litros));

            const coloresTipo = [
                colors.primary,
                colors.accent,
                colors.warning,
                colors.secondary,
                colors.info,
            ];

            const ctxTipo = document.getElementById('chartTipoCombustible').getContext('2d');
            new Chart(ctxTipo, {
                type: 'doughnut',
                data: {
                    labels: tipos,
                    datasets: [{
                        data: litrosTipo,
                        backgroundColor: coloresTipo,
                        borderWidth: 2,
                        borderColor: isDark ? '#1f2937' : '#ffffff',
                        hoverOffset: 6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 12,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                color: labelColor,
                                font: { size: 11 },
                                boxWidth: 8,
                                boxHeight: 8,
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: textColor,
                            bodyColor: textColor,
                            borderColor: tooltipBorder,
                            borderWidth: 1,
                            padding: 10,
                            displayColors: true,
                            titleFont: { size: 11, weight: '600' },
                            bodyFont: { size: 11 },
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const porcentaje = ((context.parsed / total) * 100).toFixed(1);
                                    return context.label + ': ' + context.parsed.toFixed(0) + ' L (' + porcentaje + '%)';
                                }
                            }
                        }
                    },
                    cutout: '65%',
                }
            });

            // 📊 GRÁFICO 3: Top Destinos (Vehículos, Equipos, etc.) - Barras Horizontales
            const dataVehiculos = <?php echo json_encode($topVehiculos, 15, 512) ?>;
            const vehiculos = dataVehiculos.map(item => {
                if (!item.destino) {
                    return 'Sin datos';
                }

                const destino = item.destino;
                const tipo = item.destino_tipo;

                // Determinar el tipo de destino y formatear apropiadamente
                if (tipo.includes('Vehiculo')) {
                    // VEHÍCULO: Patente - Marca Modelo
                    const patente = destino.patente || '';
                    const marca = destino.marca || '';
                    const modelo = destino.modelo || '';
                    
                    if (patente && marca && modelo) {
                        return `🚗 ${patente} - ${marca} ${modelo}`;
                    } else if (patente && marca) {
                        return `🚗 ${patente} - ${marca}`;
                    } else if (patente) {
                        return `🚗 ${patente}`;
                    } else if (marca) {
                        return `🚗 ${marca}`;
                    }
                } else if (tipo.includes('Equipo')) {
                    // EQUIPO: Equipamiento - Marca
                    const equipamiento = destino.equipamiento || '';
                    const marca = destino.marca || '';
                    
                    if (equipamiento && marca) {
                        return `⚙️ ${equipamiento} - ${marca}`;
                    } else if (equipamiento) {
                        return `⚙️ ${equipamiento}`;
                    } else if (marca) {
                        return `⚙️ ${marca}`;
                    }
                } else if (tipo.includes('Destino')) {
                    // DESTINO GENÉRICO (Acuerdo policial, etc.): Nombre - Tipo
                    const nombre = destino.nombre || '';
                    const tipoDestino = destino.tipo || '';
                    
                    if (nombre && tipoDestino) {
                        return `📍 ${nombre} (${tipoDestino})`;
                    } else if (nombre) {
                        return `📍 ${nombre}`;
                    } else if (tipoDestino) {
                        return `📍 ${tipoDestino}`;
                    }
                }
                
                return 'Sin identificar';
            });
            const litrosVehiculos = dataVehiculos.map(item => parseFloat(item.total_litros) || 0);
            const cargasVehiculos = dataVehiculos.map(item => parseInt(item.cantidad_cargas) || 0);
            const montosVehiculos = dataVehiculos.map(item => parseFloat(item.total_monto) || 0);

            const ctxVehiculos = document.getElementById('chartTopVehiculos').getContext('2d');
            new Chart(ctxVehiculos, {
                type: 'bar',
                data: {
                    labels: vehiculos,
                    datasets: [{
                        label: 'Litros Consumidos',
                        data: litrosVehiculos,
                        backgroundColor: [
                            isDark ? 'rgba(96, 165, 250, 0.7)' : 'rgba(59, 130, 246, 0.7)',
                            isDark ? 'rgba(167, 139, 250, 0.7)' : 'rgba(139, 92, 246, 0.7)',
                            isDark ? 'rgba(52, 211, 153, 0.7)' : 'rgba(16, 185, 129, 0.7)',
                            isDark ? 'rgba(56, 189, 248, 0.7)' : 'rgba(14, 165, 233, 0.7)',
                            isDark ? 'rgba(74, 222, 128, 0.7)' : 'rgba(34, 197, 94, 0.7)',
                        ],
                        borderWidth: 0,
                        borderRadius: 6,
                        barThickness: 32,
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: textColor,
                            bodyColor: textColor,
                            borderColor: tooltipBorder,
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            titleFont: { size: 11, weight: '600' },
                            bodyFont: { size: 11 },
                            callbacks: {
                                label: function(context) {
                                    return 'Litros: ' + context.parsed.x.toFixed(0) + ' L';
                                },
                                afterLabel: function(context) {
                                    const idx = context.dataIndex;
                                    return [
                                        'Cargas: ' + cargasVehiculos[idx],
                                        'Monto: $' + montosVehiculos[idx].toLocaleString('es-AR', {minimumFractionDigits: 2})
                                    ];
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            border: { display: false },
                            ticks: {
                                color: labelColor,
                                font: { size: 10 },
                                callback: function(value) {
                                    return value.toFixed(0) + ' L';
                                }
                            },
                            grid: {
                                color: gridColor,
                                drawTicks: false,
                            }
                        },
                        y: {
                            border: { display: false },
                            ticks: {
                                color: isDark ? '#f9fafb' : '#111827',
                                font: { size: 12, weight: 'bold' }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/combustibles/index.blade.php ENDPATH**/ ?>