@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar usuario</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/users/update/'.$user->id)}}" class="form-horizontal" enctype="multipart/form-data">
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
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese password">
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
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-6">
                                @if($user->path)
                                    <img src="{{url('/img/'.$user->path)}}" alt="imagenUser" class="img-responsive" width="50px">
                                @else
                                    <img src="{{url('/img/default.jpg')}}" alt="imagenUser" class="img-responsive" width="50px">
                                @endif 
                                <hr>
                                <input type="file" name="imagen" id="imagen" class="form-control">
                            </div>
                        </div>
                        <div class="panel-footer">
                        @role('admin')
                        <div class="col-md-12"><h3>Roles</h3>
                            <h5>(@foreach($user->roles as $rol)*{{$rol->display_name }} @endforeach)</h5>
                        </div>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <div class="col-md-3">
                                    <input type="radio" name="role" id="{{$role->name}}" value="{{$role->name}}"class="form-check-input">
                                    <label for="{{$role->name}}" class="form-check-label">{{$role->display_name}}</label>
                                </div>
                            </div>
                        @endforeach

                        @endrole
                            <div class="form-group">
                                <div class="col-md-12" style="padding-top:30px">
                                    <input type="submit" class="btn btn-warning btn-edit" value="Actualizar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection