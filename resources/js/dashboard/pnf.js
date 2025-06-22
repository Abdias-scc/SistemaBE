import Swal from 'sweetalert2';
import { setupSearch } from '../searchInput';
setupSearch('searchInput', 'searchButton', '/dashboard/pnf');
//token para validar las peticiones
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const deleteBtn = document.querySelectorAll('button[id="deleteButton"]');
const editButtons = document.querySelectorAll('#editarButton');

const editPNF = document.getElementById('editPNF');

/*Script para el boton de eliminar*/
deleteBtn.forEach(function(btn) {
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
            if (!result.isConfirmed) {
                return; // Si no se confirma, salir de la función
            }
            //recuperamos la id del pnf a eliminar
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
                //Eliminamos el pnf de la tabla
                row.remove()
                //Imprimimos una alerta
                Swal.fire({
                    title: '¡Eliminado!',
                    text: 'El PNF ha sido eliminado',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                })
                .then(result =>{
                    if(result.isConfirmed){
                        window.location.reload()
                    }
                })
            })
            .catch(error =>{
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudo eliminar el estudiante. Inténtalo de nuevo más tarde.'+ error,
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                });
            })

        })
    })
});



/* Script para la edición de estudiantes */

// Delegación para todos los botones Editar
document.querySelectorAll('button[data-bs-target="#staticBackdrop"]').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        const row = btn.closest('tr');
        if (row) {
            document.getElementById('editPNF').value = row.cells[0].textContent.trim();
        }
    });
});
//Eliminar números y convertir a mayúsculas en el campo de edición
editPNF.addEventListener('input', function (){
    this.value = this.value.replace(/[0-9]/g, '').toUpperCase();
})

//recorremos todos los botones de editar
editButtons.forEach(function(btn) {
    //añadimos un evento al boton de editar
    btn.addEventListener('click', function(e){
        //recojemos la id del pnf a editar
        const id = btn.getAttribute('data-pnf-id');

        document.getElementById('saveEdit').addEventListener('click', function(e){
            e.preventDefault();
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
                            return 
                        }

                        //avisamos al usuario
                        Swal.fire({
                            title: '¡Actualizado!',
                            text: 'Los datos han sido actualizados',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        }).then(result => {
                            if (result.isConfirmed) {
                                // Recargar la página para reflejar los cambios
                                location.reload();
                            }
                        });

                    })
                    .catch( error =>{
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo actualizar el PNF.Intentalo de nuevo más tarde.'+ error,
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    })

                }
            });
        })
    })
})

//cambiar el estatus del pnf

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
                .then(response => {
                    if (!response.ok) {
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo cambiar el estatus del PNF. Inténtalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        });
                        // Revert the switch back to its original state
                        switchInput.checked = !checked;
                        label.textContent = checked ? 'Inactivo' : 'Activo';
                        return;
                    }
                    Swal.fire({
                        title: checked ? '¡Activada!' : '¡Inactivada!',
                        text: checked ? `El PNF ${sede} ha sido activada.` : `El PNF ${sede} ha sido inactivada.`,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    })
                    .then(result =>{
                        if (result.isConfirmed) {
                            // Recargar la página para reflejar los cambios
                            window.location.reload();
                        }
                    })

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



const input = document.getElementById('regPNF');


//Eliminar números y convertir a mayúsculas en el campo de edición
input.addEventListener('input', function() {
    // Elimina automáticamente cualquier número que se intente ingresar
    this.value = this.value.replace(/[0-9]/g, '').toUpperCase();
});


// Validación y envío del formulario de registro
document.getElementById('registerStudent').addEventListener('click', function(e) {
    e.preventDefault();
    let valid = true;

    // Validar PNF
    if (input.value.trim() === '') {
        input.classList.add('is-invalid');
        valid = false;
    } else if(!/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]+$/.test(input.value)){
        Swal.fire({
            title: 'Error',
            text: 'El PNF solo puede contener letras, no números ni caracteres especiales.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        input.classList.add('is-invalid');
        valid = false;
    }else {
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
            const new_pnf = input.value.toUpperCase().trim();
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
                    //no devolvemos nada
                    return;
                }

                //enviamos una alerta al usuario
                Swal.fire({
                    title: '¡Creado!',
                    text: 'El PNF ha sido creado exitosamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                })
                .then(result =>{
                    if(result.isConfirmed){
                        window.location.reload()
                    }
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