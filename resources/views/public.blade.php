<!doctype html>
<html lang="lv">
    <head>
        <meta charset="utf-8">
        <title>PD 2 - {{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kārlis Zvaigzne</title>
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
        <div id="main">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="https://imagescdn.dealercarsearch.com/dealerimages/9280/23228/banner2.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="https://hips.hearstapps.com/hmg-prod/images/blurred-couple-with-man-receiving-car-key-from-royalty-free-image-1591274673.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="https://media.istockphoto.com/id/509567189/photo/family-packing-car-to-go-on-vacation-parents-children.jpg?s=612x612&w=0&k=20&c=rjTp-pxaWwZ7rd_rY52ZnXiSkhEnHo_QKJmHjBzNuUQ=" alt="Third slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
			    </div>
        </div>

        <br>
		<br>

        <div class="inner">
							<!-- About Us -->
							<header id="inner">
								<h1>Nopērc jaunu auto!</h1>
								<p>Zemas cenas, zemāki nobraukumi</p>
							</header>

        </div>

        <br>
		<br>

        <footer id="footer" style="background-color: #f5f5f5;">

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
            <main class="container">
            <div id="root"></div>
            </main>
        </footer>

    </body>

    

    <script src="{{ asset('/js/app.js') }}"></script>
</html>
