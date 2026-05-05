<?php $__env->startSection('title', 'Ver Equipo'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">

        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Equipo:
                <?php echo e($equipo->equipamiento . ' ' . $equipo->marca); ?></h1>

            <?php if($equipo->estado): ?>
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            <?php else: ?>
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            <?php endif; ?>
        </div>

        <!-- Botones -->
        <div class="flex gap-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('equipos-index')): ?>
            <a href="<?php echo e(route('equipos.index')); ?>"
                class="btn inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-base-200 hover:bg-base-300 text-sm font-medium transition-colors border border-base-300">
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
                Volver a Equipos
            </a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('equipos-edit')): ?>
            <a href="<?php echo e(route('equipos.edit', $equipo->id)); ?>"
                class="btn inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-warning hover:bg-yellow-500 text-warning-content text-sm font-medium transition-colors shadow-sm">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-pencil'); ?>
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
                Editar Equipo
            </a>
            <?php endif; ?>
        </div>

    </div>
    <!-- Breadcrumbs -->
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
                <a href="<?php echo e(route('equipos.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-wrench-screwdriver'); ?>
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
                    Equipos
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
                    Ver Equipo
                </span>
            </li>
        </ul>
    </div>

    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver Equipo</h1>
    </div>

    <!-- Card del Formulario -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">



            <!-- Grid de campos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Área -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Área
                    </label>
                    <select name="area_id"
                        class="select select-bordered w-full <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        disabled
                    >
                        <option disabled value="">Seleccionar área</option>

                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($area->id); ?>"
                                <?php echo e(old('area_id', $equipo->area_id) == $area->id ? 'selected' : ''); ?>>
                                <?php echo e($area->nombre); ?> (<?php echo e($area->prefijo_catalogacion); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Equipamiento -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Equipamiento
                    </label>
                    <input type="text" name="equipamiento" value="<?php echo e($equipo->equipamiento); ?>"
                        placeholder="Ej: Computadora de escritorio"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary" readonly>
                </div> 

                <!-- Marca -->
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">Marca
                    </label>
                    <input type="text" name="marca" value="<?php echo e($equipo->marca); ?>"
                        placeholder="Ej: HP, Dell, Lenovo, Samsung"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary" readonly>
                </div>

                <!-- Catalogacion -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Catalogación</span>
                    </label>
                    <input type="text" name="catalogacion" value="<?php echo e($equipo->catalogacion); ?>"
                        placeholder="Ej: HP, Dell, Lenovo, Samsung"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary" readonly>
                </div>

                <!-- Descripción -->
                <div class="form-control w-full md:col-span-2">
                    <label class="label">
                        <span class="label-text font-medium">Descripción</span>
                    </label>
                    <textarea name="descripcion" rows="4"
                        placeholder="Detalles adicionales del equipo: modelo, características, número de serie, etc."
                        class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"><?php echo e($equipo->descripcion); ?></textarea>
                </div>

            </div>
        </div>
    </div>
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4" id="tabla-productos">
        <h1 class="text-2xl font-semibold">Detalles de productos asignados al equipo</h1><br>
        <form method="GET" action="<?php echo e(route('equipos.show', $equipo->id)); ?>#tabla-productos">
            <input type="text" name="search" value="<?php echo e($search); ?>" class="w-60 h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                placeholder="Buscar...">
            <!-- BOTÓN -->
            <button class="btn btn-primary">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
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
                Buscar
            </button>
            <?php if(request('search')): ?>
                <a href="<?php echo e(route('equipos.show', $equipo->id)); ?>#tabla-productos" class="btn btn-error">
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
<?php endif; ?> Limpiar</a>
            <?php endif; ?>
        </form>

        <br>
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th class="text-center">Nr</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Fecha Compra</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Cantidad Asignada</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $nr = $productos->currentPage() * $productos->perPage() - $productos->perPage() + 1;
                ?>

                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($nr++); ?></td>
                        <td class="text-center"><?php echo e($producto->nombre); ?></td>
                        <td class="text-center">
                            <?php echo e($producto->fecha_orden ? \Carbon\Carbon::parse($producto->fecha_orden)->format('d/m/Y') : '—'); ?>

                        </td>
                        <td class="text-center">$<?php echo e(number_format($producto->precio ?? 0, 2)); ?></td>
                        <td class="text-center"><?php echo e($producto->cantidad_asignada ?? 0); ?></td>
                        <td class="text-center"><?php echo e($producto->stock ?? 0); ?></td>
                        <td class="text-center">$<?php echo e(number_format($producto->subtotal_real ?? 0, 2)); ?></td>
                        <td class="text-center">
                            <?php if($producto->compra_id): ?>
                                <a href="<?php echo e(route('compras.show', [
                                    'id' => Crypt::encryptString($producto->compra_id),
                                    'from' => 'equipo',
                                    'equipo_id' => $equipo->id
                                ])); ?>"
                                class="btn btn-sm btn-primary">
                                    Ver compra
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" class="text-right font-bold text-xl">Total:</td>
                    <td class="font-bold text-xl">$<?php echo e(number_format($totalGeneral ?? 0, 2)); ?></td>
                </tr>
            </tfoot>
        </table>



        <?php if($productos->hasPages()): ?>
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 px-3 gap-4">

                <!-- Texto "Mostrando X - Y" -->
                <div class="text-sm text-gray-500">
                    Mostrando <?php echo e($productos->firstItem()); ?> - <?php echo e($productos->lastItem()); ?>

                    de <?php echo e($productos->total()); ?> registros
                </div>

                <!-- Controles de paginación -->
                <div class="join">

                    
                    <?php if($productos->onFirstPage()): ?>
                        <button class="join-item btn btn-square btn-disabled">«</button>
                    <?php else: ?>
                        <a href="<?php echo e($productos->previousPageUrl()); ?>#tabla-productos"
                            class="join-item btn btn-square">«</a>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $productos->links()->elements[0] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $productos->currentPage()): ?>
                            <button class="join-item btn btn-square btn-active"><?php echo e($page); ?></button>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>#tabla-productos"
                                class="join-item btn btn-square"><?php echo e($page); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($productos->hasMorePages()): ?>
                        <a href="<?php echo e($productos->nextPageUrl()); ?>#tabla-productos" class="join-item btn btn-square">»</a>
                    <?php else: ?>
                        <button class="join-item btn btn-square btn-disabled">»</button>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>


    </div>

    <!-- Historial de Actividad -->
    <?php if (isset($component)) { $__componentOriginalc35721803532c0b24842d1611866219b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35721803532c0b24842d1611866219b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.historial-actividad','data' => ['model' => $equipo,'limit' => 10]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('historial-actividad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($equipo),'limit' => 10]); ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\equipos\show.blade.php ENDPATH**/ ?>