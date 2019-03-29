@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar nuevo usuario</div>
                <div class="panel-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                    </ul>
                </div>
                @endif
                    <form method="post" action="/admin/users/store" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder ="Ingrese nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder ="Ingrese apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder ="Ingrese dirección">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder ="Ingrese teléfono">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder ="Ingrese password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="usuario" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder ="Nombre usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder ="Ingrese email"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection