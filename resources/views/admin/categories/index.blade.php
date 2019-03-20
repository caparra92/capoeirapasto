@extends('admin.layout')

@section('content')
    <table class="table tabla-adp">
        <caption><h2>Categorias</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Creado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td data-label="Id">{{ $category->id }}</td>
                <td data-label="Nombre">{{ $category->nombre }}</td>
                <td data-label="Descripción">{{ $category->descripcion }}</td>
                <td data-label="Creado por">{{ $category->user->nombre}}</td>
                <td data-label="Acciones">
                    <a href="/admin/categories/edit/{{$category->id}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="/admin/categories/delete/{{$category->id}}" onclick="return confirm('¿Desea eliminar permanentemente la categoria?')">
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