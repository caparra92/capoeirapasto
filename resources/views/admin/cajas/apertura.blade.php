@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Apertura caja {{$caja->nombre}}</div>
                <div class="panel-body">
                    <form method="post" action='{{url("/admin/cajas/estado/".$caja->id)}}' class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="fecha" class="col-md-4 control-label">Fecha</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha" id="fecha" class="form-control">  
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
                            <label for="base" class="col-md-4 control-label">Base inicial</label>
                            <div class="col-md-6">
                                <input type="number" name="base" id="base" class="form-control">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observaciones" class="col-md-4 control-label">Observaciones</label>
                            <div class="col-md-6">
                                <textarea name="observaciones" id="observaciones" cols="15" rows="10" placeholder="observaciones..." class="form-control"></textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="Abrir caja" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection