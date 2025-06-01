@extends('layouts.layoutDash')
@section('title', 'Atencion Social')
@section('links')
    <a href="{{ route('atencion_social') }}" class="navbar-brand nav-link">Atencion Social/</a>
@endsection

@section('content')
    <div>
        <h1>Atencion Social</h1>
        <div class="alert alert-warning mx-2 z-n1" role="alert">
            Este servicio no está disponible temporalmente.
        </div>
    </div>
@endsection