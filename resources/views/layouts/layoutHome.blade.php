<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js'])
  <title>@yield('title')</title>
</head>
<body class="pt-7 pt-sm-7 pt-md-7 pt-lg-7 pt-xl-7 pt-xxl-7">
  @include('components.navbar_homepage')
  @yield('content')
  @include('components.footer')
</body>
</html>


