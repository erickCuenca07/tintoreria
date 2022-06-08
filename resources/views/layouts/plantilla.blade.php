<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Font Awesome -->
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
      <!-- MDB -->
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet"/>
  </head>
<body>
  @if (auth()->check())
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('pedidos.index')}}">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('pedidos.create')}}">Crear Pedidos </a>
      </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
           Mas Opciones
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="{{route('prendas.index')}}">Arituclos</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('categorias.index')}}">Categorias</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('servicios.index')}}">Servicio</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('tarifas.index')}}">Tarifas</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('clientes.index')}}">Clientes</a>
            </li>
          </ul>
        </li>
      </li>
      <li>
        <a class="dropdown-item" href="">Hola,{{auth()->user()->name}}</a>
      </li>
    </ul>
  </div>

  <div class="d-flex align-items-center">
  <div class="dropdown">
    <a
      class="dropdown-toggle d-flex align-items-center hidden-arrow"
      href="#"
      id="navbarDropdownMenuAvatar"
      role="button"
      data-mdb-toggle="dropdown"
      aria-expanded="false"
    >
      <img
        src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
        class="rounded-circle"
        height="25"
        alt="Black and White Portrait of a Man"
        loading="lazy"
      />
    </a>
    <ul
      class="dropdown-menu dropdown-menu-end"
      aria-labelledby="navbarDropdownMenuAvatar"
    >
      <li>
        <a class="dropdown-item" href="{{route('login.destroy')}}">Logout</a>
      </li>
    </ul>
  </div>
  </div>
  @endif
</nav>

@yield('content')
@yield('scripts')
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

<!-- DataTables CSS -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- DataTables JS -->
<script src="js/addons/datatables.min.js" type="text/javascript"></script>
</body>
</html>