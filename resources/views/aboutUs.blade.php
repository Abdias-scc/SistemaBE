@extends('layouts.layoutHome')
@section('title', 'sobre nosotros')
@section('content')
@vite(['resources/css/sobre_nosotros.css'])
<main>
    <div class="d-flex flex-column gap-4 mb-3 my-5">
        <h2 class="pt-3 text-center text-danger" style="font-weight: bold;">Conoce quienes somos</h2>
        
        <section class="nose container-md d-inline-flex sobre-nosotros1 rounded flex-wrap flex-lg-nowrap justify-content-center">
            <div>
                <h3 class="text-center">Mision</h3>
                <p>
                    Asumimos con firme compromiso la
                    trascendental misión de educar y formar
                    profesionales universitarios integrales,
                    dotándolos de un sólido y riguroso nivel
                    académico, fundamentado en principios
                    científicos, tecnológicos y humanísticos.
                </p>
            </div>
            <img src="{{ asset('img/UPTP.jpeg') }}" alt="" class="imag rounded ratio-16x9 mx-4">
        </section>
        
        <section class="nose container-md d-inline-flex sobre-nosotros2 rounded flex-wrap flex-lg-nowrap justify-content-center">
            <div class="order-2">
                <h3 class="text-center">Vision</h3>
                <p>
                    Hacer de la Universidad Politécnica
                    Territorial del estado Portuguesa, una
                    institución de excelencia, que promueva
                    el constante incremento de la calidad
                    académica y humanista.
                </p>
            </div>
            <img src="{{ asset('img/20250403_073805.jpg') }}" alt="" class="imag rounded ratio-16x9 mx-4">
        </section>
        
        <section class="nose container-md d-inline-flex sobre-nosotros3 rounded flex-wrap flex-lg-nowrap justify-content-center">
            <div>
                <h3 class="my-6 text-center">Historia</h3>
                <p>
                    Inició como el Instituto Universitario de
                    Tecnología del estado Portuguesa
                    (IUTEP), formando técnicos clave para la
                    región. Con el tiempo, evolucionó a UPT,
                    ampliando su oferta a Programas
                    Nacionales de Formación (PNF) y
                    fortaleciendo su vínculo con el
                    desarrollo local.
                </p>
            </div>
            <img src="{{ asset('img/20250403_073630.jpg') }}" alt="" class="imag rounded ratio-16x9 mx-4">
        </section>
    </div>
</main>
@endsection
    