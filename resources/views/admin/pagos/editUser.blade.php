@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            @foreach($pago as $pagoUser)
                <div class="panel-heading">{{$pagoUser->detalle}}</div>
            @endforeach
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/pagos/user/update/'.$pagoUser->id)}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="estado" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                                <select name="estado" id="estado" class="form-control">
                                    <option value="" selected disabled>{{ $pagoUser->estado }}</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="pagado">Pagado</option>
                                </select>   
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_pago" class="col-md-4 control-label">A pagar</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{$pagoUser->fecha_pago}}">
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
                                <input type="submit" value="Actualizar Pago" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection