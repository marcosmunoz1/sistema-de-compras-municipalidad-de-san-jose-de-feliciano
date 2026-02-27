<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery SIEMPRE PRIMERO -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    <!-- Vite -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <title>Error 404</title> 
</head> 
<body> 

<main class="flex-1 overflow-y-auto">
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div data-slot="card"
            class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl max-w-2xl w-full p-8 md:p-12 text-center shadow-2xl border-0">
            <div class="mb-8 flex justify-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-500 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <div class="relative bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full p-8 shadow-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-file-question-mark w-24 h-24 text-white"
                            aria-hidden="true">
                            <path
                                d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z">
                            </path>
                            <path d="M12 17h.01"></path>
                            <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"></path>
                        </svg></div>
                </div>
            </div>
            <div class="mb-6">
                <h1
                    class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                    404</h1>
                <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl mb-4 text-gray-800">¡Ups! Página no encontrada</h2>
                <p class="text-gray-600 text-lg mb-2">Lo sentimos, la página que estás buscando no existe.</p>
                <p class="text-gray-500">Es posible que la URL sea incorrecta o que la página haya sido movida.</p>
            </div>
            <div class="mb-8 bg-blue-50 rounded-lg p-6 border border-blue-100">
                <h3 class="text-sm font-semibold text-gray-700 mb-3 flex items-center justify-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-search w-4 h-4" aria-hidden="true">
                        <path d="m21 21-4.34-4.34"></path>
                        <circle cx="11" cy="11" r="8"></circle>
                    </svg>Sugerencias:</h3>
                <ul class="text-sm text-gray-600 space-y-2 text-left max-w-md mx-auto">
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span><span>Verifica que la
                            URL esté escrita correctamente</span></li>
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span><span>Regresa a la
                            página de inicio</span></li>
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span><span>Usa el menú de
                            navegación para encontrar lo que buscas</span></li>
                </ul>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center"><a href="<?php echo e(route('admin.index')); ?>" data-slot="button"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-primary/90 h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white gap-2 shadow-lg"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-house w-5 h-5" aria-hidden="true">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                        </path>
                    </svg>Volver al Inicio</a>
                    <a href="<?php echo e(url()->previous()); ?>" data-slot="button"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4 gap-2 border-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left w-5 h-5" aria-hidden="true">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>Página Anterior</a></div>
            <div class="mt-12 flex justify-center gap-2">
                <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0ms;"></div>
                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 150ms;"></div>
                <div class="w-2 h-2 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 300ms;"></div>
            </div>
        </div>
    </div>
</main>
</body>

</html>
<?php /**PATH C:\laragon\www\Sistema-talwind\resources\views\errors\404.blade.php ENDPATH**/ ?>