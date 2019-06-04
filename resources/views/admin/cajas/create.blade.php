@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar nueva caja</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/cajas/store')}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder ="Ingrese nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Saldo Actual</label>
                            <div class="col-md-6">
                                <input type="number" name="saldo_actual" id="saldo_actual" class="form-control" placeholder="Ingrese saldo">
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