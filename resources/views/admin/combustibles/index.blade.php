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
@endsection
