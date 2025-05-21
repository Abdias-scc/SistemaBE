<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>@yield('title')</title>
    @vite(['resources/js/dashboard/main.js'])
</head>
<body>
    @include('components.menu_lateral')
    <main>
        <div class="main-content">
            <div class="info-container">
                @yield('content')
            </div>
        </div>
    </main>
</body>
<style>
    .main-content {
        margin-left: 300px;
        padding-top: 100px;
        transition: .4s ease;
    }

    .main-content.colapsed {
        margin-left: 100px;
    }

</style>
</html>
