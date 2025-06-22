@extends('layouts.layoutDash')
@section('title', 'Servicios')
@section('links')
    <a href="{{ route('servicio') }}" class="navbar-brand nav-link">Servicios/</a>
@endsection

@section('content')
    @section('titulo', 'Servicios')
    <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction: column;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Servicio..." id="searchInput">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button style="text-wrap: nowrap; width: 165px; display: flex; margin-top: 10px;" type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
                    <i class="bi bi-person-plus"></i> Registrar Servicio
                </button>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">Servicios ↑</th>
                        <th scope="col">Acciones</th>
                        <th scope="col">Condición</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Comedor</td>
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
                        <td>Transporte</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioTransporteSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Transporte">
                                <label class="form-check-label ms-2" for="servicioTransporteSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Atencion Social</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioAtencionSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Atencion Social">
                                <label class="form-check-label ms-2" for="servicioAtencionSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Servicio Medico</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioMedicoSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Servicio Medico">
                                <label class="form-check-label ms-2" for="servicioMedicoSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Deporte</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioDeporteSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Deporte">
                                <label class="form-check-label ms-2" for="servicioDeporteSwitch" style="user-select: none;">
                                    Activo
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cultura</td>
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
                                <input class="form-check-input sede-switch" type="checkbox" id="servicioCulturaSwitch" checked style="width: 2.5em; height: 1.3em;" data-servicio="Cultura">
                                <label class="form-check-label ms-2" for="servicioCulturaSwitch" style="user-select: none;">
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
            document.querySelectorAll('.sede-switch').forEach(function(switchInput) {
                switchInput.addEventListener('change', function(e) {
                    const label = switchInput.nextElementSibling;
                    const servicio = switchInput.getAttribute('data-servicio');
                    const checked = switchInput.checked;

                    // Revert the switch until user confirms
                    switchInput.checked = !checked;

                    Swal.fire({
                        title: checked
                            ? `¿Desea activar el servicio "${servicio}"?`
                            : `¿Desea inactivar el servicio "${servicio}"?`,
                        text: checked
                            ? `El servicio "${servicio}" será marcado como activo.`
                            : `El servicio "${servicio}" será marcado como inactivo.`,
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
                                    ? `¡Servicio "${servicio}" activado!`
                                    : `¡Servicio "${servicio}" inactivado!`,
                                text: checked
                                    ? `El servicio "${servicio}" ha sido activado.`
                                    : `El servicio "${servicio}" ha sido inactivado.`,
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            });
                            // Aquí puedes agregar la lógica para activar/inactivar el servicio en el backend
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
        
    /* Script para la edición de servicios */
    document.querySelectorAll('button[data-bs-target="#staticBackdrop"]').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            const row = btn.closest('tr');
            if (row) {
                // Llenar los campos del modal con los datos de la fila
                document.getElementById('editServicio').value = row.cells[0].textContent.trim();
                const estatusLabel = row.querySelector('.form-check-label').textContent.trim();
                document.getElementById('editEstatus').value = estatusLabel === 'Activo' ? 'estatusActivo' : 'estatusInactivo';
            }
        });
    });

    // Validación y envío del formulario de edición
    const editServiceForm = document.getElementById('editServiceForm');
    if (editServiceForm) {
        editServiceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let form = this;
            let valid = true;

            // Validar servicio
            if (form.editServicio.value.trim() === '') {
                form.editServicio.classList.add('is-invalid');
                valid = false;
            } else {
                form.editServicio.classList.remove('is-invalid');
            }

            // Validar estatus
            if (form.editEstatus.value === '') {
                form.editEstatus.classList.add('is-invalid');
                valid = false;
            } else {
                form.editEstatus.classList.remove('is-invalid');
            }

            if (!valid) return;

            // Confirmación con SweetAlert
            Swal.fire({
                title: '¿Actualizar servicio?',
                text: 'Verifique los datos antes de confirmar.',
                icon: 'question',
                confirmButtonText: 'Actualizar',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '¡Actualizado!',
                        text: 'El servicio ha sido actualizado.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                    // Cerrar modal
                    var modal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
                    modal.hide();
                    // Aquí puedes agregar la lógica para enviar los datos al backend
                }
            });
        });

        // Quitar la clase is-invalid al escribir
        ['editServicio', 'editEstatus'].forEach(function(id) {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                });
            }
        });
    }


    /*Script para el boton de eliminar*/
    document.querySelectorAll('button[id="deleteButton"]').forEach(function(btn) {
        //Recoger el nombre y el apellido del estudiante a eliminar en la fila que esta en el boton
        const row = btn.closest('tr');

        //Guardar los datos del estudiante a eliminar en variables
        const nombre = row.cells[0].textContent.trim();


        btn.addEventListener('click', function(e) {
            //Mostrar el modal de confirmación con los datos del estudiante a eliminar
            Swal.fire({
                title: `¿Estás seguro que quieres eliminar a el servicio "${nombre}"?`,
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
                        text: 'El servicio ha sido eliminado',
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
                <form id="editServiceForm" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Servicio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-3 text-center">
                                    <label for="editServicio" class="form-label w-100" style="display: block; font-weight: bold;">Servicio</label>
                                    <input type="text" class="form-control mx-auto" id="editServicio" name="servicio" required style="width: 90%;">
                                    <div class="invalid-feedback">
                                        El servicio no puede estar vacío.
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Llenar el campo del modal al hacer click en editar
        document.querySelectorAll('button[data-bs-target="#staticBackdrop"]').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                const row = btn.closest('tr');
                if (row) {
                    document.getElementById('editServicio').value = row.cells[0].textContent.trim();
                }
            });
        });

        // Validación y envío del formulario de edición (sin estatus)
        const editServiceForm = document.getElementById('editServiceForm');
        if (editServiceForm) {
            editServiceForm.addEventListener('submit', function(e) {
                e.preventDefault();
                let form = this;
                let valid = true;

                // Validar servicio
                if (form.editServicio.value.trim() === '') {
                    form.editServicio.classList.add('is-invalid');
                    valid = false;
                } else {
                    form.editServicio.classList.remove('is-invalid');
                }

                if (!valid) return;

                // Confirmación con SweetAlert
                Swal.fire({
                    title: '¿Actualizar servicio?',
                    text: 'Verifique los datos antes de confirmar.',
                    icon: 'question',
                    confirmButtonText: 'Actualizar',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: '¡Actualizado!',
                            text: 'El servicio ha sido actualizado.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        });
                        // Cerrar modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
                        modal.hide();
                        // Aquí puedes agregar la lógica para enviar los datos al backend
                    }
                });
            });

            // Quitar la clase is-invalid al escribir
            document.getElementById('editServicio').addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        }
    });
    </script>


    <!-- Modal de registro de estudiante -->
            <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="width:80%; margin: auto;">
                        <form id="registerStudentForm" novalidate>
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo Servicio</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="mb-3 text-center">
                                            <label for="regServicio" class="form-label w-100" style="display: block; font-weight: bold;">Servicio</label>
                                            <input type="text" class="form-control mx-auto" id="regServicio" name="servicio" required style="width: 90%;">
                                            <div class="invalid-feedback">
                                                El servicio no puede estar vacío.
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
            // Mover este bloque dentro del primer DOMContentLoaded o fuera de cualquier otro listener
            document.addEventListener('DOMContentLoaded', function () {
                // Validación y envío del formulario de registro
                document.getElementById('registerStudentForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let form = this;
                    let valid = true;

                    // Validar servicio
                    if (form.regServicio.value === '') {
                        form.regServicio.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regServicio.classList.remove('is-invalid');
                    }

                    if (!valid) return;

                    // Confirmación con SweetAlert
                    Swal.fire({
                        title: '¿Registrar servicio?',
                        text: 'Verifique los datos antes de confirmar.',
                        icon: 'question',
                        confirmButtonText: 'Registrar',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: '¡Registrado!',
                                text: 'El servicio ha sido registrado.',
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
                ['regServicio'].forEach(function(id) {
                    document.getElementById(id).addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            });
            </script>
@endsection
