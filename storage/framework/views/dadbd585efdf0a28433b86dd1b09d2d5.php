<?php $__env->startSection('title', 'Crear Proveedor'); ?> 
<?php $__env->startSection('content'); ?>
<!-- Titulo y boton --> 
 <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <h1 class="text-xl sm:text-2xl font-semibold">Crear Proveedor</h1> 
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
        Crear Proveedor
      </span>
    </li>
  </ul>
</div> 

<!-- Formulario -->
<form action="<?php echo e(route('proveedores.store')); ?>" method="POST" class="space-y-6">
 <?php echo csrf_field(); ?>

    <!-- ============================= -->
    <!-- CARD 1 — DATOS DE LA EMPRESA -->
    <!-- ============================= -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
             class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 data-slot="card-title" class="text-1xl font-semibold">Datos de la Empresa</h4>
            <p data-slot="card-description" class="text-muted-foreground">Información básica del proveedor</p>
        </div>
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Empresa -->
                    <div class="space-y-2">
                        <label for="empresa" class="text-sm font-medium">Nombre de la Empresa <span class="text-red-600">*</span></label>
                        <input 
                            id="empresa" 
                            name="empresa" 
                            value="<?php echo e(old('empresa')); ?>"
                            type="text"
                            placeholder="Nombre de la empresa..."
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 px-3 text-sm focus:outline-none 
                            focus:ring-2 focus:ring-primary focus:border-primary transition" 
                        />
                    </div>

                    <!-- Razon Social -->
                    <div class="space-y-2">
                        <label for="razon_social" class="text-sm font-medium">Razón Social</label>
                        <input id="razon_social" name="razon_social" value="<?php echo e(old('razon_social')); ?>" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" 
                        placeholder="Razón Social..."/> 
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label for="cuit" class="text-sm font-medium">CUIT / RUC</label>
                        <input id="cuit" name="cuit" value="<?php echo e(old('cuit')); ?>" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" 
                        placeholder="CUIT..."/>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium">Email</label>
                        <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" 
                        placeholder="Email..."/>
                    </div>

                    <div class="space-y-2">
                        <label for="codigo_postal" class="text-sm font-medium">Código Postal</label>
                        <input id="codigo_postal" name="codigo_postal" value="<?php echo e(old('codigo_postal')); ?>" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition" 
                        placeholder="Código Postal..."/>
                    </div>
                </div>

                <div class="pt-4 mt-2">
                    <h4 class="mb-4 ">Datos de Contacto</h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label for="nombre" class="text-sm font-medium">Nombre del Contacto <span class="text-red-600">*</span></label>
                            <input id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" 
                            placeholder="Nombre del Contacto..." required />
                        </div>

                        <div class="space-y-2">
                            <label for="telefono" class="text-sm font-medium">Teléfono</label>
                            <input id="telefono" name="telefono" value="<?php echo e(old('telefono')); ?>" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" 
                            placeholder="Teléfono..." />
                        </div>

                        <div class="space-y-2">
                            <label for="celular" class="text-sm font-medium">Celular <span class="text-red-600">*</span></label>
                            <input id="celular" name="celular" value="<?php echo e(old('celular')); ?>" 
                            class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition" 
                            placeholder="Celular..." required />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ========================= -->
    <!-- CARD 2 — UBICACIÓN -->
    <!-- ========================= -->
    <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
        <div data-slot="card-header"
             class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h4 class="text-1xl font-semibold">Ubicación</h4>
            <p class="text-muted-foreground">Dirección y ubicación del proveedor</p>
        </div>
        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6">
            <div class="grid gap-4">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <!-- País -->
                    <div class="space-y-2">
                        <label for="pais" class="text-sm font-medium">País <span class="text-red-600">*</span></label>
                        <select id="pais" name="pais" class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition <?php $__errorArgs = ['pais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option>Argentina</option>
                        </select>
                    </div>

                    <!-- Provincia -->
                    <div class="space-y-2">
                        <label for="provincia" class="text-sm font-medium">Provincia <span class="text-red-600">*</span></label>
                        <select id="provincia" name="provincia" class="select w-full h-10 rounded-md border-base-300 bg-base-200
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition <?php $__errorArgs = ['provincia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option>Buenos Aires</option>
                            <option>Catamarca</option>
                            <option>Chaco</option>
                            <option>Chubut</option>
                            <option>Córdoba</option>
                            <option>Corrientes</option>
                            <option>Entre Ríos</option>
                            <option>Jujuy</option>
                            <option>La Pampa</option>
                            <option>La Rioja</option>
                            <option>Mendoza</option>
                            <option>Misiones</option>
                            <option>Neuquén</option>
                            <option>Río Negro</option>
                            <option>Salta</option>
                            <option>San Juan</option>
                            <option>San Luis</option>
                            <option>Santa Cruz</option>
                            <option>Santa Fe</option>
                            <option>Santiago del Estero</option>
                            <option>Tierra del Fuego</option>
                            <option>Tucumán</option>
                        </select> 
                    </div>
                    <!-- Localidad -->
                    <div class="space-y-2">
                        <label for="localidad" class="text-sm font-medium">Localidad <span class="text-red-600">*</span></label>
                        <input id="localidad" name="localidad" value="<?php echo e(old('localidad')); ?>" 
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition <?php $__errorArgs = ['localidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        placeholder="Localidad..." />
                    </div>
                </div>
                <!-- Dirección -->
                <div class="space-y-2">
                    <label for="direccion" class="text-sm font-medium">Dirección</label>
                    <input id="direccion" name="direccion" value="<?php echo e(old('direccion')); ?>" 
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                    px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                    focus:border-primary transition" 
                    placeholder="Dirección..." />
                </div>
            </div>
        </div>
        </div>
        <div data-slot="card" class="card bg-base-100 shadow-xl p-4">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6">
            <h3 class="text-1xl font-semibold">
                Observaciones
            </h3> 
            <p class="">
                Información adicional del proveedor
            </p>
            <div class="space-y-2"> 
                <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-1">
                    Observaciones / Notas
                </label> 
                <textarea type="text" id="observaciones" name="observaciones"
                    placeholder="Ingrese cualquier observación o nota relevante sobre el proveedor..." 
                    class="textarea w-full rounded-md border border-base-300 bg-base-200 focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                 <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red-500"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
            </div>
        </div>
    </div>
    <!-- ========================= -->
    <!-- BOTONES DEL FORMULARIO -->
    <!-- ========================= -->
    <div class="flex flex-wrap gap-2 justify-end pt-4">
        <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-sm sm:btn-md btn-warning"> 
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
            Guardar Proveedor 
        </button>
    </div>
</form>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\admin\proveedores\create.blade.php ENDPATH**/ ?>