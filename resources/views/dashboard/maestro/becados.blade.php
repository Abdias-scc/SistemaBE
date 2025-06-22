@extends('layouts.layoutDash')
@section('title', 'Becas')
@section('links')
    <a href="{{ route('becados') }}" class="navbar-brand nav-link">Becados/</a>
@endsection

@section('content')
    @section('titulo', 'Becados')
     <div class="contenedor">
        <div class="d-flex justify-content-end my-4" style="max-width: 400px; margin-left: auto; flex-direction:column">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar Persona..." id="searchInput">
                <button class="btn btn-primary" type="button" id="searchButton">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button style="text-wrap: nowrap; width: 165px; display: flex; margin-top: 10px;" type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
                    <i class="bi bi-person-plus"></i> Registrar Becado
                </button>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">Cedula ↑</th>
                        <th scope="col" onclick="sortTable(1)">Nombre ↑</th>
                        <th scope="col" onclick="sortTable(2)">Apellido ↑</th>
                        <th scope="col" onclick="sortTable(3)">PNF ↑</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345678</td>
                        <td>Angel</td>
                        <td>Hernandez</td>
                        <td>Informatica</td>
                        <td>Sede Central</td>
                        <td>angel.hernandez@email.com</td>
                        <td>Aprobado</td>
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
                    </tr>
                    <tr>
                        <td>87654321</td>
                        <td>Jose</td>
                        <td>Zinga</td>
                        <td>Veterinaria</td>
                        <td>Sede Norte</td>
                        <td>jose.zinga@email.com</td>
                        <td>Desaprobado</td>
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
                    </tr>
                    <tr>
                        <td>12387498</td>
                        <td>Angel</td>
                        <td>Hernandez</td>
                        <td>Adminstracion</td>
                        <td>Sede Sur</td>
                        <td>angel.hdz@email.com</td>
                        <td>Aprobado</td>
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
                    </tr>
                    <tr>
                        <td>34387622</td>
                        <td>Pablo</td>
                        <td>Gimenez</td>
                        <td>Mecanica</td>
                        <td>Sede Este</td>
                        <td>pablo.gimenez@email.com</td>
                        <td>Desaprobado</td>
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
                    </tr>
                    <tr>
                        <td>23456789</td>
                        <td>Maria</td>
                        <td>Lopez</td>
                        <td>Quimica</td>
                        <td>Sede Oeste</td>
                        <td>maria.lopez@email.com</td>
                        <td>Aprobado</td>
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
                    </tr>
                    <tr>
                        <td>98765432</td>
                        <td>Carlos</td>
                        <td>Ramirez</td>
                        <td>Electronica</td>
                        <td>Sede Los Andes</td>
                        <td>carlos.ramirez@email.com</td>
                        <td>Desaprobado</td>
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
                    </tr>
                    <tr>
                        <td>45678901</td>
                        <td>Lucia</td>
                        <td>Fernandez</td>
                        <td>Construccion Civil</td>
                        <td>Sede Maracay</td>
                        <td>lucia.fernandez@email.com</td>
                        <td>Aprobado</td>
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
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Agroalimentaria</td>
                        <td>Sede Barinas</td>
                        <td>andrea.martinez@email.com</td>
                        <td>Desaprobado</td>
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
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Agroalimentaria</td>
                        <td>Sede Portuguesa</td>
                        <td>andrea.portuguesa@email.com</td>
                        <td>Aprobado</td>
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
                    </tr>
                    <tr>
                        <td>56789012</td>
                        <td>Andrea</td>
                        <td>Martinez</td>
                        <td>Agroalimentaria</td>
                        <td>Sede Carabobo</td>
                        <td>andrea.carabobo@email.com</td>
                        <td>Desaprobado</td>
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
                    </tr>
                </tbody>
            </table>
            
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

    <!-- Modal de registro de estudiante -->
            <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="registerStudentForm" novalidate>
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo Becado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="regCedula" class="form-label">Cédula</label>
                                            <input type="text" class="form-control" id="regCedula" name="cedula" required pattern="\d{8}">
                                            <div class="invalid-feedback">
                                                Solo números, exactamente 8 dígitos.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regSegundoNombre" class="form-label">Segundo Nombre (opcional)</label>
                                            <input type="text" class="form-control" id="regSegundoNombre" name="segundo_nombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="regSegundoApellido" class="form-label">Segundo Apellido (opcional)</label>
                                            <input type="text" class="form-control" id="regSegundoApellido" name="segundo_apellido">
                                        </div>
                                        <div class="mb-3">
                                            <label for="regSede" class="form-label">Sede</label>
                                            <select class="form-select" id="regSede" name="sede" required>
                                                <option value="">Seleccione una Sede</option>
                                                <option value="sedeCentral">Sede Central</option>
                                                <option value="sedeNorte">Sede Norte</option>
                                                <option value="sedeSur">Sede Sur</option>
                                                <option value="sedeEste">Sede Este</option>
                                                <option value="sedeOeste">Sede Oeste</option>
                                                <option value="sedeAndes">Sede Los Andes</option>
                                                <option value="sedeMaracay">Sede Maracay</option>
                                                <option value="sedeBarinas">Sede Barinas</option>
                                                <option value="sedePortuguesa">Sede Portuguesa</option>
                                                <option value="sedeCarabobo">Sede Carabobo</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el PNF.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="regNombre" class="form-label">Primer Nombre</label>
                                            <input type="text" class="form-control" id="regNombre" name="nombre" required>
                                            <div class="invalid-feedback">
                                                El nombre no puede estar vacío.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regApellido" class="form-label">Primer Apellido</label>
                                            <input type="text" class="form-control" id="regApellido" name="apellido" required>
                                            <div class="invalid-feedback">
                                                El apellido no puede estar vacío.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regPNF" class="form-label">PNF</label>
                                            <select class="form-select" id="regPNF" name="pnf" required>
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

                                        <div class="mb-3">
                                            <label for="regCorreo" class="form-label">Correo</label>
                                            <input type="email" class="form-control" id="regCorreo" name="correo" required>
                                            <div class="invalid-feedback">
                                                No es valido.
                                            </div>
                                        </div>
                                    </div>
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

                    // Validar correo
                    if (form.regCorreo.value.trim() === '') {
                        form.regCorreo.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regCorreo.classList.remove('is-invalid');
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

                    // Validar estatus
                    if (form.regEstatus.value === '') {
                        form.regEstatus.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.regEstatus.classList.remove('is-invalid');
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
                ['regCedula', 'regNombre', 'regApellido', 'regCorreo', 'regPNF', 'regSede', 'regEstatus'].forEach(function(id) {
                    document.getElementById(id).addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            });
            </script>
@endsection