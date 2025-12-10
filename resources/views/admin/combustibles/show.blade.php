@extends('layouts.admin')

@section('content')
    <!-- Titulo y boton -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ver Orden de Combustible</h1>
        <div class="flex gap-2">
            <a href="{{ route('combustibles.index') }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md bg-blue-600 text-sm hover:bg-blue-700 text-white">
                <x-heroicon-o-arrow-left class="w-4 h-4 inline" />
                Volver a Combustibles
            </a>
            <a href="{{ route('combustibles.edit', $combustible->id) }}"
                class="inline-flex items-center gap-2 h-9 px-4 py-2 rounded-md text-sm bg-warning hover:bg-warning-700 text-white">
                <x-heroicon-o-pencil class="w-4 h-4 inline" />
                Editar Combustible
            </a>
        </div>
    </div>
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
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
                    <x-heroicon-o-eye class="w-4 h-4 inline" />
                    Ver Combustible
                </span>
            </li>
        </ul>

    </div>
    <div class="card bg-base-100 shadow-md rounded-xl p-6"> 
        <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <div class="bg-orange-500 p-4 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-fuel size-8 text-white" aria-hidden="true">
                        <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                        <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16">
                        </path>
                        <path d="M2 21h13"></path>
                        <path d="M3 9h11"></path>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-3xl">Carga de Combustible</h1><span data-slot="badge"
                            class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-primary text-primary-foreground [a&amp;]:hover:bg-primary/90">Activo</span>
                    </div>
                    <p class="text-gray-500 mb-1">Factura N° FACT-{{ $combustible->codigo }}</p>
                    <div class="flex items-center gap-2 mt-2"><span data-slot="badge"
                            class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-orange-100 text-orange-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-droplet size-3 mr-1" aria-hidden="true">
                                <path
                                    d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z">
                                </path>
                            </svg>{{ $combustible->tipo }}</span><span
                            class="text-gray-500 text-sm">{{ $combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—' }}</span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Monto Total</p>
                <p class="text-3xl font-medium text-orange-600">$ {{ number_format($combustible->monto, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    @php
        $destino = $combustible->destino;
        $esVehiculo = $destino instanceof \App\Models\Vehiculo;
        $esDestino = $destino instanceof \App\Models\Destino;
        $esEquipo = $destino instanceof \App\Models\Equipo;
    @endphp
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        {{-- CASO A: Vehículo --}}
        @if ($esVehiculo)
            {{-- Tarjeta Vehículo (la que ya tienes) --}}
            <div data-slot="card" class="card bg-base-100 shadow-md rounded-xl p-6">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min border-b border-neutral-200 grid-rows-[auto_auto] items-start gap-1.5 px-6 py-4 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:">
                    <h4 data-slot="card-title" class="flex items-center gap-2 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-car size-5" aria-hidden="true">
                            <path
                                d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2">
                            </path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>Vehículo
                    </h4>
                </div>

                {{-- ... HEADER ... --}}
                <div data-slot="card-content" class="px-6 [&:last-child]:pb-6 space-y-3">
                    <div class=" p-4 rounded-lg text-center">
                        <p class="text-3xl font-bold text-blue-600">
                            {{ $destino->patente ?? 'Sin vehículo asignado' }}
                        </p>
                        <p class="text-sm text-gray-600 mt-1">Patente</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Marca:</span>
                            <span class="text-sm font-medium">{{ $destino->marca ?? 'Sin vehículo asignado' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Modelo:</span>
                            <span class="text-sm font-medium">{{ $destino->modelo ?? 'Sin vehículo asignado' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Tipo:</span>
                            <span class="text-sm font-medium">{{ $destino->tipo ?? 'Sin vehículo asignado' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tarjeta Conductor (igual a la que ya tienes) --}}
            <div data-slot="card" class="card bg-base-100 shadow-md rounded-xl p-6">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min border-b grid-rows-[auto_auto] items-start gap-1.5 px-6 py-4 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:">
                    <h4 data-slot="card-title" class="flex items-center gap-2 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user size-5" aria-hidden="true">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>Conductor
                    </h4>
                </div>
                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-lg">
                        <div
                            class="bg-blue-500 size-12 rounded-full flex items-center justify-center text-white font-medium">
                            RF</div>
                        <div>
                            <p class="font-medium">{{ $combustible->empleado->nombre }}</p>
                            <p class="text-sm text-gray-500">DNI: {{ $combustible->empleado->dni }}</p>
                        </div>
                    </div>
                    <div class="pt-3 border-t">
                        <p class="text-xs text-gray-500 mb-1">Registrado por:</p>
                        <p class="text-sm font-medium">{{ $combustible->user->name }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- CASO B: Destino genérico (tabla destinos) --}}
        @if ($esDestino)
            <div data-slot="card" class="card bg-base-100 shadow-md rounded-xl p-6">

                <!-- Header -->
                <div data-slot="card-header"
                    class="px-6 py-4 border-b border-neutral-200 flex items-center justify-between">
                    <h4 class="text-lg font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h12M3 17h18" />
                        </svg>
                        Destino
                    </h4>
                </div>

                <!-- Contenido -->
                <div data-slot="card-content" class="px-6 py-5 space-y-4">

                    <!-- Item -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Nombre:</span>
                        <span class="text-sm font-medium ">
                            {{ $destino->nombre ?? 'Sin destino' }}
                        </span>
                    </div>

                    <!-- Item -->
                    <div class="flex justify-between items-center p-3 rounded-lg ">
                        <span class="text-sm">Tipo:</span>
                        <span class="text-sm font-medium ">
                            {{ $destino->tipo ?? '—' }}
                        </span>
                    </div>

                    <!-- Item -->
                    <div class="flex justify-between items-center p-3 rounded-lg ">
                        <span class="text-sm">Descripción:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->descripcion ?? '—' }}
                        </span>
                    </div>

                </div>
            </div>
        @endif
        {{-- CASO C: Equipo --}}
        @if ($esEquipo)
            <div data-slot="card" class="card bg-base-100 shadow-md rounded-xl p-6">

                <!-- Header -->
                <div data-slot="card-header"
                    class="px-6 py-4 border-b border-neutral-200 flex items-center justify-between">
                    <h4 class="text-lg font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h12M3 17h18" />
                        </svg>
                        Equipo
                    </h4>
                </div>

                <!-- Contenido -->
                <div data-slot="card-content" class="px-6 py-5 space-y-4">

                    <!-- Nombre -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Nombre:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->nombre ?? 'Sin destino' }}
                        </span>
                    </div>

                    <!-- Tipo de equipo -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Tipo:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->tipo_equipo ?? '—' }}
                        </span>
                    </div>

                    <!-- Modelo -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Modelo:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->modelo ?? '—' }}
                        </span>
                    </div>

                    <!-- Marca -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Marca:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->marca ?? '—' }}
                        </span>
                    </div>

                    <!-- Número de serie -->
                    <div class="flex justify-between items-center p-3 rounded-lg">
                        <span class="text-sm">Nr. Serie:</span>
                        <span class="text-sm font-medium">
                            {{ $destino->numero_serie ?? '—' }}
                        </span>
                    </div>

                </div>
            </div>
        @endif

        {{-- Tarjeta Resumen de Carga (SIEMPRE) --}}
        <div data-slot="card" class="card bg-base-100 shadow-md rounded-xl p-6">
            <div data-slot="card-header"
                class="@container/card-header grid auto-rows-min border-b border-neutral-200 grid-rows-[auto_auto] items-start gap-1.5 px-6 py-4 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:">
                <h4 data-slot="card-title" class="text-lg font-semibold flex items-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-droplet size-5" aria-hidden="true">
                        <path
                            d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z">
                        </path>
                    </svg>Resumen de Carga</h4>
            </div>
            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-3">
                <div class=" p-3 rounded-lg">
                    <p class="text-sm text-gray-500">Litros Cargados</p>
                    <p class="text-2xl font-bold text-orange-600">{{ $combustible->litros }} L</p>
                </div>
                <div class=" p-3 rounded-lg">
                    <p class="text-sm text-gray-500">Precio por Litro</p>
                    <p class="text-xl font-medium">$. {{ number_format($combustible->precio, 2, ',', '.') }}</p>
                </div>
                <div class=" p-3 rounded-lg">
                    <p class="text-sm text-gray-500">Total Pagado</p>
                    <p class="text-xl font-bold text-orange-600">$. {{ number_format($combustible->monto, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    
   <div class="grid bg-base-100 mt-6">

    <div data-slot="card" class="bg-card text-card-foreground rounded-xl shadow-md">

        <!-- Header -->
        <div data-slot="card-header"
             class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                <path d="M2 21h13"></path>
                <path d="M3 9h11"></path>
            </svg>
            <h4 class="text-lg font-semibold">Detalles de la Carga</h4>
        </div>

        <!-- Contenido -->
        <div data-slot="card-content" class="px-6 py-5">

            <!-- GRID 2 COLUMNAS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- ITEM GENERATOR -->
                @php
                    $items = [
                        [
                            'label' => 'Fecha de Carga',
                            'value' => $combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—',
                            'icon' => 'calendar'
                        ],
                        [
                            'label' => 'Estación de Servicio',
                            'value' => $combustible->estacion,
                            'icon' => 'map-pin'
                        ],
                        [
                            'label' => 'Tipo de Combustible',
                            'value' => $combustible->tipo,
                            'icon' => 'droplet',
                            'badge' => true,
                        ],
                        [
                            'label' => 'Método de Pago',
                            'value' => $combustible->tipo_de_pago,
                            'icon' => 'credit-card'
                        ],
                        [
                            'label' => 'Cuenta',
                            'value' => $combustible->sub_cuenta,
                            'icon' => 'credit-card'
                        ],
                        [
                            'label' => 'Usuario que Autoriza',
                            'value' => $combustible->user->name,
                            'icon' => 'user'
                        ],
                        [
                            'label' => 'N° Factura',
                            'value' => 'FACT-' . $combustible->codigo,
                            'icon' => 'file-text'
                        ],
                        [
                            'label' => 'Litros Cargados',
                            'value' => $combustible->litros . ' L',
                            'icon' => 'gauge'
                        ],
                    ];

                    // Íconos SVG para usar inline
                    $icons = [
                        'calendar' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>',
                        'map-pin' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>',
                        'droplet' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg>',
                        'credit-card' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"></rect><line x1="2" x2="22" y1="10" y2="10"></line></svg>',
                        'user' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20a6 6 0 0 0-12 0"></path><circle cx="12" cy="10" r="4"></circle></svg>',
                        'file-text' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"></path><path d="M14 2v5a1 1 0 0 0 1 1h5"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>',
                        'gauge' => '<svg class="size-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 14a2 2 0 1 0-2-2"></path><path d="M6.7 6.7A8 8 0 1 1 17.3 6.7"></path></svg>',
                    ];
                @endphp

                @foreach ($items as $item)
                    <div class="flex items-start gap-3 p-3 rounded-lg">

                        {!! $icons[$item['icon']] !!}

                        <div class="flex-1">
                            <p class="text-sm text-gray-500">{{ $item['label'] }}</p>

                            @if(isset($item['badge']))
                                <span class="inline-flex items-center rounded-md px-2 py-0.5 text-xs font-medium">
                                    {{ $item['value'] }}
                                </span>
                            @else
                                <p class="font-medium ">{{ $item['value'] }}</p>
                            @endif
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- Observaciones -->
            <div class="mt-6 pt-4 border-t border-neutral-200 dark:border-neutral-700">
                <p class="text-sm text-gray-500 mb-2">Observaciones</p>
                <p class="text-sm leading-relaxed p-3 rounded-md bg-base-200 dark:bg-base-300">
                    {{ $combustible->observaciones }}
                </p>
            </div>

        </div>
    </div>
</div>


@endsection
