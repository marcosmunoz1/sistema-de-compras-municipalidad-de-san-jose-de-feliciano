<?php $__env->startSection('title', 'Editar compra'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl sm:text-2xl font-semibold">Edición de la Orden de compra</h1>
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
            <li>
                <span class="inline-flex items-center gap-2">
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
                    Editar Orden de compra
                </span>
            </li>
        </ul>
    </div>
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Informacion General</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- País -->
                    <div class="space-y-2">
                        <label for="fecha_orden" class="text-sm font-medium">Fecha de Emisión</label>
                        <input type="date" id="fecha_orden" name="fecha_orden" value="<?php echo e($compra->fecha_orden); ?>"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['fecha_orden'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                    </div>

                    <!-- entregar a -->
                    <div class="space-y-2">
                        <label for="empleado_id" class="text-sm font-medium">Entregar a</label>
                        <select id="empleado_id" name="empleado_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['empleado_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                            <option value=""><?php echo e($compra->empleado->nombre); ?></option>
                        </select>
                        <?php $__errorArgs = ['empleado_id'];
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

                    <div class="space-y-2">
                        <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta</label>
                        <select id="sub_cuenta" name="sub_cuenta"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['sub_cuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                            <option value=""><?php echo e($compra->sub_cuenta); ?></option>
                        </select>
                        <?php $__errorArgs = ['sub_cuenta'];
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
                </div>
            </div>
        </div>
    </div>

    <!-- Otra seccion -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4 mt-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Informacion General</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label for="proveedor_id" class="text-sm font-medium">Proveedor</label>
                        <select id="proveedor_id" name="proveedor_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['proveedor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                            <option value=""><?php echo e($compra->proveedor->nombre); ?></option>
                        </select>
                        <?php $__errorArgs = ['proveedor_id'];
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

                    <!-- entregar a -->
                    <div class="space-y-2">
                        <label for="destino_tipo" class="text-sm font-medium">Destino de la compra</label>
                        <select id="destino_tipo" name="destino_tipo"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['destino_tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                            <option value=""><?php echo e(class_basename($compra->destino_tipo)); ?></option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="destino_id" class="text-sm font-medium">Enviar a:</label>
                        <select id="destino_id" name="destino_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['destino_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled>
                            <option value=""><?php echo e($compra->destino_nombre); ?></option>

                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-2">
                        <label for="asunto_obra_automotor" class="text-sm font-medium">Asunto de la compra</label>
                        <textarea value="" type="text" id="asunto_obra_automotor" name="asunto_obra_automotor"
                            placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['asunto_obra_automotor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled><?php echo e($compra->asunto_obra_automotor); ?></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-2">
                        <label for="observacion" class="text-sm font-medium">Observaciones</label>
                        <textarea type="text" id="observacion" name="observacion" placeholder="Ingrese una justificacion breve de la compra"
                            class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['observacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            disabled><?php echo e($compra->observacion); ?></textarea>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Otra seccion -->

    <form action="<?php echo e(route('compras.update', $compra->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4 mt-4">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Datos de la compra</h4>
                <p class="text-muted-foreground"></p>
            </div>

            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                <div class="grid gap-4">
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Nr</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nr = 1; ?>

                                <?php $__currentLoopData = $compra->detalle_compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($nr++); ?></td>
                                        <td class="text-center">
                                            <div class="flex items-center gap-1 justify-center">
                                                <button type="button" class="btn btn-ghost btn-sm text-info"
                                                    title="Ver detalle"
                                                    onclick="verDetalleProducto(<?php echo e($detalle->producto->id); ?>, '<?php echo e(addslashes($detalle->producto->nombre)); ?>', '<?php echo e($detalle->producto->categoria->nombre ?? '-'); ?>', '<?php echo e(addslashes($detalle->producto->descripcion ?? '-')); ?>', '<?php echo e($detalle->producto->unidad ?? '-'); ?>', '<?php echo e($detalle->producto->created_at ? $detalle->producto->created_at->format('d/m/Y') : '-'); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.8" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </button>
                                                <span><?php echo e($detalle->producto->nombre); ?></span>
                                            </div>
                                        </td>

                                        
                                        <td class="text-center">
                                            <div class="flex items-center gap-1 justify-center">
                                                <span class="text-gray-600 select-none">$</span>
                                                <input type="text"
                                                    class="precio input rounded-md border border-base-300 bg-base-200
                                                                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                                                                focus:border-primary cursor-pointer transition w-28"
                                                    name="precios[<?php echo e($detalle->id); ?>]"
                                                    value="<?php echo e($detalle->precio !== null ? number_format($detalle->precio, 2, ',', '.') : ''); ?>">
                                            </div>
                                        </td>

                                        
                                        <td class="text-center">
                                            <input type="number"
                                                class="cantidad input rounded-md border border-base-300 bg-base-200
                                                                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                                                                focus:border-primary transition w-20 text-center"
                                                readonly value="<?php echo e((float) $detalle->cantidad); ?>">
                                        </td>

                                        
                                        <td class="text-center">
                                            <div class="flex items-center gap-1 justify-center">
                                                <span class="text-gray-600 select-none">$</span>
                                                <input type="text"
                                                    class="subtotal input rounded-md border border-base-300 bg-base-200
                                                                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                                                                focus:border-primary transition w-28 text-center"
                                                    readonly>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-ghost btn-sm text-error"
                                                onclick="confirmarEliminacionDetalle(<?php echo e($detalle->id); ?>)" title="Eliminar producto">
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
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                            
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right font-bold text-lg">Total:</td>
                                    <td class="text-center">
                                        <div class="flex items-center gap-1 justify-center">
                                            <span class="text-gray-600 select-none">$</span>
                                            <input type="text" id="total_compra"
                                                class="input rounded-md border border-base-300 bg-base-200
                                                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                                        focus:border-primary transition w-28 text-center"
                                                readonly>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">
                            Factura (imagen o PDF) <span class="text-red-600">*</span>
                        </span>
                    </label>

                    <input 
                        type="file" 
                        name="facturas[]" 
                        multiple 
                        accept="image/*,application/pdf"
                        class="file-input file-input-bordered file-input-primary w-full" 
                        required
                    />
                    <div id="previewFactura" class="hidden mt-3 p-4 rounded-xl bg-base-200 space-y-3"></div>

                    <label class="label">
                        <span class="label-text-alt text-xs opacity-70">
                            Formatos permitidos: JPG, PNG, WEBP o PDF
                        </span>
                    </label>
                </div>
                <?php $__errorArgs = ['facturas'];
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
        </div>


        <!-- ========================= -->
        <!-- BOTONES DEL FORMULARIO -->
        <!-- ========================= -->
        <div class="flex flex-wrap gap-2 justify-end pt-4">
            <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-sm sm:btn-md btn-warning">
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
<?php endif; ?>
                Volver
            </a>
            <button type="submit" class="btn btn-sm sm:btn-md btn-primary">
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
                Guardar compra
            </button>
        </div>
    </form>
    <!-- Modal para confirmar eliminación del detalle de compra -->
    <dialog id="modal_eliminar_detalle" class="modal">
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
                ¿Seguro que querés eliminar este producto del detalle de la compra?
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <form id="formEliminarDetalle" method="POST">
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
    <!-- Modal para ver detalle del producto -->
    <dialog id="modalDetalleProducto" class="modal">
        <div class="modal-box max-w-lg rounded-xl max-h-[85vh] overflow-y-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-xl flex items-center gap-3 mb-6">
                <div class="p-2 rounded-lg bg-info/10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-info">
                        <path d="m7.5 4.27 9 5.15"></path>
                        <path
                            d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z">
                        </path>
                        <polyline points="3.29 7 12 12 20.71 7"></polyline>
                        <line x1="12" x2="12" y1="22" y2="12"></line>
                    </svg>
                </div>
                Detalle del Producto
            </h3>

            <div class="space-y-4">
                <!-- Nombre -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                            <path d="M4 7V4h16v3"></path>
                            <path d="M5 20h6"></path>
                            <path d="M13 4 8 20"></path>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Nombre</span>
                    </div>
                    <p class="font-semibold text-lg" id="detalle_producto_nombre">-</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Categoría -->
                    <div class="bg-base-200 p-4 rounded-lg">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z">
                                </path>
                                <path d="M7 7h.01"></path>
                            </svg>
                            <span
                                class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Categoría</span>
                        </div>
                        <p class="font-semibold" id="detalle_producto_categoria">-</p>
                    </div>

                    <!-- Unidad -->
                    <div class="bg-base-200 p-4 rounded-lg">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                <path d="M3 3v18h18"></path>
                                <rect width="4" height="7" x="7" y="10" rx="1"></rect>
                                <rect width="4" height="12" x="15" y="5" rx="1"></rect>
                            </svg>
                            <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Unidad</span>
                        </div>
                        <p class="font-semibold" id="detalle_producto_unidad">-</p>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" x2="8" y1="13" y2="13"></line>
                            <line x1="16" x2="8" y1="17" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Descripción</span>
                    </div>
                    <p class="text-sm" id="detalle_producto_descripcion">-</p>
                </div>

                <!-- Fecha de creación -->
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                            <line x1="16" x2="16" y1="2" y2="6"></line>
                            <line x1="8" x2="8" y1="2" y2="6"></line>
                            <line x1="3" x2="21" y1="10" y2="10"></line>
                        </svg>
                        <span class="text-xs text-muted-foreground font-medium uppercase tracking-wide">Fecha
                            registro</span>
                    </div>
                    <p class="text-sm" id="detalle_producto_fecha">-</p>
                </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        function confirmarEliminacionDetalle(id) {

            const form = document.getElementById('formEliminarDetalle');

            let url = "<?php echo e(route('detalle-compra.destroy', ['id' => '__ID__'])); ?>";
            url = url.replace('__ID__', id);

            form.action = url;
            //console.log(form.action);
            document.getElementById('modal_eliminar_detalle').showModal();
        }
    </script>
    <script>
        // Función para ver detalle del producto
        function verDetalleProducto(id, nombre, categoria, descripcion, unidad, fecha) {
            document.getElementById('detalle_producto_nombre').textContent = nombre || '-';
            document.getElementById('detalle_producto_categoria').textContent = categoria || '-';
            document.getElementById('detalle_producto_descripcion').textContent = descripcion || '-';
            document.getElementById('detalle_producto_unidad').textContent = unidad || '-';
            document.getElementById('detalle_producto_fecha').textContent = fecha || '-';

            document.getElementById('modalDetalleProducto').showModal();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form'); // el form de edición
            const precioInputs = document.querySelectorAll('input.precio');
            const filas = document.querySelectorAll('tbody tr');
            const totalInput = document.getElementById('total_compra');

            function normalizarPrecio(valor) {
                if (!valor) return 0;
                let raw = valor.toString().replace(/[^0-9,\.]/g, ''); // solo dígitos/coma/punto
                raw = raw.replace(/\./g, ''); // quita puntos de miles
                raw = raw.replace(',', '.'); // coma decimal -> punto
                const num = parseFloat(raw);
                return isNaN(num) ? 0 : num;
            }

            function formatearPrecio(num) {
                if (!num) return '';
                const partes = Number(num).toFixed(2).split('.');
                const entero = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                const decimal = partes[1];
                return `${entero},${decimal}`;
            }

            function calcularTotal() {
                let total = 0;

                filas.forEach(function(row) {
                    const precioInput = row.querySelector('.precio');
                    const cantidadInput = row.querySelector('.cantidad');
                    const subtotalInput = row.querySelector('.subtotal');

                    if (!precioInput || !cantidadInput || !subtotalInput) return;

                    const precio = normalizarPrecio(precioInput.value);
                    const cantidad = parseFloat(cantidadInput.value) || 0;
                    const subtotal = precio * cantidad;

                    subtotalInput.value = formatearPrecio(subtotal);
                    total += subtotal;
                });

                if (totalInput) {
                    totalInput.value = formatearPrecio(total);
                }
            }

            precioInputs.forEach(input => {
                // Inicial: formatear lo que viene del servidor
                if (input.value) {
                    const n = normalizarPrecio(input.value);
                    input.value = formatearPrecio(n);
                }

                // Mientras escribís: NO formatear, solo recalcular
                input.addEventListener('input', function() {
                    // quitar todo lo que no sea dígito
                    let digits = input.value.replace(/\D/g, '');

                    // eliminar ceros a la izquierda
                    digits = digits.replace(/^0+/, '');

                    // si no hay nada, limpiar y recalcular
                    if (!digits) {
                        input.value = '';
                        calcularTotal();
                        return;
                    }

                    let entero, centavos;

                    if (digits.length === 1) {
                        // 1 dígito → 0,0X
                        entero = '0';
                        centavos = digits.padStart(2, '0'); // '1' -> '01'
                    } else if (digits.length === 2) {
                        // 2 dígitos → 0,XY
                        entero = '0';
                        centavos = digits;
                    } else {
                        // 3+ dígitos: últimos 2 son centavos
                        entero = digits.slice(0, -2);
                        centavos = digits.slice(-2);
                    }

                    // formatear parte entera con puntos de miles
                    const enteroFormateado = entero.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    input.value = `${enteroFormateado},${centavos}`;

                    // recalcular total usando el valor numérico
                    calcularTotal();
                });

                // Al salir del campo: ahí sí formateamos lindo
                input.addEventListener('blur', function() {
                    if (!input.value.trim()) {
                        input.value = '';
                        calcularTotal();
                        return;
                    }

                    // normalizamos usando la máscara ya aplicada
                    const n = normalizarPrecio(input.value); // "1.234,56" -> 1234.56
                    if (!n) {
                        input.value = '';
                    } else {
                        // volvemos a aplicar la máscara de moneda
                        let cents = Math.round(n * 100).toString();
                        while (cents.length < 3) {
                            cents = '0' + cents;
                        }
                        const entero = cents.slice(0, -2);
                        const centavos = cents.slice(-2);
                        const enteroFormateado = entero.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        input.value = `${enteroFormateado},${centavos}`;
                    }

                    calcularTotal();
                });
            });
        });

        // Calcular total al cargar
        calcularTotal();

        // Antes de enviar: pasar todo a "10000.00"
        if (form) {
            form.addEventListener('submit', function() {
                precioInputs.forEach(input => {
                    const n = normalizarPrecio(input.value);
                    input.value = n ? n.toFixed(2) : '';
                });
            });
        }
    </script>
    <script>
        document.querySelector('input[name="facturas[]"]').addEventListener('change', function(e) {

            const files = e.target.files;
            const preview = document.getElementById('previewFactura');

            preview.innerHTML = ''; // limpiar previews anteriores

            if (!files.length) {
                preview.classList.add('hidden');
                return;
            }

            preview.classList.remove('hidden');

            Array.from(files).forEach(file => {

                const container = document.createElement('div');
                container.classList.add(
                    'border',
                    'border-base-300',
                    'p-3',
                    'rounded-lg',
                    'bg-base-300',
                    'shadow'
                );

                // Si es imagen
                if (file.type.startsWith('image/')) {

                    const img = document.createElement('img');
                    img.classList.add('h-32', 'rounded', 'shadow');
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                    container.appendChild(img);
                }

                // Si es PDF
                else if (file.type === 'application/pdf') {

                    const pdfIcon = document.createElement('div');
                    pdfIcon.classList.add('flex', 'items-center', 'gap-2');

                    pdfIcon.innerHTML = `
                        <span class="text-red-600 font-semibold">📄 PDF:</span>
                        <span>${file.name}</span>
                    `;

                    container.appendChild(pdfIcon);
                }

                preview.appendChild(container);
            });
        });
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/compras/edit.blade.php ENDPATH**/ ?>