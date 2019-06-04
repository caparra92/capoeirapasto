@extends('layouts.site')

@section('content')
<div class="container" id="comentBox">
        <div class="col-md-12">
            <h2>{{ $post->titulo }}</h2>
            <i class="fa fa-folder"></i>
            <span></span><a href="{{url('/'.strtolower($post->categoria->nombre))}}"><small>{{$post->categoria->nombre}}</small></a>
            <img src="{{url('../img/'.$post->path)}}" alt="imagenPost" class="img-responsive" style="padding-top:20px;padding-bottom:30px;">
            <p>{{ $post->descripcion }}</p>
        </div>
        
        <div class="col-md-12">
            <b><small>Creado el: </small></b><small>{{ $post->created_at }}</small><br>
            <b><small>Creado por: </small></b><small>{{ $post->user->usuario }}</small>
        </div>
        <div class="col-md-12" style="padding-top: 10px;">
            <label for="">Comentarios</label>
        </div>
        <div class="container padre" id="padre{{$post->id}}">
        @foreach($post->comentarios as $coment)
            <div class="col-md-12" style="padding-top: 10px;" id="coment">
                <a href="#"><i class="fa fa-user-circle"></i> <span></span></a>
                </button><small>{{ $coment->user->usuario }} dice:</small>
                <p>{{ $coment->descripcion }}</p>
            </div>
        @endforeach
        </div>
        @if (Route::has('login'))
        <div class="col-md-12">
        <form action="{{url('/post/coment')}}" method="post" id="{{$post->id}}" class="formCom">
            {{ csrf_field() }}
                <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                <div class="form-group">
              @auth
              <input type="hidden" name="user" id="user" value="{{Auth()->user()->usuario}}">
              <div class="col-md-4" style="padding-top: 10px;">
                        <label for="descripcion">Comentar</label>
                        <textarea name="descripcion" required id="descripcion{{$post->id}}" cols="10" rows="5" class="form-control descripcion" placeholder="Escribe tu comentario..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12" style="padding-top: 10px; padding-bottom:10px">
                        <button type="submit" class="btn btn-success" id="coment">Enviar</button>
                    </div>
                </div>
              @else
                <div class="col-md-4" style="padding-top: 10px;">
                    <p><strong><a href="{{url('/login')}}">Inicia sesión</a> para agregar un comentario</strong></p> 
                </div>
              @endauth
            </form>
        </div>
        @endif
    </div>
</div>

@endsection