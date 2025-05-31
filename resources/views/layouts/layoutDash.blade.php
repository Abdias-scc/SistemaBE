<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="shortcut icon" href="{{ asset('img/imagen-gotty.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css" rel="stylesheet">
        <!-- NO QUITAR(por alguna razon no agarra la modal sin esto xd) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @vite(['resources/js/dashboard/main.js'])
</head>
<body>
    @include('components.menu_lateral')
    <main class="main-content">
        <div class="info-container">
            <h1>@yield('titulo')</h1>
            @yield('content')
            @if (trim($__env->yieldContent('content')) == '')
                <div class="alert alert-info mt-4">
                    No hay contenido disponible.
                </div>
            @endif
        </div>
    </main>
</body>



<style>
    html{
        background-color: #f8f8f8
    }

    .info-container> h1{
        padding-left: 25px;
        margin: 10px 0 20px 0
    }
    .main-content {
        margin-left: var(--size-bar-lateral);
        padding-top: calc(var(--height-header) + 20px);
        transition: .4s ease;
    }

    .main-content.colapsed {
        margin-left: var(--size-bar-lateral-collapsed);
    }

    .contenedor {
        border-radius: 20px;
        box-shadow: 0 -5px 20px -5px rgba(0, 0, 0, 0.25);
        padding: 30px;
        background-color: rgb(247, 247, 247);
    }
</style>
</html>
