@extends('layouts.layoutDash')
@section('title', 'Comedor')
@section('links')
    <a href="{{ route('comedor') }}" class="navbar-brand nav-link">Comedor/</a>
@endsection

@section('content')
    @section('titulo', 'Comedor')
    <div class="contenedor">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ingrese Cedula" aria-label="Input" required autofocus pattern="\d*" maxlength="8"
                    oninput="this.value = this.value.replace(/\D/g, '')">
                    <button class="btn btn-primary" type="button">Enviar</button>
                </div>
            </div>
        </div>
        <form>
            <fieldset disabled>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" id="cedula" class="form-control" placeholder="Cédula">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pnf" class="form-label">PNF</label>
                        <input type="text" id="pnf" class="form-control" placeholder="PNF">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="procedencia" class="form-label">Procedencia</label>
                        <input type="text" id="procedencia" class="form-control" placeholder="Procedencia">
                    </div>
                </div>
            </fieldset>
        </form>

@endsection