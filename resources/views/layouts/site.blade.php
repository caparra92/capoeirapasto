<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/adminlte/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <title>Capoeira Pasto</title>
</head>

<body class="hold-transition sidebar-mini">
  <nav class="navbar navbar-inverse" style="background-color:#33b749">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="/">
          <img alt="capoeira pasto" src="/capoeira.svg" width="30px" height="30px" class="d-inline-block align-top">
        </a>
      </div>
      <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/" class="nlink">Inicio</a></li>
          <li><a href="/noticias" class="nlink">Noticias</a></li>
          <li><a href="musica" class="nlink">Musica</a></li>
          <li><a href="/eventos" class="nlink">Eventos</a></li>
          <li><a href="/tienda" class="nlink">Tienda</a></li>
          </ul>
          @if (Route::has('login'))
          <ul class="nav navbar-nav navbar-right">
          @auth
            <li><a href="/admin" class="nlink px-3 mr-auto">Admin</a></li>
            @else
            <li><a href="/login" class="nlink">Login</a></li>
          @endauth
            </form>
          </ul>
              
        @endif
        
      </div>
    </div>
  </nav>
    
  <section>
    
    <!--Contenido aqui-->
    @yield('content')

  
  </section>
  <div class="container" style="padding-bottom:20px;">
    <h2>Post relacionados</h2>
    @foreach($post_related as $related)
    <div class="itemCard col-md-4">
        <div class="card">
        <img class="card-img-top" src="/img/{{$related->path}}" alt="Card image cap" width="300px" height="200px">
        <div class="card-body">
            <h5 class="card-title">{{$related->titulo}}</h5>
            <p class="card-text"></p>
            <a href="/post/{{$related->slug}}">Ver más</a>
        </div>
        <div class="card-footer text-muted">
            {{$related->updated_at}}
        </div>
        </div>
    </div>
    @endforeach    
</div>
  <!-- Footer -->
<footer class="page-footer font-small bg-primary pt-4 mt-4" style="padding-top:20px">

<div class="container-fluid text-center text-md-left">

  <div class="row">

    <div class="col-md-6 mt-3 pt-3" style="padding-top:10px">

      <!-- Content -->
      <img src="/abolicao.png" alt="capoeira abolicao" width="50px" height="55px">
      <h5 class="text-uppercase">Capoeira Abolicao Pasto</h5>
      <p>Visita nuestras redes sociales para estar actualizado con las ultimas noticias, videos y eventos.</p>
    </div>

    <hr class="clearfix w-100 d-md-none pb-3">
    <div class="col-md-3 mb-md-0 mb-3">

        <h5 class="text-uppercase">Redes Sociales</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="link"><img src="/img/flogo.png" alt="facebook logo" width="45px"></a>
          </li>
          <li>
            <a href="#!" class="link"><img src="/img/ilogo.png" alt="instagram logo" width="35px"></a>
          </li>
          <li style="padding-top:7px">
            <a href="#!" class="link"><img src="/img/ylogo.png" alt="youtube logo" width="35px"></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Enlaces de Interés</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="link">Música</a>
          </li>
          <li>
            <a href="#!" class="link">Técnica</a>
          </li>
          <li>
            <a href="#!" class="link">Eventos</a>
          </li>
          <li>
            <a href="#!" class="link">Contacto</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <a href="#" class="link"> Camilo Andrés Parra</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<script src="/adminlte/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
<script src="/adminlte/js/adminlte.min.js"></script>
</body>

</html>