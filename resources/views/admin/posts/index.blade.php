@extends('admin.layout')

@section('content')
    <table class="table tabla-adp">
    <caption>
        <h2>Posts</h2>
    </caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Creado por</th>
                <th width="15%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td data-label="Id">{{ $post->id }}</td>
                <td data-label="Titulo">{{ $post->titulo }}</td>
                <td data-label="Descripción">{{ $post->descripcion }}</td>
                <td data-label="Categoría">{{ $post->categoria->nombre}}</td>
                <td data-label="Creado por">{{ $post->user->nombre}}</td>
                <td data-label="Acciones">
                    <a href="{{url('/admin/posts/edit/'.$post->id)}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="{{url('/admin/posts/delete/'.$post->id)}}" onclick="return confirm('¿Desea eliminar permanentemente el post?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="{{url('/admin/post/'.$post->id.'/coments')}}">
                        <button class="btn btn-success">
                            <i class="fa fa-comments"></i>
                            <span></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach 
        </tbody>
    </table>
@endsection