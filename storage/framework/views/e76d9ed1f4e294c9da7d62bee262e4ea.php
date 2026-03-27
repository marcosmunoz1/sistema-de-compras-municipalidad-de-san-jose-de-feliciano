<?php $__env->startSection('title', 'Inicio'); ?>  
<?php $__env->startSection('content'); ?>
    <!-- Header del Dashboard -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">¡Bienvenido, <?php echo e(Auth::user()->name); ?>! 👋</h1> 
        <p class="text-muted-foreground">Aquí tienes un resumen de tu sistema de gestión municipal</p>
    </div>

    <!-- Grid de Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores-index')): ?> 
        <a href="<?php echo e(url('/admin/proveedores')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-blue-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-truck'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-blue-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadProveedores ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Proveedores</h3>
                    <p class="text-xs text-muted-foreground">Gestión de proveedores</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-index')): ?>
        <a href="<?php echo e(url('/admin/roles')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-purple-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-purple-500/10 group-hover:bg-purple-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shield-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-purple-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadRoles ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Roles</h3>
                    <p class="text-xs text-muted-foreground">Gestión de roles</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permisos-index')): ?>
        <a href="<?php echo e(url('/admin/permisos')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-amber-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-amber-500/10 group-hover:bg-amber-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-amber-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadPermisos ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Permisos</h3>
                    <p class="text-xs text-muted-foreground">Gestión de permisos</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios-index')): ?>
        <a href="<?php echo e(url('/admin/usuarios')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-indigo-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-indigo-500/10 group-hover:bg-indigo-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-indigo-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadUsuarios ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Usuarios</h3>
                    <p class="text-xs text-muted-foreground">Gestión de usuarios</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias-index')): ?>
        <a href="<?php echo e(url('/admin/categorias')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-pink-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-pink-500/10 group-hover:bg-pink-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-pink-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadCategorias ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Categorías</h3>
                    <p class="text-xs text-muted-foreground">Gestión de categorías</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-index')): ?>
        <a href="<?php echo e(url('/admin/productos')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-teal-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-teal-500/10 group-hover:bg-teal-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-cube'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-teal-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadProductos ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Productos</h3>
                    <p class="text-xs text-muted-foreground">Gestión de productos</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-index')): ?>
        <a href="<?php echo e(url('/admin/compras')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-emerald-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-emerald-500/10 group-hover:bg-emerald-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shopping-bag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-emerald-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadCompras ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Compras</h3>
                    <p class="text-xs text-muted-foreground">Gestión de compras</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehiculos-index')): ?>
        <a href="<?php echo e(url('/admin/vehiculos')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-cyan-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-cyan-500/10 group-hover:bg-cyan-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-truck'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-cyan-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadVehiculos ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Vehículos</h3>
                    <p class="text-xs text-muted-foreground">Gestión de vehículos</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-index')): ?>
        <a href="<?php echo e(url('/admin/combustibles')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-orange-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-orange-500/10 group-hover:bg-orange-500/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-orange-500">
                                <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                                <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                                <path d="M2 21h13"></path>
                                <path d="M3 9h11"></path>
                            </svg>
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadCombustibles ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Combustibles</h3>
                    <p class="text-xs text-muted-foreground">Cargas de combustible</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('obras-index')): ?>
        <a href="<?php echo e(url('/admin/obras')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-slate-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-slate-500/10 group-hover:bg-slate-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bi-building'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-slate-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadObras ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Obras</h3>
                    <p class="text-xs text-muted-foreground">Gestión de obras</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movimientos-index')): ?>
        <a href="<?php echo e(url('/admin/movimientos')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-violet-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-violet-500/10 group-hover:bg-violet-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-violet-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadMovimientos ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Movimientos</h3>
                    <p class="text-xs text-muted-foreground">Historial de movimientos</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('empleados-index')): ?>
        <a href="<?php echo e(url('/admin/empleados')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-sky-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-sky-500/10 group-hover:bg-sky-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-identification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-sky-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadEmpleados ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Empleados</h3>
                    <p class="text-xs text-muted-foreground">Gestión de empleados</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('depositos-index')): ?>
        <a href="<?php echo e(url('/admin/depositos')); ?>" class="group">
            <div class="card bg-base-100 border-2 border-base-300 hover:border-lime-500 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-3 rounded-xl bg-lime-500/10 group-hover:bg-lime-500/20 transition-colors">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-home-modern'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-lime-500']); ?>
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
                        </div>
                        <div class="badge badge-sm badge-ghost"><?php echo e($cantidadDepositos ?? '0'); ?></div>
                    </div>
                    <h3 class="font-semibold text-base mb-1">Depósitos</h3>
                    <p class="text-xs text-muted-foreground">Gestión de depósitos</p>
                </div>
            </div>
        </a>
        <?php endif; ?>
        
    </div>

   

    <!-- Sección de Gráficos -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-6">📊 Estadísticas y Análisis</h2>
        
        <!-- Fila 1: Gráficos de gastos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Gráfico: Gastos en Compras Mensuales -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-500">
                            <path d="M3 3v18h18"></path>
                            <path d="m19 9-5 5-4-4-3 3"></path>
                        </svg>
                        Gastos en Compras (<?php echo e(date('Y')); ?>)
                    </h3>
                    <canvas id="gastosComprasChart" height="80"></canvas>
                </div>
            </div> 
            <?php endif; ?> 

            <!-- Gráfico: Cargas de Combustible Mensuales -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('combustibles-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                            <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                            <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                            <path d="M2 21h13"></path>
                            <path d="M3 9h11"></path>
                        </svg>
                        Cargas de Combustible (<?php echo e(date('Y')); ?>)
                    </h3>
                    <canvas id="cargasCombustibleChart" height="80"></canvas>
                </div>
            </div>
            <?php endif; ?> 
        </div>

        <!-- Fila 2: Gráficos de rankings -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Gráfico: Productos Más Comprados -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-teal-500">
                            <path d="M3 3v18h18"></path>
                            <rect width="4" height="7" x="7" y="10" rx="1"></rect>
                            <rect width="4" height="12" x="15" y="5" rx="1"></rect>
                        </svg>
                        Top 10 Productos Más Comprados
                    </h3>
                    <canvas id="productosTopChart" height="100"></canvas>
                </div>
            </div>
            <?php endif; ?> 
            <!-- Gráfico: Vehículos con Más Cargas -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehiculos-index')): ?>
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body">
                        <h3 class="card-title text-lg mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-cyan-500">
                                <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"></path>
                                <circle cx="6.5" cy="16.5" r="2.5"></circle>
                                <circle cx="16.5" cy="16.5" r="2.5"></circle>
                            </svg>
                            Vehículos con Más Cargas
                        </h3>
                        <canvas id="vehiculosCargasChart" height="100"></canvas>
                    </div>
                </div> 
            <?php endif; ?>   
            </div>

        <!-- Fila 3: Más estadísticas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <!-- Gráfico: Top Proveedores -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                            <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"></path>
                            <circle cx="6.5" cy="16.5" r="2.5"></circle>
                            <circle cx="16.5" cy="16.5" r="2.5"></circle>
                        </svg>
                        Top 6 Proveedores con Más Compras
                    </h3>
                    <canvas id="topProveedoresChart" height="100"></canvas>
                </div>
            </div>
            <?php endif; ?> 
            <!-- Gráfico: Empleados que Más Solicitan -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('empleados-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-sky-500">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Empleados que Más Solicitan Compras
                    </h3>
                    <canvas id="empleadosSolicitudesChart" height="100"></canvas>
                </div>
            </div>
            <?php endif; ?> 
        </div>

        <!-- Fila 4: Obras, Movimientos y Depósitos -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            <!-- Gráfico: Obras con Más Movimientos -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('obras-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-500">
                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                            <path d="M3 9h18"></path>
                            <path d="M9 21V9"></path>
                        </svg>
                        Top 6 Obras con Más Movimientos
                    </h3>
                    <canvas id="obrasMovimientosChart" height="120"></canvas>
                </div>
            </div>
            <?php endif; ?> 

            <!-- Gráfico: Distribución de Movimientos -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movimientos-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-violet-500">
                            <path d="M3 3v18h18"></path>
                            <rect width="4" height="7" x="7" y="10" rx="1"></rect>
                            <rect width="4" height="12" x="15" y="5" rx="1"></rect>
                        </svg>
                        Movimientos por Tipo de Destino
                    </h3>
                    <canvas id="movimientosTipoChart" height="120"></canvas>
                </div>
            </div>
            <?php endif; ?> 

            <!-- Gráfico: Depósitos con Más Movimientos -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('depositos-index')): ?>
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-lime-500">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Top 6 Depósitos Más Activos
                    </h3>
                    <canvas id="depositosMovimientosChart" height="120"></canvas>
                </div>
            </div>
            <?php endif; ?> 
        </div>
    </div> 
     <!-- Sección de Compras Pendientes de Factura -->
     <?php if($comprasPendientesFactura->count() > 0): ?>
     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras-index')): ?>
    <div class="mt-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <h2 class="text-xl sm:text-2xl font-bold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-error">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" x2="12" y1="9" y2="13"></line>
                    <line x1="12" x2="12.01" y1="17" y2="17"></line>
                </svg>
                Compras Pendientes de Factura
            </h2>
            <span class="badge badge-error badge-sm w-fit"><?php echo e($comprasPendientesFactura->count()); ?> pendientes</span>
        </div>
        
        <div class="card bg-base-100 shadow-xl border-2 border-error/20">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table table-zebra min-w-full">
                        <thead class="bg-error/10">
                            <tr>
                                <th class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline text-error">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" x2="12" y1="8" y2="12"></line>
                                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                    </svg>
                                </th>
                                <th class="whitespace-nowrap">N° Orden</th>
                                <th class="whitespace-nowrap">Fecha</th>
                                <th class="whitespace-nowrap">Proveedor</th>
                                <th class="whitespace-nowrap">Solicitante</th>
                                <th class="whitespace-nowrap">Monto</th>
                                <th class="whitespace-nowrap">Estado</th>
                                <th class="text-center whitespace-nowrap">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $comprasPendientesFactura; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-error/5 transition-colors">
                                <td class="text-center">
                                    <div class="badge badge-error badge-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                            <line x1="12" x2="12" y1="9" y2="13"></line>
                                            <line x1="12" x2="12.01" y1="17" y2="17"></line>
                                        </svg>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="font-semibold text-sm"><?php echo e($compra->nr_orden); ?></span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm"><?php echo e(\Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y')); ?></span>
                                    <br>
                                    <span class="text-xs text-muted-foreground"><?php echo e(\Carbon\Carbon::parse($compra->fecha_orden)->diffForHumans()); ?></span>
                                </td>
                                <td class="max-w-[200px]">
                                    <div class="font-medium text-sm truncate"><?php echo e($compra->proveedor->nombre ?? 'N/A'); ?></div>
                                </td>
                                <td class="max-w-[150px]">
                                    <span class="text-sm truncate block"><?php echo e($compra->empleado->nombre ?? 'N/A'); ?></span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="font-bold text-sm">$<?php echo e(number_format($compra->total ?? 0, 2, ',', '.')); ?></span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <div class="badge badge-error badge-sm gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                            <line x1="9" x2="15" y1="9" y2="15"></line>
                                            <line x1="15" x2="9" y1="9" y2="15"></line>
                                        </svg>
                                        Sin Factura
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(url('/admin/compras/' . Crypt::encryptString($compra->id) )); ?>" class="btn btn-sm btn-ghost btn-square" title="Ver detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?> 
    <?php endif; ?>

    <!-- Scripts para Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Configuración global de Chart.js
        Chart.defaults.font.family = 'inherit';
        Chart.defaults.color = '#9ca3af';

        // Datos desde el controlador
        const gastosComprasMensuales = <?php echo json_encode($gastosComprasMensuales, 15, 512) ?>;
        const cargasCombustibleMensuales = <?php echo json_encode($cargasCombustibleMensuales, 15, 512) ?>;
        const productosMasComprados = <?php echo json_encode($productosMasComprados, 15, 512) ?>;
        const vehiculosMasCargas = <?php echo json_encode($vehiculosMasCargas, 15, 512) ?>;
        const topProveedoresCompras = <?php echo json_encode($topProveedoresCompras, 15, 512) ?>;
        const empleadosMasSolicitudes = <?php echo json_encode($empleadosMasSolicitudes, 15, 512) ?>;
        const obrasMasMovimientos = <?php echo json_encode($obrasMasMovimientos, 15, 512) ?>;
        const movimientosPorTipo = <?php echo json_encode($movimientosPorTipo, 15, 512) ?>;
        const depositosMasMovimientos = <?php echo json_encode($depositosMasMovimientos, 15, 512) ?>;

        // Nombres de meses
        const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        // 1. Gráfico de Gastos en Compras Mensuales
        const gastosLabels = gastosComprasMensuales.map(item => meses[item.mes - 1]);
        const gastosMontos = gastosComprasMensuales.map(item => parseFloat(item.monto_total || 0));
        const gastosCantidad = gastosComprasMensuales.map(item => item.cantidad);

        new Chart(document.getElementById('gastosComprasChart'), {
            type: 'line',
            data: {
                labels: gastosLabels,
                datasets: [{
                    label: 'Gastos ($)',
                    data: gastosMontos,
                    borderColor: 'rgb(16, 185, 129)',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                    yAxisID: 'y'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const cantidad = gastosCantidad[context.dataIndex];
                                return [
                                    'Gastos: $' + context.parsed.y.toLocaleString('es-AR', {minimumFractionDigits: 2}),
                                    'Compras: ' + cantidad
                                ];
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString('es-AR');
                            }
                        }
                    }
                }
            }
        });

        // 2. Gráfico de Cargas de Combustible Mensuales
        const combustibleLabels = cargasCombustibleMensuales.map(item => meses[item.mes - 1]);
        const combustibleMontos = cargasCombustibleMensuales.map(item => parseFloat(item.monto_total || 0));
        const combustibleLitros = cargasCombustibleMensuales.map(item => parseFloat(item.litros_total || 0));

        new Chart(document.getElementById('cargasCombustibleChart'), {
            type: 'bar',
            data: {
                labels: combustibleLabels,
                datasets: [{
                    label: 'Gastos ($)',
                    data: combustibleMontos,
                    backgroundColor: 'rgba(249, 115, 22, 0.8)',
                    borderColor: 'rgb(249, 115, 22)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const litros = combustibleLitros[context.dataIndex];
                                return [
                                    'Gastos: $' + context.parsed.y.toLocaleString('es-AR', {minimumFractionDigits: 2}),
                                    'Litros: ' + litros.toLocaleString('es-AR', {minimumFractionDigits: 2})
                                ];
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString('es-AR');
                            }
                        }
                    }
                }
            }
        });

        // 3. Gráfico de Top 10 Productos Más Comprados
        const productosLabels = productosMasComprados.map(item => {
            const nombre = item.nombre || 'Sin nombre';
            return nombre.length > 25 ? nombre.substring(0, 25) + '...' : nombre;
        });
        const productosCantidad = productosMasComprados.map(item => parseFloat(item.total_cantidad || 0));

        new Chart(document.getElementById('productosTopChart'), {
            type: 'bar',
            data: {
                labels: productosLabels,
                datasets: [{
                    label: 'Cantidad Comprada',
                    data: productosCantidad,
                    backgroundColor: 'rgba(20, 184, 166, 0.8)',
                    borderColor: 'rgb(20, 184, 166)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return productosMasComprados[context[0].dataIndex].nombre;
                            },
                            label: function(context) {
                                return 'Cantidad: ' + context.parsed.x.toLocaleString('es-AR', {minimumFractionDigits: 2});
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // 4. Gráfico de Vehículos con Más Cargas
        const vehiculosLabels = vehiculosMasCargas.map(item => item.patente || 'Sin patente');
        const vehiculosCargas = vehiculosMasCargas.map(item => item.total_cargas);
        const vehiculosLitros = vehiculosMasCargas.map(item => parseFloat(item.litros_total || 0));

        new Chart(document.getElementById('vehiculosCargasChart'), {
            type: 'bar',
            data: {
                labels: vehiculosLabels,
                datasets: [{
                    label: 'Cantidad de Cargas',
                    data: vehiculosCargas,
                    backgroundColor: 'rgba(6, 182, 212, 0.8)',
                    borderColor: 'rgb(6, 182, 212)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const litros = vehiculosLitros[context.dataIndex];
                                return [
                                    'Cargas: ' + context.parsed.x,
                                    'Litros: ' + litros.toLocaleString('es-AR', {minimumFractionDigits: 2}) + 'L'
                                ];
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // 5. Gráfico de Top Proveedores
        const proveedoresLabels = topProveedoresCompras.map(item => {
            const nombre = item.nombre || 'Sin nombre';
            return nombre.length > 20 ? nombre.substring(0, 20) + '...' : nombre;
        });
        const proveedoresCompras = topProveedoresCompras.map(item => item.total_compras);
        const proveedoresMontos = topProveedoresCompras.map(item => parseFloat(item.monto_total || 0));

        new Chart(document.getElementById('topProveedoresChart'), {
            type: 'bar',
            data: {
                labels: proveedoresLabels,
                datasets: [{
                    label: 'Cantidad de Compras',
                    data: proveedoresCompras,
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return topProveedoresCompras[context[0].dataIndex].nombre;
                            },
                            label: function(context) {
                                const monto = proveedoresMontos[context.dataIndex];
                                return [
                                    'Compras: ' + context.parsed.x,
                                    'Monto: $' + monto.toLocaleString('es-AR', {minimumFractionDigits: 2})
                                ];
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // 6. Gráfico de Empleados que Más Solicitan
        const empleadosLabels = empleadosMasSolicitudes.map(item => {
            const nombre = item.nombre || 'Sin nombre';
            return nombre.length > 20 ? nombre.substring(0, 20) + '...' : nombre;
        });
        const empleadosSolicitudes = empleadosMasSolicitudes.map(item => item.total_solicitudes);
        const empleadosMontos = empleadosMasSolicitudes.map(item => parseFloat(item.monto_total || 0));

        new Chart(document.getElementById('empleadosSolicitudesChart'), {
            type: 'bar',
            data: {
                labels: empleadosLabels,
                datasets: [{
                    label: 'Solicitudes',
                    data: empleadosSolicitudes,
                    backgroundColor: 'rgba(14, 165, 233, 0.8)',
                    borderColor: 'rgb(14, 165, 233)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return empleadosMasSolicitudes[context[0].dataIndex].nombre;
                            },
                            label: function(context) {
                                const monto = empleadosMontos[context.dataIndex];
                                return [
                                    'Solicitudes: ' + context.parsed.x,
                                    'Monto: $' + monto.toLocaleString('es-AR', {minimumFractionDigits: 2})
                                ];
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // 7. Gráfico de Obras con Más Movimientos
        const obrasLabels = obrasMasMovimientos.map(item => {
            const nombre = item.nombre || 'Sin nombre';
            return nombre.length > 15 ? nombre.substring(0, 15) + '...' : nombre;
        });
        const obrasMovimientos = obrasMasMovimientos.map(item => item.total_movimientos);

        new Chart(document.getElementById('obrasMovimientosChart'), {
            type: 'bar',
            data: {
                labels: obrasLabels,
                datasets: [{
                    label: 'Movimientos',
                    data: obrasMovimientos,
                    backgroundColor: 'rgba(100, 116, 139, 0.8)',
                    borderColor: 'rgb(100, 116, 139)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return obrasMasMovimientos[context[0].dataIndex].nombre;
                            },
                            label: function(context) {
                                return 'Movimientos: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // 8. Gráfico de Movimientos por Tipo
        const movimientosTipoLabels = movimientosPorTipo.map(item => item.tipo || 'Sin tipo');
        const movimientosTipoCantidad = movimientosPorTipo.map(item => item.total);

        new Chart(document.getElementById('movimientosTipoChart'), {
            type: 'doughnut',
            data: {
                labels: movimientosTipoLabels,
                datasets: [{
                    data: movimientosTipoCantidad,
                    backgroundColor: [
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(249, 115, 22, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                        'rgba(6, 182, 212, 0.8)'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 8,
                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        });

        // 9. Gráfico de Depósitos con Más Movimientos
        const depositosLabels = depositosMasMovimientos.map(item => {
            const nombre = item.nombre || 'Sin nombre';
            return nombre.length > 15 ? nombre.substring(0, 15) + '...' : nombre;
        });
        const depositosMovimientos = depositosMasMovimientos.map(item => item.total_movimientos);

        new Chart(document.getElementById('depositosMovimientosChart'), {
            type: 'bar',
            data: {
                labels: depositosLabels,
                datasets: [{
                    label: 'Movimientos',
                    data: depositosMovimientos,
                    backgroundColor: 'rgba(132, 204, 22, 0.8)',
                    borderColor: 'rgb(132, 204, 22)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return depositosMasMovimientos[context[0].dataIndex].nombre;
                            },
                            label: function(context) {
                                return 'Movimientos: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views/admin/index.blade.php ENDPATH**/ ?>