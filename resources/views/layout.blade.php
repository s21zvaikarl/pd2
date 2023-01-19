<!doctype html>
<html lang="lv">
    <head>
        <meta charset="utf-8">
        <title>PD 2 - {{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kārils Zvaigzne</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kārlis Zvaigzne</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="/">Sākumlapa</a>
            </li>
            @if(Auth::check())
              <li class="nav-item">
              <a class="nav-link" href="/manufacturers">Ražotāji</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/car_models">Auto modeļi</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/carcategory">Auto kategorijas</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/logout">Beigt darbu</a>
              </li>
            @else
              <li class="nav-item">
              <a class="nav-link" href="/login">Pieslēgties</a>
              </li>
            @endif
        </ul>
    </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    </head>

    <body>
        @yield('content')

        <div class="container text-center">
        <div class="row">
            <div class="col">
            Kārlis Zvaigzne
            </div>
            <div class="col">
            Ventspils Augstskola
            </div>
            <div class="col">
            2023
            </div>
        </div>
        </div>
    </body>

    <script src="/js/main.js"></script>
</html>
