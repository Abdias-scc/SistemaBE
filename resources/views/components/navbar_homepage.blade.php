
<header>
    <nav class="navbar navbar-expand-lg fixed-top bg-opacity-50 p-0 py-2" id="color-nav">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('index') }}">
          <img src="{{ asset('img/logo.png') }}" alt="logo" width="70" height="30" class="d-inline-block align-text-top my-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between " id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="navbar-item">
              <a class="nav-link " style="font-weight: bold;" href="{{ route('index') }}" aria-current="page">INICIO</a>
            </li>
            <li class="navbar-item">
              <a href="{{ route ('index') }}" class="nav-link" style="font-weight: bold;">CARRERAS</a>
            </li>
            <li class="navbar-item">
              <a href="{{ route('aboutUs') }}" class="nav-link" style="font-weight: bold;">SOBRE NOSOTROS</a>
            </li>
          </ul>
          <div class="btn-sesion my-2 justify-content-lg-end align-items-lg-center">
            <a class="btn-danger iniciaSesion ms-lg-2" href="{{ route("login") }}" target="_blank">Inicia Sesion</a>
          </div>
        </div>
      </div>
    </nav>
</header>
<style>
    #color-nav {
        background: #faf8f780;
    }
    .iniciaSesion {
        padding: 1.1rem 0.8rem;
        text-decoration: none;
        color: #fff;
        padding-top: 10px;
        padding-bottom: 10px;
        background: #ff443a;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
    }
    .btn-sesion {
        white-space: nowrap;
    }
</style>