@extends('layouts.layoutDash')
@section('title', 'PNF')
@section('links')
    <a href="{{ route('pnf') }}" class="navbar-brand nav-link">PNF/</a>
@endsection

@section('content')
    @section('titulo', 'PNF')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction: column;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Pnf..." id="searchInput">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button style="text-wrap: nowrap; width: 130px; display: flex; margin-top: 10px;" type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
                    <i class="bi bi-person-plus"></i> Registrar PNF
                </button>
            </div>
        </div>
        <div class="table-container">
            @if ($pnfs->isEmpty())
                {{-- Si no hay estudiantes, mostrar mensaje --}}
                <div class="alert alert-info text-center" role="alert">
                    No hay pnfs registrados.
                </div>
            @else
            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">PNF ↑</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pnfs as $pnf)
                    <tr>
                        <td>{{$pnf->nombre_pnf}}</td>
                        <td>
                            <button class="btn-minimal btn-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <img src="{{ asset('icons/edit_blue.svg') }}" alt="Icono de editar" class="icon-edit">
                                Editar
                            </button>
                            <button class="btn-minimal btn-delete" id="deleteButton" data-pnf-id="{{ $pnf->id_pnf }}">
                                <img src="{{ asset('icons/delete_red.svg') }}" alt="Icono de eliminar" class="icon-delete">
                                Eliminar
                            </button>
                        </td>
                        <td>
                            @if($pnf->id_estatus === 1)
                                <div class="form-check form-switch d-flex align-items-center" style="margin-bottom: 0;">
                                    <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Informatica" data-pnf-id="{{ $pnf->id_pnf }}">
                                    <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                        Activo
                                    </label>
                                </div>
                            @else
                                <div class="form-check form-switch d-flex align-items-center" style="margin-bottom: 0;">
                                    <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" style="width: 2.5em; height: 1.3em;" data-sede="Informatica" data-pnf-id="{{ $pnf->id_pnf }}">
                                    <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                        Inactivo
                                    </label>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif    
                </tbody>
            </table>
            {{-- SECCION DE BOTONES DE PRIMERA Y ULTIMA PAGINA --}}
            <div class="d-flex justify-content-between align-items-center my-4">
                <div>
                    <span>Mostrando {{ $pnfs->count() }} de {{ $pnfs->total() }} pnfs</span>
                </div>
                <div>
                    <span>Página {{ $pnfs->currentPage() }} de {{ $pnfs->lastPage() }}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between my-2 gap-2">
                @if ($pnfs->onFirstPage() && $pnfs->lastPage() > 1)
                    <a href="{{ $pnfs->url($pnfs->lastPage()) }}" class="btn btn-outline-primary">
                        Ir a última página
                    </a>
                @elseif ($pnfs->currentPage() == $pnfs->lastPage() && $pnfs->lastPage() > 1)
                    <a href="{{ $pnfs->url(1) }}" class="btn btn-outline-primary">
                        Ir a primera página
                    </a>
                @elseif ($pnfs->lastPage() > 1)
                    <a href="{{ $pnfs->url(1) }}" class="btn btn-outline-primary">
                        Ir a primera página
                    </a>
                    <a href="{{ $pnfs->url($pnfs->lastPage()) }}" class="btn btn-outline-primary">
                        Ir a última página
                    </a>
                @endif
            </div>
        </div>
        <div>
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{-- Botón Anterior --}}
                @if ($pnfs->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $pnfs->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                {{-- Enlaces de páginas --}}
                @foreach ($pnfs->getUrlRange(1, $pnfs->lastPage()) as $page => $url)
                    <li class="page-item {{ $pnfs->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Botón Siguiente --}}
                @if ($pnfs->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $pnfs->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
        </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.querySelectorAll('.sede-switch').forEach(function(switchInput) {
                switchInput.addEventListener('change', function(e) {
                    const label = switchInput.nextElementSibling;
                    const sede = switchInput.getAttribute('data-sede');
                    const checked = switchInput.checked;
                    const id = switchInput.getAttribute('data-pnf-id');

                    // Revert the switch until user confirms
                    switchInput.checked = !checked;

                    Swal.fire({
                        title: checked ? `¿Desea activar el PNF ${sede}?` : `¿Desea inactivar el PNF ${sede}?`,
                        text: checked ? 'El PNF será marcada como activa.' : 'El PNF será marcada como inactiva.',
                        icon: checked ? 'question' : 'warning',
                        showCancelButton: true,
                        confirmButtonText: checked ? 'Activar' : 'Inactivar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            switchInput.checked = checked;
                            label.textContent = checked ? 'Activo' : 'Inactivo';

                            // Aquí puedes agregar la lógica para activar/inactivar la sede en el backend
                            //Consulamos a la url para activar/desactivar el pnf-?id_estatus
                            fetch(`/dashboard/pnf/estatus/${id}`, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json',
                                }
                            })
                            .then(response => response.json())
                            .then(response =>{
                                Swal.fire({
                                    title: checked ? '¡Activada!' : '¡Inactivada!',
                                    text: checked ? `El PNF ${sede} ha sido activada.` : `El PNF ${sede} ha sido inactivada.`,
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                });
                            })
                            .catch(error =>{
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se pudo activar el PNF. Inténtalo de nuevo más tarde.'+ error,
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar',
                                });
                            })

                        }
                    });
                });
            });
        });
        //*Script para el inputt de buscar
        document.getElementById('searchButton').addEventListener('click', function() {
            const input = document.getElementById('searchInput');
            // Elimina cualquier mensaje de error existente
            const feedback = input.parentNode.querySelector('.invalid-feedback');
            if (feedback) feedback.remove();

            if (input.value.trim() === '') {
                input.classList.add('is-invalid');
                const newFeedback = document.createElement('div');
                newFeedback.className = 'invalid-feedback';
                newFeedback.textContent = 'El campo de búsqueda no puede estar vacío.';
                input.parentNode.appendChild(newFeedback);
                input.focus();
            } else {
                input.classList.remove('is-invalid');
                // Aquí puedes agregar la lógica de búsqueda
                const searchValue = input.value.trim().toLowerCase();
                window.location.href = `/dashboard/pnf?search=${encodeURIComponent(searchValue)}`;
            }
        });

        document.getElementById('searchInput').addEventListener('input', function() {
            this.classList.remove('is-invalid');
            const feedback = this.parentNode.querySelector('.invalid-feedback');
            if (feedback) feedback.remove();
        });

        document.getElementById('searchInput').addEventListener('blur', function() {
            // Elimina cualquier mensaje de error existente
            const feedback = this.parentNode.querySelector('.invalid-feedback');
            if (feedback) feedback.remove();

            if (this.value.trim() === '') {
                this.classList.add('is-invalid');
                const newFeedback = document.createElement('div');
                newFeedback.className = 'invalid-feedback';
                newFeedback.textContent = 'El campo de búsqueda no puede estar vacío.';
                this.parentNode.appendChild(newFeedback);
            }
        });
        //Script para el ordenado de la tabla
    function sortTable(columnIndex) {
        const table = document.getElementById('sortable-table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        let direction = 'asc';

        // Verificar si ya está ordenado por esta columna
        if (table.getAttribute('data-sort-column') == columnIndex) {
            direction = table.getAttribute('data-sort-direction') === 'asc' ? 'desc' : 'asc';
        }

        // Ordenar las filas
        rows.sort((a, b) => {
            const aValue = a.cells[columnIndex].textContent.trim().toLowerCase();
            const bValue = b.cells[columnIndex].textContent.trim().toLowerCase();

            // Ordenar siempre como string, de la A a la Z o Z a A, sin importar si es número
            if (direction === 'asc') {
            return aValue.localeCompare(bValue, 'es', { numeric: false });
            } else {
            return bValue.localeCompare(aValue, 'es', { numeric: false });
            }
        });

        // Reconstruir la tabla
        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));

        // Actualizar indicadores visuales (solo una flecha)
        const headers = table.querySelectorAll('th');
        headers.forEach((header, index) => {
            // Limpiar todas las flechas primero
            header.innerHTML = header.textContent.replace(/ ↑| ↓/g, '');

            // Agregar flecha solo a la columna actualmente ordenada
            if (index === columnIndex) {
                header.innerHTML += direction === 'asc' ? ' ↑' : ' ↓';
            }
        });

        // Guardar estado de ordenamiento
        table.setAttribute('data-sort-column', columnIndex);
        table.setAttribute('data-sort-direction', direction);
    }

    /* Script para la edición de estudiantes */
        document.addEventListener('DOMContentLoaded', function () {
        // Delegación para todos los botones Editar
        document.querySelectorAll('button[data-bs-target="#staticBackdrop"]').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                const row = btn.closest('tr');
                if (row) {
                    document.getElementById('editPNF').value = row.cells[0].textContent.trim();
                }
            });
        });


        document.getElementById('saveEdit').addEventListener('click', function(e) {
            e.preventDefault();
            const editPNF = document.getElementById('editPNF');
            //recuperamos la id del pnf
            const id = document.getElementById('sedeCentralSwitch').getAttribute('data-pnf-id');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let valid = true;


            // Validar cargo
            if (editPNF.value === '') {
                editPNF.classList.add('is-invalid');
                valid = false;
            } else {
                editPNF.classList.remove('is-invalid');
            }

            if (!valid) return;

            //Mensaje de confirmación
            Swal.fire({
                title: '¿Estas seguro que quieres actualizar los datos?',
                text: 'Comprueba los datos antes de confirmar.',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                showCancelButton: true,
            })
            .then((result)=>{
                if (result.isConfirmed) {
                    //Consultamos la url para el backend
                    fetch(`/dashboard/pnf/editar/`,{
                        method: "PUT",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body:JSON.stringify({id_pnf : id, nuevo_nombre_pnf : editPNF.value})
                    })
                    .then(response =>{
                        if(!response.ok){
                            Swal.fire({
                                title: 'Error',
                                text: 'No se pudo actualizar el PNF. El PNF no existe.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar',
                            })
                        }
                        return response.json()
                    })
                    .then(response =>{

                        //avisamos al usuario
                        Swal.fire({
                            title: '¡Actualizado!',
                            text: 'Los datos han sido actualizados',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        })
                    
                        // Cierra el modal después de actualizar
                        var modal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
                        modal.hide();
                    })
                    .catch( error =>{
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo actualizar el PNF.Intentalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    })

                }
            });

        });

        // Quitar la clase is-invalid al escribir
        ['editCedula', 'editNombre', 'editApellido', 'editPNF'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });


    });
    /*Script para el boton de eliminar*/
    document.querySelectorAll('button[id="deleteButton"]').forEach(function(btn) {
        //Recoger el nombre y el apellido del estudiante a eliminar en la fila que esta en el boton
        const row = btn.closest('tr');
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        //Guardar los datos del estudiante a eliminar en variables
        const nombre = row.cells[0].textContent.trim();


        btn.addEventListener('click', function(e) {
            //Mostrar el modal de confirmación con los datos del estudiante a eliminar
            Swal.fire({
                title: `¿Estás seguro que quieres eliminar a ${nombre}?`,
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                reverseButtons: true
            })
            .then((result)=>{
                //Si el usuario confirma la eliminación, enviar la solicitud a eliminar al backend
                const id = btn.getAttribute('data-pnf-id');

                fetch(`/dashboard/pnf/borrar/${id}`,{
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    }
                })
                .then(response => {
                    if(!response.ok){
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo eliminar el estudiante. Inténtalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        });
                    }
                    return response.json()
                })
                .then(response =>{
                    //Eliminamos el pnf de la tabla
                    row.remove()
                    //Imprimimos una alerta
                    Swal.fire({
                        title: '¡Eliminado!',
                        text: 'El PNF ha sido eliminado',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    })
                })

            })

        })
    });

    </script>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos del PNF</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="mb-3 text-center">
                                <label for="editPNF" class="form-label w-100" style="display: block; font-weight: bold;">PNF</label>
                                <input type="text" class="form-control mx-auto" id="editPNF" name="pnf" required style="width: 90%;" placeholder="Edita el nombre del PNF">
                                <div class="invalid-feedback">
                                    El PNF no puede estar vacío.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-minimal btn-cancel" data-bs-dismiss="modal">
                        <img src="{{ asset('icons/close.svg') }}" alt="Icono de cancelar" class="icon-close">
                        Cancelar
                    </button>
                    <button class="btn-minimal btn-save" id="saveEdit">
                        <img src="{{ asset('icons/save_green.svg') }}" alt="Icono de guardar" class="icon-save">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de registro de PNF -->
    <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" style="justify-content: center;">
            <div class="modal-content" style="width:80%; margin: auto;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo PNF</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="mb-3 text-center">
                                <label for="regPNF" class="form-label w-100" style="display: block; font-weight: bold;">PNF</label>
                                <input type="text" class="form-control mx-auto" id="regPNF" name="regPNF" required style="width: 90%;" placeholder="Escribe el nombre del nuevo PNF">
                                <div class="invalid-feedback">
                                    El PNF no puede estar vacío.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-minimal btn-cancel" data-bs-dismiss="modal">
                        <img src="{{ asset('icons/close.svg') }}" alt="Icono de cancelar" class="icon-close">
                        Cancelar
                    </button>
                    <button class="btn-minimal btn-save" id="registerStudent">
                        <img src="{{ asset('icons/save_green.svg') }}" alt="Icono de guardar" class="icon-save">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const input = document.getElementById('regPNF');
        const tbody = document.getElementById('sortable-table').querySelector('tbody');

        function agregarFila(){
            const tr = document.createElement('tr');
            tr.innerHTML = `<tr>
                        <td>${input.value.trim()}</td>
                        <td>
                            <button class="btn-minimal btn-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <img src="{{ asset('icons/edit_blue.svg') }}" alt="Icono de editar" class="icon-edit">
                                Editar
                            </button>
                            <button class="btn-minimal btn-delete" id="deleteButton">
                                <img src="{{ asset('icons/delete_red.svg') }}" alt="Icono de eliminar" class="icon-delete">
                                Eliminar
                            </button>
                        </td>
                        <td>
                            <div class="form-check form-switch d-flex align-items-center" style="margin-bottom: 0;">
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Informatica">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>`;
                    tbody.appendChild(tr);
        }

        // Validación y envío del formulario de registro
        document.getElementById('registerStudent').addEventListener('click', function(e) {
            e.preventDefault();
            let valid = true;

            // Validar PNF
            if (input.value.trim() === '') {
                input.classList.add('is-invalid');
                valid = false;
            } else {
                input.classList.remove('is-invalid');
            }

            if (!valid) {
                Swal.fire({
                    title: 'Campos vacíos',
                    text: 'Por favor complete todos los campos obligatorios.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            // Confirmación con SweetAlert
            Swal.fire({
                title: '¿Registrar PNF?',
                text: 'Verifique los datos antes de confirmar.',
                icon: 'question',
                confirmButtonText: 'Registrar',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí puedes agregar la lógica para enviar los datos al backend
                    const new_pnf = input.value.trim();
                    //Consulamos a la url para agregar pnf
                    fetch('/dashboard/pnf/agregar',{
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({nombre_pnf: new_pnf })
                    })
                    .then(response =>{
                        if(response.status === 400){
                            Swal.fire({
                                title: 'Error',
                                text: 'El PNF ya existe.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar',
                            });
                        }
                    })
                    .then(response =>{
                        //agregamos a la tabla el nuevo pnf
                        agregarFila()
                        //enviamos una alerta al usuario
                        Swal.fire({
                            title: '¡Creado!',
                            text: 'El PNF ha sido creado exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        })
                    })
                    .catch(error =>{
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo crear el PNF. Inténtalo de nuevo más tarde.'+ error,
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    })
                }
            });
        });

        // Quitar la clase is-invalid al escribir
        document.getElementById('regPNF').addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });
    </script>
    @endsection
