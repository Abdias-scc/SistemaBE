@extends('layouts.layoutDash')
@section('title', 'Servicio médico')
@section('links')
    <a href="{{ route('servicio_medico') }}" class="navbar-brand nav-link">Servicio médico/</a>
@endsection

@section('content')
    <div>
        <h1>Servicio médico</h1>
        <div class="alert alert-warning mx-2 z-n1" role="alert">
            Este servicio no está disponible temporalmente.
        </div>
    </div>
@endsection