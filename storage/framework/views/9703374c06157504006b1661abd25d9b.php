<?php $__env->startSection('title', 'Asignar Permisos'); ?>

<?php $__env->startSection('content'); ?>

    <div class="max-w-7xl mx-auto px-4">

        
        <h2 class="text-2xl font-semibold mb-6">
            Asignar permisos al rol:
            <span class="font-bold text-primary"><?php echo e($rol->name); ?></span>
        </h2>

        <div class="card bg-base-100 shadow-xl border border-base-300">

            
            <div class="card-body border-b border-base-300">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="select-all" class="checkbox checkbox-primary">
                    <span class="font-medium">Seleccionar todos</span>
                </label>
            </div>

            <form action="<?php echo e(url('/admin/roles/asignar', $rol->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card-body space-y-8">

                    
                    <div>
                        <h3 class="text-lg font-semibold text-primary mb-4">⚙️ Configuración del sistema</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <?php $__currentLoopData = ['Usuarios', 'Roles', 'Permisos','Backups','Auditoría']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($permisos[$modulo])): ?>
                                    <div class="border border-base-300 rounded-lg p-4">
                                        <h4 class="font-bold mb-3"><?php echo e($modulo); ?></h4>

                                        <?php $__currentLoopData = $permisosDivididos[$modulo]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="space-y-2">
                                                <?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="flex items-center gap-2">
                                                        <input type="checkbox"
                                                            class="checkbox checkbox-sm checkbox-success permiso-checkbox"
                                                            name="permisos[]" value="<?php echo e($permiso->id); ?>"
                                                            <?php echo e($rol->hasPermissionTo($permiso->name) ? 'checked' : ''); ?>>
                                                        <span class="text-sm"><?php echo e($traducciones[$permiso->name] ?? $permiso->name); ?></span>
                                                    </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div>
                        <h3 class="text-lg font-semibold text-primary mb-4">🧩 Otros módulos</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo => $grupoPermisos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!in_array($modulo, ['Usuarios', 'Roles', 'Permisos'])): ?>
                                    <div class="border border-base-300 rounded-lg p-4">
                                        <h4 class="font-bold mb-3"><?php echo e($modulo); ?></h4>

                                        <?php $__currentLoopData = $permisosDivididos[$modulo]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="space-y-2">
                                                <?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="flex items-center gap-2">
                                                        <input type="checkbox"
                                                            class="checkbox checkbox-sm checkbox-success permiso-checkbox"
                                                            name="permisos[]" value="<?php echo e($permiso->id); ?>"
                                                            <?php echo e($rol->hasPermissionTo($permiso->name) ? 'checked' : ''); ?>>
                                                        <span class="text-sm"><?php echo e($traducciones[$permiso->name] ?? $permiso->name); ?></span>
                                                    </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>

                
                <div class="card-actions justify-end border-t border-base-300 p-6 gap-2">
                    <button type="submit" class="btn btn-warning">
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
<?php endif; ?> Guardar
                    </button>

                    <a href="<?php echo e(url('admin/roles')); ?>" class="btn btn-primary">
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
<?php endif; ?> Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.permiso-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/roles/asignar.blade.php ENDPATH**/ ?>