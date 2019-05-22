@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar Post</div>
                <div class="panel-body">
                    <form method="post" action="/admin/posts/update/{{$post->id}}" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>
                            <div class="col-md-6">
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $post->titulo }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea rows="5" name="descripcion" id="descripcion" class="form-control">{{ $post->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoria</label>
                            <div class="col-md-6">
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="" selected disabled>Seleccione opción...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen" class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                <img src="/img/{{$post->path}}" alt="imagenPost" class="img-responsive" style="padding-top:20px;padding-bottom:30px;">
                                <input type="file" name="imagen" id="imagen" class="form-control" value="{{$post->path}}">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-warning" value="Actualizar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection