<?php $__env->startSection('title', 'Nueva Obra'); ?> 

<?php $__env->startSection('content'); ?>
    <!-- Título y botón volver -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Crear Obra</h1>
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
                <a href="<?php echo e(route('obras.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bi-building'); ?>
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

                    Obras
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Crear Obra
                </span>
            </li>
        </ul>
    </div>

    <!-- FORMULARIO -->
    <div class="space-y-6">
        <form action="<?php echo e(route('obras.store')); ?>" method="POST"> 
            <?php echo csrf_field(); ?>

        <!-- CARD 1: Información general -->
        <div class="card bg-base-100 shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Información General</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> 

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label font-semibold">
                        Nombre de la Obra <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="nombre" value="<?php echo e(old('nombre')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Predio Multi-Eventos" required>
                        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Descripción -->
                <div class="form-control"> 
                    <label class="label font-semibold">Descripción (Opcional)</label>
                    <textarea name="descripcion" rows="2"
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Mejoras y expansión del predio"><?php echo e(old('descripcion')); ?></textarea>
                        <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Responsable -->
                <div class="form-control">
                    <label class="label font-semibold">Responsable <span class="text-red-600">*</span></label>
                    <input type="text" name="responsable" value="<?php echo e(old('responsable')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Carlos Pérez">
                        <?php $__errorArgs = ['responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Ejecutado por -->
                <div class="form-control">
                    <label class="label font-semibold">Ejecutado por <span class="text-red-600">*</span></label>
                    <input type="text" name="ejecutado_por" value="<?php echo e(old('ejecutado_por')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Damián Arévalo" required>
                        <?php $__errorArgs = ['ejecutado_por'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Resolución -->
                <div class="form-control">
                    <label class="label font-semibold">Resolución o decreto</label>
                    <input type="text" name="resolucion_decreto"
                        value="<?php echo e(old('resolucion_decreto')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="DECRETO MUNICIPAL N° 98/2024">
                        <?php $__errorArgs = ['resolucion_decreto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
            </div>
        </div>

        <!-- CARD 2: Ubicación -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Ubicación</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Dirección -->
                <div class="form-control">
                    <label class="label font-semibold">Dirección</label>
                    <input type="text" name="direccion" value="<?php echo e(old('direccion')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Calle Buenos Aires 150">
                        <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Barrio -->
                <div class="form-control">
                    <label class="label font-semibold">Barrio</label>
                    <input type="text" name="barrio" value="<?php echo e(old('barrio')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Ej: Barrio Córdoba">
                        <?php $__errorArgs = ['barrio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Ciudad (ocupa ambas columnas) -->
                <div class="form-control md:col-span-2">
                    <label class="label font-semibold">Ciudad</label>
                    <input type="text" name="ciudad"
                        value="<?php echo e(old('ciudad', 'San José de Feliciano')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="San José de Feliciano">
                        <?php $__errorArgs = ['ciudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
            </div>
        </div>

        <!-- CARD 3: Fechas -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Fechas</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Fecha inicio -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" value="<?php echo e(old('fecha_inicio')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Fecha estimada -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha Estimada</label>
                    <input type="date" name="fecha_estimada_fin"
                        value="<?php echo e(old('fecha_estimada_fin')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        <?php $__errorArgs = ['fecha_estimada_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Fecha fin -->
                <div class="form-control">
                    <label class="label font-semibold">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin"
                        value="<?php echo e(old('fecha_fin')); ?>"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        <?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
            </div>
        </div>

        <!-- CARD 4: Estado, observaciones y botones -->
        <div class="card bg-base-100 shadow p-6 mt-4">
            <h2 class="text-lg font-semibold mb-4">Estado y Observaciones</h2>

            <div class="grid grid-cols-1 gap-6">

                <!-- Estado -->
                <div class="form-control">
                    <label class="label font-semibold">Estado de la Obra *</label>
                    <select name="estado_obra"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                                text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition">
                        <option value="planificada">Planificada</option>
                        <option value="en_ejecucion">En ejecución</option>
                        <option value="demorada">Demorada</option>
                        <option value="finalizada">Finalizada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                    <?php $__errorArgs = ['estado_obra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>

                <!-- Observaciones -->
                <div class="form-control">
                    <label class="label font-semibold">Observaciones</label>
                    <textarea name="observaciones" rows="4"
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition"
                        placeholder="Notas o aclaraciones"><?php echo e(old('observaciones')); ?></textarea>
                        <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-600 mt-2 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
            </div>

            <!-- Botones -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="<?php echo e(route('obras.index')); ?>" class="btn btn-warning mr-2">
                   <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-m-arrow-left'); ?>
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
<?php endif; ?>  Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
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
<?php endif; ?> Guardar Obra
                </button>
            </div>
        </div>

     </form>
</div> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\admin\obras\create.blade.php ENDPATH**/ ?>