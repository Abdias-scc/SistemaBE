@vite(['resources/js/dashboard/nav.js', 'resources/css/menu_lateral.css'])

<aside class="sidebar">
    <header class="sidebar-header"> 
        <a href="#">
            <img src="{{ asset('img/logo_nuevo2.png') }}" alt="Logo de la universidad" class="header-logo">
        </a>
        <button class="sidebar-toggler">
            <img src="{{ asset('icons/chevron_left.svg') }}" alt="Icono de menu" class="nav-icon">
        </button>
    </header>
    <!-- Side-bar nav-->
    <nav class="sidebar-nav">
        <!-- Primary top nav-->
        <ul class="nav-list primary-nav">

            <!-- Seccion de maestros -->
            <li class="nav-item dropdown-container">
                <a href="#" class="nav-link Dropdown-toggle">
                    <img src="{{ asset('icons/person.svg') }}" alt="Icono de usuario" class="nav-icon">
                    <span class="nav-label">Maestros</span>
                    <img src="{{ asset('icons/keyboard_arrow_down.svg') }}" alt="Icono de dropdown" class="dropdown-icon">
                </a>
                <!-- Dropdown menu-->
                <ul class="Dropdown-menu">
                    <!-- Titulo cuando esta en collapsed -->
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-title">Maestros</a>
                    </li>
                    <!-- Links -->
                    <li class="nav-item">
                        <a href="{{ route('estudiantes') }}" class="nav-link dropdown-link">Estudiantes</a> 
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pnf') }}" class="nav-link dropdown-link">PNF</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sede') }}" class="nav-link dropdown-link">Sede/Extensiones</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('servicio') }}" class="nav-link dropdown-link">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lapso') }}" class="nav-link dropdown-link">Lapso Academico</a>
                    </li>
                </ul>
            </li>

            <!-- Seccion de Movimientos -->
            <li class="nav-item dropdown-container">
                <a href="#" class="nav-link Dropdown-toggle">
                    <img src="{{ asset('icons/trending_up.svg') }}" alt="Icono de usuario" class="nav-icon">
                    <span class="nav-label">Movimientos</span>
                    <img src="{{ asset('icons/keyboard_arrow_down.svg') }}" alt="Icono de dropdown" class="dropdown-icon">
                </a>
                <!-- Dropdown menu-->
                <ul class="Dropdown-menu">
                    <!-- Titulo cuando esta en collapsed -->
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-title">Movimientos</a>  
                    </li>
                    <!-- Links -->
                    <li class="nav-item">
                        <a href="{{ route('R_comedor') }}" class="nav-link dropdown-link">Registro Comedor  </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('S_becas') }}" class="nav-link dropdown-link">Solicitud de becas   </a>
                    </li>
                </ul>
            </li>
            <!-- Seccion de Reportes -->
            <li class="nav-item dropdown-container">
                <a href="#" class="nav-link Dropdown-toggle">
                    <img src="{{ asset('icons/content_search.svg') }}" alt="Icono de usuario" class="nav-icon">
                    <span class="nav-label">Reportes/Consultas</span>
                    <img src="{{ asset('icons/keyboard_arrow_down.svg') }}" alt="Icono de dropdown" class="dropdown-icon">
                </a>
                <!-- Dropdown menu-->
                <ul class="Dropdown-menu">
                    <!-- Titulo cuando esta en collapsed -->
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-title">Reportes</a>
                    </li>
                    <!-- Links -->
                    <li class="nav-item">
                        <a href="{{ route('censo') }}" class="nav-link dropdown-link">Comedor</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-link">Becas</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('config') }}" class="nav-link">
                    <img src="{{ asset('icons/settings.svg') }}" alt="Icono de configuracion" class="nav-icon">
                    <span class="nav-label">Configuracion</span>
                </a>
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link dropdown-title">Configuracion</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    <img src="{{ asset('icons/logout.svg') }}" alt="Icono de logout" class="nav-icon">
                    <span class="nav-label">Cerra Sesion</span>
                </a>
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link dropdown-title">Cerra Sesion</a>
                    </li>
                </ul>
            </li>
        </ul>
        
    </nav>
</aside>
@include('components.menu_superior_dashboard')