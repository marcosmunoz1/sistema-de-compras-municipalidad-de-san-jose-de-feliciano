<?php $__env->startSection('title', 'Ver Orden de Compra #' . ($compra->nr_orden ?? $compra->id)); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Orden de Compra</h1>
        <div class="flex gap-2 flex-wrap justify-end">
            <a href="<?php echo e(route('compras.index')); ?>"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-primary text-primary-content text-sm hover:opacity-90 transition">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-left'); ?>
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
                Volver a Compras
            </a>
            <?php if($from === 'vehiculo' && $vehiculoId): ?>
                <a href="<?php echo e(route('vehiculos.show', $vehiculoId)); ?>"
                    class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-base-200 text-sm hover:bg-base-300 transition">
                    ← Volver al vehículo
                </a>
            <?php elseif($from === 'obra' && $obraId): ?>
                <a href="<?php echo e(route('obras.show', $obraId)); ?>"
                    class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-base-200 text-sm hover:bg-base-300 transition">
                    ← Volver a Obra
                </a>
            <?php elseif($from === 'deposito' && $depositoId): ?>
                <a href="<?php echo e(route('depositos.show', $depositoId)); ?>"
                    class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-base-200 text-sm hover:bg-base-300 transition">
                    ← Volver a Depósito
                </a>
            <?php elseif($from === 'equipo' && $equipoId): ?>
                <a href="<?php echo e(route('equipos.show', $equipoId)); ?>"
                    class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-base-200 text-sm hover:bg-base-300 transition">
                    ← Volver al Equipo
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
            <li>
                <span class="inline-flex items-center gap-1">
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
                    Orden #<?php echo e($compra->nr_orden ?? $compra->id); ?>

                </span>
            </li>
        </ul>
    </div>

    
    
    
    <div class="card bg-base-100 shadow-md rounded-xl mb-6 border-l-4 border-indigo-500 overflow-hidden">
        <div class="p-5 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                
                <div class="bg-indigo-600 p-4 rounded-xl shrink-0 self-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>

                
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-2 mb-3">
                        <h2 class="text-xl font-bold">Orden de Compra</h2>
                        <?php
                            $estadoClasses = match ($compra->estado_compra ?? 'pendiente') {
                                'aprobada' => 'badge-success',
                                'rechazada' => 'badge-error',
                                'anulada' => 'badge-warning',
                                default => 'badge-info',
                            };
                        ?>
                        <span class="badge <?php echo e($estadoClasses); ?> badge-outline capitalize">
                            <?php echo e($compra->estado_compra ?? 'Pendiente'); ?>

                        </span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-3">
                        <div>
                            <p class="text-xs text-base-content/50 mb-0.5">N° Orden</p>
                            <p class="text-sm font-semibold"><?php echo e($compra->nr_orden ?? '—'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-base-content/50 mb-0.5">Fecha Emisión</p>
                            <p class="text-sm font-semibold">
                                <?php echo e($compra->fecha_orden ? \Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y') : '—'); ?>

                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-base-content/50 mb-0.5">Sub Cuenta</p>
                            <p class="text-sm font-semibold"><?php echo e($compra->sub_cuenta ?? '—'); ?></p>
                        </div>
                    </div>
                </div>

                
                <div
                    class="shrink-0 border-t border-base-200 pt-4 sm:border-t-0 sm:pt-0 sm:pl-6 sm:border-l sm:border-base-200 sm:text-right">
                    <p class="text-xs text-base-content/50 uppercase tracking-widest mb-1">Total</p>
                    <p class="text-3xl font-bold text-indigo-600 tabular-nums leading-none">
                        $<?php echo e(number_format($compra->total, 2, ',', '.')); ?>

                    </p>
                    <p class="text-xs text-base-content/50 mt-1.5">
                        <?php echo e($compra->detalle_compras->count()); ?>

                        <?php echo e($compra->detalle_compras->count() === 1 ? 'ítem' : 'ítems'); ?>

                    </p>
                </div>

            </div>
        </div>
    </div>

    
    
    
    <?php
        $destino = $compra->destino;
        $esVehiculo = $destino instanceof \App\Models\Vehiculo;
        $esDeposito = $destino instanceof \App\Models\Deposito;
        $esObra = $destino instanceof \App\Models\Obra;
        $esEquipo = $destino instanceof \App\Models\Equipo;
        $destinoLabel = class_basename($compra->destino_tipo ?? 'Destino');
    ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        
        <div class="card bg-base-100 shadow-md rounded-xl">
            <div class="px-6 py-4 border-b border-base-200 flex items-center gap-2">
                <div class="bg-emerald-100 dark:bg-emerald-900/40 p-2 rounded-lg">
                    <svg class="size-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                </div>
                <h4 class="font-semibold text-base">Proveedor</h4>
            </div>
            <div class="px-6 py-5 space-y-3">
                <div class="flex items-center gap-3 p-3 bg-base-200/50 rounded-lg">
                    <div
                        class="bg-emerald-600 size-12 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0">
                        <?php echo e(strtoupper(substr($compra->proveedor->nombre ?? 'P', 0, 1))); ?>

                    </div>
                    <div>
                        <p class="font-semibold"><?php echo e($compra->proveedor->nombre ?? '—'); ?></p>
                        <?php if($compra->proveedor?->cuit): ?>
                            <p class="text-sm text-base-content/60">CUIT: <?php echo e($compra->proveedor->cuit); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($compra->proveedor?->telefono): ?>
                    <div class="flex justify-between text-sm px-1">
                        <span class="text-base-content/60">Teléfono</span>
                        <span class="font-medium"><?php echo e($compra->proveedor->telefono); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($compra->proveedor?->email): ?>
                    <div class="flex justify-between text-sm px-1">
                        <span class="text-base-content/60">Email</span>
                        <span class="font-medium"><?php echo e($compra->proveedor->email); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card bg-base-100 shadow-md rounded-xl">
            <div class="px-6 py-4 border-b border-base-200 flex items-center gap-2">
                <div class="bg-blue-100 dark:bg-blue-900/40 p-2 rounded-lg">
                    <svg class="size-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <h4 class="font-semibold text-base">Receptor</h4>
            </div>
            <div class="px-6 py-5 space-y-3">
                <div class="flex items-center gap-3 p-3 bg-base-200/50 rounded-lg">
                    <div
                        class="bg-blue-600 size-12 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0">
                        <?php echo e(strtoupper(substr($compra->empleado->nombre ?? 'E', 0, 1))); ?>

                    </div>
                    <div>
                        <p class="font-semibold"><?php echo e($compra->empleado->nombre ?? '—'); ?></p>
                        <?php if($compra->empleado?->dni): ?>
                            <p class="text-sm text-base-content/60">DNI: <?php echo e($compra->empleado->dni); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pt-2 border-t border-base-200">
                    <p class="text-xs text-base-content/50 mb-1">Registrado por:</p>
                    <div class="flex items-center gap-2">
                        <p class="text-sm font-medium"><?php echo e($compra->usuario->name ?? 'Sistema'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="card bg-base-100 shadow-md rounded-xl">
            <div class="px-6 py-4 border-b border-base-200 flex items-center gap-2">
                <div class="bg-violet-100 dark:bg-violet-900/40 p-2 rounded-lg">
                    <?php if($esVehiculo): ?>
                        <svg class="size-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    <?php elseif($esObra): ?>
                        <svg class="size-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>
                    <?php elseif($esDeposito): ?>
                        <svg class="size-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    <?php else: ?>
                        <svg class="size-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    <?php endif; ?>
                </div>
                <h4 class="font-semibold text-base"><?php echo e($destinoLabel); ?></h4>
            </div>
            <div class="px-6 py-5 space-y-3">
                <?php if($destino): ?>
                    <?php if($esVehiculo): ?>
                        <div class="p-3 bg-violet-50 dark:bg-violet-900/20 rounded-lg text-center">
                            <p class="text-2xl font-bold text-violet-700"><?php echo e($destino->patente ?? '—'); ?></p>
                            <p class="text-xs text-base-content/60 mt-1">Patente</p>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Marca:</span>
                                <span class="font-medium"><?php echo e($destino->marca ?? '—'); ?></span>
                            </div>
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Modelo:</span>
                                <span class="font-medium"><?php echo e($destino->modelo ?? '—'); ?></span>
                            </div>
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Tipo:</span>
                                <span class="font-medium"><?php echo e($destino->tipo ?? '—'); ?></span>
                            </div>
                        </div>
                    <?php elseif($esObra): ?>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Nombre:</span>
                                <span class="font-medium"><?php echo e($destino->nombre ?? '—'); ?></span>
                            </div>
                            <?php if($destino->descripcion): ?>
                                <div class="flex justify-between px-1">
                                    <span class="text-base-content/60">Descripción:</span>
                                    <span class="font-medium"><?php echo e($destino->descripcion); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php elseif($esDeposito): ?>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Nombre:</span>
                                <span class="font-medium"><?php echo e($destino->nombre ?? '—'); ?></span>
                            </div>
                            <?php if($destino->ubicacion): ?>
                                <div class="flex justify-between px-1">
                                    <span class="text-base-content/60">Ubicación:</span>
                                    <span class="font-medium"><?php echo e($destino->ubicacion); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php elseif($esEquipo): ?>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Equipamiento:</span>
                                <span class="font-medium"><?php echo e($destino->equipamiento ?? '—'); ?></span>
                            </div>
                            <div class="flex justify-between px-1">
                                <span class="text-base-content/60">Marca:</span>
                                <span class="font-medium"><?php echo e($destino->marca ?? '—'); ?></span>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="text-sm text-base-content/60 px-1"><?php echo e($compra->destino_nombre); ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="flex flex-col items-center justify-center py-4 text-center text-base-content/40">
                        <svg class="size-10 mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <p class="text-sm">Sin destino asignado</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    
    
    
    <div class="card bg-base-100 shadow-md rounded-xl mb-6">
        <div class="px-6 py-4 border-b border-base-200 flex items-center gap-2">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>
            <h4 class="text-base font-semibold">Detalles de la Orden</h4>
        </div>
        <div class="px-6 py-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <?php
                    $detalleItems = [
                        [
                            'label' => 'Fecha de Emisión',
                            'value' => $compra->fecha_orden
                                ? \Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y')
                                : '—',
                            'icon' => 'calendar',
                        ],
                        ['label' => 'N° de Orden', 'value' => $compra->nr_orden ?? '—', 'icon' => 'file'],
                        ['label' => 'Sub Cuenta', 'value' => $compra->sub_cuenta ?? '—', 'icon' => 'card'],
                        [
                            'label' => 'Tipo de Destino',
                            'value' => class_basename($compra->destino_tipo ?? '—'),
                            'icon' => 'map',
                        ],
                        ['label' => 'Enviar a', 'value' => $compra->destino_nombre, 'icon' => 'location'],
                        [
                            'label' => 'Estado',
                            'value' => ucfirst($compra->estado_compra ?? 'Pendiente'),
                            'icon' => 'badge',
                        ],
                    ];
                    $svgIcons = [
                        'calendar' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
                        'file' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 1.414.586l3.999 4A2 2 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
                        'card' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>',
                        'map' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 7l6-3 6 3 6-3v13l-6 3-6-3-6 3V7Z"/><path d="M9 4v13"/><path d="M15 7v13"/></svg>',
                        'location' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>',
                        'badge' =>
                            '<svg class="size-5 text-base-content/40 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>',
                    ];
                ?>

                <?php $__currentLoopData = $detalleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-3 p-3 rounded-lg bg-base-200/40">
                        <?php echo $svgIcons[$item['icon']]; ?>

                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-base-content/60 mb-0.5"><?php echo e($item['label']); ?></p>
                            <p class="font-medium text-sm truncate"><?php echo e($item['value']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <?php if($compra->asunto_obra_automotor): ?>
                <div class="mb-4">
                    <p class="text-sm text-base-content/60 mb-2 font-medium">Asunto de la compra</p>
                    <p class="text-sm leading-relaxed p-3 rounded-lg bg-base-200/50 border border-base-300">
                        <?php echo e($compra->asunto_obra_automotor); ?>

                    </p>
                </div>
            <?php endif; ?>

            
            <?php if($compra->observacion): ?>
                <div>
                    <p class="text-sm text-base-content/60 mb-2 font-medium">Observaciones</p>
                    <p class="text-sm leading-relaxed p-3 rounded-lg bg-base-200/50 border border-base-300">
                        <?php echo e($compra->observacion); ?>

                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    
    
    <div class="card bg-base-100 shadow-md rounded-xl mb-6">
        <div class="px-6 py-4 border-b border-base-200 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <path d="M16 10a4 4 0 0 1-8 0" />
                </svg>
                <h4 class="text-base font-semibold">Productos de la Compra</h4>
            </div>
            <span class="badge badge-neutral"><?php echo e($compra->detalle_compras->count()); ?> ítems</span>
        </div>
        <div class="px-6 py-5">
            <div class="overflow-x-auto">
                <table class="table w-full text-sm">
                    <thead>
                        <tr class="bg-base-200/60">
                            <th class="text-center rounded-l-lg w-10">#</th>
                            <th>Producto</th>
                            <th class="text-right">Precio Unit.</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-right rounded-r-lg">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nr = 1; ?>
                        <?php $__empty_1 = true; $__currentLoopData = $compra->detalle_compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-base-200/40 transition-colors">
                                <td class="text-center text-base-content/50 font-mono text-xs"><?php echo e($nr++); ?></td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="bg-indigo-100 dark:bg-indigo-900/40 p-1.5 rounded-md">
                                            <svg class="size-4 text-indigo-600" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>
                                        </div>
                                        <span class="font-medium"><?php echo e($detalle->producto->nombre ?? '—'); ?></span>
                                    </div>
                                </td>
                                <td class="text-right font-mono">$<?php echo e(number_format($detalle->precio, 2, ',', '.')); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-outline"><?php echo e($detalle->cantidad); ?></span>
                                </td>
                                <td class="text-right font-semibold font-mono text-indigo-600">
                                    $<?php echo e(number_format($detalle->subtotal, 2, ',', '.')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-8 text-base-content/50">
                                    <svg class="size-10 mx-auto mb-2 opacity-30" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                    </svg>
                                    <p>No hay productos registrados</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-base-300">
                            <td colspan="4" class="text-right font-bold text-base pr-4 py-3">Total General:</td>
                            <td class="text-right font-bold text-lg text-indigo-600 font-mono py-3">
                                $<?php echo e(number_format($compra->total, 2, ',', '.')); ?>

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    
    
    

    <?php if($compra->facturas->count()): ?>
        <div class="card bg-base-100 shadow-md rounded-xl border border-l-4 border-l-emerald-500 mb-6 overflow-hidden">

            <div
                class="px-6 py-4 border-b border-base-200 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-800 dark:to-slate-900 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-emerald-500 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-white" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white">Comprobantes / Facturas</h4>
                        <p class="text-xs text-white">
                            <?php echo e($compra->facturas->count()); ?> archivo(s) adjunto(s)
                        </p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php $__currentLoopData = $compra->facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $archivo = $factura->archivo;
                        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    ?>

                    <div class="bg-base-200/40 border border-base-300 rounded-2xl p-4 shadow-sm">

                        
                        <?php if($extension === 'pdf'): ?>
                            <div class="flex flex-col h-full justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                                        <svg class="size-8 text-red-500" fill="none" stroke="currentColor"
                                            stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Factura PDF</p>
                                        <p class="text-xs text-base-content/60">
                                            <?php echo e(basename($archivo)); ?>

                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 flex gap-2">
                                    <a href="<?php echo e(asset('storage/' . $archivo)); ?>" target="_blank"
                                        class="btn btn-sm btn-primary flex-1">
                                        Ver
                                    </a>
                                    <a href="<?php echo e(asset('storage/' . $archivo)); ?>" download
                                        class="btn btn-sm btn-outline flex-1">
                                        Descargar
                                    </a>
                                </div>
                            </div>

                            
                        <?php else: ?>
                            <div class="text-center">
                                <img src="<?php echo e(asset('storage/' . $archivo)); ?>"
                                    class="mx-auto max-h-56 object-contain rounded-xl border border-base-300 shadow-md mb-4">

                                <a href="<?php echo e(asset('storage/' . $archivo)); ?>" target="_blank"
                                    class="btn btn-sm btn-outline w-full">
                                    Ver en tamaño completo
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    <?php else: ?>
        
        <div class="card bg-base-100 shadow-md rounded-xl border border-l-4 border-l-amber-400 mb-6 overflow-hidden">
            <div class="px-6 py-6 text-center">
                <h5 class="text-base font-semibold text-base-content/70 mb-1">
                    Sin facturas adjuntas
                </h5>
                <p class="text-sm text-base-content/50">
                    Esta compra no tiene comprobantes cargados.
                </p>
            </div>
        </div>

    <?php endif; ?>

    
    
    
    <?php if (isset($component)) { $__componentOriginalc35721803532c0b24842d1611866219b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35721803532c0b24842d1611866219b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.historial-actividad','data' => ['model' => $compra,'limit' => 10]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('historial-actividad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($compra),'limit' => 10]); ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/compras/show.blade.php ENDPATH**/ ?>