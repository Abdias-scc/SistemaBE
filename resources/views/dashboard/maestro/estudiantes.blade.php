@extends('layouts.layoutDash')
@section('title', 'Estudiantes')
@section('links')
    <a href="{{ route('estudiantes') }}" class="navbar-brand nav-link">Estudiantes/</a>
@endsection

@section('content')
    @section('titulo', 'Estudiantes')
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction: column;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Persona..." id="searchInput">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button style="text-wrap: nowrap; width: 190px; display: flex; margin-top: 10px;" type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
                    <i class="bi bi-person-plus"></i> Registrar Estudiante
                </button>
            </div>
        </div>

        <div class="table-container ">
            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">Cedula ↑</th>
                        <th scope="col" onclick="sortTable(1)">Nombre ↑</th>
                        <th scope="col" onclick="sortTable(2)">Apellido ↑</th>
                        <th scope="col" onclick="sortTable(3)">PNF ↑</th>
                        <th scope="col" onclick="sortTable(4)">Lapso Académico ↑</th>
                        <th scope="col" style="width: 1%; white-space: nowrap;">Acciones</th>
                        <th scope="col">Condicion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345678</td>
                        <td>Angel</td>
                        <td>Hernandez</td>
                        <td>Informatica</td>
                        <td>2023-II</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>87654321</td>
                        <td>Jose</td>
                        <td>zinga</td>
                        <td>Electricidad</td>
                        <td>2022-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>12387498</td>
                        <td>Angel</td>
                        <td>Hernandez</td>
                        <td>Veterinaria</td>
                        <td>2023-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>34387622</td>
                        <td>Pablo</td>
                        <td>Gimenez</td>
                        <td>Informatica</td>
                        <td>2022-II</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>23456789</td>
                        <td>Maria</td>
                        <td>Lopez</td>
                        <td>Ing.Mecanica</td>
                        <td>2021-II</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>98765432</td>
                        <td>Carlos</td>
                        <td>Ramirez</td>
                        <td>Electricidad</td>
                        <td>2023-II</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>45678901</td>
                        <td>Lucia</td>
                        <td>Fernandez</td>
                        <td>Veterinaria</td>
                        <td>2022-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Informatica</td>
                        <td>2023-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Informatica</td>
                        <td>2023-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Informatica</td>
                        <td>2023-I</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCentralSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Central">
                                <label class="form-check-label ms-2" for="sedeCentralSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
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
    
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.sede-switch').forEach(function(switchInput) {
            switchInput.addEventListener('change', function(e) {
                const label = switchInput.nextElementSibling;
                // Obtener el nombre del lapso desde la fila
                const row = switchInput.closest('tr');
                const lapso = row ? row.cells[0].textContent.trim() : '';
                const checked = switchInput.checked;

                // Revertir el cambio hasta que el usuario confirme
                switchInput.checked = !checked;

                Swal.fire({
                title: checked
                    ? `¿Desea activar el lapso "${lapso}"?`
                    : `¿Desea inactivar el lapso "${lapso}"?`,
                text: checked
                    ? `El lapso "${lapso}" será marcado como activo.`
                    : `El lapso "${lapso}" será marcado como inactivo.`,
                icon: checked ? 'question' : 'warning',
                showCancelButton: true,
                confirmButtonText: checked ? 'Activar' : 'Inactivar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    switchInput.checked = checked;
                    label.textContent = checked ? 'Activo' : 'Inactivo';
                    Swal.fire({
                    title: checked
                        ? `¡Lapso "${lapso}" activado!`
                        : `¡Lapso "${lapso}" inactivado!`,
                    text: checked
                        ? `El lapso "${lapso}" ha sido activado.`
                        : `El lapso "${lapso}" ha sido inactivado.`,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                    });
                    // Aquí puedes agregar la lógica para activar/inactivar el lapso en el backend
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

            // Para columnas numéricas (Nr. de Identificacion)
            if (columnIndex === 0) {
                const numA = parseInt(aValue);
                const numB = parseInt(bValue);
                return direction === 'asc' ? numA - numB : numB - numA;
            }

            // Para columnas de texto
            return direction === 'asc' 
                ? aValue.localeCompare(bValue)
                : bValue.localeCompare(aValue);
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
                    document.getElementById('editCedula').value = row.cells[0].textContent.trim();
                    document.getElementById('editNombre').value = row.cells[1].textContent.trim();
                    document.getElementById('editApellido').value = row.cells[2].textContent.trim();
                    document.getElementById('editPNF').value = row.cells[3].textContent.trim();
                }
            });
        });

        // Validación personalizada
        document.getElementById('editCedula').addEventListener('input', function(e) {
            // Solo números y máximo 8 dígitos
            this.value = this.value.replace(/\D/g, '').slice(0, 8);
        });

        document.getElementById('editStudentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = this;
            let valid = true;

            // Validar identificación
            const identificacion = form.editCedula.value.trim();
            if (!/^\d{1,8}$/.test(identificacion)) {
                form.editCedula.classList.add('is-invalid');
                valid = false;
            } else {
                form.editCedula.classList.remove('is-invalid');
            }

            // Validar nombre
            if (form.editNombre.value.trim() === '') {
                form.editNombre.classList.add('is-invalid');
                valid = false;
            } else {
                form.editNombre.classList.remove('is-invalid');
            }

            // Validar apellido
            if (form.editApellido.value.trim() === '') {
                form.editApellido.classList.add('is-invalid');
                valid = false;
            } else {
                form.editApellido.classList.remove('is-invalid');
            }

            // Validar cargo
            if (form.editPNF.value === '') {
                form.editPNF.classList.add('is-invalid');
                valid = false;
            } else {
                form.editPNF.classList.remove('is-invalid');
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
                    Swal.fire({
                        title: '¡Actualizado!',
                        text: 'Los datos han sido actualizados',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    })
                    
                    // Cierra el modal después de actualizar
                    var modal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
                    modal.hide();
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

        //Guardar los datos del estudiante a eliminar en variables
        const nombre = row.cells[1].textContent.trim();
        const apellido = row.cells[2].textContent.trim();


        btn.addEventListener('click', function(e) {
            //Mostrar el modal de confirmación con los datos del estudiante a eliminar
            Swal.fire({
                title: `¿Estás seguro que quieres eliminar a ${nombre} ${apellido}?`,
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                reverseButtons: true
            })
            .then((result)=>{
                //Si el usuario confirma la eliminación, enviar la solicitud a eliminar al backend

                if (result.isConfirmed) {
                    Swal.fire({
                        title: '¡Eliminado!',
                        text: 'El estudiante ha sido eliminado',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    })
                }

            })

        })
    });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editStudentForm" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos del Estudiante</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editCedula" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" id="editCedula" name="identificacion" pattern="\d{8}" required>
                                    <div class="invalid-feedback">
                                        Solo números, exactamente 8 dígitos.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editSegundoNombre" class="form-label">Segundo Nombre (opcional)</label>
                                    <input type="text" class="form-control" id="editSegundoNombre" name="segundo_nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="editSegundoApellido" class="form-label">Segundo Apellido (opcional)</label>
                                    <input type="text" class="form-control" id="editSegundoApellido" name="segundo_apellido">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editNombre" class="form-label">Primer Nombre</label>
                                    <input type="text" class="form-control" id="editNombre" name="nombre" required>
                                    <div class="invalid-feedback">
                                        El nombre no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editApellido" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="editApellido" name="apellido" required>
                                    <div class="invalid-feedback">
                                        El apellido no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editPNF" class="form-label">PNF</label>
                                    <select class="form-select" id="editPNF" name="pnf" required>
                                        <option value="">Seleccione un PNF</option>
                                        <option value="Informatica">Informatica</option>
                                        <option value="Ing.Mecanica">Ing.Mecanica</option>
                                        <option value="Veterinaria">Veterinaria</option>
                                        <option value="Electricidad">Electricidad</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Ingrese el PNF.
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
                        <button type="submit" class="btn-minimal btn-save">
                            <img src="{{ asset('icons/save_green.svg') }}" alt="Icono de guardar" class="icon-save">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal de detalles del estudiante -->
    <div class="modal fade" id="detailsStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailsStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailsStudentModalLabel">Detalles del Estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Primera fila: 4 inputs -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cédula:</label>
                                <input type="text" class="form-control" id="detailsCedula" value="12345678" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="detailsPrimerNombre" value="Angel" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="detailsPrimerApellido" value="Hernandez" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Lapso Académico:</label>
                                <input type="text" class="form-control" id="detailsLapso" value="2023-2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Segunda fila: 4 inputs (agregada Edad) -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">PNF:</label>
                                <input type="text" class="form-control" id="detailsPNF" value="Informatica" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sexo:</label>
                                <input type="text" class="form-control" id="detailsSexo" value="Masculino" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" id="detailsEmail" value="angel@email.com" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="detailsEdad" value="19" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Tercera fila: 3 inputs -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Sede:</label>
                                <input type="text" class="form-control" id="detailsSede" value="Sede Central" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Condición:</label>
                                <input type="text" class="form-control" id="detailsCondicion" value="Regular" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="detailsFechaNacimiento" value="2000-01-01" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-minimal btn-cancel" data-bs-dismiss="modal">
                        <img src="{{ asset('icons/close.svg') }}" alt="Icono de cancelar" class="icon-close">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de registro de estudiante -->
            <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="registerStudentForm" novalidate>
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo Estudiante</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Primera fila: 4 columnas -->
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regCedula" class="form-label">Cédula</label>
                                            <input type="text" class="form-control" id="regCedula" name="cedula" required pattern="\d{8}" placeholder="Ej: 12345678">
                                            <div class="invalid-feedback">
                                                Solo números, exactamente 8 dígitos.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regNombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="regNombre" name="nombre" required placeholder="Ej: Angel">
                                            <div class="invalid-feedback">
                                                El nombre no puede estar vacío.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regApellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="regApellido" name="apellido" required placeholder="Ej: Hernandez">
                                            <div class="invalid-feedback">
                                                El apellido no puede estar vacío.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regSexo" class="form-label">Genero</label>
                                            <select class="form-select" id="regSexo" name="sexo" required>
                                                <option value="">Seleccione el genero</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el genero.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Segunda fila: 4 columnas -->
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regFechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="regFechaNacimiento" name="fecha_nacimiento" required placeholder="Ej: 2000-01-01">
                                            <div class="invalid-feedback">
                                                Ingrese la fecha de nacimiento.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regPNF" class="form-label">PNF</label>
                                            <select class="form-select" id="regPNF" name="pnf" required>
                                                <option value="">Seleccione PNF</option>
                                                <option value="Informatica">Informatica</option>
                                                <option value="Ing.Mecanica">Ing.Mecanica</option>
                                                <option value="Veterinaria">Veterinaria</option>
                                                <option value="Electricidad">Electricidad</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el PNF.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regLapso" class="form-label">Lapso Académico</label>
                                            <input type="text" class="form-control" id="regLapso" name="lapso" placeholder="Ej: 2023-2" required pattern="\d{4}-\d{2}">
                                            <div class="invalid-feedback">
                                                Ingrese el lapso académico.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regCondicion" class="form-label">Condición</label>
                                            <select class="form-select" id="regCondicion" name="condicion" required>
                                                <option value="">Seleccione Condición</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Per (Repitencia)">Per (Repitencia)</option>
                                                <option value="Congelado">Congelado</option>
                                                <option value="Reingreso">Reingreso</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese la condición.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Tercera fila: 4 columnas -->
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regEdad" class="form-label">Edad</label>
                                            <input type="text" class="form-control" id="regEdad" name="edad" required pattern="\d{1,3}" placeholder="Ej: 19">
                                            <div class="invalid-feedback">
                                                Solo números, máximo 3 dígitos.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regTelefono" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="regTelefono" name="telefono" required placeholder="Ej: 04141234567" pattern="\d{11}">
                                            <div class="invalid-feedback">
                                                Ingrese un teléfono válido (11 dígitos).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="regEmail" name="email" required placeholder="Ej: angel@email.com">
                                            <div class="invalid-feedback">
                                                Ingrese un email válido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="regSede" class="form-label">Sede</label>
                                            <select class="form-select" id="regSede" name="sede" required>
                                                <option value="">Seleccione Sede</option>
                                                <option value="Sede Central">Sede Central</option>
                                                <option value="Sede Norte">Sede Norte</option>
                                                <option value="Sede Sur">Sede Sur</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese la sede.
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
                                <button type="submit" class="btn-minimal btn-save">
                                    <img src="{{ asset('icons/save_green.svg') }}" alt="Icono de guardar" class="icon-save">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Solo números y máximo 8 dígitos para cédula
                document.getElementById('regCedula').addEventListener('input', function() {
                    this.value = this.value.replace(/\D/g, '').slice(0, 8);
                });

                // Validación y envío del formulario de registro
                document.getElementById('registerStudentForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let form = this;
                    let valid = true;

                    // Validar cédula
                    const cedula = form.regCedula.value.trim();
                    if (!/^\d{8}$/.test(cedula)) {
                        form.regCedula.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regCedula.classList.remove('is-invalid');
                    }

                    // Validar nombre
                    if (form.regNombre.value.trim() === '') {
                        form.regNombre.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regNombre.classList.remove('is-invalid');
                    }

                    // Validar apellido
                    if (form.regApellido.value.trim() === '') {
                        form.regApellido.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regApellido.classList.remove('is-invalid');
                    }

                    // Validar PNF
                    if (form.regPNF.value === '') {
                        form.regPNF.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regPNF.classList.remove('is-invalid');
                    }

                    // Validar sede
                    if (form.regSede.value === '') {
                        form.regSede.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regSede.classList.remove('is-invalid');
                    }

                    // Validar condicion
                    if (form.regCondicion.value === '') {
                        form.regCondicion.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regCondicion.classList.remove('is-invalid');
                    }

                    if (!valid) return;

                    // Confirmación con SweetAlert
                    Swal.fire({
                        title: '¿Registrar estudiante?',
                        text: 'Verifique los datos antes de confirmar.',
                        icon: 'question',
                        confirmButtonText: 'Registrar',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: '¡Registrado!',
                                text: 'El estudiante ha sido registrado.',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                            });
                            // Cerrar modal
                            var modal = bootstrap.Modal.getInstance(document.getElementById('registerStudentModal'));
                            modal.hide();
                            form.reset();
                            // Aquí puedes agregar la lógica para enviar los datos al backend
                        }
                    });
                });

                // Quitar la clase is-invalid al escribir
                ['regCedula', 'regNombre', 'regApellido', 'regPNF', 'regSede', 'regCondicion'].forEach(function(id) {
                    document.getElementById(id).addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            });
            </script>
@endsection
