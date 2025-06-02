@extends('layouts.layoutDash')
@section('title', 'Servicio Medico')
@section('links')
    <a href="{{ route('servicio_medico') }}" class="navbar-brand nav-link">Servicio Medico/</a>
@endsection

@section('content')
    @section('titulo', 'Servicio Medico') 
        <div class="alert alert-warning mx-2 " role="alert">
            Este servicio no está disponible temporalmente.
        </div>
@endsection

