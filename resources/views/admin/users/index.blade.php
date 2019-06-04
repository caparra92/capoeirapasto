@extends('admin.layout')

@section('content')
    <a href="{{url('/admin/users')}}">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-users"></i></span> Usuarios
        </button>
    </a>
    <a href="{{url('/admin/roles')}}">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-user-plus"></i></span> Roles
        </button>
    </a>
    <a href="{{url('/admin/permissions')}}" class="button-xs">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-cog"></i></span> Permisos
        </button>
    </a>
    <a href="{{url('/admin/users/new')}}" class="button-xs">
        <button class="btn btn-labeled btn-primary">
        <span class="btn-label"><i class="fa fa-plus"></i></span> Agregar usuario
        </button>
    </a>
    <table class="table tabla-adp">
        <caption><h2>Usuarios</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha de Nac.</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td data-label="Id">{{ $user->id }}</td>
                <td data-label="Nombre">{{ $user->nombre }}</td>
                <td data-label="Dirección">{{ $user->direccion }}</td>
                <td data-label="Teléfono">{{ $user->telefono }}</td>
                <td data-label="Fecha de Nac.">{{ $user->fecha_nacimiento }}</td>
                <td data-label="Usuario">{{ $user->usuario }}</td>
                <td data-label="Email">{{ $user->email }}</td>
                <td data-label="Acciones">
                    <a href="{{url('/admin/users/edit/'.$user->id)}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="{{url('/admin/users/delete/'.$user->id)}}" onclick="return confirm('¿Desea eliminar permanentemente el usuario?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            <span></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table> 
   
@endsection