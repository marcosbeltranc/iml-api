<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iml API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      /* Estilos para el Navbar lateral */
      .sidebar {
          position: relative;
          top: 0;
          left: 0;
          height: 100vh; /* Ocupa toda la altura */
          width: 20%; /* Ancho del sidebar */
          background-color: #343a40;
          padding-top: 20px;
          z-index: 100;
          display: inline-block;
      }

      .sidebar a {
          color: white;
          padding: 10px 15px;
          display: block;
          text-decoration: none;
      }

      .sidebar a:hover {
          background-color: #495057;
      }

      /* Espacio para el contenido principal */
      .content {
          margin-left: 260px; /* Ajusta según el ancho del sidebar */
          padding: 20px;
      }
      .content-body {
        float: right;
        width: 80%;
      }
      /* Ajuste en pantallas pequeñas */
      @media (max-width: 768px) {
          .sidebar {
              width: 100%;
              height: auto;
          }
          .content {
              margin-left: 0;
          }
      }
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{asset('logo.svg')}}" alt="" width="60" height="60" class="d-inline-block align-text-top">
          <span style="position: fixed; padding: 14px 1em">Software Services</span>
        </a>
        <div class="navbar">
          @auth
          <form action="{{ route('logout') }}" method="POST" class="d-flex">
            @csrf
            <button type="submit" class="btn btn-danger ms-3">Cerrar sesión</button>
          </form>
          @endauth
        </div>
      </div>
    </nav>

    <div class="sidebar">
      <a href="{{ route('user.index') }}">
        <i class="bi-people"></i> <span>Usiarios</span>
      </a>
      <a href="{{ route('category.index') }}">
        <i class="bi-pin-angle"></i> <span>Categorias</span>
      </a>
      <a href="{{ route('product.index') }}">
        <i class="bi-cart2"></i> <span>Productos</span>
      </a>
    </div>
    <div class="container content-body">
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>