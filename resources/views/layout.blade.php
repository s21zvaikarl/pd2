<!doctype html>
<html lang="lv">
    
    <head>
        <meta charset="utf-8">
        <title>PD 2 - {{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kārlis Zvaigzne</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        @yield('content')
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
        </nav>

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
</html>
