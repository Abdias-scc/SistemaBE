@vite(['resources/js/dashboard/nav.js', 'resources/css/menu_lateral.css'])

<aside class="sidebar">
    <header class="sidebar-header"> 
        <a href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo de la universidad" class="header-logo">
        </a>
        <button class="sidebar-toggler">
            <img src="{{ asset('icons/chevron_left.svg') }}" alt="Icono de menu" class="nav-icon">
        </button>
    </header>
    <!-- Side-bar nav-->
    <nav class="sidebar-nav">
        <!-- Primary top nav-->
        <ul class="nav-list primary-nav">
            <li class="nav-item dropdown-container">
                <a href="#" class="nav-link Dropdown-toggle">
                    <img src="{{ asset('icons/person.svg') }}" alt="Icono de usuario" class="nav-icon">
                    <span class="nav-label">Maestro</span>
                    <img src="{{ asset('icons/keyboard_arrow_down.svg') }}" alt="Icono de dropdown" class="dropdown-icon">
                </a>
                <!-- Dropdown menu-->
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-title">Maestro</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('empleado') }}" class="nav-link dropdown-link">Empleado</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('horario') }}" class="nav-link dropdown-link">Horario</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <span class="nav-label">Administradores</span>
                </a>
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link dropdown-title">Administradores</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="material-symbols-outlined">
                        assignment_ind
                    </span>
                    <span class="nav-label">Cargo</span>
                </a>
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link dropdown-title">Cargo</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-container">
                <a href="#" class="nav-link Dropdown-toggle">
                    <img src="{{ asset('icons/person.svg') }}" alt="Icono de usuario" class="nav-icon">
                    <span class="nav-label">Reportes</span>
                    <img src="{{ asset('icons/keyboard_arrow_down.svg') }}" alt="Icono de dropdown" class="dropdown-icon">
                </a>
                <!-- Dropdown menu-->
                <ul class="Dropdown-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-title">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-link">Censo del comedor</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-link">Horario</a>
                    </li>
                </ul>
            </li>
        </ul>
        
        <!-- Secondary botton nav-->
        <ul class="nav-list secondary-nav">
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