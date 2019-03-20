@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar nueva categoría</div>
                <div class="panel-body">
                    <form method="post" action="/admin/categories/store" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder ="Ingrese nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea rows="5" name="descripcion" cols="10" rows="5" id="descripcion" class="form-control" placeholder="Ingrese descripción"></textarea>
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