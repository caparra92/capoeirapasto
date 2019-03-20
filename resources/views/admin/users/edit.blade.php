@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar usuario</div>
                <div class="panel-body">
                    <form method="post" action="/admin/users/update/{{$user->id}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $user->nombre }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $user->apellido }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $user->direccion }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $user->telefono }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ $user->fecha_nacimiento }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="usuario" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $user->usuario }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"> 
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