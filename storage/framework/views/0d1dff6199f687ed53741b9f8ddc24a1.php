<?php $__env->startSection('title', 'Nueva orden de combustible'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Creación de Orden de Combustible</h1>
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
                <a href="<?php echo e(route('combustibles.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel w-5 h-5" aria-hidden="true">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                    Combustibles
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Crear Orden de Combustible
                </span>
            </li>
        </ul>
    </div>
    <!-- Formulario -->
    <form action="<?php echo e(route('combustibles.store')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

            <!-- HEADER -->
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
                 gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Información de la Orden de Carga</h4>
            </div>

            <!-- CONTENT -->
            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                <div class="grid gap-4">

                    <!-- FILA 3 INPUTS -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Código -->
                        <!-- Fecha -->
                        <div class="space-y-2">
                            <label for="fecha" class="text-sm font-medium">Fecha de Emisión<span
                                    class="text-red-600">*</span></label>
                            <input type="date" id="fecha" name="fecha" value="<?php echo e(old('fecha', date('Y-m-d'))); ?>" class="w-full h-10 rounded-md border border-base-300 bg-base-200
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
                            <label for="sub_cuenta" class="text-sm font-medium">Sub cuenta<span
                                    class="text-red-600">*</span></label>
                            <div x-data="selectSearch({
                                        options: <?php echo \Illuminate\Support\Js::from([
                                            ['value' => 'Secretaria de obras publicas', 'label' => 'Secretaria de Obras Publicas'],
                                            ['value' => 'Secretaria de desarrollos humanos', 'label' => 'Secretaria de Desarrollo Humano'],
                                            ['value' => 'Secretaria de gobierno', 'label' => 'Secretaria de Gobierno'],
                                            ['value' => 'Departamento ejecutivo municipal', 'label' => 'Departamento Ejecutivo Municipal'],
                                        ])->toHtml() ?>,
                                        placeholder: 'Seleccione la sub cuenta',
                                        value: <?php echo \Illuminate\Support\Js::from(old('sub_cuenta'))->toHtml() ?>
                                    })" x-init="init()" class="relative w-full">
                                <button type="button" @click="open = !open"
                                    class="select w-full h-10 rounded-md border-base-300 bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition flex items-center justify-between <?php $__errorArgs = ['sub_cuenta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <span x-text="selected?.label ?? placeholder" class="truncate"></span>
                                </button>

                                <div x-show="open" x-transition @click.outside="open = false"
                                    class="absolute z-50 mt-1 w-full bg-base-100 border border-base-300 rounded-md shadow">
                                    <input type="text" x-model="search"
                                        class="input w-full border-0 border-b border-base-300 bg-base-200 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                                        placeholder="Buscar...">

                                    <ul class="max-h-60 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="select(option)"
                                                class="px-3 py-2 cursor-pointer hover:bg-primary hover:text-primary-content"
                                                x-text="option.label"></li>
                                        </template>

                                        <li x-show="filtered.length === 0" class="px-3 py-2 opacity-50">
                                            Sin resultados
                                        </li>
                                    </ul>
                                </div>

                                <select id="sub_cuenta" name="sub_cuenta" class="hidden" x-model="selectedValue" required>
                                    <option value="">Seleccione la sub cuenta</option>
                                    <option value="Secretaria de obras publicas" <?php if(old('sub_cuenta') == 'Secretaria de obras publicas'): echo 'selected'; endif; ?>>Secretaria de Obras Publicas</option>
                                    <option value="Secretaria de desarrollos humanos"
                                        <?php if(old('sub_cuenta') == 'Secretaria de desarrollos humanos'): echo 'selected'; endif; ?>>Secretaria de
                                        Desarrollo Humano</option>
                                    <option value="Secretaria de gobierno" <?php if(old('sub_cuenta') == 'Secretaria de gobierno'): echo 'selected'; endif; ?>>Secretaria de Gobierno</option>
                                    <option value="Departamento ejecutivo municipal"
                                        <?php if(old('sub_cuenta') == 'Departamento ejecutivo municipal'): echo 'selected'; endif; ?>>Departamento
                                        Ejecutivo Municipal</option>
                                </select>
                            </div>
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

        <!-- CARD DE DATOS DE VEHÍCULO Y CONDUCTOR -->
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">


            <!-- HEADER -->
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start
            gap-1.5 px-6 pt-6">
                <div class="flex items-center justify-between w-full mb-6">
                    <h4 class="text-1xl font-semibold">Datos del Destino de la carga</h4>

                    
                    <label for="crear_destino_modal" class="btn btn-sm btn-success">
                        + Nuevo destino
                    </label>
                </div>
            </div>

            <!-- CONTENT -->
            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                <div class="grid gap-4">

                    <!-- FILA SELECT VEHÍCULO & SELECT CHOFER -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2 mb-2">
                            <label for="destino_tipo" class="text-sm font-medium">Tipo de destino <span
                                    class="text-red-600">*</span></label>
                            <select id="destino_tipo" name="destino_tipo" class="select w-full h-10 rounded-md border-base-300 bg-base-200
                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                focus:border-primary transition <?php $__errorArgs = ['destino_tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">Seleccione el destino de la carga</option>
                                <option value="vehiculo">Vehiculo</option>
                                <option value="equipo">Equipo</option>
                                <option value="destino">Otros (Acuerdo policial, Área de obras públicas, Personas)</option>
                            </select>
                            <?php $__errorArgs = ['destino_tipo'];
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
                        <div id="btn_elegir_destino" class="space-y-2 -mt-4">
                            <div class="flex items-center justify-between gap-4">
                                <label class="text-sm font-medium mb-0">Destinar a: <span
                                        class="text-red-600">*</span></label>
                                <button type="button" id="btn_elegir_destino" class="btn btn-sm btn-warning"
                                    onclick="document.getElementById('modal_elegir_destino').checked = true">
                                    Buscar / seleccionar destino
                                </button>
                            </div>

                            
                            <input type="hidden" id="destino_id" name="destino_id" value="<?php echo e(old('destino_id')); ?>">

                            
                            <input type="text" id="destino_nombre_visble"
                                class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm cursor-pointer"
                                placeholder="Ningún destino seleccionado" readonly>

                            <?php $__errorArgs = ['destino_id'];
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
                        <input type="checkbox" id="modal_elegir_destino" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box max-w-4xl">
                                <h3 class="font-bold text-lg mb-4" id="titulo_modal_destinos">
                                    Seleccionar destino
                                </h3>
                                <input type="text" id="buscador_destinos" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                                focus:border-primary transition" placeholder="Buscar por nombre, patente, etc.">

                                <div class="overflow-x-auto">
                                    <table class="table table-zebra w-full text-sm">
                                        <thead>
                                            <tr id="tabla_destinos_head">
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_destinos_body">
                                            
                                        </tbody>
                                    </table>
                                    <div class="flex justify-between items-center mt-3 text-xs">
                                        <button type="button" class="btn btn-xs" id="destinos_prev_page">
                                            « Anterior
                                        </button>

                                        <span id="destinos_pagination_info" class="mx-2">
                                            
                                        </span>

                                        <button type="button" class="btn btn-xs" id="destinos_next_page">
                                            Siguiente »
                                        </button>
                                    </div>
                                </div>

                                <div class="modal-action">
                                    <label for="modal_elegir_destino" class="btn">Cerrar</label>
                                </div>
                            </div>
                            <label class="modal-backdrop" for="modal_elegir_destino">Close</label>
                        </div>
                        <!-- Select Conductor / Chofer --> 
                        <div id="empleado-card" class="space-y-2">  
                            <label for="empleado_id" class="text-sm font-medium">Empleado que efectúa la carga<span
                                    class="text-red-600">*</span></label>

                            <!-- ID oculto que se envía en el request -->
                            <input type="hidden" id="empleado_id" name="empleado_id" value="<?php echo e(old('empleado_id')); ?>">

                            <!-- Campo solo lectura mostrando el nombre elegido -->
                            <input type="text" id="empleado_nombre_visible" class="w-full h-10 rounded-md border border-base-300 bg-base-200
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary cursor-pointer transition <?php $__errorArgs = ['empleado_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Seleccione un empleado" value="" readonly>

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
                <!-- CARD DATOS DEL DESTINO OCULTO  -->
                <div id="destino_info"
                    class="hidden card bg-gradient-to-br from-base-100 to-base-200 shadow-xl mt-6 border border-base-300">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-3 mb-4 pb-3 border-b border-base-300">
                            <div id="destino_info_icono" class="p-2 rounded-lg bg-primary/10">
                                <!-- Icono dinámico -->
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg" id="destino_info_titulo">Información del Destino</h3>
                                <p class="text-xs text-muted-foreground" id="destino_info_subtitulo">Detalles del destino
                                    seleccionado</p>
                            </div>
                        </div>

                        <div id="destino_info_contenido" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Contenido dinámico generado por JavaScript -->
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- FIN DE CARD DE DATOS DE VEHICULO Y CONDUCTOR -->
        <!-- DETALLES DE LA CARGA AUTORIZADA -->
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">

            <!-- HEADER -->
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start 
                 gap-1.5 px-6 pt-6">
                <h4 class="text-1xl font-semibold">Detalles de la Carga Autorizada</h4>
                
            </div>

            <!-- CONTENT -->
            <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
                <div class="grid gap-4">

                    <!-- FILA: 3 COLUMNAS -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Tipo Combustible -->
                        <div class="space-y-2">
                            <label for="combustible" class="text-sm font-medium">Tipo de Combustible<span
                                    class="text-red-600">*</span></label>
                            <select id="combustible" name="combustible" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
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
                                    <option value="<?php echo e($combustible_tipo->nombre); ?>" data-valor="<?php echo e($combustible_tipo->valor); ?>">
                                        <?php echo e($combustible_tipo->nombre); ?>

                                    </option>
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
                            <label for="litros" class="text-sm font-medium">Litros Estimados</label>
                            <input type="text" id="litros" name="litros" placeholder="0,00" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary <?php $__errorArgs = ['litros'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition"
                                oninput="formatMoneda(this)">
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
                            <label for="precio" class="text-sm font-medium">Precio del combustible<span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="precio" name="precio" placeholder="0,00" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required readonly>
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
                            <select id="estacion" name="estacion" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary <?php $__errorArgs = ['estacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                                <option value="">Cualquier estación autorizada</option>
                                <option>YPF Feliciano</option>
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
                            <label for="tipo_de_pago" class="text-sm font-medium">Tipo de Pago Autorizado<span
                                    class="text-red-600">*</span></label>
                            <select id="tipo_de_pago" name="tipo_de_pago" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                                px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary
                                focus:border-primary <?php $__errorArgs = ['tipo_de_pago'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> transition" required>
                                <option value="">Seleccionar</option>
                                <option value="contado">Pago en efectivo</option>
                                <option value="cuenta_corriente">Cuenta corriente</option>
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
                        <textarea id="observaciones" name="observaciones" rows="3"
                            placeholder="Ingrese observaciones o instrucciones..." class="w-full rounded-md border border-base-300 bg-base-200
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
                Guardar Carga De Combustible
            </button>
        </div>
    </form>
    
    <input type="checkbox" id="crear_destino_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-4">Nuevo destino</h3>

            <form method="POST" action="<?php echo e(route('destinos.store')); ?>">
                <?php echo csrf_field(); ?>

                
                <div class="form-control mb-3">
                    <label for="nuevo_destino_nombre" class="label">
                        <span class="label-text font-medium">Nombre <span class="text-red-600">*</span></span>
                    </label>
                    <input type="text" id="nuevo_destino_nombre" name="nombre" class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 
                            text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" placeholder="Ej: Juan Pérez, Policía Local, Walter Motos"
                        required>
                </div>

            
            <div class="form-control mb-3">
                <label for="nuevo_destino_tipo" class="label">
                    <span class="label-text font-medium">Tipo <span class="text-red-600">*</span></span>
                </label>
                <select id="nuevo_destino_tipo" name="tipo"
                    class="select select-bordered w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="persona">Persona</option>
                    <option value="organismo_publico">Organismo público</option>
                    <option value="empresa">Empresa</option>
                    <option value="institucion">Institución</option>
                    <option value="policia">Policía</option>
                    <option value="varios">Varios</option>
                </select>
            </div>

                
                <div class="form-control mb-4">
                    <label for="nuevo_destino_descripcion" class="label">
                        <span class="label-text font-medium">Descripción <span class="text-red-600">*</span></span>
                    </label>
                    <textarea id="nuevo_destino_descripcion" name="descripcion" rows="3" class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition"
                        placeholder="Ej: Acuerdo policial, Apoyo operativo, Empleado municipal, etc."></textarea>
                </div>

                <div class="modal-action">
                    <label for="crear_destino_modal" class="btn">
                        Cancelar
                    </label>
                    <button type="submit" class="btn btn-primary">
                        Guardar destino
                    </button>
                </div>
            </form>
        </div>

        <label class="modal-backdrop" for="crear_destino_modal">Close</label>
    </div>

    <!-- Modal para seleccionar empleado -->
    <input type="checkbox" id="modal_elegir_empleado" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-4xl">
            <h3 class="font-bold text-lg mb-4" id="titulo_modal_empleado">
                Seleccionar empleado
            </h3>

            <input type="text" id="buscador_empleado" class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" placeholder="Buscar por nombre, DNI, email, área...">

            <div class="overflow-x-auto mt-3">
                <table class="table table-zebra w-full text-sm">
                    <thead>
                        <tr id="tabla_empleado_head">
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Área</th>
                            <th>Puesto</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_empleado_body">
                        
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-3 text-xs">
                    <button type="button" class="btn btn-xs" id="empleado_prev_page">
                        « Anterior
                    </button>

                    <span id="empleado_pagination_info" class="mx-2">
                        
                    </span>

                    <button type="button" class="btn btn-xs" id="empleado_next_page">
                        Siguiente »
                    </button>
                </div>
            </div>

            <div class="modal-action">
                <label for="modal_elegir_empleado" class="btn btn-sm btn-neutral">Cerrar</label>
            </div>
        </div>
        <label class="modal-backdrop" for="modal_elegir_empleado">Close</label>
    </div>
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
            $('#vehiculo_id').change(actualizarUltimoConsumo);

            actualizarDatosVehiculo(); // por si ya viene seleccionado

            // Actualizar precio al seleccionar combustible
            $('#combustible').change(function () {
                var selected = $(this).find('option:selected');
                var precio = selected.data('valor');
                if (precio) {
                    // Formatear precio a 1.234,56
                    var parts = parseFloat(precio).toFixed(2).split('.');
                    var formatted = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',' + parts[1];
                    $('#precio').val(formatted);
                } else {
                    $('#precio').val('');
                }
            });
        });

        function formatMoneda(input) {
            let valor = input.value.replace(/\D/g, '');
            if (valor === '') {
                input.value = '';
                return;
            }
            let rawValue = input.value.replace(/\./g, '').replace(',', '.');
            if (input.value.endsWith(',')) {
                let parts = input.value.split(',');
                if (parts.length > 2) {
                    input.value = input.value.substring(0, input.value.length - 1);
                    return;
                }
                let integerPart = parts[0].replace(/\./g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                input.value = integerPart + ',';
                return;
            }
            let parts = input.value.split(',');
            let integerPart = parts[0].replace(/\D/g, '');
            let decimalPart = parts.length > 1 ? parts[1].replace(/\D/g, '') : null;
            integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            let newValue = integerPart;
            if (decimalPart !== null) {
                newValue += ',' + decimalPart;
            }
            input.value = newValue;
        }
    </script>
    <script>
        let destinosCache = [];
        let columnasGlobal = [];
        let tipoActual = null;
        let paginaActual = 1;
        const itemsPorPagina = 5; // o 10, como prefieras

        function cargarDestinosEnTabla(tipo) {
            const tbody = document.getElementById('tabla_destinos_body');
            const thead = document.getElementById('tabla_destinos_head');
            const titulo = document.getElementById('titulo_modal_destinos');

            tipoActual = tipo;

            if (!tipo) {
                columnasGlobal = [];
                thead.innerHTML = '';
                tbody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500">Primero seleccione un tipo de destino.</td></tr>';
                return;
            }

            // Título según tipo
            if (tipo === 'vehiculo') titulo.textContent = 'Seleccionar vehículo';
            else if (tipo === 'equipo') titulo.textContent = 'Seleccionar equipo';
            else titulo.textContent = 'Seleccionar destino';

            // Definir columnas por tipo
            if (tipo === 'vehiculo') {
                columnasGlobal = [
                    { key: 'patente', label: 'Patente' },
                    { key: 'marca', label: 'Marca' },
                    { key: 'modelo', label: 'Modelo' },
                    { key: 'anio', label: 'Año' },
                    { key: 'color', label: 'Color' },
                    { key: 'tipo', label: 'Tipo' },
                    { key: 'catalogacion', label: 'Catalogación' }
                ];
            } else if (tipo === 'equipo') {
                columnasGlobal = [
                    { key: 'equipamiento', label: 'Equipamiento' },
                    { key: 'marca', label: 'Marca' },
                    { key: 'descripcion', label: 'Descripción' },
                    { key: 'area_nombre', label: 'Área' },
                    { key: 'catalogacion', label: 'Catalogación' },
                ];
            } else { // destino / otros
                columnasGlobal = [
                    { key: 'nombre', label: 'Nombre' },
                    { key: 'tipo', label: 'Tipo' },
                    { key: 'descripcion', label: 'Descripción' },
                ];
            }

            // Pintar cabecera
            thead.innerHTML = columnasGlobal.map(col => `<th>${col.label}</th>`).join('');

            tbody.innerHTML = '<tr><td class="py-4 text-center text-sm" colspan="' + columnasGlobal.length + '">Cargando...</td></tr>';

            fetch('<?php echo e(url('origen/listar')); ?>/' + tipo)
                .then(res => res.json())
                .then(data => {
                    destinosCache = data;
                    paginaActual = 1;
                    renderTablaDestinos(destinosCache);
                })
                .catch(err => {
                    console.error('Error cargando destinos:', err);
                    tbody.innerHTML = '<tr><td class="py-4 text-center text-sm text-red-500" colspan="' + columnasGlobal.length + '">Error al cargar datos</td></tr>';
                });
        }

        function renderTablaDestinos(data) {
            const tbody = document.getElementById('tabla_destinos_body');
            const info = document.getElementById('destinos_pagination_info');
            tbody.innerHTML = '';

            const total = data.length;

            if (!total) {
                tbody.innerHTML = '<tr><td class="py-4 text-center text-sm text-gray-500" colspan="' + columnasGlobal.length + '">No se encontraron destinos.</td></tr>';
                if (info) info.textContent = '0 de 0';
                return;
            }

            const totalPaginas = Math.ceil(total / itemsPorPagina)
            // asegurar que paginaActual esté en rango
            if (paginaActual > totalPaginas) paginaActual = totalPaginas;
            if (paginaActual < 1) paginaActual = 1;

            const inicio = (paginaActual - 1) * itemsPorPagina;
            const fin = inicio + itemsPorPagina;

            const pagina = data.slice(inicio, fin);


            pagina.forEach(dest => {
                const tr = document.createElement('tr');
                tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                tr.innerHTML = columnasGlobal.map(col => `<td>${dest[col.key] ?? ''}</td>`).join('');

                tr.addEventListener('click', function () {
                    // Setear valores en el formulario principal
                    document.getElementById('destino_id').value = dest.id;

                    // Texto visible amigable
                    const visibleName =
                        tipoActual === 'vehiculo'
                            ? (dest.patente
                                ? `${dest.patente} - ${dest.marca ?? ''} ${dest.modelo ?? ''}`.trim()
                                : (dest.nombre ?? 'Sin datos'))
                            : tipoActual === 'equipo'
                                ? (dest.equipamiento
                                    ? `${dest.equipamiento} - ${dest.marca ?? ''} - ${dest.descripcion ?? ''}`.trim()
                                    : 'Sin datos')
                                : (dest.nombre ?? 'Sin datos');

                    document.getElementById('destino_nombre_visble').value = visibleName;

                    // Si es un vehículo, llenar automáticamente el tipo de combustible
                    if (tipoActual === 'vehiculo' && dest.tipo_combustible_nombre) {
                        const selectCombustible = document.getElementById('combustible');
                        if (selectCombustible) {
                            // Buscar la opción que coincida con el nombre del combustible
                            const options = selectCombustible.options;
                            for (let i = 0; i < options.length; i++) {
                                if (options[i].value === dest.tipo_combustible_nombre) {
                                    selectCombustible.selectedIndex = i;
                                    // Disparar el evento change para actualizar el precio
                                    selectCombustible.dispatchEvent(new Event('change'));
                                    break;
                                }
                            }
                        }
                    }

                    // Mostrar información del destino
                    mostrarInfoDestino(dest, tipoActual);

                    document.getElementById('modal_elegir_destino').checked = false;
                });

                tbody.appendChild(tr);
            });

            if (info) {
                const desde = inicio + 1;
                const hasta = Math.min(fin, total);
                info.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
            }
        }

        // Función para mostrar información del destino
        function mostrarInfoDestino(dest, tipo) {
            const infoCard = document.getElementById('destino_info');
            const infoTitulo = document.getElementById('destino_info_titulo');
            const infoSubtitulo = document.getElementById('destino_info_subtitulo');
            const infoIcono = document.getElementById('destino_info_icono');
            const infoContenido = document.getElementById('destino_info_contenido');

            if (!dest || !tipo) {
                infoCard.classList.add('hidden');
                return;
            }

            let htmlContent = '';
            let titulo = '';
            let subtitulo = '';
            let icono = '';

            if (tipo === 'vehiculo') {
                titulo = 'Información del Vehículo';
                subtitulo = 'Datos del vehículo seleccionado para la carga';
                icono = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="text-primary">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    `;
                htmlContent = `
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Marca/Modelo</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.marca || '-'} ${dest.modelo || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <rect width="18" height="12" x="3" y="4" rx="2" ry="2"></rect>
                                    <line x1="2" x2="22" y1="20" y2="20"></line>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Patente</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.patente || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M3 3v18h18"></path>
                                    <path d="m19 9-5 5-4-4-3 3"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Tipo</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.tipo || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                    <line x1="16" x2="16" y1="2" y2="6"></line>
                                    <line x1="8" x2="8" y1="2" y2="6"></line>
                                    <line x1="3" x2="21" y1="10" y2="10"></line>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Año</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.anio || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                                    <path d="M8.5 8.5v.01"></path>
                                    <path d="M16 15.5v.01"></path>
                                    <path d="M12 12v.01"></path>
                                    <path d="M11 17v.01"></path>
                                    <path d="M7 14v.01"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Color</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.color || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                                    <path d="M2 21h13"></path>
                                    <path d="M3 9h11"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Combustible</span>
                            </div>
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-semibold bg-primary/20 text-primary border border-primary/30">
                                ${dest.tipo_combustible_nombre || '-'}
                            </span>
                        </div>
                    `;
            } else if (tipo === 'equipo') {
                titulo = 'Información del Equipo';
                subtitulo = 'Datos del equipo seleccionado para la carga';
                icono = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="text-primary">
                            <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"></path>
                            <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"></path>
                            <path d="M12 3v6"></path>
                        </svg>
                    `;
                htmlContent = `
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"></path>
                                    <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Equipamiento</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.equipamiento || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Marca</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.marca || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M4 7V4h16v3"></path>
                                    <path d="M5 20h6"></path>
                                    <path d="M13 4 8 20"></path>
                                    <path d="m15 15 5 5"></path>
                                    <path d="m20 15-5 5"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Descripción</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.descripcion || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                                    <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                                    <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                                    <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Área</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.area_nombre || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Catalogación</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.catalogacion || '-'}</p>
                        </div>
                    `;
            } else if (tipo === 'destino') {
                titulo = 'Información del Destino';
                subtitulo = 'Datos del destino seleccionado para la carga';
                icono = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                             stroke-linejoin="round" class="text-primary">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    `;
                htmlContent = `
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Nombre</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.nombre || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M3 3v18h18"></path>
                                    <path d="m19 9-5 5-4-4-3 3"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Tipo</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.tipo || '-'}</p>
                        </div>
                        <div class="bg-base-100 p-3 rounded-lg border border-base-300 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                                    <path d="M4 7V4h16v3"></path>
                                    <path d="M5 20h6"></path>
                                    <path d="M13 4 8 20"></path>
                                    <path d="m15 15 5 5"></path>
                                    <path d="m20 15-5 5"></path>
                                </svg>
                                <span class="text-xs text-muted-foreground font-medium">Descripción</span>
                            </div>
                            <p class="font-semibold text-sm">${dest.descripcion || '-'}</p>
                        </div>
                    `;
            }

            infoTitulo.textContent = titulo;
            infoSubtitulo.textContent = subtitulo;
            infoIcono.innerHTML = icono;
            infoContenido.innerHTML = htmlContent;
            infoCard.classList.remove('hidden');
        }

        // Cambio de tipo
        document.getElementById('destino_tipo').addEventListener('change', function () {
            const tipo = this.value;
            cargarDestinosEnTabla(tipo);
            document.getElementById('destino_id').value = '';
            document.getElementById('destino_nombre_visble').value = '';
            document.getElementById('buscador_destinos').value = '';
            // Ocultar la card de información al cambiar el tipo
            document.getElementById('destino_info').classList.add('hidden');
        });

        // Botón para abrir modal
        document.getElementById('btn_elegir_destino').addEventListener('click', function () {
            const tipo = document.getElementById('destino_tipo').value;
            cargarDestinosEnTabla(tipo);
        });

        // Input clickeable para abrir modal
        const destinoNombreVisible = document.getElementById('destino_nombre_visble');
        if (destinoNombreVisible) {
            destinoNombreVisible.addEventListener('click', function () {
                const tipo = document.getElementById('destino_tipo').value;
                if (tipo) {
                    cargarDestinosEnTabla(tipo);
                    document.getElementById('modal_elegir_destino').checked = true;
                }
            });
            destinoNombreVisible.addEventListener('focus', function () {
                const tipo = document.getElementById('destino_tipo').value;
                if (tipo) {
                    cargarDestinosEnTabla(tipo);
                    document.getElementById('modal_elegir_destino').checked = true;
                }
            });
        }

        // Buscador
        document.getElementById('buscador_destinos').addEventListener('input', function () {
            const term = this.value.toLowerCase();

            const filtrados = destinosCache.filter(dest => {
                const texto = Object.values(dest).join(' ').toLowerCase();
                return texto.includes(term);
            });

            renderTablaDestinos(filtrados);
        });

        document.getElementById('destinos_prev_page').addEventListener('click', function () {
            if (paginaActual > 1) {
                paginaActual--;
                renderTablaDestinos(destinosCache);
            }
        });

        document.getElementById('destinos_next_page').addEventListener('click', function () {
            const totalPaginas = Math.ceil(destinosCache.length / itemsPorPagina);
            if (paginaActual < totalPaginas) {
                paginaActual++;
                renderTablaDestinos(destinosCache);
            }
        });
    </script>
    <script>
        document.getElementById('buscador_destinos').addEventListener('input', function () {
            const term = this.value.toLowerCase();

            const filtrados = destinosCache.filter(dest => {
                // Concatenar campos relevantes a un string
                const texto = Object.values(dest).join(' ').toLowerCase();
                return texto.includes(term);
            });

            paginaActual = 1;

            renderTablaDestinos(filtrados, document.getElementById('destino_tipo').value);
        }); 
    </script>
    <!-- <script> 
        $(document).ready(function () {

            function toggleEmpleadoCard() {
                const tipo = $('#destino_tipo').val();

                if (tipo === 'vehiculo' || tipo === 'equipo') {
                    // Mostrar solo cuando el destino es vehiculo
                    $('#empleado-card').removeClass('hidden');
                } else {
                    // Ocultar para equipo / destino / vacío
                    $('#empleado-card').addClass('hidden');
                }
            }

            // Cuando cambie el select
            $('#destino_tipo').on('change', toggleEmpleadoCard);

            // Para aplicar la lógica si viene con old('destino_tipo')
            toggleEmpleadoCard();
        });
    </script> -->
    <script>
        $(document).ready(function () {
            function MostrarValorDelCombustible() {
                var selected = $('#combustible option:selected');

                $('#precio').val(selected.data('valor'));
            }
            $('#combustible').change(MostrarValorDelCombustible);
            // Para aplicar la lógica si viene con old('destino_tipo')
            MostrarValorDelCombustible();
        });
    </script>
    <script>
        // ==============================
        //  MODAL DE SELECCIÓN DE EMPLEADO
        // ==============================
        document.addEventListener("DOMContentLoaded", function () {
            const empleadosData = <?php echo json_encode($empleados, 15, 512) ?>;
            let empleadosCache = empleadosData;
            let paginaEmpleado = 1;
            const itemsPorPaginaEmpleado = 5;

            const tablaEmpleadoBody = document.getElementById('tabla_empleado_body');
            const empleadoPrev = document.getElementById('empleado_prev_page');
            const empleadoNext = document.getElementById('empleado_next_page');
            const empleadoInfo = document.getElementById('empleado_pagination_info');
            const buscadorEmpleado = document.getElementById('buscador_empleado');
            const empleadoInput = document.getElementById('empleado_id');
            const empleadoNombreVisible = document.getElementById('empleado_nombre_visible');

            function formatearCelda(valor) {
                if (valor === null || valor === undefined || valor === '') return '-';
                return String(valor);
            }

            function renderTablaEmpleado(data) {
                if (!tablaEmpleadoBody) return;

                tablaEmpleadoBody.innerHTML = '';

                const total = data.length;

                if (!total) {
                    tablaEmpleadoBody.innerHTML = `<tr><td class="py-4 text-center text-sm text-gray-500" colspan="5">No se encontraron empleados.</td></tr>`;
                    if (empleadoInfo) empleadoInfo.textContent = '0 de 0';
                    return;
                }

                const totalPaginas = Math.ceil(total / itemsPorPaginaEmpleado);
                if (paginaEmpleado > totalPaginas) paginaEmpleado = totalPaginas;
                if (paginaEmpleado < 1) paginaEmpleado = 1;

                const inicio = (paginaEmpleado - 1) * itemsPorPaginaEmpleado;
                const fin = inicio + itemsPorPaginaEmpleado;
                const pagina = data.slice(inicio, fin);

                pagina.forEach(empleado => {
                    const tr = document.createElement('tr');
                    tr.classList.add('cursor-pointer', 'hover:bg-base-300');

                    tr.innerHTML = `
                        <td>${formatearCelda(empleado.nombre)}</td>
                        <td>${formatearCelda(empleado.dni)}</td>
                        <td>${formatearCelda(empleado.celular)}</td>
                        <td>${formatearCelda(empleado.email)}</td>
                        <td>${formatearCelda(empleado.area)}</td>                
                        <td>${formatearCelda(empleado.puesto)}</td>

                    `;

                    tr.addEventListener('click', function (e) {
                        if (!empleadoInput) return;

                        empleadoInput.value = empleado.id;

                        if (empleadoNombreVisible) {
                            const texto = `${empleado.nombre || ''} - ${empleado.dni || ''}`;
                            empleadoNombreVisible.value = texto.trim();
                        }

                        const modalCheckbox = document.getElementById('modal_elegir_empleado');
                        if (modalCheckbox) modalCheckbox.checked = false;
                    });

                    tablaEmpleadoBody.appendChild(tr);
                });

                if (empleadoInfo) {
                    const desde = inicio + 1;
                    const hasta = Math.min(fin, total);
                    empleadoInfo.textContent = `Mostrando ${desde}-${hasta} de ${total}`;
                }
            }

            function abrirModalEmpleado() {
                const modalCheckbox = document.getElementById('modal_elegir_empleado');
                if (modalCheckbox) modalCheckbox.checked = true;
                paginaEmpleado = 1;
                renderTablaEmpleado(empleadosCache);
                if (buscadorEmpleado) buscadorEmpleado.value = '';
            }

            if (empleadoNombreVisible) {
                empleadoNombreVisible.addEventListener('click', function () {
                    abrirModalEmpleado();
                });
                empleadoNombreVisible.addEventListener('focus', function () {
                    abrirModalEmpleado();
                });
            }

            if (buscadorEmpleado) {
                buscadorEmpleado.addEventListener('input', function () {
                    const term = this.value.toLowerCase();
                    const filtrados = empleadosData.filter(empleado => {
                        const texto = `${empleado.nombre || ''} ${empleado.dni || ''} ${empleado.celular || ''} ${empleado.email || ''} ${empleado.area || ''}${empleado.puesto || ''}`.toLowerCase();
                        return texto.includes(term);
                    });
                    paginaEmpleado = 1;
                    renderTablaEmpleado(filtrados);
                });
            }

            if (empleadoPrev) {
                empleadoPrev.addEventListener('click', function () {
                    if (paginaEmpleado > 1) {
                        paginaEmpleado--;
                        const term = buscadorEmpleado ? buscadorEmpleado.value.toLowerCase() : '';
                        const filtrados = term ? empleadosData.filter(e => {
                            const texto = `${e.nombre || ''} ${e.dni || ''} ${e.celular || ''} ${e.email || ''} ${e.area || ''} ${e.puesto || ''}`.toLowerCase();
                            return texto.includes(term);
                        }) : empleadosCache;
                        renderTablaEmpleado(filtrados);
                    }
                });
            }

            if (empleadoNext) {
                empleadoNext.addEventListener('click', function () {
                    const term = buscadorEmpleado ? buscadorEmpleado.value.toLowerCase() : '';
                    const filtrados = term ? empleadosData.filter(e => {
                        const texto = `${e.nombre || ''} ${e.dni || ''} ${e.celular || ''} ${e.email || ''} ${e.area || ''} ${e.puesto || ''}`.toLowerCase();
                        return texto.includes(term);
                    }) : empleadosCache;
                    const totalPaginas = Math.ceil(filtrados.length / itemsPorPaginaEmpleado);
                    if (paginaEmpleado < totalPaginas) {
                        paginaEmpleado++;
                        renderTablaEmpleado(filtrados);
                    }
                });
            }
        });
    </script>
    <script>
        function formatMoneda(input) {
            let valor = input.value.replace(/\D/g, '');
            if (valor === '') {
                input.value = '';
                return;
            }

            // Determinar si ya tiene coma
            let hasComma = input.value.includes(',');

            let rawValue = input.value.replace(/\./g, '').replace(',', '.');

            if (input.value.endsWith(',')) {
                let parts = input.value.split(',');
                if (parts.length > 2) {
                    input.value = input.value.substring(0, input.value.length - 1);
                    return;
                }
                let integerPart = parts[0].replace(/\./g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                input.value = integerPart + ',';
                return;
            }

            let parts = input.value.split(',');
            let integerPart = parts[0].replace(/\D/g, '');
            let decimalPart = parts.length > 1 ? parts[1].replace(/\D/g, '') : null;

            integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            let newValue = integerPart;
            if (decimalPart !== null) {
                newValue += ',' + decimalPart;
            }

            // Evitar bucle infinito
            if (input.value !== newValue) {
                input.value = newValue;
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistema-municipal\resources\views\admin\combustibles\create.blade.php ENDPATH**/ ?>