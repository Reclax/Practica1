<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  @vite(['resources/js/app.js'])
</head>
<body>
  <nav style="margin-bottom:1rem;">
    <a href="{{ route('accounts.index') }}">
      <button type="button">Inicio</button>
    </a>
  </nav>
  <h1>Banco Simple</h1>
  @yield('content')
</body>
</html>