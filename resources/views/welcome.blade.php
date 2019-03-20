@extends('layouts.site')

@section('content')

<!--inicio slider -->
<header class="header hidden-xs">
    <div class="container">
        <div class="col-md-12">
            <div id="carousel-1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="https://picsum.photos/1200/300" alt="Imagen 1" class="img-responsive">
                        <div class="carousel-caption hidden-xs hidden-sm">
                            <h3>Este es el slide 1</h3>
                            <p>lorem isum dolor</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://picsum.photos/1200/300/?random" alt="Imagen 2" class="img-responsive">
                        <div class="carousel-caption hidden-xs hidden-sm">
                            <h3>Este es el slide 2</h3>
                            <p>lorem isum dolor</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://picsum.photos/1200/300?random" alt="Imagen 3" class="img-responsive">
                        <div class="carousel-caption hidden-xs hidden-sm">
                            <h3>Este es el slide 3</h3>
                            <p>lorem isum dolor</p>
                        </div>
                    </div>
                </div>
                <!--controles-->
                <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- fin slider -->
    
<div class="contenido" id="comentBox">
    <aside class="asideF aside-1">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PUBLICACIONES</li>
        <!-- Optionally, you can add icons to the links -->
        @foreach($meses as $mes)
        <li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>{{ strtoupper($mes->mes) }}</span>
          <span class="pull-right-container">
                <i class="fa fa-angle-down pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              @foreach($pm as $p)
            <li><a href="/post/">{{ $p->titulo }}</a></li>
              @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </aside>
    <aside class="asideF aside-2">
            <i class="fa fa-folder"></i><span></span><strong style="font-size:16px"> Publicaciones Pasadas</strong>
        @foreach($posts->sortBy('id') as $post)
            <h5><a href="/post/{{$post->slug}}">{{ $post->titulo }}</a></h5>
        @endforeach
    </aside>
        @foreach($posts as $post)
    <article class="main">
        <h2 class="text-left">{{ $post->titulo }}</h2>
        <i class="fa fa-folder"></i>
        <span></span><a href="/{{strtolower($post->categoria->nombre)}}"><small>{{$post->categoria->nombre}}</small></a>
        <img src="img/{{$post->path}}" alt="imagenPost" class="img-responsive" style="padding-top:20px;padding-bottom:30px;" width="600px">
            <p>{{ $post->descripcion }}</p>
        
        <div class="contenedorH">
            <div class="itemPost">
                <b><small>Creado el: </small></b><small>{{ $post->created_at }}</small><br>
                <b><small>Creado por: </small></b><small>{{ $post->user->usuario }}</small>
            </div>
            <div class="form-label itemCom" style="padding-top: 10px;">
                <label for="">Comentarios</label>
            </div>
            <div class="itemCom padre" id="padre{{$post->id}}">
                @foreach($post->comentarios as $coment)
                    <div class="item" style="padding-top: 10px;" id="coment">
                        <a href="#"><i class="fa fa-user-circle"></i> <span></span></a>
                        </button><small>{{ $coment->user->usuario }} dice:</small>
                        <p>{{ $coment->descripcion }}</p>
                    </div>
                @endforeach
            </div>
                @if (Route::has('login'))
            <div class="contenedorH">
                <form action="/post/coment" method="post" id="{{$post->id}}" class="formCom">
                    {{ csrf_field() }}
                        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                        <div class="form-group">
                    @auth
                    <input type="hidden" name="user" id="user" value="{{Auth()->user()->usuario}}">
                    <div class="itemCom" style="padding-top: 10px;">
                                <label for="descripcion">Comentar</label>
                                <textarea name="descripcion" required id="descripcion{{$post->id}}" cols="10" rows="5" class="form-control descripcion" placeholder="Escribe tu comentario..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="itemCom" style="padding-top: 10px; padding-bottom:10px">
                                <button type="submit" class="btn btn-success" id="coment">Enviar</button>
                            </div>
                        </div>
                    @else
                        <div class="itemCom">
                            <p><strong><a href="/login">Inicia sesión</a> para agregar un comentario</strong></p> 
                        </div>
                    @endauth
                </form>
            </div>
                @endif
                @endforeach
            </div>
    </article>
</div>
@endsection
