@extends('layouts.site')

@section('content')
<div class="container" id="comentBox">
        <div class="col-md-12">
        @foreach($category as $cat)
            <h2>Categoria: {{ $cat->nombre }}</h2>
        </div>
            @foreach($cat->post as $post)
        <article class="main">
            
        <div class="itemCard col-md-8 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{url('/post/'.$post->slug)}}" class="linkPostCat"><h2 class="card-title">{{ $post->titulo }}</h2></a>
                    <i class="fa fa-folder"></i>
                    <span><small>Publicado en: </small></span>
                    <a href="{{url('/category/'.strtolower($post->categoria->nombre))}}">
                        <small>{{$post->categoria->nombre}}</small>
                    </a>  
                    <p class="card-text">
                        <p>{{substr($post->descripcion,0,80) }}...</p>
                        <a href="{{url('/post/'.$post->slug)}}">ver más</a> 
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {!! \Carbon\Carbon::parse($post->updated_at)->toFormattedDateString() !!}
                </div>
            </div>  
        </div>


        </article>
            @endforeach 
        @endforeach   
</div>

@endsection