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

    <title>Error 505</title>
</head>

<body>
    <main class="flex-1 overflow-y-auto">
        <div
            class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 via-violet-50 to-indigo-50 p-4">
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl max-w-2xl w-full p-8 md:p-12 text-center shadow-2xl border-0">
                <div class="mb-8 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-purple-500 rounded-full blur-3xl opacity-20 animate-pulse">
                        </div>
                        <div
                            class="relative bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full p-8 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-wifi w-24 h-24 text-white"
                                aria-hidden="true">
                                <path d="M12 20h.01"></path>
                                <path d="M2 8.82a15 15 0 0 1 20 0"></path>
                                <path d="M5 12.859a10 10 0 0 1 14 0"></path>
                                <path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                            </svg></div>
                        <div class="absolute -top-2 -right-2 bg-yellow-400 rounded-full p-3 shadow-lg animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-triangle-alert w-6 h-6 text-purple-700"
                                aria-hidden="true">
                                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3">
                                </path>
                                <path d="M12 9v4"></path>
                                <path d="M12 17h.01"></path>
                            </svg></div>
                    </div>
                </div>
                <div class="mb-6">
                    <h1
                        class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-purple-600 via-violet-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                        505</h1>
                    <div class="h-1 w-24 bg-gradient-to-r from-purple-500 to-indigo-500 mx-auto rounded-full"></div>
                </div>
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl mb-4 text-gray-800">¡Versión HTTP No Soportada!</h2>
                    <p class="text-gray-600 text-lg mb-2">El servidor no soporta la versión del protocolo HTTP
                        utilizada.</p>
                    <p class="text-gray-500">Tu navegador está usando una versión de HTTP que no es compatible con el
                        servidor.</p>
                </div>
                <div class="mb-8 bg-purple-50 rounded-lg p-6 border-2 border-purple-100">
                    <div class="flex items-start gap-3 text-left"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-triangle-alert w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0"
                            aria-hidden="true">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">¿Qué significa esto?</h4>
                            <p class="text-sm text-gray-600 mb-3">El error 505 ocurre cuando hay un problema de
                                compatibilidad entre el cliente y el servidor respecto a la versión del protocolo HTTP.
                            </p>
                            <h4 class="font-semibold text-gray-800 mb-2">Soluciones posibles:</h4>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start gap-2"><span
                                        class="text-purple-500 mt-1">•</span><span>Actualiza tu navegador a la última
                                        versión</span></li>
                                <li class="flex items-start gap-2"><span
                                        class="text-purple-500 mt-1">•</span><span>Borra la caché y las cookies del
                                        navegador</span></li>
                                <li class="flex items-start gap-2"><span
                                        class="text-purple-500 mt-1">•</span><span>Prueba usar un navegador
                                        diferente</span></li>
                                <li class="flex items-start gap-2"><span
                                        class="text-purple-500 mt-1">•</span><span>Contacta al administrador del sistema
                                        si el problema persiste</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-8 bg-gray-800 rounded-lg p-4 text-left">
                    <p class="text-xs text-gray-400 font-mono">Error Code: 505 - HTTP Version Not Supported</p>
                    <p class="text-xs text-gray-400 font-mono mt-1">Timestamp: 5/1/2026, 09:37:09</p>
                    <p class="text-xs text-gray-400 font-mono mt-1">User Agent: Mozilla/5.0 (Windows NT 10.0; Win64;
                        x64) AppleWebKit/537.36 (KHTML, like Gecko)...</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(url()->previous()); ?>" data-slot="button"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-primary/90 h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white gap-2 shadow-lg"><svg
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
                    </a></div>  
                <div class="mt-12 flex justify-center gap-2">
                    <div class="w-2 h-2 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 0ms;">
                    </div>
                    <div class="w-2 h-2 bg-violet-400 rounded-full animate-bounce" style="animation-delay: 150ms;">
                    </div>
                    <div class="w-2 h-2 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 300ms;">
                    </div>
                </div>
            </div>
        </div>
    </main> 

</body>
</html> 
<?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\errors\505.blade.php ENDPATH**/ ?>