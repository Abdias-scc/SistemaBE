@extends('layouts.layoutDash')
@section('title', 'Atencion Social')
@section('links')
    <a href="{{ route('atencion_social') }}" class="navbar-brand nav-link">Atencion Social/</a>
@endsection

@section('content')
    @section('titulo', 'Atencion Social') 
        <div class="alert alert-warning mx-2 " role="alert">
            Este servicio no está disponible temporalmente.
        </div>
@endsection

