@extends('layouts.layoutDash')
@section('title', 'Configuracion')
@section('links')
    <a href="{{ route('config') }}" class="navbar-brand nav-link">Configuracion/</a>
@endsection

@section('content')
    @section('titulo', 'Configuración')
    <div class="contenedor">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-around align-items-center">
                <a href="{{ route('admin') }}">Administradores</a>
                <p>Muestra, modifica, elimina y agrega nuevos administradores.</p>
            </li>
        </ul>
    </div>
<style>
    p{
        margin: 0;
        padding: 0;
        color: rgb(109, 109, 109);
    }
    ul, li{
        background-color: transparent!important
    }
</style>
@endsection