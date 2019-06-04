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
    <a href="{{url('/admin/permissions/new')}}" class="button-xs">
        <button class="btn btn-labeled btn-primary">
        <span class="btn-label"><i class="fa fa-plus"></i></span> Agregar permiso
        </button>
    </a>
    <table class="table tabla-adp">
        <caption><h2>Permisos</h2></caption>
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
        @foreach($permissions as $perm)
            <tr>
                <td data-label="Id">{{ $perm->id }}</td>
                <td data-label="Nombre">{{ $perm->name }}</td>
                <td data-label="Display name">{{ $perm->display_name }}</td>
                <td data-label="Descripcion">{{ $perm->description }}</td>
                <td data-label="Acciones">
                    <a href="{{url('/admin/permissions/edit/'.$perm->id)}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="{{url('/admin/permissions/delete/'.$perm->id)}}" onclick="return confirm('¿Desea eliminar permanentemente el permiso?')">
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
    <div class="text-center">{{$permissions->links()}}</div>

   
@endsection