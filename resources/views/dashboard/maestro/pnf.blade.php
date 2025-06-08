@extends('layouts.layoutDash')
@section('title', 'PNF')
@section('links')
    <a href="{{ route('pnf') }}" class="navbar-brand nav-link">PNF/</a>
@endsection

@section('content')
    @section('titulo', 'PNF')
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction: column;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Persona..." id="searchInput">
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
            

            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">PNF ↑</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Informatica</td>
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
                    </tr>
                    <tr>
                        <td>Veterinaria</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeNorteSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Veterinaria">
                                <label class="form-check-label ms-2" for="sedeNorteSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Adminstracion</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeSurSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Administracion">
                                <label class="form-check-label ms-2" for="sedeSurSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mecanica</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeEsteSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Mecanica">
                                <label class="form-check-label ms-2" for="sedeEsteSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Quimica</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeOesteSwitch" style="width: 2.5em; height: 1.3em;" data-sede="Quimica">
                                <label class="form-check-label ms-2" for="sedeOesteSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Electronica</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeAndesSwitch" style="width: 2.5em; height: 1.3em;" data-sede="Electronica">
                                <label class="form-check-label ms-2" for="sedeAndesSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Construccion Civil</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeMaracaySwitch" style="width: 2.5em; height: 1.3em;" data-sede="Construccion Civil">
                                <label class="form-check-label ms-2" for="sedeMaracaySwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Agroalimentaria</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeBarinasSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Agroalimentaria">
                                <label class="form-check-label ms-2" for="sedeBarinasSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Electricidad</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedePortuguesaSwitch" checked style="width: 2.5em; height: 1.3em;" data-sede="Sede Portuguesa">
                                <label class="form-check-label ms-2" for="sedePortuguesaSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Matematicas</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="sedeCaraboboSwitch" style="width: 2.5em; height: 1.3em;" data-sede="Sede Carabobo">
                                <label class="form-check-label ms-2" for="sedeCaraboboSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>


                {{-- Script para el switch de activar/inactivar sedes --}}
                <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelectorAll('.sede-switch').forEach(function(switchInput) {
                        switchInput.addEventListener('change', function(e) {
                            const label = switchInput.nextElementSibling;
                            const sede = switchInput.getAttribute('data-sede');
                            const checked = switchInput.checked;

                            // Revert the switch until user confirms
                            switchInput.checked = !checked;

                            Swal.fire({
                                title: checked ? `¿Desea activar la sede ${sede}?` : `¿Desea inactivar la sede ${sede}?`,
                                text: checked ? 'La sede será marcada como activa.' : 'La sede será marcada como inactiva.',
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
                                        title: checked ? '¡Activada!' : '¡Inactivada!',
                                        text: checked ? `La sede ${sede} ha sido activada.` : `La sede ${sede} ha sido inactivada.`,
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar'
                                    });
                                    // Aquí puedes agregar la lógica para activar/inactivar la sede en el backend
                                }
                            });
                        });
                    });
                });
                </script>
            </table>
        </div>
    
    <script>
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


        document.getElementById('editStudentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = this;
            let valid = true;


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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos del PNF</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editPNF" class="form-label">PNF</label>
                                    <input type="text" class="form-control" id="editPNF" name="pnf" required>
                                    <div class="invalid-feedback">
                                        El PNF no puede estar vacío.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="regEstatus" class="form-label">Estatus</label>
                                    <select class="form-select" id="regEstatus" name="estatus" required>
                                        <option value="">Seleccione un Estatus</option>
                                        <option value="estatusActivo">Activo</option>
                                        <option value="estatusInactivo">Inactivo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Ingrese el Estatus.
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


    <!-- Modal de registro de PNF -->
            <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="registerStudentForm" novalidate>
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo PNF</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="regPNF" class="form-label">PNF</label>
                                            <input type="text" class="form-control" id="regPNF" name="pnf" required>
                                            <div class="invalid-feedback">
                                                El PNF no puede estar vacío.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="regEstatus" class="form-label">Estatus</label>
                                            <select class="form-select" id="regEstatus" name="estatus" required>
                                                <option value="">Seleccione un Estatus</option>
                                                <option value="estatusActivo">Activo</option>
                                                <option value="estatusInactivo">Inactivo</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el Estatus.
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



            {{-- Copia y pega este script bien exactamente aqui en las demas vistas y cambia  o agrega los nombres de regPNF por los que estan en esa vista
            
            ejemplo: regPNF lo vas a cambiar por regCedula en la vistade estudiante y asi con todas
            --}}

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Validación y envío del formulario de registro
                document.getElementById('registerStudentForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let form = this;
                    let valid = true;

                    // Validar Sede
                    if (form.regPNF.value.trim() === '') {
                        form.regPNF.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regPNF.classList.remove('is-invalid');
                    }

                    // Validar estatus
                    if (form.regEstatus.value === '') {
                        form.regEstatus.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regEstatus.classList.remove('is-invalid');
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
                            Swal.fire({
                                title: '¡Registrado!',
                                text: 'El PNF ha sido registrado.',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                            }).then(() => {
                                // Cerrar modal y limpiar formulario después de aceptar
                                var modal = bootstrap.Modal.getInstance(document.getElementById('registerStudentModal'));
                                modal.hide();
                                form.reset();
                            });
                            // Aquí puedes agregar la lógica para enviar los datos al backend
                        }
                    });
                });

                // Quitar la clase is-invalid al escribir
                ['regPNF', 'regEstatus'].forEach(function(id) {
                    document.getElementById(id).addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            });
            </script>
@endsection
