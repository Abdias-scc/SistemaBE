@extends('layouts.layoutDash')
@section('title', 'Lapsos Academicos')
@section('links')
    <a href="{{ route('lapso') }}" class="navbar-brand nav-link">Lapsos Academicos/</a>
@endsection

@section('content')
    @section('titulo', 'Lapsos Academicos')
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction: column;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Lapso..." id="searchInput">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button style="text-wrap: nowrap; width: 145px; display: flex; margin-top: 10px;" type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
                    <i class="bi bi-person-plus"></i> Registrar lapso
                </button>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">Lapsos ↑</th>
                        <th scope="col">Acciones</th>
                        <th scope="col">Condición</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-II</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-I</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2024-II</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2024-I</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2023-II</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2023-I</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioComedorSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Comedor">
                                <label class="form-check-label ms-2" for="servicioComedorSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Script para switches de lapso activo/inactivo
        document.querySelectorAll('.sede-switch').forEach(function(switchInput) {
            switchInput.addEventListener('change', function(e) {
                const label = switchInput.nextElementSibling;
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

        // Script para el input de buscar
        document.getElementById('searchButton').addEventListener('click', function() {
            const input = document.getElementById('searchInput');
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

        // Script para el ordenado de la tabla
        window.sortTable = function(columnIndex) {
            const table = document.getElementById('sortable-table');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            let direction = 'asc';

            if (table.getAttribute('data-sort-column') == columnIndex) {
                direction = table.getAttribute('data-sort-direction') === 'asc' ? 'desc' : 'asc';
            }

            rows.sort((a, b) => {
                const aValue = a.cells[columnIndex].textContent.trim().toLowerCase();
                const bValue = b.cells[columnIndex].textContent.trim().toLowerCase();
                if (direction === 'asc') {
                    return aValue.localeCompare(bValue, 'es', { numeric: false });
                } else {
                    return bValue.localeCompare(aValue, 'es', { numeric: false });
                }
            });

            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));

            const headers = table.querySelectorAll('th');
            headers.forEach((header, index) => {
                header.innerHTML = header.textContent.replace(/ ↑| ↓/g, '');
                if (index === columnIndex) {
                    header.innerHTML += direction === 'asc' ? ' ↑' : ' ↓';
                }
            });

            table.setAttribute('data-sort-column', columnIndex);
            table.setAttribute('data-sort-direction', direction);
        };

        // Script para el botón de eliminar
        document.querySelectorAll('button[id="deleteButton"]').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                const row = btn.closest('tr');
                const nombre = row.cells[0].textContent.trim();

                Swal.fire({
                    title: `¿Estás seguro que quieres eliminar el lapso "${nombre}" ?`,
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    reverseButtons: true
                })
                .then((result)=>{
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: 'El lapso ha sido eliminado',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        })
                    }
                });
            });
        });

        // Validación personalizada para editar lapso académico
        if (document.getElementById('editLapso')) {
            document.getElementById('editLapso').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^A-Za-z0-9\-]/g, '').slice(0, 10);
            });
        }

        if (document.getElementById('editLapsoForm')) {
            document.getElementById('editLapsoForm').addEventListener('submit', function(e) {
                e.preventDefault();
                let form = this;
                let valid = true;

                const lapso = form.editLapso.value.trim();
                if (lapso === '') {
                    form.editLapso.classList.add('is-invalid');
                    valid = false;
                } else {
                    form.editLapso.classList.remove('is-invalid');
                }

                // Si tienes un campo de estatus, valida aquí
                // if (form.editEstatus && form.editEstatus.value === '') {
                //     form.editEstatus.classList.add('is-invalid');
                //     valid = false;
                // } else if (form.editEstatus) {
                //     form.editEstatus.classList.remove('is-invalid');
                // }

                if (!valid) return;

                Swal.fire({
                    title: '¿Estas seguro que quieres actualizar el lapso?',
                    text: 'Comprueba los datos antes de confirmar.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar',
                    showCancelButton: true,
                })
                .then((result)=>{
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: '¡Actualizado!',
                            text: 'El lapso ha sido actualizado',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        });
                        var modal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
                        modal.hide();
                        // Aquí puedes agregar la lógica para enviar los datos al backend
                    }
                });
            });
        }

        // Quitar la clase is-invalid al escribir
        ['editLapso'/*, 'editEstatus'*/].forEach(function(id) {
            if (document.getElementById(id)) {
                document.getElementById(id).addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                });
            }
        });

    });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editLapsoForm" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Lapso Académico</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-3 text-center">
                                    <label for="editLapso" class="form-label w-100" style="display: block; font-weight: bold;">Lapso</label>
                                    <input type="text" class="form-control mx-auto" id="editLapso" name="lapso" required style="width: 90%;">
                                    <div class="invalid-feedback">
                                        El lapso no puede estar vacío.
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


    <!-- Modal de registro de estudiante -->
            <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="width:80%; margin: auto;">
                        <form id="registerStudentForm" novalidate>
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo Lapso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="mb-3 text-center">
                                            <label for="regLapso" class="form-label w-100" style="display: block; font-weight: bold;">Lapso</label>
                                            <input type="text" class="form-control mx-auto" id="regLapso" name="lapso" required style="width: 90%;">
                                            <div class="invalid-feedback">
                                                El lapso no puede estar vacío.
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
                // Validación y envío del formulario de registro
                document.getElementById('registerStudentForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let form = this;
                    let valid = true;

                    // Validar lapso
                    if (form.regLapso.value.trim() === '') {
                        form.regLapso.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regLapso.classList.remove('is-invalid');
                    }

                    if (!valid) return;

                    // Confirmación con SweetAlert
                    Swal.fire({
                        title: '¿Registrar lapso?',
                        text: 'Verifique los datos antes de confirmar.',
                        icon: 'question',
                        confirmButtonText: 'Registrar',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: '¡Registrado!',
                                text: 'El lapso ha sido registrado.',
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
                ['regLapso'].forEach(function(id) {
                    document.getElementById(id).addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            });
            </script>
@endsection
