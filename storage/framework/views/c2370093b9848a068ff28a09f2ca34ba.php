<?php $__env->startSection('title', 'Ver usuario'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">
        <!-- Titulo y boton -->
        <div>
            <h1 class="text-2xl font-semibold">Información del usuario: <?php echo e($usuario->name); ?></h1>

            <?php if($usuario->estado): ?>
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            <?php else: ?>
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            <?php endif; ?>
        </div>
        <!-- Botones -->
        <?php
            $usuarioLogueado = auth()->user();
        ?>

        <div class="flex gap-2">
            <a href="<?php echo e(route('usuarios.index')); ?>"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-warning text-sm hover:bg-accent">
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
                Volver a Usuarios
            </a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios-edit')): ?>
                <?php if(
                    !$usuario->hasRole('Super-Admin') ||
                        $usuarioLogueado->id === $usuario->id ||
                        $usuarioLogueado->hasRole('Super-Admin')): ?>
                    <a href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>"
                        class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-blue-600 hover:bg-blue-700 text-white">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-pencil'); ?>
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
                        Editar Usuario
                    </a>
                <?php endif; ?>
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
                <a href="<?php echo e(route('usuarios.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user-group'); ?>
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
                    Usuarios
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-eye'); ?>
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
                    Ver usuario
                </span>
            </li>
        </ul>
    </div>
    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4">

            <div class="max-w-5xl mx-auto p-6">

                <h2 class="text-2xl font-bold flex items-center gap-2 mb-8">
                    <i class="fas fa-user"></i> Detalles del Usuario
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    
                    <div class="md:col-span-2 space-y-6 bg-base-100 border border-base-300 rounded-xl p-6">

                        <!-- Nombre + Rol -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Nombre de Usuario</label>
                                <input type="text" class="input input-bordered bg-base-200" value="<?php echo e($usuario->name); ?>"
                                    readonly>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold">Rol</label>
                                <input type="text" class="input input-bordered bg-base-200"
                                    value="<?php echo e($usuario->roles->first()->name ?? 'Sin rol'); ?>" readonly>
                            </div>
                        </div>

                        <!-- Email + Estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Correo</label>
                                <input type="email" class="input input-bordered bg-base-200" value="<?php echo e($usuario->email); ?>"
                                    readonly>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold">Estado</label>
                                <input type="text" class="input input-bordered bg-base-200"
                                    value="<?php echo e($usuario->estado ? 'Activo' : 'Inactivo'); ?>" readonly>
                            </div>
                        </div>

                        <!-- Último login -->
                        <div class="form-control md:col-span-2">
                            <label class="label block">
                                <span class="label-text font-semibold">Último inicio de sesión</span>
                            </label>

                            <input type="text" class="input input-bordered bg-base-200 w-full"
                                value="<?php echo e($usuario->last_login_at ? \Carbon\Carbon::parse($usuario->last_login_at)->format('d/m/Y H:i') : 'Nunca'); ?>"
                                readonly>
                        </div>



                    </div>

                    
                    <div class="bg-base-100 border border-base-300 rounded-xl p-6 flex flex-col">
                        <h3 class="text-lg font-semibold flex items-center gap-2 mb-4">
                            <i class="fas fa-pen-nib"></i> Firma
                        </h3>

                        <?php if($usuario->firma): ?>
                            <div
                                class="flex-1 border-2 border-dashed rounded-lg p-4 
                   bg-white text-black
                   flex justify-center items-center">
                                <img src="<?php echo e(asset('storage/' . $usuario->firma)); ?>"
                                    class="max-h-32 object-contain bg-white">
                            </div>
                        <?php else: ?>
                            <div
                                class="flex-1 border-2 border-dashed rounded-lg p-4
                   bg-white text-gray-600
                   flex items-center justify-center text-center">
                                No hay firma cargada
                            </div>
                        <?php endif; ?>
                    </div>


                </div>

                <!-- BOTONES -->
                <div class="mt-8 flex justify-end">
                    <a href="<?php echo e(url('admin/usuarios')); ?>" class="btn btn-neutral">
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
<?php endif; ?> Volver
                    </a>
                </div>

            </div>



            <!-- Sección de Permisos -->
            <div class="card bg-base-100 shadow mt-6">
                <div class="card-body p-4">
                    <h2 class="text-xl font-bold flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-primary">
                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                            <path d="M9 3v18"></path>
                        </svg>
                        Permisos Asignados
                        <span class="badge badge-primary badge-sm ml-2"><?php echo e($usuario->getAllPermissions()->count()); ?></span>
                    </h2>

                    <?php
                        $todosLosPermisos = $usuario->getAllPermissions();

                        // Agrupar permisos por módulo
                        $permisosPorModulo = [];
                        foreach ($todosLosPermisos as $permiso) {
                            $partes = explode('-', $permiso->name);
                            $modulo = $partes[0] ?? 'otros';

                            if (!isset($permisosPorModulo[$modulo])) {
                                $permisosPorModulo[$modulo] = [];
                            }
                            $permisosPorModulo[$modulo][] = $permiso;
                        }
                        ksort($permisosPorModulo);
                    ?>

                    <?php if($todosLosPermisos->count() > 0): ?>
                        <?php $__currentLoopData = $permisosPorModulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo => $permisos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-6">
                                <div class="flex items-center gap-2 mb-3 pb-2 border-b border-base-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                    </svg>
                                    <h3 class="font-bold text-base capitalize"><?php echo e(ucfirst($modulo)); ?></h3>
                                    <span class="badge badge-sm"><?php echo e(count($permisos)); ?></span>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                                    <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="flex items-center gap-2 p-2 bg-base-200 rounded-lg hover:bg-base-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-success flex-shrink-0">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                            <span class="text-sm"><?php echo e($permiso->name); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>Este usuario no tiene permisos asignados</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Actividad -->
    <?php if (isset($component)) { $__componentOriginalc35721803532c0b24842d1611866219b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35721803532c0b24842d1611866219b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.historial-actividad','data' => ['model' => $usuario,'limit' => 10]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('historial-actividad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($usuario),'limit' => 10]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35721803532c0b24842d1611866219b)): ?>
<?php $attributes = $__attributesOriginalc35721803532c0b24842d1611866219b; ?>
<?php unset($__attributesOriginalc35721803532c0b24842d1611866219b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35721803532c0b24842d1611866219b)): ?>
<?php $component = $__componentOriginalc35721803532c0b24842d1611866219b; ?>
<?php unset($__componentOriginalc35721803532c0b24842d1611866219b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistema-municipal\resources\views\admin\usuarios\show.blade.php ENDPATH**/ ?>