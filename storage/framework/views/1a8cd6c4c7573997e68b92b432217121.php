 
<?php $__env->startSection('title', 'Editar orden de combustible'); ?> 

<?php $__env->startSection('content'); ?> 
<!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Edición de Orden de Combustible</h1> 
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
      <a href="<?php echo e(route('combustibles.index')); ?>">
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
        Combustibles
      </a>
    </li>
    <li>
      <span class="inline-flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        Editar Orden de Combustible 
      </span>
    </li>
  </ul>
</div>
<!-- Formulario --> 
<form action="<?php echo e(route('combustibles.update',$combustible->id)); ?>" method="POST" class="space-y-6">
    <?php echo csrf_field(); ?>  
    <?php echo method_field('PUT'); ?> 
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        
        <!-- HEADER -->
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
            gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Información de la Orden de Carga</h4>
            <p class="text-muted-foreground">Autorización para carga de combustible</p>
        </div>

        <!-- CONTENT -->
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <!-- FILA 3 INPUTS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- Código -->
                    <div class="space-y-2">
                        <label for="codigo" class="text-sm font-medium">Código de Orden<span class="text-red-600">*</span></label>
                        <input 
                            id="codigo"
                            name="codigo"
                            placeholder="Ejemplo: OCB-001..."
                            value="<?php echo e($combustible->codigo, old('codigo')); ?>"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['codigo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                            <?php $__errorArgs = ['codigo'];
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

                    <!-- Fecha -->
                    <div class="space-y-2">
                        <label for="fecha" class="text-sm font-medium">Fecha de Emisión<span class="text-red-600">*</span></label>
                        <input 
                            type="date"
                            id="fecha"
                            name="fecha"
                            value="<?php echo e($combustible->fecha, old('fecha')); ?>" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['fecha'];
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

                    <!-- Usuario -->
                    <div class="space-y-2">
                        <label for="user_id" class="text-sm font-medium">Usuario que Autoriza<span class="text-red-600">*</span></label>

                        <select 
                            id="user_id"
                            name="user_id"
                            class="select w-full h-10 rounded-md border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required> 
                            <option value="">Seleccione un usuario</option>   
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <option value="<?php echo e($usuario->id); ?>"
                                <?php echo e(old('user_id', $combustible->user_id ?? '') == $usuario->id ? 'selected' : ''); ?>> 
                                    <?php echo e($usuario->name); ?> - <?php echo e($usuario->roles->pluck('name')->join(', ')); ?></option>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>
                        <?php $__errorArgs = ['user_id'];
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

    <!-- CARD DE DATOS DE VEHÍCULO Y CONDUCTOR -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4"> 


    <!-- HEADER -->
    <div data-slot="card-header"
    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start
    gap-1.5 px-6 pt-6">
    <h4 class="text-1xl font-semibold">Datos del Vehículo y Conductor</h4>
    <p class="text-muted-foreground">Información del vehículo a cargar combustible</p>
    </div>


    <!-- CONTENT -->
    <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
    <div class="grid gap-4">


    <!-- FILA SELECT VEHÍCULO & SELECT CHOFER -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


    <!-- Select Vehículo -->
    <div class="space-y-2">
    <label for="vehiculo_id" class="text-sm font-medium">Vehículo<span class="text-red-600">*</span></label>
    <select id="vehiculo_id" name="vehiculo_id"
        class="w-full h-10 rounded-md border border-base-300 bg-base-200
        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
        focus:border-primary transition <?php $__errorArgs = ['vehiculo_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
        <option value="">Seleccione un vehículo</option>
        <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <option value="<?php echo e($vehiculo->id); ?>" 
            <?php echo e(old('vehiculo_id', $combustible->vehiculo_id ?? '') == $vehiculo->id ? 'selected' : ''); ?>

            data-marca="<?php echo e($vehiculo->marca); ?>"
            data-modelo="<?php echo e($vehiculo->modelo); ?>"
            data-tipo="<?php echo e($vehiculo->tipo); ?>" 
            data-combustible="<?php echo e($vehiculo->tipo_combustible); ?>" 
            data-ultima="<?php echo e($vehiculo->created_at); ?>">
            Patente: <?php echo e($vehiculo->patente); ?> 
            - Marca: <?php echo e($vehiculo->marca); ?>  
            - Modelo: <?php echo e($vehiculo->modelo); ?></option> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['vehiculo_id'];
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


    <!-- Select Conductor / Chofer -->
    <div class="space-y-2">
    <label for="empleado_id" class="text-sm font-medium">Conductor / Chofer<span class="text-red-600">*</span></label>
    <select
    id="empleado_id"
    name="empleado_id"
    class="w-full h-10 rounded-md border border-base-300 bg-base-200
    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
    focus:border-primary transition <?php $__errorArgs = ['empleado_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
    <option selected>Seleccione un conductor</option>
    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <option value="<?php echo e($empleado->id); ?>"
        <?php echo e(old('empleado_id', $combustible->empleado_id ?? '') == $empleado->id ? 'selected' : ''); ?>

        >Nombre: <?php echo e($empleado->nombre); ?> - DNI: <?php echo e($empleado->dni); ?></option>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


    </div>


    </div>

    <!-- CARD DATOS DEL VEHÍCULO OCULTO  -->  
    <div id="vehiculo_info" class="hidden p-4 card bg-base-100 shadow-xl mt-6"> 
        <div class="flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                stroke-linejoin="round" class="lucide lucide-fuel w-5 h-5">
                <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                <path d="M2 21h13"></path>
                <path d="M3 9h11"></path>
            </svg>
            <span class="font-medium">Información del Vehículo</span>
        </div>

        <div class="grid grid-cols-3 gap-4 text-sm">
            <div>
                <span class="text-muted-foreground">Marca/Modelo:</span>
                <p class="font-medium" id="v_marca_modelo"></p>
            </div>
            <div>
                <span class="text-muted-foreground">Tipo:</span>
                <p class="font-medium" id="v_tipo"></p>
            </div>
             
            <div>
                <span class="text-muted-foreground">Combustible:</span>
                <span id="v_tipo_combustible" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium 
                            w-fit whitespace-nowrap shrink-0 mt-1 bg-secondary text-secondary-foreground">
                </span>
            </div>
            <div>
                <span class="text-muted-foreground">Última Carga:</span>
                <p id="v_ultima_carga" class="font-medium"> (42L)</p> 
            </div>
             
        </div>
    </div>

    </div>

    </div>
    <!-- FIN DE CARD DE DATOS DE VEHICULO Y CONDUCTOR -->
    <!-- DETALLES DE LA CARGA AUTORIZADA -->  
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4"> 

        <!-- HEADER -->
        <div data-slot="card-header"
            class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
            gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Detalles de la Carga Autorizada</h4>
            <p class="text-muted-foreground">Especificaciones de la carga de combustible</p>
        </div>

        <!-- CONTENT -->
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <!-- FILA: 3 COLUMNAS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- Tipo Combustible -->
                    <div class="space-y-2">
                        <label for="combustible" class="text-sm font-medium">Tipo de Combustible<span class="text-red-600">*</span></label>
                        <select id="combustible" name="combustible"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                            focus:border-primary <?php $__errorArgs = ['combustible'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $tipo_combustible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combustible_tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($combustible_tipo->nombre); ?>"  
                                <?php echo e(old('tipo', $combustible->tipo) == $combustible_tipo->nombre ? 'selected' : ''); ?>> 
                                <?php echo e($combustible_tipo->nombre); ?></option>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                        <?php $__errorArgs = ['combustible'];
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

                    <!-- Litros Estimados -->
                    <div class="space-y-2">
                        <label for="litros" class="text-sm font-medium">Litros Estimados <span class="text-red-600">*</span></label>
                        <input type="number" value="<?php echo e(old('litros',$combustible->litros)); ?>" id="litros" min="0" max="1000" name="litros" placeholder="0"
                            step="0.01"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                            focus:border-primary <?php $__errorArgs = ['litros'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                        <p class="text-xs text-gray-500">Dejar vacío para carga completa</p>
                        <?php $__errorArgs = ['litros'];
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

                    <!-- Monto Máximo -->
                    <div class="space-y-2"> 
                        <label for="precio" class="text-sm font-medium">Precio del combustible<span class="text-red-600">*</span></label>
                        <input type="number" value="<?php echo e(old('precio',$combustible->precio)); ?>" id="precio" min="0" name="precio"
                            placeholder="0" step="0.01"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                            focus:border-primary <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                        <?php $__errorArgs = ['precio'];
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

                <!-- FILA: 2 SELECT -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Estación sugerida -->
                    <div class="space-y-2">
                        <label for="estacion" class="text-sm font-medium">
                            Estación Sugerida <span class="text-red-600">*</span>
                        </label>
                        <select id="estacion" name="estacion" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                            focus:border-primary <?php $__errorArgs = ['estacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition"
                            required> 
                            <option  value="YPF Ruta 14"  <?php echo e(old('estacion', $combustible->estacion) == 'YPF Ruta 14' ? 'selected' : ''); ?>>YPF Ruta 14</option>
                            <option value="SHELL Centro"
                                <?php echo e(old('estacion', $combustible->estacion) == 'SHELL Centro' ? 'selected' : ''); ?>>
                                SHELL Centro
                            </option>

                            <option value="AXION Norte"
                                <?php echo e(old('estacion', $combustible->estacion) == 'AXION Norte' ? 'selected' : ''); ?>>
                                AXION Norte
                            </option>
                        </select>
                        <?php $__errorArgs = ['estacion'];
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

                    <!-- Tipo de Pago -->
                    <div class="space-y-2">
                        <label for="tipo_de_pago" class="text-sm font-medium">Tipo de Pago Autorizado<span class="text-red-600">*</span></label>
                        <select id="tipo_de_pago" name="tipo_de_pago"
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                            focus:border-primary <?php $__errorArgs = ['tipo_de_pago'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                            <option value="contado"
                            <?php echo e(old('tipo_de_pago', $combustible->tipo_de_pago) == 'contado' ? 'selected' : ''); ?>>Pago en efectivo</option> 
                            <option value="cuenta_corriente"
                            <?php echo e(old('tipo_de_pago', $combustible->tipo_de_pago) == 'cuenta_corriente' ? 'selected' : ''); ?>>Cuenta corriente</option> 
                        </select>
                        <?php $__errorArgs = ['tipo_de_pago'];
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

            

                <!-- OBSERVACIONES -->
                <div class="space-y-2">
                    <label for="observaciones" class="text-sm font-medium">
                        Observaciones / Instrucciones Especiales(Opcional) 
                    </label>
                    <textarea id="observaciones" name="observaciones" value="<?php echo e(old('observaciones',$combustible->observaciones)); ?>" rows="3"
                        placeholder="Ingrese observaciones o instrucciones..."
                        class="w-full rounded-md border border-base-300 bg-base-200
                        px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                        focus:border-primary transition resize-none"></textarea>
                </div>
                
            </div>
        </div> 
    </div>
    <!-- FIN DE DETALLES DE LA CARGA AUTORIZADA -->
    <!-- ========================= -->
        <!-- BOTONES DEL FORMULARIO -->
        <!-- ========================= -->
        <div class="flex justify-end pt-4">
            <a href="<?php echo e(route('combustibles.index')); ?>" class="btn btn-warning mr-2"> 
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
                Actualizar Carga De Combustible 
            </button> 
        </div>
</form> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> 
     $(document).ready(function () { 

        function actualizarDatosVehiculo() {
            var selected = $('#vehiculo_id option:selected');
            var id = selected.val();

            if (!id) { 
                $('#vehiculo_info').addClass('hidden');
                return;
            }

            // Mostrar card
            $('#vehiculo_info').removeClass('hidden');

            // Cargar datos reales
            $('#v_marca_modelo').text(selected.data('marca') + " " + selected.data('modelo'));
            $('#v_tipo').text(selected.data('tipo'));
            $('#v_tipo_combustible').text(selected.data('combustible'));
            $('#v_ultima_carga').text(selected.data('ultima')); 
        }

        $('#vehiculo_id').change(actualizarDatosVehiculo);

        actualizarDatosVehiculo(); // por si ya viene seleccionado
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\combustibles\edit.blade.php ENDPATH**/ ?>