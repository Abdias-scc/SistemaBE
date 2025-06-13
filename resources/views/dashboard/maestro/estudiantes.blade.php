@extends('layouts.layoutDash')
@section('title', 'Estudiantes')
@section('links')
    <a href="{{ route('estudiantes') }}" class="navbar-brand nav-link">Estudiantes/</a>
    
@endsection

@section('content')
    @section('titulo', 'Estudiantes')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            @if ($estudiantes->isEmpty())
                {{-- Si no hay estudiantes, mostrar mensaje --}}
                <div class="alert alert-info text-center" role="alert">
                    No hay estudiantes registrados.
                </div>
            @else
                <table class="table table-striped table-bordered my-2" id="sortable-table">
                <thead>
                    <tr>
                        <th scope="col" onclick="sortTable(0)">Cedula ↑</th>
                        <th scope="col" onclick="sortTable(1)">Nombre ↑</th>
                        <th scope="col" onclick="sortTable(2)">Apellido ↑</th>
                        <th scope="col" style="width: 1%; white-space: nowrap;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->cedula_persona }}</td>
                        <td>{{ $estudiante->nombre_persona }}</td>
                        <td>{{ $estudiante->apellido_persona }}</td>
                        <td>
                            <button class="btn-minimal btn-details" data-bs-toggle="modal" data-bs-target="#detailsStudentModal">
                                <img src="{{ asset('icons/details.svg') }}" alt="Icono de editar" class="icon-edit">
                                Ver Detalles
                            </button>
                            <button class="btn-minimal btn-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <img src="{{ asset('icons/edit_blue.svg') }}" alt="Icono de editar" class="icon-edit">
                                Editar
                            </button>
                            <button class="btn-minimal btn-delete" id="deleteButton" data-cedula="{{ $estudiante->cedula_persona }}">
                                <img src="{{ asset('icons/delete_red.svg') }}" alt="Icono de eliminar" class="icon-delete">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        </div>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{-- Botón Anterior --}}
                @if ($estudiantes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $estudiantes->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                {{-- Enlaces de páginas --}}
                @foreach ($estudiantes->getUrlRange(1, $estudiantes->lastPage()) as $page => $url)
                    <li class="page-item {{ $estudiantes->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Botón Siguiente --}}
                @if ($estudiantes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $estudiantes->nextPageUrl() }}" aria-label="Next">
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
                const searchValue = input.value.trim().toLowerCase();
                window.location.href = `/dashboard/estudiantes?search=${encodeURIComponent(searchValue)}`;
            }
        });
        //Hacer que el botón de búsqueda se active al presionar Enter
        document.getElementById('searchInput').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('searchButton').click();
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

            // Validar cédula
            const cedula = form.editCedula.value.trim();
            if (!/^\d{8}$/.test(cedula)) {
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

            // Validar sexo
            if (form.editSexo.value.trim() === '') {
                form.editSexo.classList.add('is-invalid');
                valid = false;
            } else {
                form.editSexo.classList.remove('is-invalid');
            }

            // Validar teléfono
            if (!/^\d{11}$/.test(form.editTelefono.value.trim())) {
                form.editTelefono.classList.add('is-invalid');
                valid = false;
            } else {
                form.editTelefono.classList.remove('is-invalid');
            }

            // Validar fecha de nacimiento
            if (form.editFechaNacimiento.value.trim() === '') {
                form.editFechaNacimiento.classList.add('is-invalid');
                valid = false;
            } else {
                form.editFechaNacimiento.classList.remove('is-invalid');
            }

            // Validar condición
            if (form.editCondicion.value.trim() === '') {
                form.editCondicion.classList.add('is-invalid');
                valid = false;
            } else {
                form.editCondicion.classList.remove('is-invalid');
            }

            // Validar email
            const email = form.editEmail.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '' || !emailRegex.test(email)) {
                form.editEmail.classList.add('is-invalid');
                valid = false;
            } else {
                form.editEmail.classList.remove('is-invalid');
            }

            // Validar dirección
            if (form.editDireccion.value.trim() === '') {
                form.editDireccion.classList.add('is-invalid');
                valid = false;
            } else {
                form.editDireccion.classList.remove('is-invalid');
            }

            // Validar procedencia
            if (form.editProcedencia.value.trim() === '') {
                form.editProcedencia.classList.add('is-invalid');
                valid = false;
            } else {
                form.editProcedencia.classList.remove('is-invalid');
            }

            // Los campos "¿Es Foráneo?" y "¿Está registrado en patria?" NO son obligatorios, así que no se validan aquí.

            // Validar campos extra si es foráneo
            if (form.editForaneo.checked) {
                // Dirección temporal
                if (form.editDireccionTemporal.value.trim() === '') {
                    form.editDireccionTemporal.classList.add('is-invalid');
                    valid = false;
                } else {
                    form.editDireccionTemporal.classList.remove('is-invalid');
                }

                // ¿Pagas residencia?
                const pagaResidenciaSi = form.editPagaResidenciaSi;
                const pagaResidenciaNo = form.editPagaResidenciaNo;
                const pagaResidenciaGroup = pagaResidenciaSi.closest('.mb-3');
                const pagaResidenciaFeedback = pagaResidenciaGroup.querySelector('.invalid-feedback');
                if (!pagaResidenciaSi.checked && !pagaResidenciaNo.checked) {
                    pagaResidenciaFeedback.style.display = 'block';
                    valid = false;
                } else {
                    pagaResidenciaFeedback.style.display = 'none';
                }
                // ¿Cuánto pagas? (si seleccionó sí)
                if (pagaResidenciaSi.checked) {
                    if (form.editCuantoPagasResidencia.value.trim() === '') {
                        form.editCuantoPagasResidencia.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.editCuantoPagasResidencia.classList.remove('is-invalid');
                    }
                }

                // ¿Viajas a diario?
                const viajaDiarioSi = form.editViajaDiarioSi;
                const viajaDiarioNo = form.editViajaDiarioNo;
                const viajaDiarioGroup = viajaDiarioSi.closest('.mb-3');
                const viajaDiarioFeedback = viajaDiarioGroup.querySelector('.invalid-feedback');
                if (!viajaDiarioSi.checked && !viajaDiarioNo.checked) {
                    viajaDiarioFeedback.style.display = 'block';
                    valid = false;
                } else {
                    viajaDiarioFeedback.style.display = 'none';
                }
                // ¿Cuántas veces a la semana? (si seleccionó sí)
                if (viajaDiarioSi.checked) {
                    if (form.editVecesSemana.value.trim() === '') {
                        form.editVecesSemana.classList.add('is-invalid');
                        valid = false;
                    } else {
                        form.editVecesSemana.classList.remove('is-invalid');
                    }
                }

                // Tiempo de viaje (al menos uno)
                if (form.editTiempoViajeHoras.value.trim() === '' && form.editTiempoViajeMinutos.value.trim() === '') {
                    form.editTiempoViajeHoras.classList.add('is-invalid');
                    form.editTiempoViajeMinutos.classList.add('is-invalid');
                    valid = false;
                } else {
                    form.editTiempoViajeHoras.classList.remove('is-invalid');
                    form.editTiempoViajeMinutos.classList.remove('is-invalid');
                }

                // Gasto diario en pasaje
                if (form.editGastoDiarioPasaje.value.trim() === '') {
                    form.editGastoDiarioPasaje.classList.add('is-invalid');
                    valid = false;
                } else {
                    form.editGastoDiarioPasaje.classList.remove('is-invalid');
                }
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
        ['editCedula', 'editNombre', 'editApellido'].forEach(function(id) {
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
        //Agarramos la id del estudiante
        const id = btn.getAttribute('data-cedula');
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
            .then((result) => {
                //Si el usuario confirma la eliminación, enviar la solicitud a eliminar al backend
                if (result.isConfirmed) {
                    fetch(`/dashboard/estudiantes/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                    })
                    .then(function(response) {
                        if (!response.ok) throw new Error('Error al eliminar el estudiante');
                        return response.json();
                    })
                    .then(data => {
                        //Proceso de eliminar estudiante
                        row.remove();
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: `El estudiante ${nombre} ${apellido} ha sido eliminado.`,
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo eliminar el estudiante. Inténtalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        });
                    });
                }
            });
        });
    });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 450px;">
            <div class="modal-content">
                <form id="editStudentForm" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos del Estudiante</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="editCedula" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" id="editCedula" name="cedula" required pattern="\d{1,10}" maxlength="10" style="max-width: 220px;" placeholder="Ej: 1234567890">
                                    <div class="invalid-feedback">
                                        Solo números, máximo 10 dígitos.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editNombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="editNombre" name="nombre" required placeholder="Ej: Angel">
                                    <div class="invalid-feedback">
                                        El nombre no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editApellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="editApellido" name="apellido" required placeholder="Ej: Hernandez">
                                    <div class="invalid-feedback">
                                        El apellido no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row g-2 align-items-end">
                                        <div class="col-md-6">
                                            <label for="editSexo" class="form-label">Sexo</label>
                                            <select class="form-select" id="editSexo" name="sexo" required>
                                                <option value="">Seleccione Sexo</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el Sexo.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editTelefono" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="editTelefono" name="telefono" required placeholder="Ej: 04141234567" pattern="\d{11}" maxlength="11" style="max-width: 220px;">
                                            <div class="invalid-feedback">
                                                Ingrese un teléfono válido.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row g-2 align-items-start">
                                        <div class="col-md-6">
                                            <label for="editFechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="editFechaNacimiento" name="fecha_nacimiento" required placeholder="Ej: 2000-01-01">
                                            <div class="invalid-feedback">
                                                Fecha Invalida.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editEdad" class="form-label">Edad</label>
                                            <input type="text" class="form-control" id="editEdad" name="edad" readonly placeholder="Edad" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editCondicion" class="form-label">Condición</label>
                                    <select class="form-select" id="editCondicion" name="condicion" required>
                                        <option value="">Seleccione Condición</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Per (Repitencia)">Repitencia</option>
                                        <option value="Congelado">Congelado</option>
                                        <option value="Reingreso">Reingreso</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Ingrese la condición.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email" required placeholder="Ej: angel@email.com">
                                    <div class="invalid-feedback">
                                        El campo no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editDireccion" class="form-label">Dirección Permanente</label>
                                    <input type="text" class="form-control" id="editDireccion" name="direccion" required placeholder="Ej: Calle 123, Ciudad">
                                    <div class="invalid-feedback">
                                        La dirección no puede estar vacía.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editProcedencia" class="form-label">Procedencia</label>
                                    <input type="text" class="form-control" id="editProcedencia" name="procedencia" required placeholder="Ej: Agua Blanca, Acarigua">
                                    <div class="invalid-feedback">
                                        La procedencia no puede estar vacía.
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="editForaneo" name="foraneo">
                                    <label class="form-check-label" for="editForaneo">¿Es Foráneo?</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="editPatria" name="patria">
                                    <label class="form-check-label" for="editPatria">¿Está registrado en patria?</label>
                                </div>
                                
                                <!--  Campos extra de foraneo -->
                                <div id="editPatriaExtraFields" style="display: none; overflow: hidden; max-height: 0; transition: max-height 0.4s ease;">
                                    <div class="mb-3">
                                        <label for="editDireccionTemporal" class="form-label">Dirección Temporal</label>
                                        <input type="text" class="form-control" id="editDireccionTemporal" name="direccion_temporal" placeholder="Ej: Calle 456, Ciudad" maxlength="150">
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            La dirección temporal no puede estar vacía.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">¿Pagas residencia?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_paga_residencia" id="editPagaResidenciaSi" value="si">
                                                <label class="form-check-label" for="editPagaResidenciaSi">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_paga_residencia" id="editPagaResidenciaNo" value="no">
                                                <label class="form-check-label" for="editPagaResidenciaNo">No</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            Seleccione una opción.
                                        </div>
                                    </div>
                                    <div class="mb-3" id="editCuantoPagasResidenciaDiv">
                                        <label for="editCuantoPagasResidencia" class="form-label">¿Cuánto pagas?</label>
                                        <input type="number" class="form-control" id="editCuantoPagasResidencia" name="cuanto_pagas_residencia" min="0" placeholder="Monto en Bs.">
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            Ingrese un monto válido.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">¿Viajas a diario a clases?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_viaja_diario" id="editViajaDiarioSi" value="si">
                                                <label class="form-check-label" for="editViajaDiarioSi">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_viaja_diario" id="editViajaDiarioNo" value="no">
                                                <label class="form-check-label" for="editViajaDiarioNo">No</label>
                                            </div>
                                            <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                Seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3" id="editVecesSemanaDiv">
                                        <label for="editVecesSemana" class="form-label">¿Cuántas veces a la semana?</label>
                                        <input type="number" class="form-control" id="editVecesSemana" name="veces_semana" min="0" max="9" maxlength="1" required placeholder="Ej: 5">
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            El campo es obligatorio y debe ser un solo dígito entre 1 y 7.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">¿Cuánto tiempo inviertes en el viaje?</label>
                                        <div class="row g-2">
                                            <div class="col">
                                                <input type="number" class="form-control" id="editTiempoViajeHoras" name="tiempo_viaje_horas" min="0" max="24" placeholder="Horas">
                                                <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                    El campo no puede estar vacío.
                                                </div>
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" id="editTiempoViajeMinutos" name="tiempo_viaje_minutos" min="0" max="59" placeholder="Minutos">
                                                <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                    El campo no puede estar vacío.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editGastoDiarioPasaje" class="form-label">Gasto diario en pasaje</label>
                                        <input type="text" class="form-control" id="editGastoDiarioPasaje" name="gasto_diario_pasaje" min="0" placeholder="Monto en Bs.">
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            Ingrese un monto válido.
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
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    // Validación para el campo ¿Cuántas veces a la semana?
    document.addEventListener('DOMContentLoaded', function () {
        var vecesSemana = document.getElementById('editVecesSemana');
        if (vecesSemana) {
            vecesSemana.addEventListener('input', function() {
                // Solo permitir un dígito entre 1 y 7
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1);
                this.classList.remove('is-invalid');
            });
        }
    });
    </script>
    <script>
        // Mostrar la edad automáticamente al cambiar la fecha de nacimiento en el modal de editar
        document.addEventListener('DOMContentLoaded', function () {
            var fechaInput = document.getElementById('editFechaNacimiento');
            var edadInput = document.getElementById('editEdad');
            if (fechaInput && edadInput) {
                fechaInput.addEventListener('input', function() {
                    const fecha = this.value;
                    if (fecha) {
                        const hoy = new Date();
                        const nacimiento = new Date(fecha);
                        let edad = hoy.getFullYear() - nacimiento.getFullYear();
                        const m = hoy.getMonth() - nacimiento.getMonth();
                        if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
                            edad--;
                        }
                        edadInput.value = edad >= 0 ? edad : '';
                    } else {
                        edadInput.value = '';
                    }
                });
            }
        });
    </script>
    <script>
    // Mostrar/ocultar campos extra de foráneo en editar estudiante
    document.addEventListener('DOMContentLoaded', function () {
        const foraneoCheckbox = document.getElementById('editForaneo');
        const extraFields = document.getElementById('editPatriaExtraFields');
        foraneoCheckbox.addEventListener('change', function() {
            if (this.checked) {
                extraFields.style.display = 'block';
                extraFields.style.maxHeight = '0';
                setTimeout(() => {
                    extraFields.style.maxHeight = extraFields.scrollHeight + 'px';
                }, 10);
            } else {
                extraFields.style.maxHeight = '0';
                setTimeout(() => {
                    extraFields.style.display = 'none';
                }, 400);
                // Limpiar los campos al ocultar
                document.getElementById('editDireccionTemporal').value = '';
                document.getElementById('editCuantoPagasResidencia').value = '';
                document.getElementById('editVecesSemana').value = '';
                document.getElementById('editTiempoViajeHoras').value = '';
                document.getElementById('editTiempoViajeMinutos').value = '';
                document.getElementById('editGastoDiarioPasaje').value = '';
                document.getElementsByName('edit_paga_residencia').forEach(r => r.checked = false);
                document.getElementsByName('edit_viaja_diario').forEach(r => r.checked = false);
            }
        });

        // Al cargar la página, deshabilitar los inputs dependientes
        document.getElementById('editCuantoPagasResidencia').setAttribute('disabled', true);
        document.getElementById('editVecesSemana').setAttribute('disabled', true);

        // Habilitar/deshabilitar el input de "¿Cuánto pagas?" según "¿Pagas residencia?"
        document.getElementsByName('edit_paga_residencia').forEach(function(radio) {
            radio.addEventListener('change', function() {
            const cuantoInput = document.getElementById('editCuantoPagasResidencia');
            if (this.value === 'si') {
                cuantoInput.removeAttribute('disabled');
            } else {
                cuantoInput.setAttribute('disabled', true);
            }
            });
        });

        // Habilitar/deshabilitar el input de "¿Cuántas veces a la semana?" según "¿Viajas a diario a clases?"
        document.getElementsByName('edit_viaja_diario').forEach(function(radio) {
            radio.addEventListener('change', function() {
            const vecesInput = document.getElementById('editVecesSemana');
            if (this.value === 'si') {
                vecesInput.removeAttribute('disabled');
            } else {
                vecesInput.setAttribute('disabled', true);
            }
            });
        });

        
    });
    </script>
    <!-- Modal de detalles del estudiante -->
    <div class="modal fade" id="detailsStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailsStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 450px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailsStudentModalLabel">Detalles del Estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Cédula:</label>
                                <input type="text" class="form-control" id="detailsCedula" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Primer Nombre:</label>
                                <input type="text" class="form-control" id="detailsPrimerNombre" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lapso Académico:</label>
                                <input type="text" class="form-control" id="detailsLapso" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" id="detailsPrimerApellido" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PNF:</label>
                                <input type="text" class="form-control" id="detailsPNF" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sexo:</label>
                                <input type="text" class="form-control" id="detailsSexo" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" id="detailsEmail" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sede:</label>
                                <input type="text" class="form-control" id="detailsSede" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Condición:</label>
                                <input type="text" class="form-control" id="detailsCondicion" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="detailsFechaNacimiento" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="detailsEdad" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="detailsTelefono" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección Permanente:</label>
                                <input type="text" class="form-control" id="detailsDireccion" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Procedencia:</label>
                                <input type="text" class="form-control" id="detailsProcedencia" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">¿Es Foráneo?</label>
                                <input type="text" class="form-control" id="detailsForaneo" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">¿Registrado en Patria?</label>
                                <input type="text" class="form-control" id="detailsPatria" readonly>
                            </div>
                            <!-- Campos solo para foráneo -->
                            <div id="foraneoExtraFields" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Dirección Temporal:</label>
                                    <input type="text" class="form-control" id="detailsDireccionTemporal" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">¿Pagas residencia?</label>
                                    <input type="text" class="form-control" id="detailsPagaResidencia" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">¿Cuánto pagas?</label>
                                    <input type="text" class="form-control" id="detailsCuantoPagasResidencia" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">¿Viajas a diario?</label>
                                    <input type="text" class="form-control" id="detailsViajaDiario" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">¿Cuántas veces a la semana?</label>
                                    <input type="text" class="form-control" id="detailsVecesSemana" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tiempo de viaje:</label>
                                    <input type="text" class="form-control" id="detailsTiempoViaje" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gasto diario en pasaje:</label>
                                    <input type="text" class="form-control" id="detailsGastoDiarioPasaje" readonly>
                                </div>
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
    <script>
    // Script para llenar el modal de detalles con los datos de la fila
    document.querySelectorAll('.btn-details[data-bs-target="#detailsStudentModal"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const row = btn.closest('tr');
            // Tomar datos de la fila
            document.getElementById('detailsCedula').value = row.cells[0]?.textContent.trim() || '-';
            document.getElementById('detailsPrimerNombre').value = row.cells[1]?.textContent.trim() || '-';
            document.getElementById('detailsPrimerApellido').value = row.cells[2]?.textContent.trim() || '-';

            // Datos que no están en la tabla: poner valores de ejemplo o por defecto
            document.getElementById('detailsLapso').value = '2023-2';
            document.getElementById('detailsPNF').value = 'Informatica';
            document.getElementById('detailsSexo').value = 'Masculino';
            document.getElementById('detailsEmail').value = 'angel@email.com';
            document.getElementById('detailsSede').value = 'Sede Central';
            document.getElementById('detailsCondicion').value = 'Regular';
            document.getElementById('detailsFechaNacimiento').value = '2000-01-01';
            document.getElementById('detailsEdad').value = '23';
            document.getElementById('detailsTelefono').value = '04141234567';
            document.getElementById('detailsDireccion').value = 'Calle 123, Ciudad';
            document.getElementById('detailsProcedencia').value = 'Agua Blanca, Acarigua';
            // Foráneo y patria
            // Simulación: algunos estudiantes son foráneos según la cédula (ejemplo)
            const cedula = row.cells[0]?.textContent.trim() || '';
            // Por ejemplo, si la cédula termina en 2, 8 o 9, es foráneo
            const esForaneo = ['2', '8', '9'].includes(cedula.slice(-1));
            document.getElementById('detailsForaneo').value = esForaneo ? 'Sí' : 'No';
            document.getElementById('detailsPatria').value = 'Sí';

            // Mostrar/ocultar campos extra de foráneo
            const foraneoExtraFields = document.getElementById('foraneoExtraFields');
            if (esForaneo) {
                foraneoExtraFields.style.display = 'block';
                document.getElementById('detailsDireccionTemporal').value = 'Calle 456, Ciudad';
                document.getElementById('detailsPagaResidencia').value = 'Sí';
                document.getElementById('detailsCuantoPagasResidencia').value = '100 Bs.';
                document.getElementById('detailsViajaDiario').value = 'Sí';
                document.getElementById('detailsVecesSemana').value = '5';
                document.getElementById('detailsTiempoViaje').value = '1h 30m';
                document.getElementById('detailsGastoDiarioPasaje').value = '10 Bs.';
            } else {
                foraneoExtraFields.style.display = 'none';
                document.getElementById('detailsDireccionTemporal').value = '';
                document.getElementById('detailsPagaResidencia').value = '';
                document.getElementById('detailsCuantoPagasResidencia').value = '';
                document.getElementById('detailsViajaDiario').value = '';
                document.getElementById('detailsVecesSemana').value = '';
                document.getElementById('detailsTiempoViaje').value = '';
                document.getElementById('detailsGastoDiarioPasaje').value = '';
            }
        });
    });
    </script>

    <!-- Modal de registro de estudiante -->
    <div class="modal fade" id="registerStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 450px;">
            <div class="modal-content">
                <form id="registerStudentForm" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="registerStudentModalLabel">Registrar Nuevo Estudiante</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="regCedula" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" id="regCedula" name="cedula" required pattern="\d{1,10}" maxlength="10" style="max-width: 220px;" placeholder="Ej: 1234567890">
                                    <div class="invalid-feedback">
                                        Solo números, máximo 10 dígitos.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="regNombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="regNombre" name="nombre" required placeholder="Ej: Angel">
                                    <div class="invalid-feedback">
                                        El nombre no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="regApellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="regApellido" name="apellido" required placeholder="Ej: Hernandez">
                                    <div class="invalid-feedback">
                                        El apellido no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row g-2 align-items-end">
                                        <div class="col-md-6">
                                            <label for="regSexo" class="form-label">Sexo</label>
                                            <select class="form-select" id="regSexo" name="sexo" required>
                                                <option value="">Seleccione Sexo</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Ingrese el Sexo.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="regTelefono" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="regTelefono" name="telefono" required placeholder="Ej: 04141234567" pattern="\d{11}" maxlength="11" style="max-width: 220px;">
                                            <div class="invalid-feedback">
                                                Ingrese un teléfono válido.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row g-2 align-items-start">
                                        <div class="col-md-6">
                                            <label for="regFechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="regFechaNacimiento" name="fecha_nacimiento" required placeholder="Ej: 2000-01-01">
                                            <div class="invalid-feedback">
                                                Fecha Invalida.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="regEdad" class="form-label">Edad</label>
                                            <input type="text" class="form-control" id="regEdad" name="edad" readonly placeholder="Edad" disabled>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="mb-3">
                                    <label for="regEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="regEmail" name="email" required placeholder="Ej: angel@email.com">
                                    <div class="invalid-feedback">
                                        El campo no puede estar vacío.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="regDireccion" class="form-label">Dirección Permanente</label>
                                    <input type="text" class="form-control" id="regDireccion" name="direccion" required placeholder="Ej: Calle 123, Ciudad">
                                    <div class="invalid-feedback">
                                        La dirección no puede estar vacía.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="regProcedencia" class="form-label">Procedencia</label>
                                    <input type="text" class="form-control" id="regProcedencia" name="procedencia" required placeholder="Ej: Agua Blanca, Acarigua">
                                    <div class="invalid-feedback">
                                        La procedencia no puede estar vacía.
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="regPatria" name="patria">
                                    <label class="form-check-label" for="regPatria">¿Está registrado en patria?</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="regForaneo" name="foraneo">
                                    <label class="form-check-label" for="regForaneo">¿Es Foráneo?</label>
                                </div>
                                
                                <!--  Campos extra de foraneo -->
                                <div id="patriaExtraFields" style="display: none; overflow: hidden; max-height: 0; transition: max-height 0.4s ease;">
                                    <div class="mb-3">
                                        <label class="form-label">¿Pagas residencia?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paga_residencia" id="pagaResidenciaSi" value="si" required>
                                                <label class="form-check-label" for="pagaResidenciaSi">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paga_residencia" id="pagaResidenciaNo" value="no" required>
                                                <label class="form-check-label" for="pagaResidenciaNo">No</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            Seleccione una opción.
                                        </div>
                                    </div>
                                    <div class="mb-3" id="direccionTemporalDiv" style="display: none;">
                                        <label for="regDireccionTemporal" class="form-label">Dirección Temporal</label>
                                        <input type="text" class="form-control" id="regDireccionTemporal" name="direccion_temporal" placeholder="Ej: Calle 456, Ciudad" maxlength="150">
                                        <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                            La dirección temporal no puede estar vacía.
                                        </div>
                                    </div>

                                    <div id="foraneoNoFields" style="display: none;">
                                        <div class="mb-3">
                                            <label class="form-label">¿Viajas a diario a clases?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="viaja_diario" id="viajaDiarioSi" value="si" required>
                                                    <label class="form-check-label" for="viajaDiarioSi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="viaja_diario" id="viajaDiarioNo" value="no">
                                                    <label class="form-check-label" for="viajaDiarioNo">No</label>
                                                </div>
                                                <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                    Seleccione una opción.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="vecesSemanaDiv">
                                            <label for="vecesSemana" class="form-label">¿Cuántas veces a la semana?</label>
                                            <input type="number" class="form-control" id="vecesSemana" name="veces_semana" min="1" max="7" placeholder="Ej: 5" disabled>
                                            <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                El campo no puede estar vacío.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">¿Cuánto tiempo inviertes en el viaje?</label>
                                            <div class="row g-2">
                                                <div class="col">
                                                    <input type="number" class="form-control" id="tiempoViajeHoras" name="tiempo_viaje_horas" min="0" max="24" placeholder="Horas" disabled>
                                                    <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                        El campo no puede estar vacío.
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="tiempoViajeMinutos" name="tiempo_viaje_minutos" min="0" max="59" placeholder="Minutos" disabled>
                                                    <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                        El campo no puede estar vacío.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gastoDiarioPasaje" class="form-label">Gasto diario en pasaje</label>
                                            <input type="text" class="form-control" id="gastoDiarioPasaje" name="gasto_diario_pasaje" min="0" placeholder="Monto en Bs." disabled>
                                            <div class="invalid-feedback" style="white-space: normal; word-break: break-word;">
                                                Ingrese un monto válido.
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const viajaDiarioSi = document.getElementById('viajaDiarioSi');
                                        const viajaDiarioNo = document.getElementById('viajaDiarioNo');
                                        const vecesSemana = document.getElementById('vecesSemana');
                                        const tiempoViajeHoras = document.getElementById('tiempoViajeHoras');
                                        const tiempoViajeMinutos = document.getElementById('tiempoViajeMinutos');
                                        const gastoDiarioPasaje = document.getElementById('gastoDiarioPasaje');

                                        function toggleViajaDiarioFields() {
                                            if (viajaDiarioSi.checked) {
                                                vecesSemana.removeAttribute('disabled');
                                                tiempoViajeHoras.removeAttribute('disabled');
                                                tiempoViajeMinutos.removeAttribute('disabled');
                                                gastoDiarioPasaje.removeAttribute('disabled');
                                            } else {
                                                vecesSemana.setAttribute('disabled', true);
                                                tiempoViajeHoras.setAttribute('disabled', true);
                                                tiempoViajeMinutos.setAttribute('disabled', true);
                                                gastoDiarioPasaje.setAttribute('disabled', true);
                                                vecesSemana.value = '';
                                                tiempoViajeHoras.value = '';
                                                tiempoViajeMinutos.value = '';
                                                gastoDiarioPasaje.value = '';
                                            }
                                        }

                                        viajaDiarioSi.addEventListener('change', toggleViajaDiarioFields);
                                        viajaDiarioNo.addEventListener('change', toggleViajaDiarioFields);

                                        // Inicializar estado al cargar
                                        toggleViajaDiarioFields();
                                    });
                                    </script>

                                    <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const pagaResidenciaSi = document.getElementById('pagaResidenciaSi');
                                        const pagaResidenciaNo = document.getElementById('pagaResidenciaNo');
                                        const direccionTemporalDiv = document.getElementById('direccionTemporalDiv');
                                        const foraneoNoFields = document.getElementById('foraneoNoFields');
                                        const regForaneo = document.getElementById('regForaneo');
                                        const extraFields = document.getElementById('patriaExtraFields');

                                        function updateForaneoFields() {
                                            if (regForaneo.checked) {
                                                extraFields.style.display = 'block';
                                                // Expandir el contenedor para mostrar todo el contenido
                                                extraFields.style.maxHeight = extraFields.scrollHeight + 'px';

                                                // Mostrar solo Dirección Temporal si "Sí" en ¿Pagas residencia?
                                                if (pagaResidenciaSi.checked) {
                                                    direccionTemporalDiv.style.display = 'block';
                                                    foraneoNoFields.style.display = 'none';
                                                } else if (pagaResidenciaNo.checked) {
                                                    direccionTemporalDiv.style.display = 'none';
                                                    foraneoNoFields.style.display = 'block';
                                                } else {
                                                    direccionTemporalDiv.style.display = 'none';
                                                    foraneoNoFields.style.display = 'none';
                                                }

                                                // Ajustar maxHeight después de mostrar los campos internos
                                                setTimeout(() => {
                                                    extraFields.style.maxHeight = extraFields.scrollHeight + 'px';
                                                }, 50);
                                            } else {
                                                extraFields.style.maxHeight = '0';
                                                setTimeout(() => {
                                                    extraFields.style.display = 'none';
                                                    direccionTemporalDiv.style.display = 'none';
                                                    foraneoNoFields.style.display = 'none';
                                                }, 400);
                                            }
                                        }

                                        pagaResidenciaSi.addEventListener('change', updateForaneoFields);
                                        pagaResidenciaNo.addEventListener('change', updateForaneoFields);
                                        regForaneo.addEventListener('change', function() {
                                            // Limpiar radios y campos al desmarcar foráneo
                                            if (!this.checked) {
                                                pagaResidenciaSi.checked = false;
                                                pagaResidenciaNo.checked = false;
                                                document.getElementById('regDireccionTemporal').value = '';
                                            }
                                            updateForaneoFields();
                                        });

                                        // Inicializar al cargar
                                        updateForaneoFields();
                                    });
                                    </script>

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
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <script>
            const extraFields = document.getElementById('patriaExtraFields');


            document.addEventListener('DOMContentLoaded', function () {
                // Solo números y máximo 8 dígitos para cédula
                document.getElementById('regCedula').addEventListener('input', function() {
                    this.value = this.value.replace(/\D/g, '').slice(0, 8);
                });

                // Solo números y máximo 11 dígitos para teléfono
                document.getElementById('regTelefono').addEventListener('input', function() {
                    this.value = this.value.replace(/\D/g, '').slice(0, 11);
                });

                // Calcular edad automáticamente al cambiar la fecha de nacimiento
                document.getElementById('regFechaNacimiento').addEventListener('input', function() {
                    const fecha = this.value;
                    const edadInput = document.getElementById('regEdad');
                    if (fecha) {
                        const hoy = new Date();
                        const nacimiento = new Date(fecha);
                        let edad = hoy.getFullYear() - nacimiento.getFullYear();
                        const m = hoy.getMonth() - nacimiento.getMonth();
                        if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
                            edad--;
                        }
                        edadInput.value = edad >= 0 ? edad : '';
                    } else {
                        edadInput.value = '';
                    }
                });


                // Animación y mostrar/ocultar campos extra de patria
                const foraneoCheckbox = document.getElementById('regForaneo');
                foraneoCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        extraFields.style.display = 'block';
                        // For animation: set max-height to 0 first, then to scrollHeight
                        extraFields.style.maxHeight = '0';
                        setTimeout(() => {
                            extraFields.style.maxHeight = extraFields.scrollHeight + 'px';
                        }, 10);
                    } else {
                        extraFields.style.maxHeight = '0';
                        setTimeout(() => {
                            extraFields.style.display = 'none';
                        }, 400);
                    }
                });
                /* Script para mostrar la edad del estudiante*/
                document.getElementById('regFechaNacimiento').addEventListener('input', function() {
                    const fecha = this.value;
                    const edadInput = document.getElementById('regEdad');
                    if (fecha) {
                        const hoy = new Date();
                        const nacimiento = new Date(fecha);
                        let edad = hoy.getFullYear() - nacimiento.getFullYear();
                        const m = hoy.getMonth() - nacimiento.getMonth();
                        if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
                            edad--;
                        }
                        edadInput.value = edad >= 0 ? edad : '';
                    } else {
                        edadInput.value = '';
                    }
                });


                // Habilitar/deshabilitar el input de "¿Cuántas veces a la semana?" según "¿Viajas a diario a clases?"
                document.getElementsByName('viaja_diario').forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        const vecesDiv = document.getElementById('vecesSemanaDiv');
                        const vecesInput = document.getElementById('vecesSemana');
                        if (this.value === 'si') {
                            vecesInput.removeAttribute('disabled');
                        } else {
                            vecesInput.setAttribute('disabled', true);
                        }
                    });
                });

                //Hablitar hora o minutos si unos de los 2 son rellenados 
                const tiempoViajeHoras = document.getElementById('tiempoViajeHoras');
                const tiempoViajeMinutos = document.getElementById('tiempoViajeMinutos');
                //Verificar que los campos no tengan mas de 3 dígitos
                tiempoViajeHoras.addEventListener('input', function() {

                });

                tiempoViajeHoras.addEventListener('input', function() {
                    // Solo permitir números y máximo 3 dígitos
                    if (tiempoViajeHoras.value.length > 3) {
                        tiempoViajeHoras.value = tiempoViajeHoras.value.slice(0, 3);
                    }
                    // Deshabilitar minutos si horas están rellenados
                    if (tiempoViajeHoras.value !== '') {
                        tiempoViajeMinutos.setAttribute("disabled", true);
                    } else {
                        tiempoViajeMinutos.removeAttribute("disabled");
                    }
                });
                //Deshabilitar hora si minutos están rellenados
                tiempoViajeMinutos.addEventListener('input', function() {
                    // Solo permitir números y máximo 3 dígitos
                    if (tiempoViajeMinutos.value.length > 3) {
                        tiempoViajeMinutos.value = tiempoViajeMinutos.value.slice(0, 3);
                    }
                    // Deshabilitar horas si minutos están rellenados
                    if (tiempoViajeMinutos.value !== '') {
                        tiempoViajeHoras.setAttribute("disabled", true);
                    } else {
                        tiempoViajeHoras.removeAttribute("disabled");
                    }
                });

                
                // Función para validar campos requeridos

                function validarInputVacio(input) {
                    if (!input) return false;
                    if (input.value.trim() === '') {
                        input.classList.add('is-invalid');
                        return false;
                    } else {
                        input.classList.remove('is-invalid');
                        return true;
                    }
                }

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

                    //validar email con una expresión regular
                    const email = form.regEmail.value.trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    // Validar email
                    if (email.trim() === '') {
                        form.regEmail.classList.add('is-invalid');
                    } else if (!emailRegex.test(email)) {
                        form.regEmail.classList.add('is-invalid');
                        form.regEmail.nextElementSibling.textContent = 'Ingrese un email válido.';
                        valid = false;
                    } else {
                        form.regEmail.classList.remove('is-invalid');
                        form.regEmail.nextElementSibling.textContent = 'El campo no puede estar vacío.';
                    }


                    //Validar los campos requeridos
                    valid = validarInputVacio(form.regNombre) && valid;
                    valid = validarInputVacio(form.regApellido) && valid;
                    valid = validarInputVacio(form.regSexo) && valid;
                    valid = validarInputVacio(form.regTelefono) && valid;
                    valid = validarInputVacio(form.regFechaNacimiento) && valid;
                    valid = validarInputVacio(form.regCondicion) && valid;
                    valid = validarInputVacio(form.regDireccion) && valid;
                    valid = validarInputVacio(form.regProcedencia) && valid;


                    // Validar los campos necesarios si esta chek el foraneo 

                    // Ya no es necesario validar los campos extra de foráneo, pueden enviarse vacíos

                    //ajusar el tamaño de la modal cuando se haga un summit 
                    if (foraneoCheckbox.checked) {
                        extraFields.style.maxHeight = extraFields.scrollHeight+ 50 + 'px';
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
                            document.getElementById('regEdad').value = '';
                            // Aquí puedes agregar la lógica para enviar los datos al backend
                        }
                    });
                });

                // Quitar la clase is-invalid al escribir

                //Variable para almacenar los ids de los inputs
                const inputIds = [
                    'regCedula', 'regNombre', 'regApellido', 'regSexo', 'regTelefono',
                    'regFechaNacimiento', 'regCondicion', 'regEmail', 'regDireccion',
                    'regProcedencia', 'regDireccionTemporal', 'cuantoPagasResidencia',
                    'vecesSemana', 'tiempoViajeHoras', 'tiempoViajeMinutos', 'gastoDiarioPasaje',
                    'pagaResidenciaSi', 'pagaResidenciaNo', 'viajaDiarioSi', 'viajaDiarioNo'
                ];

                // Agregar evento de input a cada uno de los inputs
                inputIds.forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) {
                        el.addEventListener('input', function() {
                            this.classList.remove('is-invalid');
                        });
                    }
                    // Quitar la clase is-invalid al escribir en cualquiera de los dos inputs de tiempo de viaje
                    if (id === 'tiempoViajeHoras' || id === 'tiempoViajeMinutos') {
                        el.addEventListener('input', function() {
                            document.getElementById('tiempoViajeHoras').classList.remove('is-invalid');
                            document.getElementById('tiempoViajeMinutos').classList.remove('is-invalid');
                        });
                    }
                    // quitar la clase is-invalid a los input radio de paga residencia
                    if(id === 'pagaResidenciaSi' || id === 'pagaResidenciaNo'){
                        el.addEventListener('change', function() {
                            // Busca el feedback específico dentro del grupo de paga residencia
                            const pagaResidenciaGroup = el.closest('.mb-3');
                            const cuantoDiv = pagaResidenciaGroup ? pagaResidenciaGroup.querySelector('.invalid-feedback') : null;
                            if (cuantoDiv) {
                                cuantoDiv.style.display = this.checked ? 'none' : 'block';
                            }
                        });
                    }

                    //quitar la clase is-invalid a los input radio de viaja diario
                    if(id === 'viajaDiarioSi' || id === 'viajaDiarioNo'){
                        el.addEventListener('change', function() {
                            // Busca el feedback específico dentro del grupo de viaja diario
                            const viajaDiarioGroup = el.closest('.mb-3');
                            const cuantoDiv = viajaDiarioGroup ? viajaDiarioGroup.querySelector('.invalid-feedback') : null;
                            if (cuantoDiv) {
                                cuantoDiv.style.display = this.checked ? 'none' : 'block';
                            }
                        });
                    }

                });
            });
            </script>
@endsection
