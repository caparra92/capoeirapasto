@extends('admin.layout')

@section('content')

    <table class="table tabla-adp">
    <caption><h2>Comentarios</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($post->comentarios as $coment)
            <tr>
                <td data-label="Id">{{ $coment->id }}</td>
                <td data-label="Descripcion">{{ $coment->descripcion }}</td>
                <td data-label="Usuario">{{ $coment->user->usuario }}</td>
                <td data-label="Acciones">
                    <a href="{{url('/admin/post/coment/delete/'.$coment->id)}}" onclick="return confirm('¿Desea eliminar permanentemente el comentario?')">
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