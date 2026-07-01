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

    <title>Error 403</title>  
</head> 
<body> 
<main class="flex-1 overflow-y-auto">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 via-rose-50 to-pink-50 p-4">
        <div data-slot="card"
            class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl max-w-2xl w-full p-8 md:p-12 text-center shadow-2xl border-0">
            <div class="mb-8 flex justify-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-red-500 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <div class="relative bg-gradient-to-br from-red-500 to-rose-600 rounded-full p-8 shadow-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-shield-x w-24 h-24 text-white" aria-hidden="true">
                            <path
                                d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                            </path>
                            <path d="m14.5 9.5-5 5"></path>
                            <path d="m9.5 9.5 5 5"></path>
                        </svg></div>
                    <div class="absolute -bottom-2 -right-2 bg-red-600 rounded-full p-3 shadow-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-lock w-6 h-6 text-white" aria-hidden="true">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg></div>
                </div>
            </div>
            <div class="mb-6">
                <h1
                    class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-red-600 via-rose-600 to-pink-600 bg-clip-text text-transparent mb-2">
                    403</h1>
                <div class="h-1 w-24 bg-gradient-to-r from-red-500 to-rose-500 mx-auto rounded-full"></div>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl mb-4 text-gray-800">¡Acceso Denegado!</h2>
                <p class="text-gray-600 text-lg mb-2">No tienes permisos para acceder a esta página.</p>
                <p class="text-gray-500">Tu cuenta no tiene los privilegios necesarios para ver este contenido.</p>
            </div>
            <div class="mb-8 bg-red-50 rounded-lg p-6 border-2 border-red-200">
                <div class="flex items-start gap-3 text-left">
                    <div class="bg-red-100 rounded-full p-2 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-key-round w-5 h-5 text-red-600" aria-hidden="true">
                            <path
                                d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                            </path>
                            <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                        </svg></div>
                    <div>
                        <h4 class="font-semibold text-red-900 mb-2">¿Por qué veo esto?</h4>
                        <p class="text-sm text-red-700 mb-3">Esta página está restringida y requiere permisos especiales
                            para acceder.</p>
                        <ul class="text-sm text-red-600 space-y-1.5">
                            <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Puede que
                                    tu rol de usuario no tenga los permisos necesarios</span></li>
                            <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Esta
                                    sección puede estar reservada solo para administradores</span></li>
                            <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Tus
                                    permisos pueden haber sido modificados recientemente</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-8 bg-blue-50 rounded-lg p-5 border border-blue-200">
                <h4 class="font-semibold text-blue-900 mb-2">¿Qué puedo hacer?</h4>
                <div class="text-sm text-blue-700 space-y-2 text-left">
                    <p class="flex items-start gap-2"><span class="text-blue-500 mt-1">→</span><span>Contacta al
                            administrador del sistema para solicitar acceso</span></p>
                    <p class="flex items-start gap-2"><span class="text-blue-500 mt-1">→</span><span>Verifica que estés
                            usando la cuenta correcta</span></p>
                    <p class="flex items-start gap-2"><span class="text-blue-500 mt-1">→</span><span>Regresa a una
                            página para la que tengas permisos</span></p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(route('admin.index')); ?>" data-slot="button" 
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-primary/90 h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white gap-2 shadow-lg"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-house w-5 h-5" aria-hidden="true">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                        </path>
                    </svg>Volver al Inicio
                </a> 
                <a href="<?php echo e(url()->previous()); ?>" data-slot="button" 
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-background hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4 gap-2 border-2 border-red-300 text-red-700 hover:bg-red-50"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-left w-5 h-5" aria-hidden="true">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>Página Anterior
                </a></div>
            <div class="mt-12 flex justify-center gap-2">
                <div class="w-2 h-2 bg-red-400 rounded-full animate-bounce" style="animation-delay: 0ms;"></div>
                <div class="w-2 h-2 bg-rose-400 rounded-full animate-bounce" style="animation-delay: 150ms;"></div>
                <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 300ms;"></div>
            </div>
        </div>
    </div>
</main> 
</body> 
</html>  <?php /**PATH C:\laragon\www\sistema-municipal\resources\views\errors\403.blade.php ENDPATH**/ ?>