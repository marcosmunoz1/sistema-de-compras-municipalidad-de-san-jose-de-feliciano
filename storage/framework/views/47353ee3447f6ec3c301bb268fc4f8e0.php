<?php $__env->startSection('title', 'Compras'); ?>
<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-base-content">Compras</h1>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-create')): ?>
            <a href="<?php echo e(route('compras.create')); ?>" class="btn btn-primary">
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
<?php endif; ?> Nueva Compra
            </a>
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
                <a href="<?php echo e(route('compras.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shopping-bag'); ?>
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
                    Compras
                </a>
            </li>
        </ul>
        <form method="GET" action="<?php echo e(route('compras.index')); ?>"
            class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end mb-6 mt-3">

            <!-- Desde -->
            <div>
                <label class="text-sm text-gray-500">Desde</label>
                <input type="date" name="desde" value="<?php echo e(request('desde')); ?>" class="input input-bordered w-full">
            </div>

            <!-- Hasta -->
            <div>
                <label class="text-sm text-gray-500">Hasta</label>
                <input type="date" name="hasta" value="<?php echo e(request('hasta')); ?>" class="input input-bordered w-full">
            </div>

            <!-- Proveedor -->
            <div>
                <label class="text-sm text-gray-500">Proveedor</label>
                <input type="text" name="proveedor" value="<?php echo e(request('proveedor')); ?>" placeholder="Nombre proveedor"
                    class="input input-bordered w-full">
            </div>

            <!-- Estado -->
            <div>
                <label class="text-sm text-gray-500">Estado</label>
                <select name="estado" class="select select-bordered w-full">
                    <option value="">Todos</option>
                    <option value="Pendiente de factura" <?php if(request('estado') == 'Pendiente de factura'): echo 'selected'; endif; ?>>
                        Pendiente de factura
                    </option>
                    <option value="Finalizada" <?php if(request('estado') == 'Finalizada'): echo 'selected'; endif; ?>>
                        Finalizada
                    </option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex gap-2">
                <button type="submit" class="btn btn-primary w-full md:w-auto">
                    Filtrar
                </button>
                <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-outline w-full md:w-auto">
                    Limpiar
                </a>
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">

        <!-- Card 1 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl w-full">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Monto Total</p>
                        <h3 class="mt-2">$<?php echo e(number_format($totalMonto, 2)); ?></h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shopping-cart text-green-600 w-10 h-10" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl w-full">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Cantidad de compras</p>
                        <h3 class="mt-2"><?php echo e($totalCompras); ?></h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shopping-cart text-blue-600 w-10 h-10" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl w-full">
            <div class="px-6 pt-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Pendiente/sin facturas</p>
                        <h3 class="mt-2"><?php echo e($pendientes); ?></h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shopping-cart text-red-600 w-10 h-10" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Buscador -->
    <form action="<?php echo e(route('compras.index')); ?>" method="GET">
        <div class="card bg-base-100 shadow p-6 mb-6">
            <div class="flex items-center gap-3">

                <!-- INPUT -->
                <label class="w-full">
                    <input name="search" value="<?php echo e(request('search') ?? ''); ?>" type="text"
                        placeholder="Buscar por proveedor, fecha, estado..."
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
                    <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-error"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
            <!-- HEADER COMPLETO -->
            <div class="flex flex-col gap-3">
                <!-- TÍTULO + BOTÓN REPORTE -->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de Compras</h4>
                    <!-- BOTÓN REPORTE -->
                    <div class="flex gap-2">
                        <?php if (isset($component)) { $__componentOriginal64134405d1cef365195ea78d7e35c24e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64134405d1cef365195ea78d7e35c24e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-reporte','data' => ['titulo' => 'Generar Reporte','modalId' => 'modal_reporte_compras','previewUrl' => ''.e(route('compras.reporte.html')).'','downloadUrl' => ''.e(route('compras.reporte.download')).'','descripcion' => 'Reporte completo de todas las compras','icono' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('boton-reporte'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['titulo' => 'Generar Reporte','modalId' => 'modal_reporte_compras','previewUrl' => ''.e(route('compras.reporte.html')).'','downloadUrl' => ''.e(route('compras.reporte.download')).'','descripcion' => 'Reporte completo de todas las compras','icono' => 'document']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64134405d1cef365195ea78d7e35c24e)): ?>
<?php $attributes = $__attributesOriginal64134405d1cef365195ea78d7e35c24e; ?>
<?php unset($__attributesOriginal64134405d1cef365195ea78d7e35c24e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64134405d1cef365195ea78d7e35c24e)): ?>
<?php $component = $__componentOriginal64134405d1cef365195ea78d7e35c24e; ?>
<?php unset($__componentOriginal64134405d1cef365195ea78d7e35c24e); ?>
<?php endif; ?>
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
                            <th class="text-center">Proveedor</th>
                            <th class="text-center">insumos</th>
                            <th class="text-center">total</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nr = $compras->firstItem();
                        ?>

                        <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($compra->nr_orden); ?></td>
                                <td class="text-center">
                                    <?php echo e(\Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y')); ?>

                                </td>
                                <td class="text-center"><?php echo e($compra->proveedor->nombre ?? 'N/A'); ?></td>
                                <td class="text-center"><?php echo e($compra->detalle_compras->count() ?? 'N/A'); ?></td>
                                <td class="text-center">$<?php echo e(number_format($compra->total, 2) ?? 'N/A'); ?></td>
                                <td class="text-center">
                                    <?php
                                        $badgeClass = match ($compra->estado_compra) {
                                            'Pendiente de factura' => 'badge badge-outline badge-warning',
                                            'Finalizada' => 'badge badge-outline badge-success',
                                            'En proceso' => 'badge badge-outline badge-info',
                                            'Cancelada' => 'badge badge-outline badge-error',
                                            'Aprobada' => 'badge badge-outline badge-primary',
                                            default => 'badge-ghost',
                                        };
                                    ?>
                                    <span
                                        class="badge <?php echo e($badgeClass); ?> badge-sm whitespace-nowrap overflow-hidden text-ellipsis max-w-[120px]"
                                        title="<?php echo e($compra->estado_compra); ?>">
                                        <?php echo e($compra->estado_compra); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-show')): ?>
                                            <a href="<?php echo e(route('compras.show', Crypt::encryptString($compra->id))); ?>"
                                                title="Ver orden de compra" class="btn btn-info btn-sm">
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
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-edit')): ?>
                                            <?php if($compra->estado_compra == 'Pendiente de factura'): ?>
                                                <a href="<?php echo e(route('compras.edit', Crypt::encryptString($compra->id))); ?>"
                                                    class="btn btn-warning btn-sm" title="Cargar Factura">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-document-currency-dollar'); ?>
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

                                        

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-report')): ?>
                                            <button onclick="abrirModalPDF(<?php echo e($compra->id); ?>)"
                                                class="btn bg-primary btn-sm <?php echo e($compra->estado_compra == 'Finalizada' ? 'btn-disabled opacity-50 cursor-not-allowed' : ''); ?>"
                                                title="<?php echo e($compra->estado_compra == 'Finalizada' ? 'Compra ya finalizada' : 'Imprimir orden de compra'); ?>"
                                                <?php if($compra->estado_compra == 'Finalizada'): ?> disabled <?php endif; ?>>
                                                <?php if($compra->estado_compra == 'Finalizada'): ?>
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
                                                <?php else: ?>
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
                                                <?php endif; ?>
                                            </button>
                                        <?php endif; ?>
                                        <?php if($compra->trashed()): ?>
                                            <button class="btn btn-success btn-sm"
                                                onclick="abrirModalRestaurar('<?php echo e(url('/admin/compras/' . $compra->id . '/restore')); ?>')">
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
                                        <?php else: ?>
                                            <?php if($compra->estado_compra != 'Finalizada'): ?>
                                                <button class="btn btn-error btn-sm"
                                                    onclick="confirmarEliminacion(<?php echo e($compra->id); ?>)">
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
            <?php if($compras->hasPages()): ?>
                <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                    <!-- Texto "Mostrando X - Y" -->
                    <div class="text-sm text-gray-500">
                        Mostrando <?php echo e($compras->firstItem()); ?> - <?php echo e($compras->lastItem()); ?> de <?php echo e($compras->total()); ?>

                        registros
                    </div>

                    <!-- Controles de paginación estilo DaisyUI -->
                    <div class="join">

                        
                        <?php if($compras->onFirstPage()): ?>
                            <button class="join-item btn btn-square btn-disabled">«</button>
                        <?php else: ?>
                            <a href="<?php echo e($compras->previousPageUrl()); ?>" class="join-item btn btn-square">«</a>
                        <?php endif; ?>

                        
                        <?php if(!$compras->onFirstPage()): ?>
                            <a href="<?php echo e($compras->url(1)); ?>" class="join-item btn btn-square">1</a>
                            <?php if($compras->currentPage() > 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php
                            $currentPage = $compras->currentPage();
                            $totalPages = $compras->lastPage();
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
                                <a href="<?php echo e($compras->url($i)); ?>"
                                    class="join-item btn btn-square"><?php echo e($i); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        
                        <?php if($compras->currentPage() < $totalPages - 3): ?>
                            <?php if($compras->currentPage() < $totalPages - 4): ?>
                                <button class="join-item btn btn-square btn-disabled">...</button>
                            <?php endif; ?>
                            <a href="<?php echo e($compras->url($totalPages)); ?>"
                                class="join-item btn btn-square"><?php echo e($totalPages); ?></a>
                        <?php endif; ?>

                        
                        <?php if($compras->hasMorePages()): ?>
                            <a href="<?php echo e($compras->nextPageUrl()); ?>" class="join-item btn btn-square">»</a>
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

        <!-- Gráfico: Tendencia de Compras (Últimos 6 meses) -->
        <div class="card bg-base-100 shadow">
            <div class="card-body p-5">
                <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 3v18h18"></path>
                        <path d="m19 9-5 5-4-4-3 3"></path>
                    </svg>
                    Tendencia de Compras (Últimos 6 meses)
                </h2>
                <div class="h-64">
                    <canvas id="chartTendencia"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico: Estados de Compras -->
        <div class="card bg-base-100 shadow">
            <div class="card-body p-5">
                <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>
                    Distribución por Estado
                </h2>
                <div class="h-64">
                    <canvas id="chartEstados"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Gráfico: Top Proveedores -->
    <div class="card bg-base-100 shadow mb-6">
        <div class="card-body p-5">
            <h2 class="text-sm font-semibold text-base-content/70 mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                Top 5 Proveedores por Monto Total
            </h2>
            <div class="h-72">
                <canvas id="chartProveedores"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal para visualizar PDF -->
    <dialog id="modalPDF" class="modal">
        <div class="modal-box w-11/12 max-w-5xl h-[90vh] p-0 flex flex-col">
            <!-- Header del Modal -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="font-bold text-lg">Vista Previa - Orden de Compra</h3>
                <div class="flex gap-2">
                    <a id="btnDescargarPDF" href="#" class="btn btn-success btn-sm" download>
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
                    <button onclick="cerrarModalPDF()" class="btn btn-sm btn-circle">
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
                <div id="loadingSpinner"
                    class="absolute inset-0 flex items-center justify-center bg-base-100 z-10 transition-all duration-300">
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
                                Orden de Compra
                            </p>
                        </div>
                        <!-- Barra de progreso decorativa -->
                        <div class="w-48 h-1 bg-base-300 rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full animate-pulse" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>
                <iframe id="iframePDF" src="" class="w-full h-full border-0" style="min-height: 100%;"></iframe>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button onclick="cerrarModalPDF()">close</button>
        </form>
    </dialog>

    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_compra" class="modal">
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
                ¿Seguro que querés eliminar este orden de compra?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarCompra" method="POST">
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
    <dialog id="modal_restaurar_compra" class="modal">
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
                ¿Seguro que querés restaurar esta orden de compra?
            </p>

            <div class="modal-action">

                <!-- Botón cancelar -->
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario restaurar -->
                <form id="formRestaurarCompra" method="POST">
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
    <script>
        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarCompra');
            form.action = routeEliminarCompra(id);
            document.getElementById('modal_eliminar_compra').showModal();
        }
        // Genera la URL usando el helper de Laravel
        function routeEliminarCompra(id) { 
            return "<?php echo e(url('/admin/compras')); ?>/" + id; 
        }
        function abrirModalRestaurar(url) {
            const form = document.getElementById('formRestaurarCompra');
            form.action = url;
            document.getElementById('modal_restaurar_compra').showModal();
        }
    </script>
    <script>
        function abrirModalPDF(compraId) {
            const modal = document.getElementById('modalPDF');
            const iframe = document.getElementById('iframePDF');
            const btnDescargar = document.getElementById('btnDescargarPDF');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Mostrar spinner
            loadingSpinner.style.display = 'flex';

            // Construir las URLs usando route de Laravel
            const previewUrl = "<?php echo e(url('admin/compras')); ?>/" + compraId + "/preview";
            const downloadUrl = "<?php echo e(url('admin/compras')); ?>/" + compraId + "/download";

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

        function cerrarModalPDF() {
            const modal = document.getElementById('modalPDF');
            const iframe = document.getElementById('iframePDF');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Limpiar iframe al cerrar
            iframe.src = '';

            // Resetear spinner para próxima apertura
            loadingSpinner.style.display = 'flex';

            // Cerrar modal
            modal.close();
        }
    </script>

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

            // Configuración global minimalista
            Chart.defaults.font.family = 'system-ui, -apple-system, sans-serif';
            Chart.defaults.font.size = 11;
            Chart.defaults.color = labelColor;
            Chart.defaults.borderColor = gridColor;

            // 📊 GRÁFICO 1: Tendencia de Compras (Línea)
            const dataTendencia = <?php echo json_encode($comprasPorMes, 15, 512) ?>;
            const meses = dataTendencia.map(item => {
                const [year, month] = item.mes.split('-');
                const fecha = new Date(year, month - 1);
                return fecha.toLocaleDateString('es-ES', {
                    month: 'short',
                    year: 'numeric'
                });
            });
            const montos = dataTendencia.map(item => parseFloat(item.total) || 0);
            const cantidades = dataTendencia.map(item => parseInt(item.cantidad) || 0);

            const ctxTendencia = document.getElementById('chartTendencia').getContext('2d');
            new Chart(ctxTendencia, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Monto Total',
                        data: montos,
                        borderColor: colors.primary,
                        backgroundColor: isDark ? 'rgba(96, 165, 250, 0.1)' :
                            'rgba(59, 130, 246, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        pointBackgroundColor: colors.primary,
                        pointBorderColor: isDark ? '#1f2937' : '#ffffff',
                        pointBorderWidth: 2,
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
                            display: false,
                        },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: textColor,
                            bodyColor: textColor,
                            borderColor: tooltipBorder,
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            titleFont: {
                                size: 11,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 11
                            },
                            callbacks: {
                                label: function(context) {
                                    return 'Monto: $' + context.parsed.y.toLocaleString('es-AR', {
                                        minimumFractionDigits: 2
                                    });
                                },
                                afterLabel: function(context) {
                                    return 'Compras: ' + cantidades[context.dataIndex];
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: {
                                display: false
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    size: 10
                                },
                                callback: function(value) {
                                    return '$' + (value / 1000).toFixed(0) + 'k';
                                }
                            },
                            grid: {
                                color: gridColor,
                                drawTicks: false,
                            }
                        },
                        x: {
                            border: {
                                display: false
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    size: 10
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 📊 GRÁFICO 2: Estados de Compras (Dona)
            const dataEstados = <?php echo json_encode($comprasPorEstado, 15, 512) ?>;
            const estados = dataEstados.map(item => item.estado_compra);
            const cantidadesEstados = dataEstados.map(item => parseInt(item.cantidad));

            // Colores según el estado
            const coloresEstados = estados.map(estado => {
                switch (estado) {
                    case 'Pendiente de factura':
                        return colors.warning;
                    case 'Finalizada':
                        return colors.success;
                    case 'En proceso':
                        return colors.info;
                    case 'Cancelada':
                        return colors.error;
                    case 'Aprobada':
                        return colors.primary;
                    default:
                        return colors.secondary;
                }
            });

            const ctxEstados = document.getElementById('chartEstados').getContext('2d');
            new Chart(ctxEstados, {
                type: 'doughnut',
                data: {
                    labels: estados,
                    datasets: [{
                        data: cantidadesEstados,
                        backgroundColor: coloresEstados,
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
                                font: {
                                    size: 11
                                },
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
                            titleFont: {
                                size: 11,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 11
                            },
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const porcentaje = ((context.parsed / total) * 100).toFixed(1);
                                    return context.label + ': ' + context.parsed + ' (' + porcentaje +
                                        '%)';
                                }
                            }
                        }
                    },
                    cutout: '65%',
                }
            });

            // 📊 GRÁFICO 3: Top Proveedores (Barras Horizontales)
            const dataProveedores = <?php echo json_encode($topProveedores, 15, 512) ?>;
            const proveedores = dataProveedores.map(item => item.proveedor?.nombre || 'Sin proveedor');
            const montosProveedores = dataProveedores.map(item => parseFloat(item.total_gastado) || 0);
            const ordenesProveedores = dataProveedores.map(item => parseInt(item.cantidad_ordenes) || 0);

            const ctxProveedores = document.getElementById('chartProveedores').getContext('2d');
            new Chart(ctxProveedores, {
                type: 'bar',
                data: {
                    labels: proveedores,
                    datasets: [{
                        label: 'Monto Total',
                        data: montosProveedores,
                        backgroundColor: [
                            isDark ? 'rgba(96, 165, 250, 0.7)' : 'rgba(59, 130, 246, 0.7)',
                            isDark ? 'rgba(167, 139, 250, 0.7)' : 'rgba(139, 92, 246, 0.7)',
                            isDark ? 'rgba(52, 211, 153, 0.7)' : 'rgba(16, 185, 129, 0.7)',
                            isDark ? 'rgba(56, 189, 248, 0.7)' : 'rgba(14, 165, 233, 0.7)',
                            isDark ? 'rgba(74, 222, 128, 0.7)' : 'rgba(34, 197, 94, 0.7)',
                        ],
                        borderColor: [
                            colors.primary,
                            colors.secondary,
                            colors.accent,
                            colors.info,
                            colors.success,
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
                            titleFont: {
                                size: 11,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 11
                            },
                            callbacks: {
                                label: function(context) {
                                    return 'Monto: $' + context.parsed.x.toLocaleString('es-AR', {
                                        minimumFractionDigits: 2
                                    });
                                },
                                afterLabel: function(context) {
                                    return 'Órdenes: ' + ordenesProveedores[context.dataIndex];
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            border: {
                                display: false
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    size: 10
                                },
                                callback: function(value) {
                                    return '$' + (value / 1000).toFixed(0) + 'k';
                                }
                            },
                            grid: {
                                color: gridColor,
                                drawTicks: false,
                            }
                        },
                        y: {
                            border: {
                                display: false
                            },
                            ticks: {
                                color: labelColor,
                                font: {
                                    size: 10
                                }
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/compras/index.blade.php ENDPATH**/ ?>