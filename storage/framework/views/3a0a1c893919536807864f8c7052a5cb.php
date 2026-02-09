<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? config('app.name')); ?></title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" sizes="any">
    <link rel="icon" type="image/png" href="<?php echo e(asset('storage/login/logo-removebg-preview.png')); ?>">


    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="relative font-sans text-gray-900 antialiased">
    
    <!-- Imagen de fondo -->
    <div class="absolute inset-0 bg-cover bg-center z-0"
        style="background-image: url('<?php echo e(asset('storage/login/parque-fondo.jpg')); ?>')"></div>

    <!-- Oscurecer un poco para que el formulario se lea -->
    <div class="absolute inset-0 bg-black/40 z-0"></div>

    <!-- Contenido -->
    <div class="min-h-screen relative z-10 flex flex-col items-center justify-center px-4">

        <div>
            <img src="<?php echo e(asset('storage/login/logo.png')); ?>" class="w-20 h-20 object-contain drop-shadow-lg" />
        </div>

        <!-- Este contenedor ya NO tiene bg-blanco -->
        <div class="w-full sm:max-w-md mt-6">
            <?php echo e($slot); ?>

        </div>

    </div>

</body>



</html>
<?php /**PATH C:\laragon\www\Sistema-talwind\resources\views/layouts/guest.blade.php ENDPATH**/ ?>