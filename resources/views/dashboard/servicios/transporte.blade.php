@extends('layouts.layoutDash')
@section('title', 'Transporte')
@section('links')
    <a href="{{ route('transporte') }}" class="navbar-brand nav-link">Transporte/</a>
@endsection

@section('content')
    @section('titulo', 'Transporte') 
        <div class="alert alert-warning mx-2 " role="alert">
            Este servicio no está disponible temporalmente.
        </div>
@endsection

