@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="col-md-12">
                <img src="/adminlte/img/avatar04.png" alt="Imagen perfil" class="img-circle">
            </div>
            <div class="col-md-12">
                <a href="#"><img src="/img/flogo.png" alt="facebook logo" width="50px"></a>
                <a href="#"><img src="/img/ilogo.png" alt="Instagram logo" width="35px"></a>
            </div>
        </div>
        <div class="col-md-9 col-lg-6">
        <div class="panel panel-default">
        <div class="panel-heading">Datos personales</div>
                <div class="panel-body">
                    <div class="col-md-6 col-lg-6">
                        <h3>Nombre</h3><p>{{$user->nombre}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Apellido</h3><p>{{$user->apellido}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Dirección</h3><p>{{$user->direccion}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Telefono</h3><p>{{$user->telefono}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Fecha de nacimiento</h3><p>{{$user->fecha_nacimiento}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Usuario</h3><p>{{$user->usuario}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Email</h3><p>{{$user->email}}</p>
                    </div>
                    <div class="col-md-6">
                        <a href="/admin/users/edit/{{$user->id}}">
                            <button class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                                <span>Editar perfil</span>
                            </button>
                        </a>
                </div>
            </div>
        </div>
            
        </div>    
    </div>
</div>


@endsection