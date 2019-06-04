<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE.min.css') }}">
    <title>Capoeira Pasto</title>
</head>

<body class="hold-transition sidebar-mini">
  <header class="header">   
      <img src="{{url('/img/banner1.jpeg')}}" alt="banner" class="img-responsive"> 
  </header>
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
          <img alt="capoeira pasto" src="{{url('/capoeira.svg')}}" width="30px" height="30px" class="d-inline-block align-top">
        </a>
      </div>
      <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="{{url('/')}}" class="nlink">Inicio</a></li>
          <li><a href="{{url('/category/musica')}}" class="nlink">Musica</a></li>
          <li><a href="{{url('/category/tecnica')}}" class="nlink">Tecnica</a></li>
          <li><a href="{{url('/category/eventos')}}" class="nlink">Eventos</a></li>
          <li><a href="{{url('/category/noticias')}}" class="nlink">Noticias</a></li>
          <li><a href="{{url('/tienda')}}" class="nlink">Tienda</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="height: 50px"><a href="#"><img src="/img/IconBrasil.png" class="center" alt="brasil-icon" width="45px" height="40px"></a></li>
            <li style="height: 50px"><a href="#"><img src="/img/IconSpain.png" class="center" alt="spain-icon" width="40px" height="35px"></a></li>
            <li style="height: 50px"><a href="#"><img src="/img/IconEngland.png" class="center" alt="england-icon" width="30px" height="35px"></a></li>
          @if (Route::has('login'))
          @auth
            <li><a href="{{url('/admin')}}" class="nlink px-3 mr-auto">Admin</a></li>
            @else
            <li><a href="{{url('/login')}}" class="nlink">Login</a></li>
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
        <img class="card-img-top" src="{{url('/img/'.$related->path)}}" alt="Card image cap" width="200px" height="150px">
        <div class="card-body">
            <h5 class="card-title">{{$related->titulo}}</h5>
            <p class="card-text"></p>
            <a href="{{url('/post/'.$related->slug)}}">Ver más</a>
        </div>
        <div class="card-footer text-muted">
        {!! \Carbon\Carbon::parse($related->updated_at)->toFormattedDateString() !!}
        </div>
        </div>
    </div>
    @endforeach 

    <!--disqus-->
    <!-- <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://capoeirapasto-ca.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                             -->
    <!--fin disqus-->   
</div>
  <!-- Footer -->
<footer class="page-footer font-small bg-primary pt-4 mt-4" style="padding-top:20px">

<div class="container-fluid text-center text-md-left">

  <div class="row">

    <div class="col-md-6 mt-3 pt-3" style="padding-top:10px">

      <!-- Content -->
      <img src="{{url('/abolicao.png')}}" alt="capoeira abolicao" width="50px" height="55px">
      <h5 class="text-uppercase">Capoeira Abolicao Pasto</h5>
      <p>Visita nuestras redes sociales para estar actualizado con las ultimas noticias, videos y eventos.</p>
    </div>

    <hr class="clearfix w-100 d-md-none pb-3">
    <div class="col-md-3 mb-md-0 mb-3">

        <h5 class="text-uppercase">Redes Sociales</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="link"><img src="{{url('/img/flogo.png')}}" alt="facebook logo" width="45px"></a>
          </li>
          <li>
            <a href="#!" class="link"><img src="{{url('/img/ilogo.png')}}" alt="instagram logo" width="35px"></a>
          </li>
          <li style="padding-top:7px">
            <a href="#!" class="link"><img src="{{url('/img/ylogo.png')}}" alt="youtube logo" width="35px"></a>
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
<script src="{{ asset('adminlte/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

<!--disqis-->
<script id="dsq-count-scr" src="//capoeirapasto-ca.disqus.com/count.js" async></script>
</body>

</html>