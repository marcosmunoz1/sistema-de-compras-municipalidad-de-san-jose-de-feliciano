@extends('layouts.admin')
@section('title', 'Editar orden de combustible')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Edición de Orden de Combustible</h1>
        <div class="flex gap-2">
            <a href="{{ route('combustibles.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-blue-600 text-sm hover:bg-blue-700 text-white">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Combustibles
            </a>
        </div>
    </div>

    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('combustibles.index') }}">
                    <x-heroicon-o-truck class="w-4 h-4 inline" />
                    Combustibles
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current"> 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Editar Orden de Combustible
                </span>
            </li>
        </ul>
    </div>
    <div data-slot="card" 
    class="bg-base-100 mt-6 text-base-content flex flex-col rounded-xl border border-l-4 border-l-orange-500 shadow-lg dark:border-gray-700 overflow-hidden">
    
    <div class="bg-gradient-to-r from-orange-50 to-amber-50 dark:from-slate-800 dark:to-slate-900 px-6 py-6 md:py-8 border-b border-orange-100 dark:border-gray-700">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            
            <div class="flex items-center gap-4 md:gap-5">
                <div class="bg-gradient-to-br from-orange-500 to-red-600 p-3 md:p-4 rounded-2xl shadow-lg ring-4 ring-orange-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fuel text-white">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl text-white md:text-3xl font-black tracking-tight text-base-content">
                        Editar Carga
                    </h1>
                    <p class="text-xs md:text-sm font-medium text-white opacity-70 uppercase tracking-wider mt-1">
                        Registro de Combustible #4421
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 px-4 py-3 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm rounded-2xl border border-orange-200/50 dark:border-gray-600 self-start lg:self-center shadow-sm">
                <div class="bg-orange-100 dark:bg-orange-900/30 p-2 rounded-lg text-orange-600 dark:text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                        <path d="M12 6v6l4 2"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] md:text-xs uppercase font-bold text-white opacity-50">Última actualización</p>
                    <p class="font-bold text-xs md:text-sm text-white">15/01/2024 • 10:30 AM</p>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-base-200/30 px-6 py-3 flex items-center gap-4">
        <span class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            Sistema en línea
        </span>
        <div class="h-4 w-[1px] bg-base-300"></div>
        <p class="text-xs opacity-60 font-medium">Modo edición habilitado</p>
    </div>
</div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mt-6">
    <div data-slot="card"
        class="bg-base-100 text-base-content flex flex-col gap-6 rounded-xl border lg:col-span-2 border-l-4 border-l-blue-500 shadow-lg dark:border-gray-700 dark:border-l-blue-500">
        
        <div data-slot="card-header" 
            class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 pb-6 
                    /* Redondeado superior para que no se vea el borde cuadrado */
                    rounded-t-xl 
                    /* Colores dinámicos para el degradado */
                    bg-gradient-to-r from-blue-50 to-indigo-50 
                    dark:from-slate-800 dark:to-slate-900 
                    /* Bordes */
                    border-b border-blue-100 dark:border-gray-700">
                    
            <h4 data-slot="card-title" class="flex items-center justify-between text-base md:text-lg font-semibold">
                <div class="flex items-center gap-2 md:gap-3">
                    <div class="bg-blue-500 p-2 rounded-lg text-white shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"></path><path d="M14 2v5a1 1 0 0 0 1 1h5"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                    </div>
                    <span class="text-white">Información General</span> 
                </div>

                <span class="hidden md:flex items-center gap-2 text-xs font-normal opacity-70 bg-base-300 dark:bg-slate-700 px-3 py-1 rounded-full text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    Solo lectura
                </span>
            </h4>
        </div>

        <div data-slot="card-content" class="px-6 pb-6 pt-4 md:pt-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="bg-base-200/50 rounded-lg p-3 border border-base-300 hover:border-blue-400 transition-all">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-blue-500"><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path><path d="M8 2v4"></path><path d="M16 2v4"></path></svg>
                        <span class="text-xs font-semibold opacity-60 uppercase">Fecha de Carga</span>
                    </div>
                    <p class="text-base font-bold text-base-content">15/01/2024</p>
                </div>

                <div class="bg-base-200/50 rounded-lg p-3 border border-base-300 hover:border-purple-400 transition-all">
                    <div class="flex items-center gap-2 mb-2 text-purple-500">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"></path><path d="M14 2v5a1 1 0 0 0 1 1h5"></path></svg>
                        <span class="text-xs font-semibold opacity-60 uppercase">N° Factura</span>
                    </div>
                    <p class="text-base font-bold">FACT-2024-001234</p>
                </div>

                <div class="bg-base-200/50 rounded-lg p-3 border border-base-300 hover:border-orange-400 transition-all">
                    <div class="flex items-center gap-2 mb-2 text-orange-500">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>
                        <span class="text-xs font-semibold opacity-60 uppercase">Vehículo</span>
                    </div>
                    <p class="text-base font-bold">ABC-123</p>
                    <p class="text-xs opacity-60">Toyota Hilux</p>
                </div>

                <div class="bg-base-200/50 rounded-lg p-3 border border-base-300 hover:border-cyan-400 transition-all">
                    <div class="flex items-center gap-2 mb-2 text-cyan-600">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="text-xs font-semibold opacity-60 uppercase">Conductor</span>
                    </div>
                    <p class="text-base font-bold">Carlos Rodríguez</p>
                    <p class="text-xs opacity-60">DNI: 12.345.678</p>
                </div>

                <div class="bg-base-200/50 rounded-lg p-3 border border-base-300 hover:border-violet-400 transition-all md:col-span-2">
                    <div class="flex items-center gap-2 mb-2 text-violet-500">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span class="text-xs font-semibold opacity-60 uppercase">Estación de Servicio</span>
                    </div>
                    <p class="text-base font-bold">YPF - Estación Centro</p>
                    <p class="text-xs opacity-60">Av. Principal 1234, San José de Feliciano</p>
                </div>
            </div>
        </div>
    </div>

    <div data-slot="card"
        class="bg-base-100 rounded-xl text-base-content flex flex-col  gap-6 border border-l-4 border-l-purple-500 shadow-lg dark:border-gray-700 dark:border-l-purple-500">
        
        <div data-slot="card-header"
            class="grid rounded-t-xl auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-slate-800 dark:to-slate-900 border-b border-purple-100 dark:border-gray-700 pb-6">
            <h4 data-slot="card-title" class="flex items-center justify-between text-base md:text-lg font-semibold">
                <div class="flex items-center gap-2 md:gap-3">
                    <div class="bg-purple-500 p-2 rounded-lg text-white">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <span class="text-white">Registrador</span>
                </div>
            </h4>
        </div>

        <div data-slot="card-content" class="px-6 pb-6 pt-4 space-y-4">
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-4 border border-purple-200 dark:border-purple-800">
                <div class="flex items-center gap-3 mb-3">
                    <div class="bg-purple-500 p-2 rounded-full text-white">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <div>
                        <p class="text-[10px] opacity-60 uppercase tracking-widest">Registrado por</p>
                        <p class="text-base font-bold">Admin Usuario</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm opacity-80">
                    <div class="flex items-center gap-2"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg> 15/01/2024 10:30 AM</div>
                    <div class="flex items-center gap-2"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path></svg> Estado: Activo</div>
                </div>
            </div>

            <div class="bg-base-200/50 rounded-xl p-4 border border-base-300">
                <h4 class="text-xs font-bold opacity-70 mb-3 flex items-center gap-2 uppercase">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-indigo-500"><path d="M3 3v16a2 2 0 0 0 2 2h16"></path><path d="M18 17V9"></path><path d="M13 17V5"></path><path d="M8 17v-3"></path></svg>
                    Estadísticas
                </h4>
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-sm"><span class="opacity-60">Ediciones:</span><span class="font-bold text-indigo-500">2</span></div>
                    <div class="flex justify-between items-center text-sm"><span class="opacity-60">Última edición:</span><span class="font-bold">Hoy</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-slot="card"
    class="bg-base-100 mt-6 text-base-content flex flex-col gap-6 rounded-xl border lg:col-span-2 border-l-4 border-l-gray-500 shadow-lg dark:border-gray-700 dark:border-l-gray-500 overflow-hidden">
    
    <div data-slot="card-header"
        class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 pb-6 
               bg-gradient-to-r from-gray-50 to-slate-100 dark:from-slate-800 dark:to-slate-900 
               border-b border-gray-200 dark:border-gray-700">
        
        <h4 data-slot="card-title" class="flex items-center justify-between text-base md:text-lg font-semibold">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="bg-gray-500 p-2 rounded-lg text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square">
                        <path d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <span class="text-white">Observaciones</span>
            </div>
            
            <span class="flex items-center gap-2 text-xs font-normal opacity-70 bg-base-300 dark:bg-slate-700 px-3 py-1 rounded-full text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                Solo lectura
            </span>
        </h4>
    </div>

    <div data-slot="card-content" class="px-6 pb-6 pt-4 md:pt-0">
        <div class="bg-base-200/50 rounded-xl p-4 md:p-5 border-2 border-base-300 dark:border-gray-700">
            <p class="text-sm md:text-base text-base-content leading-relaxed">
                Carga realizada en horario de la mañana. Vehículo con 45,000 km de recorrido. Estado general del motor: excelente.
            </p>
        </div>

        <div class="mt-3 flex items-start gap-2 text-xs md:text-sm opacity-80 bg-base-200 p-3 rounded-lg border border-base-300 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock mt-0.5 opacity-60">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <p><strong class="text-base-content">Campo de solo lectura:</strong> Las observaciones no pueden ser modificadas por seguridad del registro.</p>
        </div>
    </div>
</div>
    <form action="{{ route('combustibles.update', $combustible->id) }}" method="POST"  class="space-y-6" enctype="multipart/form-data">
    @csrf 
    @method('PUT') 
        <div data-slot="card"
    class="bg-base-100 mt-6 text-base-content flex flex-col gap-6 rounded-xl border lg:col-span-3 border-l-4 border-l-orange-500 shadow-lg dark:border-gray-700 dark:border-l-orange-500 overflow-hidden">
    
    <div data-slot="card-header"
        class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 pb-6 
               bg-gradient-to-r from-orange-50 to-amber-50 dark:from-slate-800 dark:to-slate-900 
               border-b border-orange-100 dark:border-gray-700">
        <h4 data-slot="card-title" class="flex items-center gap-2 md:gap-3 text-base md:text-lg font-semibold text-base-content">
            <div class="bg-orange-500 p-2 rounded-lg text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fuel">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
            <span class="text-white">Detalles del Combustible</span>
        </h4>
    </div>

    <div data-slot="card-content" class="px-6 pb-6 pt-4 md:pt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            
            <div class="space-y-3 md:space-y-4">
                <h3 class="text-xs md:text-sm font-semibold opacity-60 uppercase tracking-wide flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="opacity-70"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    Información Fija
                </h3>
                
                <div class="bg-orange-50 dark:bg-orange-900/10 rounded-xl p-3 md:p-4 border border-orange-200 dark:border-orange-800/50">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs font-semibold text-orange-600 dark:text-orange-400 uppercase">Combustible</span>
                    </div>
                    <p class="text-xl md:text-2xl font-bold text-base-content">Diesel</p>
                </div>

                <div class="bg-emerald-50 dark:bg-emerald-900/10 rounded-xl p-3 md:p-4 border border-emerald-200 dark:border-emerald-800/50">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 uppercase">Precio por Litro</span>
                    </div>
                    <p id="precio_litro" class="text-xl md:text-2xl font-bold text-base-content" data-precio="{{ $combustible->precio }}">$ {{ number_format($combustible->precio, 2, ',', '.') }}</p>
                    <input type="hidden" name="precio" value="{{ $combustible->precio }}"> 
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-base-200/50 rounded-xl p-3 border border-base-300">
                        <p class="text-[10px] uppercase opacity-60 font-bold">Subcuenta</p>
                        <p class="text-sm font-bold text-blue-600 dark:text-blue-400">5101-001</p>
                    </div>
                    <div class="bg-base-200/50 rounded-xl p-3 border border-base-300">
                        <p class="text-[10px] uppercase opacity-60 font-bold">Método</p>
                        <p class="text-sm font-bold text-violet-600 dark:text-violet-400">Tarjeta</p>
                    </div>
                </div>
            </div>

            <div class="space-y-3 md:space-y-4">
                <h3 class="text-xs md:text-sm font-semibold text-emerald-600 dark:text-emerald-400 uppercase tracking-wide flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 21h8"></path><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"></path></svg>
                    Campo Editable
                </h3>
                <div class="relative group">
                    <div class="absolute inset-0 bg-emerald-500 rounded-2xl blur-lg opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative bg-white dark:bg-slate-800 border-2 border-emerald-500 rounded-2xl p-4 md:p-6 shadow-xl">
                        <label class="text-sm font-bold text-emerald-900 dark:text-emerald-400 block mb-2">Cantidad de Litros *</label>
                        <div class="relative">
                            <input type="number" 
                                id="cantidad_litros"
                                name="cantidad_litros"
                                class="w-full text-3xl md:text-4xl font-bold h-16 md:h-20 text-center border-b-4 border-emerald-500 bg-transparent focus:outline-none text-white" 
                                value="{{ $combustible->cantidad_litros }}" 
                                step="0.01"
                                min="0">
                            <span class="absolute right-0 top-1/2 -translate-y-1/2 text-xl font-bold text-emerald-500/50">L</span>
                        </div>
                        <div class="mt-4 flex items-center gap-2 text-[10px] md:text-xs text-emerald-700 dark:text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                            <span>Puedes modificar esta cantidad libremente.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3 md:space-y-4">
                <h3 class="text-xs md:text-sm font-semibold text-orange-600 dark:text-orange-400 uppercase tracking-wide flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 7h6v6"></path><path d="m22 7-8.5 8.5-5-5L2 17"></path></svg>
                    Cálculo Automático
                </h3>
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 rounded-2xl blur-lg opacity-30"></div>
                    <div class="relative bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-5 md:p-6 text-white shadow-xl">
                        <p class="text-xs font-semibold opacity-80 mb-1">MONTO TOTAL</p>
                        <p id="monto_total" class="text-4xl md:text-5xl font-black mb-4 text-center tracking-tight">$ {{ number_format($combustible->cantidad_litros * $combustible->precio_litro, 2, ',', '.') }}</p>
                        
                        <div class="bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/20 text-[11px] md:text-xs">
                            <div class="flex justify-between items-center opacity-90">
                                <span id="calculo_detalle">{{ number_format($combustible->cantidad_litros, 2, ',', '.') }} L × $ {{ number_format($combustible->precio_litro, 2, ',', '.') }}</span>
                                <span class="font-bold">Total</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-amber-50 dark:bg-amber-900/10 border border-amber-200 dark:border-amber-800/50 rounded-xl p-3 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-amber-600 shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>
                    <p class="text-[11px] text-amber-800 dark:text-amber-500">El monto se actualiza en tiempo real al modificar los litros.</p>
                </div>
            </div>

        </div>
    </div>
</div>
    <div data-slot="card"
    class="bg-base-100 mt-6 text-base-content flex flex-col gap-6 rounded-xl border border-l-4 border-l-green-500 shadow-lg dark:border-gray-700 dark:border-l-green-500 overflow-hidden">
    
    <div data-slot="card-header"
        class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 pb-6 
               bg-gradient-to-r from-green-50 to-emerald-50 dark:from-slate-800 dark:to-slate-900 
               border-b border-green-100 dark:border-gray-700">
        
        <h4 data-slot="card-title" class="flex items-center justify-between text-base md:text-lg font-semibold">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="bg-green-500 p-2 rounded-lg text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                        <circle cx="9" cy="9" r="2"></circle>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                    </svg>
                </div>
                <span class="text-white">Comprobante</span>
            </div>
            
            <span class="flex items-center gap-2 text-[10px] md:text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 px-3 py-1 rounded-full border border-green-200 dark:border-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-pen-line">
                    <path d="M13 21h8"></path>
                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"></path>
                </svg>
                Editable
            </span>
        </h4>
    </div>

    <div data-slot="card-content" class="px-6 pb-6 pt-4 md:pt-6">
        <div class="space-y-4 md:space-y-6">
            
            <div class="relative group">
                <div class="absolute inset-0 bg-green-500 rounded-2xl blur-lg opacity-10 group-hover:opacity-20 transition-opacity"></div>
                
                <label for="imagen_factura" id="upload_zone" class="relative border-2 border-dashed border-green-400 dark:border-green-800 bg-base-200/50 hover:bg-base-200 dark:hover:bg-slate-800/50 rounded-2xl p-6 md:p-10 text-center transition-all cursor-pointer block">
                    <div class="bg-green-100 dark:bg-green-900/20 p-4 rounded-full w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 flex items-center justify-center shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload text-green-600 dark:text-green-400">
                            <path d="M12 3v12"></path>
                            <path d="m17 8-5-5-5 5"></path>
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        </svg>
                    </div>
                    
                    <p class="text-base md:text-lg font-bold text-base-content mb-1">Arrastra la imagen aquí</p>
                    <p class="text-xs md:text-sm opacity-60 mb-6 text-base-content">o haz clic para explorar tus archivos</p>
                    
                    <input type="file" id="imagen_factura" name="imagen_factura" accept="image/*" class="hidden">
                    
                    <span class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition-all shadow-md hover:shadow-green-500/20 hover:scale-105 active:scale-95 cursor-pointer text-sm md:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        Seleccionar Imagen
                    </span>
                </label>

                <div id="preview_container" class="hidden relative border-2 border-solid border-green-400 dark:border-green-800 bg-base-200/50 rounded-2xl p-4 md:p-6 text-center">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-green-600"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                            <span class="text-sm font-bold text-green-700 dark:text-green-400">Vista previa</span>
                        </div>
                        <button type="button" id="btn_remove_image" class="btn btn-sm btn-circle btn-ghost text-red-500 hover:bg-red-100 dark:hover:bg-red-900/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                        </button>
                    </div>
                    <img id="preview_image" src="" alt="Vista previa" class="max-h-64 mx-auto rounded-lg border border-base-300 shadow-md">
                    <p id="preview_filename" class="text-xs text-center mt-3 opacity-70"></p>
                    <label for="imagen_factura" class="inline-flex items-center gap-2 px-4 py-2 mt-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-all shadow-sm cursor-pointer text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        Cambiar imagen
                    </label>
                </div>
            </div>

            <div class="bg-blue-50 dark:bg-slate-800/40 border border-blue-100 dark:border-slate-700 rounded-xl p-4">
                <div class="flex items-start gap-3 text-blue-800 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mt-0.5 shrink-0 opacity-70">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" x2="12" y1="8" y2="12"></line>
                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                    </svg>
                    <div>
                        <p class="text-sm font-bold mb-2">Requisitos de la imagen:</p>
                        <ul class="text-xs grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1 opacity-80">
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 bg-current rounded-full"></span> Formatos: JPG, PNG
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1 h-1 bg-current rounded-full"></span> Tamaño máximo: 5MB
                            </li>
                            <li class="flex items-center gap-2 md:col-span-2">
                                <span class="w-1 h-1 bg-current rounded-full"></span> La imagen debe ser legible y clara
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="flex justify-end pt-4">
        <a href="{{ route('combustibles.index') }}" class="btn btn-warning mr-2"> 
            <x-heroicon-m-arrow-left class="w-4 h-4 inline" /> 
            Volver 
        </a>  
        <button type="submit" class="btn btn-primary">
            <x-heroicon-m-arrow-down-tray class="w-4 h-4 inline" /> 
            Editar Carga De Combustible 
        </button>
    </div>
    </form> 
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cantidadInput = document.getElementById('cantidad_litros');
        const precioElement = document.getElementById('precio_litro');
        const montoTotalElement = document.getElementById('monto_total');
        const calculoDetalleElement = document.getElementById('calculo_detalle');
        
        const precioLitro = parseFloat(precioElement.dataset.precio) || 0;

        function formatearNumero(num) {
            const partes = Number(num).toFixed(2).split('.');
            const entero = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            const decimal = partes[1];
            return `${entero},${decimal}`;
        }

        function calcularTotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const total = cantidad * precioLitro;
            
            montoTotalElement.textContent = `$ ${formatearNumero(total)}`;
            calculoDetalleElement.textContent = `${formatearNumero(cantidad)} L × $ ${formatearNumero(precioLitro)}`;
        }

        cantidadInput.addEventListener('input', calcularTotal);
        cantidadInput.addEventListener('change', calcularTotal);
        
        calcularTotal();

        // Preview de imagen
        const inputImagen = document.getElementById('imagen_factura');
        const uploadZone = document.getElementById('upload_zone');
        const previewContainer = document.getElementById('preview_container');
        const previewImage = document.getElementById('preview_image');
        const previewFilename = document.getElementById('preview_filename');
        const btnRemoveImage = document.getElementById('btn_remove_image');

        inputImagen.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (!file) {
                uploadZone.classList.remove('hidden');
                previewContainer.classList.add('hidden');
                return;
            }

            if (!file.type.startsWith('image/')) {
                alert('Por favor, selecciona un archivo de imagen válido.');
                inputImagen.value = '';
                uploadZone.classList.remove('hidden');
                previewContainer.classList.add('hidden');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewFilename.textContent = file.name;
                uploadZone.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });

        btnRemoveImage.addEventListener('click', function() {
            inputImagen.value = '';
            previewImage.src = '';
            previewFilename.textContent = '';
            uploadZone.classList.remove('hidden');
            previewContainer.classList.add('hidden');
        });
    });
</script>
@endsection
