{{-- 
    Vista Blade: Censo de comedor

    Descripción:
    -------------
    Esta vista muestra el censo de comedor en formato de tabla, permitiendo buscar, editar y eliminar registros de personas censadas. Incluye paginación y un buscador en la parte superior.

    Secciones:
    ----------
    - Extiende el layout principal 'layouts.layoutDash'.
    - Define el título de la página como 'Censo de comedor'.
    - Incluye un enlace de navegación a la ruta 'censo'.
    - Contenido principal:
        - Título de la página.
        - Input de búsqueda y botón para filtrar resultados.
        - Tabla con los siguientes campos:
            - Cedula
            - Nombre
            - Apellido
            - PNF
            - Procedencia
            - Acciones (Editar, Eliminar)
        - Paginación para navegar entre páginas de resultados.
    - Estilos personalizados para el contenedor principal.

    Notas:
    ------
    - Actualmente los datos de la tabla son estáticos y deben ser reemplazados por datos dinámicos desde el backend.
    - Los botones de 'Editar' y 'Eliminar' no tienen funcionalidad implementada (enlaces vacíos).
    - El buscador no está conectado a ninguna lógica de filtrado.
--}}
@extends('layouts.layoutDash')
@section('title', 'Censo de comedor')
@section('links')
    <a href="{{ route('censo') }}" class="navbar-brand nav-link">Censo de comedor/</a>
@endsection

@section('content')
    @section('titulo', 'Censo de comedor')
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Persona...">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    
        <table class="table table-striped table-bordered my-5">
            <thead>
                <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">PNF</th>
                    <th scope="col">Procedencia</th>
                    <th>Acciones</th>
    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456789</td>
                    <td>Angel</td>
                    <td>Hernandez</td>
                    <td>123456789</td>
                    <td>Agua Blanca</td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <tr >
                    <td>987654321</td>
                    <td>Maria</td>
                    <td>Perez</td>
                    <td>456789123</td>
                    <td>Barquisimeto</td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>112233445</td>
                    <td>Jose</td>
                    <td>Gomez</td>
                    <td>789123456</td>
                    <td>Caracas</td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>556677889</td>
                    <td>Luisa</td>
                    <td>Martinez</td>
                    <td>321654987</td>
                    <td>Valencia</td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>998877665</td>
                    <td>Carlos</td>
                    <td>Rodriguez</td>
                    <td>654987321</td>
                    <td>Maracay</td>
                    <td>
                        <a id="btn-editar" href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>334455667</td>
                    <td>Ana</td>
                    <td>Fernandez</td>
                    <td>987321654</td>
                    <td>Puerto Cabello</td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection