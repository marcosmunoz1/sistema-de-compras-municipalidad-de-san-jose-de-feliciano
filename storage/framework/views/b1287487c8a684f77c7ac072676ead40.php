<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['model', 'limit' => 10]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['model', 'limit' => 10]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $actividades = \Spatie\Activitylog\Models\Activity::where('subject_type', get_class($model))
        ->where('subject_id', $model->id)
        ->with('causer')
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();
?>

<div class="card bg-base-100 shadow-xl mt-4">
    <div class="card-body">
        <div class="flex items-center justify-between mb-4">
            <h2 class="card-title">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
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
                Historial de Cambios
            </h2>
            <?php if($actividades->count() > 0): ?>
                <a href="<?php echo e(route('auditoria.index', ['modulo' => get_class($model), 'search' => $model->id])); ?>" 
                   class="btn btn-ghost btn-sm">
                    Ver historial completo
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-right'); ?>
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
        </div>

        <?php if($actividades->count() > 0): ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border border-base-300 rounded-lg p-4 hover:bg-base-200 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <?php
                                        $badgeClass = match($actividad->event) {
                                            'created' => 'badge-success',
                                            'updated' => 'badge-info',
                                            'deleted' => 'badge-error',
                                            default => 'badge-ghost'
                                        };
                                        $eventText = match($actividad->event) {
                                            'created' => 'Creado',
                                            'updated' => 'Actualizado',
                                            'deleted' => 'Eliminado',
                                            default => ucfirst($actividad->event)
                                        };
                                    ?>
                                    <span class="badge <?php echo e($badgeClass); ?> badge-sm"><?php echo e($eventText); ?></span>
                                    
                                    <?php if($actividad->causer): ?>
                                        <span class="text-sm text-gray-600">
                                            por <strong><?php echo e($actividad->causer->name); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <span class="text-xs text-gray-500">
                                        <?php echo e($actividad->created_at->diffForHumans()); ?>

                                    </span>
                                </div>

                                <?php if($actividad->event === 'updated' && isset($actividad->properties['attributes']) && isset($actividad->properties['old'])): ?>
                                    <div class="text-sm">
                                        <p class="font-semibold mb-1">Campos modificados:</p>
                                        <div class="flex flex-wrap gap-2">
                                            <?php $__currentLoopData = $actividad->properties['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $newValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($actividad->properties['old'][$key]) && $actividad->properties['old'][$key] != $newValue): ?>
                                                    <span class="badge badge-outline badge-sm">
                                                        <?php echo e(ucfirst(str_replace('_', ' ', $key))); ?>

                                                    </span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php elseif($actividad->event === 'created'): ?>
                                    <p class="text-sm text-gray-600">Registro creado en el sistema</p>
                                <?php elseif($actividad->event === 'deleted'): ?>
                                    <p class="text-sm text-gray-600">Registro eliminado del sistema</p>
                                <?php endif; ?>
                            </div>

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
                            </a>
                        </div>

                        <?php if($actividad->event === 'updated' && isset($actividad->properties['attributes']) && isset($actividad->properties['old'])): ?>
                            <details class="mt-2">
                                <summary class="cursor-pointer text-xs text-primary hover:underline">
                                    Ver cambios detallados
                                </summary>
                                <div class="mt-2 overflow-x-auto">
                                    <table class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th>Campo</th>
                                                <th>Anterior</th>
                                                <th>Nuevo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $actividad->properties['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $newValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($actividad->properties['old'][$key]) && $actividad->properties['old'][$key] != $newValue): ?>
                                                    <tr>
                                                        <td class="font-semibold"><?php echo e(ucfirst(str_replace('_', ' ', $key))); ?></td>
                                                        <td>
                                                            <span class="text-error">
                                                                <?php echo e($actividad->properties['old'][$key] ?? 'N/A'); ?>

                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success">
                                                                <?php echo e($newValue ?? 'N/A'); ?>

                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </details>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-information-circle'); ?>
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
                <span>No hay historial de cambios para este registro.</span>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\components\historial-actividad.blade.php ENDPATH**/ ?>