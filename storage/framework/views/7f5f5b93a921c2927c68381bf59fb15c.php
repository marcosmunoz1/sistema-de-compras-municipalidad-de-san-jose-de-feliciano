<?php $__env->startSection('title', 'Ver Vehículo'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Título -->
    <div class="flex items-start justify-between mb-6">

        <!-- Título + badge -->
        <div>
            <h1 class="text-2xl font-semibold">Información del Vehículo:
                <?php echo e($vehiculo->marca . ' ' . $vehiculo->modelo . ' ' . $vehiculo->anio); ?></h1>

            <?php if($vehiculo->estado): ?>
                <span class="badge badge-success gap-2 px-3 py-2 mt-1">Activo</span>
            <?php else: ?>
                <span class="badge badge-error gap-2 px-3 py-2 mt-1">Inactivo</span>
            <?php endif; ?>
        </div>

        <!-- Botones -->
        <div class="flex gap-2">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehiculos-index')): ?>
                <a href="<?php echo e(route('vehiculos.index')); ?>"
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
                    Volver a Vehículos
                </a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehiculos-edit')): ?>
                <a href="<?php echo e(route('vehiculos.edit', $vehiculo->id)); ?>"
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
                    Editar Vehículo
                </a>
            <?php endif; ?>
        </div>

    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Home
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('vehiculos.index')); ?>">
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
                    Vehículos
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
                    Ver Vehículo
                </span>
            </li>
        </ul>
    </div>

    <!-- =========================== -->
    <!-- CARD — DATOS DEL VEHÍCULO -->
    <!-- =========================== -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Datos del Vehículo</h4><br>
            <p class="text-muted-foreground">Información general del vehículo</p>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">

            <!-- GRID GENERAL: CAMPOS IZQUIERDA — IMAGEN DERECHA -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- ======================= -->
                <!-- COLUMNA IZQUIERDA -->
                <!-- ======================= -->
                <div class="col-span-1 lg:col-span-2 space-y-4">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Tipo -->
                        <div class="space-y-2">
                            <label for="tipo" class="text-sm font-medium">Tipo</label>
                            <select id="tipo" name="tipo" class="select select-bordered w-full h-10" disabled>
                                <?php
                                    $tipos = [
                                        'AUTO',
                                        'MOTO',
                                        'CAMIONETA',
                                        'CAMION',
                                        'ACOPLADO',
                                        'Especial',
                                        'COLECTIVO',
                                        'MINI BUS',
                                        'RETRO ESCAVADORA',
                                        'TRACTOR',
                                        'UTILITARIO',
                                    ];
                                ?>

                                <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipo); ?>" <?php echo e($vehiculo->tipo === $tipo ? 'selected' : ''); ?>>
                                        <?php echo e($tipo); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
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
unset($__errorArgs, $__bag); ?>" disabled>
                                <option disabled value="">Seleccionar área</option>

                                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($area->id); ?>"
                                        <?php echo e(old('area_id', $vehiculo->area_id) == $area->id ? 'selected' : ''); ?>>
                                        <?php echo e($area->nombre); ?> (<?php echo e($area->prefijo_catalogacion); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Patente -->
                        <div class="space-y-2">
                            <label for="patente" class="text-sm font-medium">Patente</label>
                            <input id="patente" name="patente" value="<?php echo e($vehiculo->patente); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                   px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                   focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Marca -->
                        <div class="space-y-2">
                            <label for="marca" class="text-sm font-medium">Marca</label>
                            <input id="marca" name="marca" value="<?php echo e($vehiculo->marca); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Modelo -->
                        <div class="space-y-2">
                            <label for="modelo" class="text-sm font-medium">Modelo</label>
                            <input id="modelo" name="modelo" value="<?php echo e($vehiculo->modelo); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Año -->
                        <div class="space-y-2">
                            <label for="anio" class="text-sm font-medium">Año</label>
                            <input id="anio" name="anio" type="number" min="1900" max="<?php echo e(date('Y')); ?>"
                                value="<?php echo e($vehiculo->anio); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                    focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Color -->
                        <div class="space-y-2">
                            <label for="color" class="text-sm font-medium">Color</label>
                            <input id="color" name="color" value="<?php echo e($vehiculo->color); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Motor -->
                        <div class="space-y-2">
                            <label for="motor" class="text-sm font-medium">N° de Motor</label>
                            <input id="motor" name="motor" value="<?php echo e($vehiculo->motor); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Catalogacion -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Catalogación</span>
                            </label>
                            <input type="text" name="catalogacion" value="<?php echo e($vehiculo->catalogacion); ?>"
                                placeholder="Ej: HP, Dell, Lenovo, Samsung"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                readonly>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Chasis -->
                        <div class="space-y-2">
                            <label for="chasis" class="text-sm font-medium">N° de Chasis</label>
                            <input id="chasis" name="chasis" value="<?php echo e($vehiculo->chasis); ?>"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                                disabled />
                        </div>

                        <!-- Tipo de combustible -->
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text font-medium">
                                    Tipo de combustible
                                </span>
                            </label>

                            <select name="tipo_combustible_id"
                                class="select select-bordered w-full <?php $__errorArgs = ['tipo_combustible_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                disabled>

                                <option disabled value="">Seleccionar tipo de combustible</option>

                                <?php $__currentLoopData = $tiposCombustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoCombustible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoCombustible->id); ?>"
                                        <?php echo e(old('tipo_combustible_id', $vehiculo->tipo_combustible_id) == $tipoCombustible->id ? 'selected' : ''); ?>>
                                        <?php echo e($tipoCombustible->nombre); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                    </div>

                </div>

                <!-- ======================= -->
                <!-- COLUMNA DERECHA — IMAGEN -->
                <!-- ======================= -->
                <div id="preview-container"
                    class="w-full h-72 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">

                    <?php if($vehiculo->imagen): ?>
                        <img src="<?php echo e(asset('storage/' . $vehiculo->imagen)); ?>" alt="Imagen del vehículo"
                            id="preview-image" class="max-h-full object-cover">
                    <?php else: ?>
                        <span class="text-gray-500 text-sm">Sin imagen</span>
                    <?php endif; ?>

                </div>


            </div>

        </div>
    </div>
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4" id="tabla-productos">
        <h1 class="text-2xl font-semibold">Detalles de productos asignados al vehiculo</h1><br>
        <form method="GET" action="<?php echo e(route('vehiculos.show', $vehiculo->id)); ?>#tabla-productos">
            <input type="text" name="search" value="<?php echo e($search); ?>" class="input input-bordered"
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
                <a href="<?php echo e(route('vehiculos.show', $vehiculo->id)); ?>#tabla-productos" class="btn btn-error">
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
        <table class="table table-zebra w-full table-responsive">
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
                                    'from' => 'vehiculo',
                                    'vehiculo_id' => $vehiculo->id,
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.historial-actividad','data' => ['model' => $vehiculo,'limit' => 10]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('historial-actividad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vehiculo),'limit' => 10]); ?>
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
        document.addEventListener('DOMContentLoaded', () => {

            // Parseador robusto de moneda que soporta formatos con . y , (es-AR y en-US)
            function parseCurrency(str) {
                if (!str) return NaN;

                // quitar todo menos dígitos, puntos y comas
                str = String(str).replace(/[^\d\.,-]/g, '').trim();

                if (str === '') return NaN;

                const hasDot = str.indexOf('.') !== -1;
                const hasComma = str.indexOf(',') !== -1;

                // Si tiene ambos, asumimos que el separador decimal es el que aparece más a la derecha
                if (hasDot && hasComma) {
                    if (str.lastIndexOf(',') > str.lastIndexOf('.')) {
                        // formato tipo 1.234.567,89 -> eliminar puntos y cambiar coma por punto
                        str = str.replace(/\./g, '').replace(/,/g, '.');
                    } else {
                        // formato tipo 1,234,567.89 -> eliminar comas
                        str = str.replace(/,/g, '');
                    }
                } else if (hasComma && !hasDot) {
                    // solo coma: puede ser 1000,50 (decimal) o 1,000 (miles). Si hay más de 1 coma, son miles.
                    const commas = (str.match(/,/g) || []).length;
                    if (commas > 1) {
                        str = str.replace(/,/g, ''); // 1,000,000 -> 1000000
                    } else {
                        // 1000,50 -> 1000.50
                        str = str.replace(/,/g, '.');
                    }
                } else if (hasDot && !hasComma) {
                    // solo punto: similar a arriba (puede ser miles o decimal)
                    const dots = (str.match(/\./g) || []).length;
                    if (dots > 1) {
                        str = str.replace(/\./g, ''); // 1.000.000 -> 1000000
                    } // si solo 1 punto, lo dejamos como decimal
                }

                // Ahora parseamos
                const num = parseFloat(str);
                return isNaN(num) ? NaN : num;
            }

            let total = 0;

            document.querySelectorAll('.item-producto').forEach(row => {

                const precioText = row.querySelector('.precio').textContent || '';
                const cantidadText = row.querySelector('.cantidad').textContent || '';

                const precioUnitario = parseCurrency(precioText);
                const cantidad = parseFloat(
                    String(cantidadText).replace(/\s+/g, '').replace(',', '.')
                );

                if (!isNaN(precioUnitario) && !isNaN(cantidad)) {
                    const subtotal = precioUnitario * cantidad;
                    total += subtotal;

                    // mostrar subtotal con formateo es-AR
                    row.querySelector('.subtotal').textContent =
                        '$' + subtotal.toLocaleString('es-AR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                    // opcional: si querés también mostrar el precio unitario formateado
                    // row.querySelector('.precio').textContent =
                    //     '$' + precioUnitario.toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                } else {
                    row.querySelector('.subtotal').textContent = '-';
                }
            });

            const totalEl = document.getElementById('totalFinal');
            if (totalEl) {
                totalEl.textContent = '$' + total.toLocaleString('es-AR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\vehiculos\show.blade.php ENDPATH**/ ?>