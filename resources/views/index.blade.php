@extends('layouts.layoutHome')
{{-- Titulo de la pagina --}}
@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<section id="hero">
    <div class="contenedor">
        <div class="info">
            <h2 class="" style="font-weight: bold;">Forjando Lideres</h2>
            <h1 class="mb-3" style="font-weight: bold;">IMPULSANDO EL FUTURO</h1>
            <h4 class="mb-3" style="font-weight: bold;">Puedes adquirir informacion Gratis pulsando el boton de aqui abajo.</h4>
            <a data-mdb-ripple-init class="btn btn-outline-danger btn-lg" role="button" href="#!">Obtener</a>
        </div>
    </div>
</section>
<main class="separador pb-1">
    <div class="container">
        <h2 class="text-danger colorin py-3">Nuestras Carreras</h2>
    </div>
    <div class="nose row row-cols-1 row-cols-md-3 g-4 container-carrera">

        <!-- Veterinaria -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-success h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Paw.png') }}" class="img-fluid paw-image" alt="Huella">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Veterinaria</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Da el salto y conviértete en guardián de la salud animal, donde tu pasión se transforma en una carrera que cambia vidas.</p>
                </div>
            </div>
        </div>

        <!-- Informática -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-primary h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Programming.png') }}" class="img-fluid paw-image" alt="Programación">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Informática</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Transformate en el arquitecto del futuro digital, donde tus líneas de código darán forma a un mañana.</p>
                </div>
            </div>
        </div>

        <!-- Administración -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-danger h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Pitching.png') }}" class="img-fluid paw-image" alt="Administración">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Administración</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Conviértete en el estratega del éxito, donde tus decisiones y liderazgo construirán el futuro de las organizaciones.</p>
                </div>
            </div>
        </div>

        <!-- Mecánica -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-dark h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Wrenches.png') }}" class="img-fluid paw-image" alt="Mecánica">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Mecánica</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Sé el mejor ingeniero del movimiento, donde tu ingenio y habilidad darán vida a las máquinas que impulsan el mundo.</p>
                </div>
            </div>
        </div>

        <!-- Electricidad -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-warning h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/Electricity.png') }}" class="img-fluid paw-image" alt="Electricidad">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Electricidad</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Transformate en el maestro de las energías, donde tu conocimiento iluminará al mundo y la tecnología.</p>
                </div>
            </div>
        </div>

        <!-- Agroalimentaria -->
        <div class="col d-flex justify-content-center">
            <div class="card bds overflow-hidden border-0" style="height: 400px;">
                <!-- Parte visible (imagen) -->
                <div class="bg-info h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/agro.webp') }}" class="img-fluid paw-image" alt="Agroalimentaria">
                </div>
                <!-- Parte oculta (información) -->
                <div class="card-body bg-white reveal-content p-3">
                    <h2 class="card-title text-danger fw-bold mb-3">Agroalimentaria</h2>
                    <hr class="my-2">
                    <p class="card-text mb-3">Sé un artífice de la nutrición del futuro, donde tu conocimiento y pasión cultivarán un mundo más sostenible y saludable.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Ubicación -->
    <div class="container">
        <h2 class="text-danger pt-4" style="text-align: center; font-weight: bold;">Ubicación</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.5541438136856!2d-69.19587792592756!3d9.547408280660791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e7dc1620d2edeb1%3A0x8adf8913b1108b85!2sUniversidad%20Polit%C3%A9cnica%20Territorial%20del%20estado%20Portuguesa%20%22Juan%20de%20Jes%C3%BAs%20Montilla%22!5e0!3m2!1ses!2sve!4v1743652741298!5m2!1ses!2sve" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</main>
@endsection