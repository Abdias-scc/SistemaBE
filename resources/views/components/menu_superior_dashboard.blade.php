
<nav class="nav-main navbar">
    <div class="d-flex container-fluid ">
        <div class="d-flex aling-items-center">
            <!--
            <div class="container-imagen">
                <img src="{{ asset('img/imagen-gotty.png') }}" alt="Logo de la universidad" class="header-logo" style="width: 65px;margin-right: 10px;">
            </div>
        -->
            <p class="title">Control Administrativo del <br>Bienestras Estudiantil, UPTP J.J Montilla.</p>
            <a href="{{ route('dashboard') }}" class="navbar-brand ms-5 nav-link">Panel de control/</a>
            @yield('links')
        </div>
        <span class="navbar-text" id="hora"></span>
    </div>
</nav>
<style>
    .container-imagen{
        Filter: brightness(0) invert(100%);
    }
    .nav-main{
        width: calc(100% - var(--size-bar-lateral));
        height: 80px;
        background-color: var(--prymary-color);
        position: fixed;
        top: 0;
        margin-left: var(--size-bar-lateral);   
        transition: .4s ease;
        box-shadow: 0px 5px 15px -2px rgba(0, 0, 0, 0.3);
        z-index: 1000;
    }

    .nav-main.colapsed{
        width: calc(100% - var(--size-bar-lateral-collapsed));
    }


    .nav-main.colapsed{
        margin-left: var(--size-bar-lateral-collapsed);
    }
    #hora{
        color: white;
        z-index: 1000;
    }
    .title{
        text-align: center;
        color: white;
        margin: 0
    }
    .nav-main > div .nav-link{
        color: rgb(245, 245, 245);
        &:hover{
            text-decoration: underline;
        }
    }

</style>