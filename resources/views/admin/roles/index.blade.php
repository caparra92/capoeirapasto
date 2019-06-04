@extends('admin.layout')

@section('content')
    <a href="{{url('/admin/users')}}">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-users"></i></span> Usuarios
        </button>
    </a>
    <a href="{{url('/admin/roles')}}" class="button-xs">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-user-plus"></i></span> Roles
        </button>
    </a>
    <a href="{{url('/admin/permissions')}}" class="button-xs">
        <button class="btn btn-labeled btn-success">
        <span class="btn-label"><i class="fa fa-cog"></i></span> Permisos
        </button>
    </a>
    <a href="{{url('/admin/roles/new')}}" class="button-xs">
        <button class="btn btn-labeled btn-primary">
        <span class="btn-label"><i class="fa fa-plus"></i></span> Agregar rol
        </button>
    </a>
    <table class="table tabla-adp">
        <caption><h2>Roles</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Display name</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $rol)
            <tr>
                <td data-label="Id">{{ $rol->id }}</td>
                <td data-label="Nombre">{{ $rol->name }}</td>
                <td data-label="Display name">{{ $rol->display_name }}</td>
                <td data-label="Descripcion">{{ $rol->description }}</td>
                <td data-label="Acciones">
                    <a href="{{url('/admin/roles/edit/'.$rol->id)}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="{{url('/admin/roles/delete/'.$rol->id)}}" onclick="return confirm('¿Desea eliminar permanentemente el rol?')">
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