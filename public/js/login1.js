console.log("js cargado");
const container = document.querySelector(".container");
const signInForm = document.querySelector(".sing-in");
const signUpForm = document.querySelector(".sing-up");
const btnSingInSubmit = document.querySelector(".sing-in .button");
const btnSingUpSubmit = document.querySelector(".sing-up .boton");
const btnSingUpWelcome = document.getElementById("btn-sing-up");
const btnSignInWelcome = document.getElementById("btn-sing-in");
const btnSignInRegistro = document.getElementById("btn-sing-in-registro");
const popupRegistro = document.getElementById("popupRegistro");
const timerSpan = document.createElement('span');


const nombreInput = document.getElementById("nombre");
const apellidoInput = document.getElementById("apellido");
const cedulaInputRegistro = document.getElementById("cedulaLogin");
const correoInput = document.getElementById("email");
const contrasenaInputRegistro = document.getElementById("contrasena");
const cedulaInputLogin = document.querySelector(".sing-in input[placeholder='Cédula']");
const contrasenaInputLogin = document.querySelector(".sing-in input[placeholder='Contraseña']");

const camposOcultos = document.querySelectorAll(".sing-up .container-input.oculto");

let camposMostrados = false;

function mostrarCamposOcultos() {
    if (!camposMostrados) {
        camposOcultos.forEach((campo, index) => {
            setTimeout(() => {
                campo.classList.remove("oculto");
                campo.classList.add("slide-down");
            }, index * 150);
        });
        camposMostrados = true;
    }
}

function mostrarPopupRegistro() {
    if (popupRegistro) {
        popupRegistro.classList.add("show");
        setTimeout(() => {
            popupRegistro.classList.remove("show");
            window.location.reload();
        }, 3000);
    }
}

nombreInput.addEventListener("blur", () => {
    if (nombreInput.value.trim() !== "" && apellidoInput.value.trim() !== "") {
        mostrarCamposOcultos();
    }
});

apellidoInput.addEventListener("blur", () => {
    if (nombreInput.value.trim() !== "" && apellidoInput.value.trim() !== "") {
        mostrarCamposOcultos();
    }
});

function validarInicioSesion() {
    const cedula = cedulaInputLogin.value.trim();
    const contrasena = contrasenaInputLogin.value.trim();

    if (!cedula || !contrasena) {
        alert("Por favor, complete todos los campos para iniciar sesión.");
        return false;
    }
    return true;
}

function validarRegistro() {
    const nombre = nombreInput.value.trim();
    const apellido = apellidoInput.value.trim();
    const cedula = cedulaInputRegistro.value.trim();
    const correo = correoInput.value.trim();
    const contrasena = contrasenaInputRegistro.value.trim();

    if (!nombre || !apellido || !cedula || !correo || !contrasena) {
        alert("Por favor, complete todos los campos para registrarse.");
        return false;
    }

    const correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!correoRegex.test(correo)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        return false;
    }

    return true;
}

signInForm.addEventListener("submit", function (event) {
    event.preventDefault();
    if (validarInicioSesion()) {
        signInForm.submit();
    }
});

if (btnSingUpSubmit) {
    btnSingUpSubmit.addEventListener("click", (event) => {
        event.preventDefault();
        if (validarRegistro()) {
            container.classList.remove("toggle");
            camposMostrados = false;
            camposOcultos.forEach(campo => {
                campo.classList.add("oculto");
                campo.classList.remove("slide-down");
            });
            mostrarPopupRegistro();
            signUpForm.submit();
        }
    });
}

if (cedulaInputLogin) {
    cedulaInputLogin.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            if (validarInicioSesion()) {
                btnSingInSubmit.click();
            }
        }
    });
}

if (contrasenaInputLogin) {
    contrasenaInputLogin.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            if (validarInicioSesion()) {
                btnSingInSubmit.click();
            }
        }
    });
}

if (contrasenaInputRegistro) {
    contrasenaInputRegistro.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            if (validarRegistro()) {
                btnSingUpSubmit.click();
            }
        }
    });
}

btnSignInWelcome.addEventListener("click", () => {
    container.classList.remove("toggle");
    camposMostrados = false;
    camposOcultos.forEach(campo => {
        campo.classList.add("oculto");
        campo.classList.remove("slide-down");
    });
});

btnSingUpWelcome.addEventListener("click", () => {
    container.classList.add("toggle");
    camposMostrados = false;
    camposOcultos.forEach(campo => {
        campo.classList.add("oculto");
        campo.classList.remove("slide-down");
    });
});

const btnSignInRegistroHandler = document.getElementById("btn-sing-in-registro");
if (btnSignInRegistroHandler) {
    btnSignInRegistroHandler.addEventListener("click", () => {
        container.classList.remove("toggle");
        camposMostrados = false;
        camposOcultos.forEach(campo => {
            campo.classList.add("oculto");
            campo.classList.remove("slide-down");
        });
    });
}
window.addEventListener('DOMContentLoaded', () => {
  const mensaje = document.getElementById('error-message');
  const inputContrasena = document.getElementById('password');

  if (mensaje && mensaje.textContent.includes('Demasiados intentos')) {
    inputContrasena.disabled = true;
  }
});


 document.addEventListener('DOMContentLoaded', () => {
    if (window.lockoutTimer) { 
        const passwordInput = document.getElementById('password');
        const lockoutMsg = document.getElementById('lockout-message'); // mensaje original

        if (!passwordInput) return;

        passwordInput.disabled = true;

        const timerSpan = document.createElement('span');
        timerSpan.style.minWidth = "100px";
        timerSpan.style.marginTop = "12px";
        timerSpan.style.marginLeft = "15px";
        timerSpan.style.display = "inline-block";
        timerSpan.style.color = "red";
        timerSpan.style.fontWeight = "bold";

        passwordInput.parentNode.appendChild(timerSpan);

        let seconds = 180;
        const countdown = setInterval(() => {
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            timerSpan.textContent = `Intentar en ${mins}:${secs < 10 ? '0' : ''}${secs}`;
            seconds--;

            if (seconds < 0) {
                clearInterval(countdown);
                passwordInput.disabled = false;
                timerSpan.textContent = '';
                if (lockoutMsg) lockoutMsg.textContent = ''; // oculta mensaje
                window.lockoutTimer = false; // opcional
            }
        }, 1000);
    }
});

