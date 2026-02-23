<?php $__env->startSection('title', 'Ver Movimiento'); ?> 

<?php $__env->startSection('content'); ?>
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver Movimiento</h1>
         <!-- Botones -->
        <a href="<?php echo e(route('movimientos.index')); ?>" class="btn btn-sm sm:btn-md btn-warning mr-2">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-left'); ?>
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
            Volver
        </a>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-home'); ?>
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
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('movimientos.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
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
                    Movimientos
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus'); ?>
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
                    Ver Movimiento
                </span>
            </li>
        </ul>
    </div>

    <div class="card bg-base-100 shadow-xl p-6 mb-4">

        <h2 class="text-lg font-semibold mb-4">Datos del Movimiento</h2>

        <div class="space-y-6">

            <!-- FILA 1: ORIGEN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                <!-- ORIGEN TIPO -->
                <div class="space-y-2">
                    <label class="text-sm font-medium">Origen</label>
                    <input type="text" value="<?php echo e($movimiento->origen_label); ?>" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transitionw-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

                <!-- TIPO DE MOVIMIENTO -->
                <div class="space-y-1">
                    <label class="text-sm font-medium">Tipo de movimiento</label>
                    <input type="text" value="<?php echo e(ucfirst($movimiento->tipo)); ?>" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

            </div>

            <!-- FILA 2: DESTINO -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                <!-- DESTINO TIPO -->
                <div class="space-y-1">
                    <label class="text-sm font-medium">Destino</label>
                    <input type="text" value="<?php echo e($movimiento->destino_label); ?>" readonly
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition">
                </div>

                <!-- FECHA -->
                <div class="space-y-1">
                    <label for="fecha" class="text-sm font-medium">Fecha</label>
                    <input id="fecha" name="fecha" type="date" value="<?php echo e($movimiento->fecha); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                    text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" readonly>
                </div>

            </div>

            <!-- FILA 3: OBSERVACIONES -->
            <div class="space-y-2">
                <label for="observacion" class="text-sm font-medium">Observaciones</label>
                <textarea id="observacion" name="observacion" rows="3"
                    class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                    placeholder="Comentarios sobre el movimiento..." readonly><?php echo e($movimiento->observacion); ?></textarea>
            </div>

        </div>


    </div>
    <?php if($movimiento->tipo != 'entrada'): ?>
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-2xl font-semibold">Productos</h1>
            <br>

            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Cantidad Original</th>
                            <th class="text-center">Cantidad Movida / Consumida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nr = 1; ?>

                    <?php $__currentLoopData = $movimiento->detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($nr++); ?></td>
                            <td class="text-center">
                                <?php echo e($detalle->producto->nombre ?? 'Sin nombre'); ?>

                            </td>

                            
                            <td class="text-center">
                                <?php echo e($detalle->detalle_compra->cantidad ?? 'N/A'); ?>

                            </td>

                            
                            <td class="text-center"><?php echo e($detalle->cantidad); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="card bg-base-100 shadow-xl p-4">
            <h1 class="text-2xl font-semibold">Productos</h1>
            <br>

            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Cantidad Comprada</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nr = 1; ?>

                        <?php if($movimiento->compra): ?>
                            <?php $__currentLoopData = $movimiento->compra->detalle_compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($nr++); ?></td>
                                    <td class="text-center">
                                        <?php echo e($detalle->producto->nombre ?? 'Sin nombre'); ?>

                                    </td>
                                    <td class="text-center"><?php echo e($detalle->cantidad); ?></td>
                                    <td class="text-center">$<?php echo e(number_format($detalle->precio, 2)); ?></td>
                                    <td class="text-center">$<?php echo e(number_format($detalle->subtotal, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-gray-500">
                                    Movimiento sin compra asociada
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\movimientos\show.blade.php ENDPATH**/ ?>