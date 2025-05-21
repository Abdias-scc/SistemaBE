<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPTP inicio de sesión</title>
</head>
<body>

    <div class="container">
        <div class="container-forn">
            <form class="sing-in" method="get">
                <h2>Inicie Sesion</h2>
                <div class="redes">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                </div>
                <span>Use su cédula y contraseña </span>
                <div class="container-input">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="cedula" placeholder="Cédula">
                </div>
                <div class="container-input">
                    <ion-icon name="lock-open-outline"></ion-icon>
                    <input type="password" name="contrasena" placeholder="Contraseña">
                </div>
                <a href="{{ route('dashboard') }}" style="color: black;">Olvidaste tu contraseña?</a>
                <button class="button" type="submit">Inicie Sesión</button>
            </form>

        </div>
        <div class="container-forn">
            <form class="sing-up">
                <h2>Registrarse</h2>
                <div class="redes">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                </div>
                <span>Complete los campos para registrarse</span>
                <div class="container-input">
                    <ion-icon name="person-add-outline"></ion-icon>
                    <input type="text" name="nombre" placeholder="Nombre" id="nombre">
                </div>

                <div class="container-input">
                    <ion-icon name="man-outline"></ion-icon>
                    <input type="text" name="apellido" placeholder="Apellido" id="apellido">
                </div>

                <div class="container-input oculto">
                    <ion-icon name="id-card-outline"></ion-icon>
                    <input type="text" name="cedula" placeholder="Cédula" id="cedula">
                </div>

                <div class="container-input oculto">
                    <ion-icon name="mail-unread-outline"></ion-icon>
                    <input type="text" name="correo" placeholder="Correo Electronico" id="correo">
                </div>

                <div class="container-input oculto">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="contrasena" placeholder="Contraseña" id="contrasena">
                </div>

                <button class="boton">Registrarse</button>
            </form>


        </div>

        <div class="container-welcome">
            <div class="welcome-sing-up">
                <h3 style="color: white;">¡Bienvenido!</h3>
                <p style="color: white;">Ingrese sus datos para usar todas la funciones</p>
                <button class="button" id="btn-sing-up">Registrarse</button>
            </div>
            <div class="welcome-sing-in">
                <h3 style="color: white;">¡Hola!</h3>
                <p style="color: white;">Registrate con tus datos para acceder a todas la funciones</p>
                <button class="button" id="btn-sing-in">Iniciar Sesión</button>
            </div>
        </div>

    </div>

    <div class="popup-registro" id="popupRegistro">
        <p>Registrado exitosamente</p>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Montserrat", sans-serif;
    }
    body{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f4f3;
    }
    .container{
        width: 800px;
        height: 500px;
        display: flex;
        position: relative;
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 10px rgb(0,0, 0);
    }
    .container-forn{
        width: 100%;
        overflow: hidden;
    }
    .container-forn form{
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: transform 0.5s ease-in;
    }
    .container-forn h2{
        font-size: 30px;
        margin-bottom: 20px;
    }
    .redes{
        display: flex;
        gap: 12px;
        margin-bottom: 25px;
    }
    .redes ion-icon{
        border: 1px solid #6E0D25;
        font-size: 18px;
        border-radius: 6px;
        padding: 8px;
        cursor: pointer;
    }
    .container-forn span{
        font-size: 12px;
        margin-bottom: 15px;
    }
    .container-input{
        width: 300px;
        height: 40px;
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 0 15px;
        background-color: #eeeeee;
    }
    .container-input input{
        border: none;
        outline: none;
        width: 100%;
        height: 100%;
        background-color: inherit;
    }
    .container-forn a{
        color: black;
        font-size: 14px;
        margin-bottom: 20px;
        margin-top: 5px;
    }
    .button{
        width: 170px;
        height: 45px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        background-color: #6e0d0d;
        color: white;
    }

    .boton{
        width: 170px;
        height: 45px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        background-color: black;
        color: white;
    }

    .sing-up{
        transform: translateX(-100%);
    }
    .container.toggle .sing-in{
        transform: translateX(100%);
    }
    .container.toggle .sing-up{
        transform: translateX(0);
    }

    .container-welcome{
        position:absolute;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translateX(100%);
        background-color: #6E0D25;
        transition: transform 0.5s ease-in-out, border-radius 0.5s ease-in-out, background-color 0.5s ease-in;
        overflow: hidden;
        border-radius: 50% 0 0 50%;
    }

    .container.toggle .container-welcome{
        transform: translateX(0);
        border-radius: 0 50% 50% 0;
        background-color: black;
    }

    .welcome-sing-up,
    .welcome-sing-in {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 0 40px;
        color: white;
        text-align: center;
        transition: transform 0.5s ease-in-out;
        position: absolute;
        top: 0;
        left: 0;
    }

    .welcome-sing-in{
        transform: translateX(100%);
    }

    .container-welcome h3{
        font-size: 40px;
        transition: font-size 0.5s ease;
    }

    .container-welcome p{
        font-size: 14px;
    }

    .container-welcome .button{
        border: 2px solid white;
        background-color: transparent;
    }

    .container.toggle .welcome-sing-in{
        transform: translateX(0);
    }

    .container.toggle .welcome-sing-up{
        transform: translateX(-100%);
    }

    .slide-down {
        animation: slideDown 0.5s ease-out forwards;
        opacity: 0; 
    }

    @keyframes slideDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .oculto {
        display: none;
    }

    .popup-registro {
        position: fixed; 
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 20px;
        border-radius: 8px;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease-in-out;
    }

    .popup-registro.show {
        opacity: 1;
        visibility: visible;
    }

    .popup-registro p {
        margin: 0;
        font-size: 1.2em;
    }
</style>
<script>
   const container = document.querySelector(".container");
    const signInForm = document.querySelector(".sing-in");
    const signUpForm = document.querySelector(".sing-up");
    const btnSingInSubmit = document.querySelector(".sing-in .button");
    const btnSingUpSubmit = document.querySelector(".sing-up .boton");
    const btnSingUpWelcome = document.getElementById("btn-sing-up");
    const btnSignInWelcome = document.getElementById("btn-sing-in");
    const btnSignInRegistro = document.getElementById("btn-sing-in-registro");
    const popupRegistro = document.getElementById("popupRegistro");

    const nombreInput = document.getElementById("nombre");
    const apellidoInput = document.getElementById("apellido");
    const cedulaInputRegistro = document.getElementById("cedula");
    const correoInput = document.getElementById("correo");
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

    signInForm.addEventListener("submit", function(event) {
        event.preventDefault();
        if (btnSingInSubmit) {
            btnSingInSubmit.click();
        }
    });

    if (btnSingUpSubmit) {
        btnSingUpSubmit.addEventListener("click", (event) => {
            event.preventDefault();
            container.classList.remove("toggle");
            camposMostrados = false;
            camposOcultos.forEach(campo => {
                campo.classList.add("oculto");
                campo.classList.remove("slide-down");
            });
            mostrarPopupRegistro();
        });
    }

    if (cedulaInputLogin) {
        cedulaInputLogin.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                if (btnSingInSubmit) {
                    btnSingInSubmit.click();
                }
            }
        });
    }

    if (contrasenaInputLogin) {
        contrasenaInputLogin.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                if (btnSingInSubmit) {
                    btnSingInSubmit.click();
                }
            }
        });
    }

    if (contrasenaInputRegistro) {
        contrasenaInputRegistro.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                btnSingUpSubmit.click();
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

</script>