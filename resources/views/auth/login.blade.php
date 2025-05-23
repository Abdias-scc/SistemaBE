<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="pragma" content="no-cache" />
  <title>UPTP inicio de sesión</title>
  <link rel="stylesheet" href="{{ asset('css/estilosxd.css') }}">
</head>
<body>

  <div class="wrapper">
    <div class="titulo-lateral">
      <h1>Control de Asistencias</h1>
      <h2>UPTP Juan de Jesús Montilla</h2>
    </div>

    <div class="container">
      <div class="container-forn">
        <!-- Formulario de Login -->
        <form class="sing-in" method="POST" action="{{ route('login') }}">
          @csrf
          <h2>Inicie Sesión</h2>

          <div class="redes">
            <ion-icon name="logo-facebook"></ion-icon>
            <ion-icon name="logo-instagram"></ion-icon>
            <ion-icon name="logo-twitter"></ion-icon>
          </div>

          <span>Use su cédula y contraseña</span>

          <div class="container-input">
            <ion-icon name="person-outline"></ion-icon>
            <input
              id="cedulaLogin"
              type="text"
              name="cedula"
              placeholder="Cédula"
              value="{{ old('cedula') }}"
              required
              autofocus
              
            >
            @error('cedula')
          
            @enderror
          </div>

          <div class="container-input">
            <ion-icon name="lock-open-outline"></ion-icon>
            <input
              id="password"
              type="password"
              name="password"
              placeholder="Contraseña"
              required
              class="@error('password') is-invalid @enderror"
            >
          </div>
         
          <!-- mostrar error general -->
@if ($errors->any())
  <div id="mensajeError" class="invalid-feedback" style="margin-top: 10px; color: red;">
    {{ $errors->first() }}
  </div>
@endif

          

          

          <a href="{{ route('password.request') }}" style="color: black;">
            Olvidaste tu contraseña?
          </a>

          <button class="button" type="submit">Iniciar Sesión</button>
        </form>
      </div>

      <div class="container-forn">
        <!-- Formulario de Registro -->
        <form class="sing-up" method="POST" action="{{ route('register') }}" autocomplete="off" >
          @csrf
          <h2>Registrarse</h2>

          <div class="redes">
            <ion-icon name="logo-facebook"></ion-icon>
            <ion-icon name="logo-instagram"></ion-icon>
            <ion-icon name="logo-twitter"></ion-icon>
          </div>

          <span>Complete los campos para registrarse</span>

          <div class="container-input">
            <ion-icon name="person-add-outline"></ion-icon>
            <input
              id="nombre"
              type="text"
              name="name"
              placeholder="Nombre"
              value="{{ old('name') }}"
              required
              class="@error('name') is-invalid @enderror"
            >
          </div>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <div class="container-input">
            <ion-icon name="man-outline"></ion-icon>
            <input
              id="apellido"
              type="text"
              name="apellido"
              placeholder="Apellido"
              value="{{ old('apellido') }}"
              required
              class="@error('apellido') is-invalid @enderror"
            >
          </div>

          <div class="container-input oculto">
            <ion-icon name="id-card-outline"></ion-icon>
            <input
              id="cedulaRegistro"
              type="text"
              name="cedula"
              maxlength="8"
              placeholder="Cédula"
              value="{{ old('cedula') }}" required>
            <small id="cedula-error" style="color: red;"></small>
          </div>

          <div class="container-input oculto">
            <ion-icon name="mail-unread-outline"></ion-icon>
            <input
              id="correo"
              type="email"
              name="email"
              placeholder="Correo Electrónico"
              value="{{ old('email') }}"
              required
              class="@error('email') is-invalid @enderror">
            <small id="email-error" style="color: red;"></small>
          </div>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <div class="container-input oculto">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input
              id="contraseñaRegistro"
              type="password"
              name="password"
              placeholder="Contraseña"
              required
              class="@error('password') is-invalid @enderror">
            <small id="contraseña-error" style="color: red;"></small>
          </div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <div class="container-input oculto">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input
              id="contraseñaConfirmacion"
              type="password"
              name="password_confirmation"
              placeholder="Confirmar Contraseña"
              required>
            <small id="contraseña-confirm-error" style="color: red;"></small>
          </div>

          <button id="btn-sing-in-registro" class="button" type="submit">Registrarse</button>
        </form>
      </div>

      <div class="container-welcome">
        <div class="welcome-sing-up">
          <h3>¡Bienvenido!</h3>
          <p>Ingrese sus datos para usar todas las funciones</p>
          <button class="button" id="btn-sing-up">Registrarse</button>
        </div>
        <div class="welcome-sing-in">
          <h3>¡Hola!</h3>
          <p>Regístrate con tus datos para acceder a todas las funciones</p>
          <button class="button" id="btn-sing-in">Iniciar Sesión</button>
        </div>
      </div>
    </div>
  </div>

  <div class="popup-registro" id="popupRegistro">
    <p>Registrado exitosamente</p>
  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
@if ($errors->has('cedula') && $errors->first('cedula') === 'Demasiados intentos. Inténtalo en unos minutos.')
    <div id="lockout-message">
        {{ $errors->first('email') }}
    </div>
    <script>
        localStorage.setItem('lockoutStartTime', Date.now ());
    </script>
@endif

@if (session('lockout'))
  <script>
      localStorage.setItem('lockoutStartTime', Date.now ());
  </script>
@endif

<script src="{{ asset('js/login1.js') }}"></script>



</body>
</html>
