@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar nuevo post</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/posts/store')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>
                            <div class="col-md-6">
                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder ="Ingrese titulo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" cols="10" rows="5" class="form-control" placeholder="Ingrese descripción..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoría</label>
                            <div class="col-md-6">
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="" disabled selected>Seleccione opción...</option>
                                @foreach($categories as $category)
                                    <option value='{{$category->id}}'>{{ $category->nombre }}</option>
                                @endforeach
                                </select>
                                
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="imagen" class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                <input type="file" name="imagen" id="imagen" class="form-control">
                            </div>
                        </div>                           
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Agregar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection