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

    <title>Error 500</title>
</head>

<body>
    <main class="flex-1 overflow-y-auto">
        <div
            class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 via-rose-50 to-orange-50 p-4">
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl max-w-2xl w-full p-8 md:p-12 text-center shadow-2xl border-0">
                <div class="mb-8 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-red-500 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                        <div class="relative bg-gradient-to-br from-red-500 to-rose-600 rounded-full p-8 shadow-lg"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-server-crash w-24 h-24 text-white"
                                aria-hidden="true">
                                <path d="M6 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2">
                                </path>
                                <path d="M6 14H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2">
                                </path>
                                <path d="M6 6h.01"></path>
                                <path d="M6 18h.01"></path>
                                <path d="m13 6-4 6h6l-4 6"></path>
                            </svg></div>
                        <div class="absolute -top-2 -right-2 bg-yellow-400 rounded-full p-3 shadow-lg"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-alert w-6 h-6 text-red-700"
                                aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                            </svg></div>
                    </div>
                </div>
                <div class="mb-6">
                    <h1
                        class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-red-600 via-rose-600 to-orange-600 bg-clip-text text-transparent mb-2">
                        500</h1>
                    <div class="h-1 w-24 bg-gradient-to-r from-red-500 to-rose-500 mx-auto rounded-full"></div>
                </div>
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl mb-4 text-gray-800">¡Error Interno del Servidor!</h2>
                    <p class="text-gray-600 text-lg mb-2">Lo sentimos, algo salió mal en nuestro servidor.</p>
                    <p class="text-gray-500">Nuestro equipo ha sido notificado y está trabajando para solucionar el
                        problema.</p>
                </div>
                <div class="mb-8 bg-red-50 rounded-lg p-6 border-2 border-red-100">
                    <div class="flex items-start gap-3 text-left"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-circle-alert w-5 h-5 text-red-600 mt-0.5 flex-shrink-0"
                            aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" x2="12" y1="8" y2="12"></line>
                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">¿Qué puedes hacer?</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Intenta
                                        recargar la página en unos minutos</span></li>
                                <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Si el
                                        problema persiste, contacta al soporte técnico</span></li>
                                <li class="flex items-start gap-2"><span class="text-red-500 mt-1">•</span><span>Regresa
                                        a la página principal y prueba otra sección</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-8 bg-gray-800 rounded-lg p-4 text-left">
                    <p class="text-xs text-gray-400 font-mono">Error Code: 500 - Internal Server Error</p>
                    <p class="text-xs text-gray-400 font-mono mt-1">Timestamp: 5/1/2026, 09:38:47</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(url()->previous()); ?>" data-slot="button"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-primary/90 h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white gap-2 shadow-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-refresh-cw w-5 h-5" aria-hidden="true">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                            <path d="M21 3v5h-5"></path>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                            <path d="M8 16H3v5"></path>
                        </svg>Reintentar 
                       </a> 
                        <a href="<?php echo e(url()->previous()); ?>" data-slot="button" 
                            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4 gap-2 border-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house w-5 h-5" aria-hidden="true">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                </path>
                            </svg>Volver al Inicio  
                       <a>
                    </div>
                <div class="mt-12 flex justify-center gap-2">
                    <div class="w-2 h-2 bg-red-400 rounded-full animate-bounce" style="animation-delay: 0ms;"></div>
                    <div class="w-2 h-2 bg-rose-400 rounded-full animate-bounce" style="animation-delay: 150ms;">
                    </div>
                    <div class="w-2 h-2 bg-orange-400 rounded-full animate-bounce" style="animation-delay: 300ms;">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\errors\500.blade.php ENDPATH**/ ?>