@extends('layouts.admin')

@section('content')
 <!-- Titulo y boton --> 
 <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold">Combustibles</h1>
    <a href="{{ route('combustibles.create') }}" 
       class="btn btn-primary">
        + Nuevo Combustible 
    </a>
 </div>
 
 <div class="breadcrumbs text-sm mb-6">
  <ul>
    <li>
      <a href="{{ route('admin.index') }}">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="h-4 w-4 stroke-current">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
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
  </ul>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 pd-6 mb-6">

    <!-- Card 1 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total del Mes</p>
                    <h3 class="mt-2">$718.20</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-blue-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Litros Consumidos</p>
                    <h3 class="mt-2">185 L</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-green-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Precio Promedio</p>
                    <h3 class="mt-2">$3.88</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-yellow-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-base-100 shadow-xl bg-card text-card-foreground flex flex-col gap-6 rounded-xl mx-4">
        <div class="px-6 pt-6 pb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Cargas</p>
                    <h3 class="mt-2">4</h3>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-fuel w-10 h-10 text-red-600">
                    <path d="M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 4 0v-6.998a2 2 0 0 0-.59-1.42L18 5"></path>
                    <path d="M14 21V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16"></path>
                    <path d="M2 21h13"></path>
                    <path d="M3 9h11"></path>
                </svg>
            </div>
        </div>
    </div>

</div>
<!-- Buscador -->
<form action="{{ route('combustibles.index') }}" method="GET"> 
    <div class="card bg-base-100 shadow p-6 mb-6">
        <div class="flex items-center gap-3">

            <!-- INPUT -->
            <label class="w-full"> 
                <input name="search" value="{{ request('search') ?? '' }}"
                    type="text" 
                    placeholder="Buscar por vehiculo, combustible, fecha..."
                    class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                        px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                        focus:border-primary transition"
                />
            </label>

            <!-- BOTÓN -->
            <button class="btn btn-primary">
             <x-heroicon-o-magnifying-glass class="w-4 h-4" /> 
                Buscar
            </button>
              @if(request('search'))
                <a href="{{ route('combustibles.index') }}" class="btn btn-error"><x-heroicon-o-trash class="w-4 h-4" /> Limpiar</a>
              @endif 
        </div>
    </div>
</form>


@endsection
