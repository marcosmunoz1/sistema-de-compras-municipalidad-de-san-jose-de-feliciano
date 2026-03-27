<?php $__env->startSection('title', 'Editar Usuario'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Usuarios</h1>
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
                <a href="<?php echo e(route('usuarios.index')); ?>">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user-group'); ?>
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
                    Usuarios
                </a>
            </li>
        </ul>
    </div>
    <!-- Tabla -->
    <div class="card bg-base-100 shadow">
        <div class="card-body p-6 max-w-6xl mx-auto">

            <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                <i class="fas fa-user"></i> Editar Usuario
            </h2>

            <form action="<?php echo e(url('/admin/usuarios/' . $usuario->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    
                    <div class="md:col-span-2 space-y-6">

                        <!-- Nombre + Rol -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Nombre de Usuario</label>
                                <input type="text" name="name" class="input input-bordered bg-base-200"
                                    value="<?php echo e(old('name', $usuario->name)); ?>">
                                <?php $__errorArgs = ['name'];
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

                            <div class="form-control">
                                <label class="label pb-1">
                                    <span class="label-text font-semibold">Rol</span>
                                </label>

                                <select name="role" class="select select-bordered bg-base-200 w-full">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($role->name !== 'Super-Admin' || auth()->user()->hasRole('Super-Admin')): ?>
                                            <option value="<?php echo e($role->name); ?>"
                                                <?php echo e($usuario->roles->first()?->name === $role->name ? 'selected' : ''); ?>>
                                                <?php echo e($role->name); ?>

                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-red-500 mt-1"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        </div>

                        <!-- Email + Estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label font-semibold">Correo</label>
                                <input type="email" name="email" class="input input-bordered bg-base-200"
                                    value="<?php echo e(old('email', $usuario->email)); ?>">
                                <?php $__errorArgs = ['email'];
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

                            <div class="form-control">
                                <label class="label font-semibold">Estado</label>
                                <select name="estado" class="select select-bordered bg-base-200">
                                    <option value="1" <?php echo e(old('estado', $usuario->estado) == 1 ? 'selected' : ''); ?>>
                                        Activo</option>
                                    <option value="0" <?php echo e(old('estado', $usuario->estado) == 0 ? 'selected' : ''); ?>>
                                        Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-base-300">
                            <div class="form-control">
                                <label class="label font-semibold">Nueva contraseña</label>
                                <input type="password" name="password" id="password"
                                    class="input input-bordered bg-base-200" placeholder="Dejar vacío para no cambiar">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-red-500"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <button type="button" class="text-sm text-primary mt-1 hover:underline"
                                    onclick="togglePassword()">Mostrar contraseñas</button>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation"
                                    class="input input-bordered bg-base-200">
                                <?php $__errorArgs = ['password_confirmation'];
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

                    
                    <div>
                        <div class="card bg-base-200 border border-base-300 h-full p-4 flex flex-col">
                            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4">
                                <i class="fas fa-pen-nib"></i> Firma
                            </h3>

                            <div id="firmaPreviewWrapper"
                                class="border-2 border-dashed rounded-lg p-4 bg-base-100 mb-4 flex justify-center items-center">

                                <?php if($usuario->firma): ?>
                                    <img id="firmaPreviewImg" src="<?php echo e(asset('storage/' . $usuario->firma)); ?>"
                                        class="max-h-32 object-contain">
                                <?php else: ?>
                                    <span id="firmaPlaceholder" class="text-gray-400 text-center">
                                        No hay firma cargada
                                    </span>
                                    <img id="firmaPreviewImg" class="max-h-32 object-contain hidden">
                                <?php endif; ?>

                            </div>

                            <div class="form-control mt-auto">
                                <label class="label font-semibold">Cambiar firma</label>
                                <input type="file" name="firma" accept="image/*" onchange="previewFirmaEdit(event)"
                                    class="file-input file-input-bordered bg-base-200">
                                <?php $__errorArgs = ['firma'];
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


                </div>

                <!-- BOTONES -->
                <div class="mt-8 flex justify-end gap-4">
                    <a href="<?php echo e(url('admin/usuarios')); ?>" class="btn btn-neutral">
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
<?php endif; ?> Volver
                    </a>
                    <button type="submit" class="btn btn-success">
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
<?php endif; ?> Guardar cambios
                    </button>
                </div>

            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const confirm = document.getElementById('password_confirmation');

            const type = password.type === 'password' ? 'text' : 'password';

            password.type = type;
            confirm.type = type;
        }
    </script>
    <script>
        function previewFirmaEdit(event) {
            const file = event.target.files[0];
            if (!file) return;

            const img = document.getElementById('firmaPreviewImg');
            const placeholder = document.getElementById('firmaPlaceholder');

            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                img.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\admin\usuarios\edit.blade.php ENDPATH**/ ?>