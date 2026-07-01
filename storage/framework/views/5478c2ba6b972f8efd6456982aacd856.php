<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sistema Municipal de San José de Feliciano - Iniciar Sesión</title>

    <!-- Tailwind + Plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0"
        rel="stylesheet" />

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" sizes="any">
    <link rel="icon" type="image/png" href="<?php echo e(asset('storage/login/logo-removebg-preview.png')); ?>">

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#E48A5F",
                        "primary-dark": "#39302C",
                        "background-light": "#F9FAFB",
                        "background-dark": "#101622",
                        "text-light": "#374151",
                        "border-light": "#E5E7EB",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="font-display">

    <div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center">

                <div class="flex flex-col lg:flex-row w-full mx-auto">

                    <!-- Panel Izquierdo -->
                    <div class="relative w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-12 text-white"
                        style="background-image: url('<?php echo e(asset('storage/login/fondo-login.jpg')); ?>');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;">

                        <!-- Capa oscura encima de la imagen -->
                        <div class="absolute inset-0 bg-black/60"></div>

                        <div class="relative z-10 flex flex-col items-start w-full max-w-md px-4 sm:px-0">
                            <img class="w-14 h-14 mb-6"
                                src="<?php echo e(asset('storage/login/logo.png')); ?>" />

                            <h1 class="text-white text-[32px] font-bold leading-tight">Sistema de Gestión Municipal</h1>
                            <p class="text-white/80 text-lg mt-2">Innovando para nuestra comunidad</p>
                        </div>


                    </div>



                    <!-- Panel Derecho (Formulario) -->
                    <div
                        class="w-full lg:w-1/2 flex items-center justify-center bg-background-light dark:bg-background-dark py-10 px-4 sm:px-8">
                        <div class="w-full max-w-lg">

                            <div
                                class="bg-white/90 dark:bg-gray-900/90 backdrop-blur shadow-xl rounded-xl border border-border-light/70 dark:border-gray-800 px-6 py-8 sm:px-8 sm:py-10 mx-auto">

                                <h1 class="text-text-light dark:text-white text-[22px] sm:text-2xl font-bold mb-6 text-center sm:text-left">
                                    Acceso al Sistema
                                </h1>

                                <!-- FORM LOGIN LARAVEL -->
                                <form class="w-full flex flex-col gap-5" method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <!-- EMAIL -->
                                    <div class="flex flex-col">
                                        <label class="text-text-light dark:text-gray-300 text-sm font-medium pb-2"
                                            for="email">
                                            Correo Electrónico
                                        </label>

                                        <div class="flex w-full items-stretch rounded-lg shadow-sm">
                                            <div
                                                class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border-r-0">
                                                <span class="material-symbols-outlined text-lg">mail</span>
                                            </div>

                                            <input
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg
                                                   text-text-light dark:text-white focus:outline-0 focus:ring-2
                                                   focus:ring-primary/50 focus:border-primary border border-border-light
                                                   dark:border-gray-700 bg-white dark:bg-gray-800 h-12
                                                   placeholder:text-gray-400 p-3 rounded-l-none text-base"
                                                id="email" name="email" type="email"
                                                placeholder="su.correo@ejemplo.com" value="<?php echo e(old('email')); ?>"
                                                required autofocus autocomplete="username" />
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

                                    <!-- PASSWORD -->
                                    <div class="flex flex-col">
                                        <label class="text-text-light dark:text-gray-300 text-sm font-medium pb-2"
                                            for="password">
                                            Contraseña
                                        </label>

                                        <div class="flex w-full items-stretch rounded-lg shadow-sm relative">

                                            <!-- Ícono a la izquierda (el tuyo) -->
                                            <div
                                                class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800 
                                                items-center justify-center pl-4 rounded-l-lg border-r-0">
                                                <span class="material-symbols-outlined text-lg">lock</span>
                                            </div>

                                            <!-- Input -->
                                            <input id="password" name="password" type="password"
                                                placeholder="Ingrese su contraseña" required
                                                autocomplete="current-password"
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg
                                                text-text-light dark:text-white focus:outline-0 focus:ring-2
                                                focus:ring-primary/50 focus:border-primary border border-border-light
                                                dark:border-gray-700 bg-white dark:bg-gray-800 h-12
                                                placeholder:text-gray-400 p-3 rounded-l-none text-base pr-12" />

                                            <!-- Botón mostrar/ocultar -->
                                            <button type="button" onclick="togglePassword()"
                                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">
                                                <span id="eyeOpen"
                                                    class="material-symbols-outlined text-xl">visibility</span>
                                                <span id="eyeClosed"
                                                    class="material-symbols-outlined text-xl hidden">visibility_off</span>
                                            </button>
                                        </div>




                                        <?php $__errorArgs = ['password'];
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

                                    <!-- REMEMBER -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-2">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input
                                                class="form-checkbox h-4 w-4 rounded text-primary border-border-light dark:border-gray-600
                                                   focus:ring-primary/50 bg-white dark:bg-gray-800"
                                                type="checkbox" id="remember_me" name="remember" />
                                            <span class="text-sm text-text-light dark:text-gray-300">Recordarme</span>
                                        </label>

                                        <?php if(Route::has('password.request')): ?>
                                            <a class="text-sm font-medium text-primary hover:underline text-left sm:text-right"
                                                href="<?php echo e(route('password.request')); ?>">
                                                ¿Olvidaste tu contraseña?
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- BUTTON -->
                                    <button
                                        class="w-full h-12 flex items-center justify-center bg-primary text-white text-base font-medium
                                           rounded-lg shadow-md hover:bg-[#D17950] focus:outline-none focus:ring-2
                                           focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                                           transition-colors duration-200 mt-4">
                                        Iniciar Sesión
                                    </button>

                                </form>

                            </div>

                            <p class="text-center text-gray-500 dark:text-gray-400 text-xs mt-6">
                                © <?php echo e(date('Y')); ?> Municipalidad de San José de Feliciano. Todos los derechos
                                reservados.
                            </p>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            const isPassword = input.type === "password";
            input.type = isPassword ? "text" : "password";

            eyeOpen.classList.toggle("hidden", !isPassword);
            eyeClosed.classList.toggle("hidden", isPassword);
        }
    </script>



</body>

</html>
<?php /**PATH C:\laragon\www\sistema-municipal\resources\views\auth\login.blade.php ENDPATH**/ ?>