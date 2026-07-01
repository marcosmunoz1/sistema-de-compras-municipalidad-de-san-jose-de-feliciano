<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Recuperar contraseña']); ?>
    
    <div class="max-w-md w-full mx-auto mt-10 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8">

        <!-- Título -->
        <h1 class="text-2xl font-bold text-text-light dark:text-white mb-2">
            Recuperar contraseña
        </h1>

        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
            Ingresá tu correo y te enviaremos un enlace para restablecer tu contraseña.
        </p>

        <!-- Session Status -->
        <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>

        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('password.email')); ?>" class="flex flex-col gap-5">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="text-text-light dark:text-gray-300 text-sm font-medium pb-2">
                    Correo electrónico
                </label>

                <div class="flex w-full items-stretch rounded-lg shadow-sm">

                    <!-- Icono -->
                    <div
                        class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <span class="material-symbols-outlined text-lg">mail</span>
                    </div>

                    <!-- Input -->
                    <input id="email" name="email" type="email" required autofocus
                        placeholder="su.correo@ejemplo.com"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg
                               text-text-light dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50
                               focus:border-primary border border-border-light dark:border-gray-700
                               bg-white dark:bg-gray-800 h-12 placeholder:text-gray-400 p-3 rounded-l-none text-base"
                        value="<?php echo e(old('email')); ?>" />
                </div>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit -->
            <button
                class="w-full h-12 flex items-center justify-center bg-[#D17950] text-white text-base font-medium
                rounded-lg shadow-md hover:bg-[#b86440] focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                transition-colors duration-200 mt-4"
                type="submit">
                Enviar enlace de restablecimiento
            </button>

        </form>

        <!-- Volver al login -->
        <a href="<?php echo e(route('login')); ?>"
            class="w-full h-12 flex items-center justify-center bg-primary text-white text-base font-medium
                    rounded-lg shadow-md hover:bg-primary/80 focus:outline-none focus:ring-2
                    focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                    transition-colors duration-200 mt-4">
            Volver al inicio de sesión
        </a>







        <p class="text-center text-gray-500 dark:text-gray-400 text-xs mt-8">
            © <?php echo e(now()->year); ?> Municipalidad de San José de Feliciano. Todos los derechos reservados.
        </p>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sistema-municipal\resources\views\auth\forgot-password.blade.php ENDPATH**/ ?>