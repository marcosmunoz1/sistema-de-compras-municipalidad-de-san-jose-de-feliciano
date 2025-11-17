@extends('layouts.admin')

@section('content')
<div class="grid gap-4 md:grid-cols-3">
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Compras mensuales</div>
            <div class="stat-value">128</div>
        </div>
    </div>

    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Proveedores activos</div>
            <div class="stat-value">42</div>
        </div>
    </div>

    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Usuarios</div>
            <div class="stat-value">7</div>
        </div>
    </div>
</div>
@endsection
