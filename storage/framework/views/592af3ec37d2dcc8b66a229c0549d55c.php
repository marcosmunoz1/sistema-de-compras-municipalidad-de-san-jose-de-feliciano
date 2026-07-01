<?php $__env->startSection('title', 'Crear Vehículo'); ?> 
<?php $__env->startSection('content'); ?>
    <!-- Título -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Crear Vehículo</h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="<?php echo e(route('admin.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Crear Vehículo
                </span>
            </li>
        </ul>
    </div>

    <!-- Formulario -->
    <form action="<?php echo e(route('vehiculos.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?php echo csrf_field(); ?>
        <!-- Alert informativo -->
        <div role="alert" class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>La catalogación se generará automáticamente según el área seleccionada (ej: SG-001, OP-002)</span>
        </div>
        <!-- =========================== -->
        <!-- CARD — DATOS DEL VEHÍCULO -->
        <!-- =========================== -->
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Datos del Vehículo</h4>
                <p class="text-muted-foreground">Información general del vehículo</p>
            </div>

            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">

                <!-- GRID GENERAL: CAMPOS IZQUIERDA — IMAGEN DERECHA -->
                <div class="grid grid-cols-3 gap-6">

                    <!-- ======================= -->
                    <!-- COLUMNA IZQUIERDA -->
                    <!-- ======================= -->
                    <div class="col-span-2 space-y-4">

                        <div class="grid grid-cols-3 gap-4">
                            <!-- Tipo -->
                            <div class="space-y-2">
                                <label for="tipo" class="text-sm font-medium">Tipo <span
                                        class="text-red-600">*</span></label>

                                <select id="tipo" name="tipo"
                                    class="select select-bordered w-full h-10 w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required>
                                    <option value="" disabled selected>Seleccione un tipo...</option>

                                    <?php
                                        $tipos = ['Auto', 'Moto', 'Camioneta', 'Camión', 'Acoplado', 'Especial'];
                                    ?>

                                    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tipo); ?>"><?php echo e($tipo); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['tipo'];
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
                            <!-- Área -->
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">Área <span class="text-error">*</span></span>
                                </label>
                                <select name="area_id" 
                                        class="select select-bordered w-full w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required>
                                    <option disabled selected value="">Seleccionar área</option>
                                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($area->id); ?>" <?php echo e(old('area_id') == $area->id ? 'selected' : ''); ?>>
                                            <?php echo e($area->nombre); ?> (<?php echo e($area->prefijo_catalogacion); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label class="label">
                                        <span class="label-text-alt text-error"><?php echo e($message); ?></span>
                                    </label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <!-- Patente -->
                            <div class="space-y-2">
                                <label for="patente" class="text-sm font-medium">Patente <span
                                        class="text-red-600">*</span></label>
                                <input id="patente" name="patente" value="<?php echo e(old('patente')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                   px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                   focus:border-primary transition <?php $__errorArgs = ['patente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="ABC123 o AA123BB" required />
                                <?php $__errorArgs = ['patente'];
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

                        <div class="grid grid-cols-3 gap-4">
                            <!-- Marca -->
                            <div class="space-y-2">
                                <label for="marca" class="text-sm font-medium">Marca <span
                                        class="text-red-600">*</span></label>
                                <input id="marca" name="marca" value="<?php echo e(old('marca')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['patente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Marca..." required />
                                <?php $__errorArgs = ['marca'];
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

                            <!-- Modelo -->
                            <div class="space-y-2">
                                <label for="modelo" class="text-sm font-medium">Modelo <span
                                        class="text-red-600">*</span></label>
                                <input id="modelo" name="modelo" value="<?php echo e(old('modelo')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Modelo..." required />
                                <?php $__errorArgs = ['modelo'];
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

                            <!-- Año -->
                            <div class="space-y-2">
                                <label for="anio" class="text-sm font-medium">Año <span
                                        class="text-red-600">*</span></label>
                                <input id="anio" name="anio" type="number" min="1900"
                                    max="<?php echo e(date('Y')); ?>" value="<?php echo e(old('anio')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['anio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Año..." required />
                                <?php $__errorArgs = ['anio'];
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

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Color -->
                            <div class="space-y-2">
                                <label for="color" class="text-sm font-medium">Color (Opcional)</label>
                                <input id="color" name="color" value="<?php echo e(old('color')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Color..." />
                                <?php $__errorArgs = ['color'];
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

                            <!-- Motor -->
                            <div class="space-y-2">
                                <label for="motor" class="text-sm font-medium">N° de Motor (Opcional)</label>
                                <input id="motor" name="motor" value="<?php echo e(old('motor')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['motor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Número de Motor..." required />
                                <?php $__errorArgs = ['motor'];
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

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Chasis -->
                            <div class="space-y-2">
                                <label for="chasis" class="text-sm font-medium">N° de Chasis (Opcional)</label>
                                <input id="chasis" name="chasis" value="<?php echo e(old('chasis')); ?>"
                                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm 
                                      focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['chasis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Número de Chasis..." required />
                                <?php $__errorArgs = ['chasis'];
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

                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text font-medium">Tipo de combustible <span class="text-error">*</span></span>
                                </label>
                                <select name="tipo_combustible_id" 
                                        class="select select-bordered w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm
                                        focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition <?php $__errorArgs = ['tipo_combustible_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required>
                                    <option disabled selected value="">Seleccionar tipo de combustible</option>
                                    <?php $__currentLoopData = $tiposCombustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoCombustible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tipoCombustible->id); ?>" <?php echo e(old('tipo_combustible_id') == $tipoCombustible->id ? 'selected' : ''); ?>>
                                            <?php echo e($tipoCombustible->nombre); ?> 
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['tipo_combustible_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label class="label">
                                        <span class="label-text-alt text-error"><?php echo e($message); ?></span>
                                    </label>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                    </div>

                    <!-- ======================= -->
                    <!-- COLUMNA DERECHA — IMAGEN -->
                    <!-- ======================= -->
                    <div class="col-span-1">
                        <label for="imagen" class="text-sm font-medium">Imagen del Vehículo (Opcional)</label>

                        <!-- INPUT FILE -->
                        <input id="imagen" name="imagen" type="file"
                            class="file-input file-input-bordered w-full mt-2 <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />

                        <!-- PREVIEW -->
                        <div id="preview-container"
                            class="w-full h-55 mt-4 border border-base-300 bg-base-200 rounded-md flex items-center justify-center overflow-hidden">
                            <!-- Aquí se mostrará la vista previa -->
                            <span class="text-gray-500 text-sm">Vista previa</span>
                        </div>
                        <?php $__errorArgs = ['imagen'];
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



        <!-- ========================= -->
        <!-- BOTONES -->
        <!-- ========================= -->
        <div class="flex justify-end pt-4">
            <a href="<?php echo e(route('vehiculos.index')); ?>" class="btn btn-warning mr-2">
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

            <button type="submit" class="btn btn-primary">
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
                Guardar Vehículo
            </button>
        </div>

    </form>
    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Secretaría de Gobierno</div>
                <div class="stat-value text-primary text-2xl">SG-</div>
                <div class="stat-desc">Prefijo de catalogación</div>
            </div>
        </div>
        
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Obras Públicas</div>
                <div class="stat-value text-secondary text-2xl">OP-</div>
                <div class="stat-desc">Prefijo de catalogación</div>
            </div>
        </div>
        
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Desarrollo Humano</div>
                <div class="stat-value text-accent text-2xl">DH-</div>
                <div class="stat-desc">Prefijo de catalogación</div>
            </div>
        </div>
        
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-title">Servicios Públicos</div>
                <div class="stat-value text-info text-2xl">SP-</div>
                <div class="stat-desc">Prefijo de catalogación</div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview-container');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    preview.innerHTML =
                        `<img src="${evt.target.result}" class="h-full w-full object-cover rounded-md">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `<span class="text-gray-500 text-sm">Vista previa</span>`;
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistema-municipal\resources\views\admin\vehiculos\create.blade.php ENDPATH**/ ?>