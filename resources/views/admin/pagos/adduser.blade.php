@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{$pago->detalle}}</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/pagos/user/add/'.$pago->id)}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="estado" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                                <select name="estado" id="estado" class="form-control">
                                    <option value="" selected disabled>Seleccione opción...</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="pagado">Pagado</option>
                                </select>   
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_asignacion" class="col-md-4 control-label">Fecha ingreso</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_pago" class="col-md-4 control-label">Fecha de pago</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_pago" id="fecha_pago" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_id" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="" selected disabled>Seleccione opción...</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->nombre}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="Asignar Usuario" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection