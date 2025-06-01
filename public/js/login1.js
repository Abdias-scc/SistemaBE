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
const cedulaInputRegistro = document.getElementById("cedulaRegistro");
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


 document.addEventListener("DOMContentLoaded", () => {
    const lockoutStart = localStorage.getItem('lockoutStartTime');
    const passwordInput = document.getElementById('password');
    const lockoutMsg = document.getElementById('lockout-message');

    if (lockoutStart && passwordInput) {
        const elapsed = Date.now() - parseInt(lockoutStart);
        const duration = 180000; // 3 minutos

        if (elapsed < duration) {
            const timerSpan = document.createElement('span');
            timerSpan.style.minWidth = "100px";
            timerSpan.style.marginTop = "12px";
            timerSpan.style.marginLeft = "15px";
            timerSpan.style.display = "inline-block";
            timerSpan.style.color = "red";
            timerSpan.style.fontWeight = "bold";
            passwordInput.parentNode.appendChild(timerSpan);

            passwordInput.disabled = true;

            let seconds = Math.floor((duration - elapsed) / 1000);
            const countdown = setInterval(() => {
                const mins = Math.floor(seconds / 60);
                const secs = seconds % 60;
                timerSpan.textContent = `Intentar en ${mins}:${secs < 10 ? '0' : ''}${secs}`;
                seconds--;

                if (seconds < 0) {
                    clearInterval(countdown);
                    passwordInput.disabled = false;
                    timerSpan.textContent='';
                    if (lockoutMsg) lockoutMsg.style.display = 'none';
                    window.lockoutTimer = false;
                    localStorage.removeItem('lockoutStartTime');
                }
            }, 1000);
        } else {
            // Ya pasaron los 3 minutos
            localStorage.removeItem('lockoutStartTime');
            if (lockoutMsg) lockoutMsg.style.display = 'none';
        }
    }
});

document.addEventListener("DOMContentLoaded", () => {
  
  const cedulaInput = document.getElementById("cedulaRegistro");
  cedulaInput.addEventListener("input", function (e) {
  

// Elimina caracteres que no sean números y restringe a máximo 10 dígitos
  this.value = this.value.replace(/\D/g, "").slice(0, 10);
});
  const emailInput = document.getElementById("correo");
  const passwordInput = document.getElementById("contraseñaRegistro");
  const confirmPasswordInput = document.getElementById("contraseñaConfirmacion");
  const btnRegister = document.getElementById("btn-sing-in-registro");

  // Mensajes de error
  const cedulaError = document.getElementById("cedula-error");
  cedulaError.style.marginTop = "1px";
  cedulaError.style.marginLeft = "1.2px";
  cedulaError.style.fontSize = "12px";  
  cedulaError.style.paddingLeft = "5px";
  cedulaError.style.textAlign = "center";

  const emailError = document.getElementById("email-error");
  emailError.style.marginTop = "1px";
  emailError.style.marginLeft = "1.2px";
  emailError.style.fontSize = "12px";
  emailError.style.paddingLeft = "5px";
  emailError.style.textAlign = "center";

  const passwordError = document.getElementById("contraseña-error");
  passwordError.style.marginTop = "1px";
  passwordError.style.marginLeft = "1.2px";
  passwordError.style.fontSize = "12px";
  passwordError.style.paddingLeft = "5px"; 
  passwordError.style.textAlign = "center";


  const confirmError = document.getElementById("contraseña-confirm-error");
  confirmError.style.marginTop = "1px";
  confirmError.style.marginLeft = "1.2px";
  confirmError.style.fontSize = "12px";
  confirmError.style.paddingLeft = "5px";
  confirmError.style.textAlign = "center";

  // Estado de cada campo
  let validCedula = false;
  let validEmail = false;
  let validPassword = false;
  let validConfirm = false;

  // Desactiva o activa el botón dependiendo de si todo está bien
  const updateButtonState = () => {
    btnRegister.disabled = !(validCedula && validEmail && validPassword && validConfirm);
  };

  // Validación de cédula
  cedulaInput.addEventListener("blur", async () => {
    const cedula = cedulaInput.value.trim();

    if (!/^\d{7,10}$/.test(cedula)) {
      cedulaError.textContent = "Debe minimo 7 números";
      validCedula = false;
      updateButtonState();
      return;
    }

    try {
      const res = await fetch(`/verificar-cedula?cedula=${cedula}`);
      const data = await res.json();

      if (data.exists) {
        cedulaError.textContent = "Cédula ya registrada";
        validCedula = false;
      } else {
        cedulaError.textContent = "";
        validCedula = true;
      }
    } catch (err) {
      cedulaError.textContent = "Error al verificar la cédula";
      validCedula = false;
    }

    updateButtonState();
  });

  // Validación de correo
  emailInput.addEventListener("blur", async () => {
    const email = emailInput.value.trim();

    if (!email.includes("@") || !email.includes(".")) {
      emailError.textContent = "Correo no válido";
      validEmail = false;
      updateButtonState();
      return;
    }

    try {
      const res = await fetch(`/verificar-email?email=${email}`);
      const data = await res.json();

      if (data.exists) {
        emailError.textContent = "Correo ya registrado";
        validEmail = false;
      } else {
        emailError.textContent = "";
        validEmail = true;
      }
    } catch (err) {
      emailError.textContent = "Error al verificar el correo";
      validEmail = false;
    }

    updateButtonState();
  });

  // Validación de contraseña (mínimo 8 caracteres)
  passwordInput.addEventListener("blur", async () => {
    const password = passwordInput.value;

    if (password.length < 8) {
      passwordError.textContent = "Mínimo 8 caracteres";
      validPassword = false;
    } else {
      passwordError.textContent = "";
      validPassword = true;
    }

    validateConfirmPassword(); // Verifica también si coinciden
    updateButtonState();
  });

  // Confirmar contraseña
  confirmPasswordInput.addEventListener("input", () => {
    validateConfirmPassword();
    updateButtonState();
  });

  const validateConfirmPassword = () => {
    const password = passwordInput.value;
    const confirm = confirmPasswordInput.value;

    if (confirm !== password || confirm.length === 0) {
      confirmError.textContent = "Contraseñas no coinciden";
      validConfirm = false;
    } else {
      confirmError.textContent = "";
      validConfirm = true;
    }
  };
});
