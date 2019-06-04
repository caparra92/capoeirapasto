@extends('layouts.site')

@section('content')

<!--inicio slider -->
<!-- fin slider -->
<!-- inicio nav -->

<!-- fin nav -->
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
              @foreach($mes->posts as $post)
            <li><a href="{{url('/post/'.$post->slug)}}" class="linkPost">{{ substr($post->titulo,0,25) }}...</a></li>
             @endforeach
          </ul>
        </li>
       @endforeach
    </ul>
    </aside>
    <aside class="asideF aside-2">
            <i class="fa fa-folder"></i><span></span><strong style="font-size:16px"> Publicaciones Pasadas</strong>
        @foreach($posts->sortBy('id') as $post)
            <h5><a href="{{url('/post/'.$post->slug)}}">{{ $post->titulo }}</a></h5>
        @endforeach
    </aside>
        @foreach($posts as $post)
    <article class="main">
        <h2 class="text-left">{{ $post->titulo }}</h2>
        <i class="fa fa-folder"></i>
        <span></span><a href="{{url('/category/'.strtolower($post->categoria->nombre))}}"><small>{{$post->categoria->nombre}}</small></a>
        <img src="{{url('/img/'.$post->path)}}" alt="imagenPost" class="img-responsive" style="padding-top:20px;padding-bottom:30px;" width="600px">
            <p>{{ $post->descripcion }}</p>
        
        <div class="contenedorH">
            <div class="itemPost">
                <b><small>Actualizado en: </small></b><small>{{ $post->fechapub }}</small><br>
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
                <form action="{{url('/post/coment')}}" method="post" id="{{$post->id}}" class="formCom">
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
