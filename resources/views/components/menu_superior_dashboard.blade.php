
<nav class="nav-main navbar">
    <div class="d-flex container-fluid">
        <div class="d-flex">
            <a href="{{ route('dashboard') }}" class="navbar-brand ms-5 nav-link">Panel de control/</a>
            @yield('links')
        </div>
        <span class="navbar-text" id="hora"></span>
    </div>
</nav>
<style>
    
.nav-main{
    width: calc(100% - 260px);
    height: 80px;
    background-color: var(--prymary-color);
    position: fixed;
    top: 0;
    margin-left: 260px;
    transition: .4s ease;
}

.nav-main.colapsed{
    width: calc(100% - 85px);
}


.nav-main.colapsed{
    margin-left: 85px;
}
#hora{
    color: white;
    z-index: 1000;
}
.nav-main > div .nav-link{
    color: rgb(245, 245, 245);
    &:hover{
        text-decoration: underline;
    }
}

</style>