<?php $__env->startSection('title', 'Ver compra'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-xl sm:text-2xl font-semibold">Ver datos de la compra</h1>
        <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-sm sm:btn-md btn-primary w-fit">
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
        <?php if($from === 'vehiculo' && $vehiculoId): ?>
            <a href="<?php echo e(route('vehiculos.show', $vehiculoId)); ?>" class="btn btn-sm sm:btn-md btn-primary w-fit">
                ← Volver al vehículo
            </a>
        <?php elseif($from === 'obra' && $obraId): ?>
            <a href="<?php echo e(route('obras.show', $obraId)); ?>" class="btn btn-sm sm:btn-md btn-primary w-fit">
                ← Volver a obra
            </a>
        <?php elseif($from === 'deposito' && $depositoId): ?>
            <a href="<?php echo e(route('depositos.show', $depositoId)); ?>" class="btn btn-sm sm:btn-md btn-primary w-fit">
                ← Volver a depósito
            </a>
        <?php elseif($from === 'equipo' && $equipoId): ?>
            <a href="<?php echo e(route('equipos.show', $equipoId)); ?>" class="btn btn-sm sm:btn-md btn-primary w-fit">
                ← Volver al equipo
            </a>
        <?php endif; ?> 
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
                    Ver Orden de compra
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
                        <textarea type="text" id="observacion" name="observacion"
                            placeholder="Ingrese una justificacion breve de la compra"
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

    <div data-slot="card" class="card bg-base-100 shadow-xl p-4 mt-4">
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Datos de la compra</h4>
            <p class="text-muted-foreground"></p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">
                <div class="overflow-x-auto">
                <table class="table table-zebra w-full text-sm">
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
                                <td class="text-center"><?php echo e($detalle->producto->nombre); ?></td>

                                
                                <td class="text-center">
                                    $<?php echo e(number_format($detalle->precio, 2) ?? ''); ?>

                                </td>

                                
                                <td class="text-center">
                                    <input type="text" class="text-center cantidad" readonly
                                        value="<?php echo e($detalle->cantidad); ?>">
                                </td>

                                
                                <td class="text-center">
                                    $<?php echo e(number_format($detalle->subtotal, 2) ?? ''); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right font-bold">Total:</td>
                            <td class="text-center">
                                $<?php echo e(number_format($compra->total, 2)); ?>

                            </td>
                        </tr>
                    </tfoot>

                </table>
                </div>
            </div>
            <?php if($compra->foto_factura): ?>
                <?php
                    $archivo = $compra->foto_factura;
                    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                ?>

                <div class="card bg-base-100 shadow-md border border-base-300 max-w-md">
                    <div class="card-body gap-3">
                        <h2 class="card-title text-base">
                            Factura de la compra
                        </h2>

                        <?php if($extension === 'pdf'): ?>
                            <div class="flex items-center gap-3">
                                <span class="badge badge-error badge-outline">PDF</span>

                                <a href="<?php echo e(asset('storage/' . $archivo)); ?>" target="_blank"
                                    class="btn btn-sm btn-primary">
                                    Ver factura
                                </a>

                                <a href="<?php echo e(asset('storage/' . $archivo)); ?>" download class="btn btn-sm btn-outline">
                                    Descargar
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="rounded-lg overflow-hidden border border-base-300">
                                <img src="<?php echo e(asset('storage/' . $archivo)); ?>" alt="Factura"
                                    class="w-full object-cover">
                            </div>

                            <div class="flex justify-end">
                                <a href="<?php echo e(asset('storage/' . $archivo)); ?>" target="_blank"
                                    class="btn btn-sm btn-outline">
                                    Ver en tamaño completo
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info max-w-md">
                    <span>No hay factura cargada para esta compra.</span>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-- ========================= -->
    <!-- HISTORIAL DE ACTIVIDAD -->
    <!-- ========================= -->
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
<?php $__env->startSection('js'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function calcularTotal() {
                let total = 0;
                document.querySelectorAll('tbody tr').forEach(function(row) {
                    const precio = parseFloat(row.querySelector('.precio').value) || 0;
                    const cantidad = parseFloat(row.querySelector('.cantidad').value) || 0;
                    const subtotal = precio * cantidad;

                    row.querySelector('.subtotal').value = subtotal.toFixed(2);
                    total += subtotal;
                });

                document.getElementById('total_compra').value = total.toFixed(2);
            }

            // recalcular al cambiar cualquier precio
            document.querySelectorAll('.precio').forEach(function(input) {
                input.addEventListener('input', calcularTotal);
            });

            // calcular al cargar la página
            calcularTotal();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/compras/show.blade.php ENDPATH**/ ?>