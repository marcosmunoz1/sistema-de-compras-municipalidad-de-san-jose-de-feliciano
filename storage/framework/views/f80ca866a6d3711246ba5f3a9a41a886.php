<?php $__env->startSection('title', 'Ver Proveedor'); ?> 

<?php $__env->startSection('content'); ?>
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Ver Proveedor: <?php echo e($proveedor->empresa); ?></h1> 
    <div class="flex gap-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores-index')): ?>
        <a href="<?php echo e(route('proveedores.index')); ?>"
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
                Volver a Proveedores
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores-edit')): ?>
        <a href="<?php echo e(route('proveedores.edit', $proveedor->id)); ?>"
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
                Editar Proveedor 
        </a>
        <?php endif; ?>
    </div>
 </div> 
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="<?php echo e(route('admin.index')); ?>">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
        </svg>
        Home
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('proveedores.index')); ?>">
        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-truck'); ?>
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
        Proveedores
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
        Ver Proveedor
      </span>
    </li>
  </ul>

</div>

 

<div class="card bg-base-100 dark:bg-base-200 shadow-md rounded-xl p-6">
    <div class="flex items-start justify-between">
        <div class="flex gap-4">

            <!-- Ícono (Heroicon) -->
            <div class="bg-blue-600 p-4 rounded-lg flex items-center justify-center">
                <!-- Heroicon Building Office -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                    stroke="currentColor" class="w-8 h-8 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                        d="M3.75 21h16.5M4.5 3.75h15M6 3.75V21m12-17.25V21M9.75 
                        9h.008v.008H9.75V9zm0 4.5h.008v.008H9.75V13.5zm0 
                        4.5h.008v.008H9.75V18zm4.5-9h.008v.008H14.25V9zm0 
                        4.5h.008v.008H14.25V13.5zm0 4.5h.008v.008H14.25V18z"/>
                </svg>
            </div>

            <!-- Datos -->
            <div>
                <h1 class="text-3xl font-semibold mb-1">
                    <?php echo e($proveedor->empresa); ?>

                </h1>
                <p class="text-gray-500 dark:text-gray-400 mb-3">
                    <?php echo e($proveedor->razon_social); ?>

                </p>

                <!-- Badge -->
                <span class="badge badge-primary px-3 py-1 text-white">
                    Activo
                </span>
            </div>

        </div>
    </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

    <!-- ========================================================= -->
    <!--  CARD GRANDE – INFORMACIÓN DE CONTACTO  (col-span-2)      -->
    <!-- ========================================================= -->
    <div class="bg-base-100 rounded-xl shadow-md p-6 lg:col-span-2 border border-base-300 dark:border-base-700">

        <!-- Título -->
        <div class="flex items-center gap-2 mb-6">
            <!-- ICONO HEROICON -->
            <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" 
                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m6 0H8.25m7.5 0a2.25 2.25 0 012.25 2.25v7.5A2.25 2.25 0 0115.75 21H8.25A2.25 
                         2.25 0 016 18.75v-7.5A2.25 2.25 0 018.25 9m7.5 0H8.25" />
            </svg>
            <h2 class="text-xl font-semibold">
                Información de Contacto
            </h2>
        </div>

        <!-- Contenido -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Nombre -->
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Nombre de Contacto</p>
                <p class="text-lg font-medium"><?php echo e($proveedor->nombre); ?></p>
            </div>

            <!-- CUIT -->
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">CUIT</p>
                <p class="text-lg font-medium"><?php echo e($proveedor->cuit); ?></p>
            </div>

            <!-- Teléfono -->
            <div>
                <p class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 4.5l4.5 2.25L9 15l3 1.5 3.75-3.75-2.25-4.5L19.5 2.25" />
                    </svg>
                    Teléfono
                </p>
                <p class="text-lg font-medium"><?php echo e($proveedor->telefono); ?></p>
            </div>

            <!-- Celular -->
            <div>
                <p class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 4.5l4.5 2.25L9 15l3 1.5 3.75-3.75-2.25-4.5L19.5 2.25" />
                    </svg>
                    Celular
                </p>
                <p class="text-lg font-medium"><?php echo e($proveedor->celular); ?></p>
            </div>

            <!-- Email (toma toda la fila) -->
            <div class="md:col-span-2">
                <p class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 4.5l7.5 6 7.5-6m-15 0A2.25 2.25 0 003 6.75v10.5A2.25 2.25 0 005.25 19.5h13.5A2.25 2.25 0 0021 17.25V6.75A2.25 
                                 2.25 0 0018.75 4.5m-15 0h15" />
                    </svg>
                    Email
                </p>
                <p class="text-lg font-medium"><?php echo e($proveedor->email); ?></p> 
            </div>

        </div>
    </div>

    <!-- ========================================================= -->
    <!-- 3 CARDS VERTICALES A LA DERECHA                           -->
    <!-- ========================================================= -->
    <div class="space-y-6">

        <!-- Card azul -->
        <div class="rounded-xl p-6 text-white shadow-md bg-gradient-to-br from-blue-500 to-blue-600">
            <p class="text-sm opacity-90 mb-2">Total Compras</p>
            <p class="text-3xl font-bold">$ <?php echo e(number_format($totalCompras12Meses ?? 0, 2, ',', '.')); ?></p>
            <p class="text-sm opacity-75">Últimos 12 meses</p>
        </div>

        <!-- Card verde -->
        <div class="rounded-xl p-6 text-white shadow-md bg-gradient-to-br from-green-500 to-green-600">
            <p class="text-sm opacity-90 mb-2">Órdenes Activas</p>
            <p class="text-3xl font-bold"><?php echo e($ordenesActivas ?? 0); ?></p>
            <p class="text-sm opacity-75">En proceso</p>
        </div>

        <!-- Card violeta -->
        <div class="rounded-xl p-6 text-white shadow-md bg-gradient-to-br from-purple-500 to-purple-600">
            <p class="text-sm opacity-90 mb-2">Productos</p>
            <p class="text-3xl font-bold"><?php echo e($productosCount ?? 0); ?></p>
            <p class="text-sm opacity-75">En catálogo</p>
        </div>

    </div>

</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

    <!-- CARD 1 – Ubicación -->
    <div class="card bg-base-100 shadow-sm border border-base-200 rounded-xl">
        <div class="card-body space-y-4">

            <!-- Título -->
            <div class="flex items-center gap-2">
                <!-- ICONO MAP PIN (Heroicons) -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                     stroke="currentColor" class="w-6 h-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <h4 class="text-xl font-semibold">Ubicación</h4>
            </div>

            <!-- Contenido -->
            <div class="space-y-1">
                <p class="text-sm text-gray-500 dark:text-gray-400">Dirección</p>
                <p class="text-lg font-medium"><?php echo e($proveedor->direccion ?? 'No especificado'); ?></p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Localidad</p>
                    <p><?php echo e($proveedor->localidad ?? 'No especificado'); ?></p>
                </div>

                <div class="space-y-1">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Código Postal</p>
                    <p><?php echo e($proveedor->codigo_postal ?? 'No especificado'); ?></p>
                </div>

                <div class="space-y-1">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Provincia</p>
                    <p><?php echo e($proveedor->provincia ?? 'No especificado'); ?></p>
                </div>

                <div class="space-y-1">
                    <p class="text-sm text-gray-500 dark:text-gray-400">País</p>
                    <p><?php echo e($proveedor->pais ?? 'No especificado'); ?></p>
                </div>
            </div>
        </div>
    </div>


    <!-- CARD 2 – Información Adicional -->
    <div class="card bg-base-100 shadow-sm border border-base-200 rounded-xl">
        <div class="card-body space-y-4">

            <!-- Título -->
            <div class="flex items-center gap-2">
                <!-- ICONO DOCUMENTO (Heroicons) -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m0 0l-3-3m3 3l3-3m2.25-7.125V19.5A2.25 2.25 0 0114.25 21.75H6A2.25 2.25 0 013.75 19.5V4.5A2.25 2.25 0 016 2.25h8.25z" />
                </svg>
                <h4 class="text-xl font-semibold">Información Adicional</h4>
            </div>

            <!-- Observaciones -->
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Observaciones</p>

                <p class="text-sm leading-relaxed bg-base-200 dark:bg-base-300 
                          p-3 rounded-md">
                      <?php echo e($proveedor->observaciones ?? 'Sin observaciones'); ?> 
                </p>
            </div>

            <!-- Registro -->
            <div class="pt-4 border-t border-base-300">

                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-2">
                    <!-- ICONO RELOJ -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                         stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l3 1.5M12 4.5a7.5 7.5 0 100 15 7.5 7.5 0 000-15z" />
                    </svg>
                    Información de Registro
                </div>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Creado:</span>
                        <span><?php echo e(\Carbon\Carbon::parse($proveedor->created_at)->format('d/m/Y')); ?></span> 
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Última Actualización:</span>
                        <span><?php echo e(\Carbon\Carbon::parse($proveedor->updated_at)->format('d/m/Y')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<div class="bg-base-100 text-base-content rounded-xl border border-base-300 shadow-sm mt-6">
    <!-- Header -->
    <div class="px-6 pt-6 pb-4 border-b border-base-300">
        <h4 class="text-lg font-semibold">Historial de Compras Recientes</h4>
    </div>

    <!-- Content -->
    <div class="px-6 py-4 space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $comprasRecientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- Item -->
            <a href="<?php echo e(route('compras.show', Crypt::encryptString($compra->id))); ?>" 
               class="flex items-center justify-between p-4 rounded-lg bg-base-200 hover:bg-base-300 transition cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z" />
                            <path d="M14 2v5a1 1 0 0 0 1 1h5" />
                            <path d="M10 9H8" />
                            <path d="M16 13H8" />
                            <path d="M16 17H8" />
                        </svg>
                    </div>

                    <div>
                        <p class="font-medium"><?php echo e($compra->nr_orden); ?></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <?php if($compra->detalle_compras->count() > 0): ?>
                                <?php echo e($compra->detalle_compras->first()->producto->nombre ?? 'Producto'); ?>

                                <?php if($compra->detalle_compras->count() > 1): ?>
                                    <span class="text-xs">+<?php echo e($compra->detalle_compras->count() - 1); ?> más</span>
                                <?php endif; ?>
                            <?php else: ?>
                                Sin productos
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="font-medium">$ <?php echo e(number_format($compra->total, 2, ',', '.')); ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <?php echo e(\Carbon\Carbon::parse($compra->created_at)->format('d/m/Y')); ?>

                    </p>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                <p>No hay compras registradas para este proveedor</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Historial de Actividad -->
<?php if (isset($component)) { $__componentOriginalc35721803532c0b24842d1611866219b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35721803532c0b24842d1611866219b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.historial-actividad','data' => ['model' => $proveedor,'limit' => 10]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('historial-actividad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($proveedor),'limit' => 10]); ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\proveedores\show.blade.php ENDPATH**/ ?>