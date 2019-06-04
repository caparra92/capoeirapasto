@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar nuevo pago</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/pagos/store')}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Detalle</label>
                            <div class="col-md-6">
                                <input type="text" name="detalle" id="detalle" class="form-control" placeholder ="Ingrese detalle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese descripcion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Valor</label>
                            <div class="col-md-6">
                                <input type="number" id="valor" name="valor" class="form-control" placeholder="Ingrese valor">
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