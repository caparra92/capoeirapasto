@extends('admin.layout')

@section('content')
    <table class="table tabla-adp">
    <caption>
        <h2>Productos y servicios</h2>
    </caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Detalle</th>
                <th width="50%">Descripción</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
                <td data-label="Id">{{ $pago->id }}</td>
                <td data-label="Detalle">{{ $pago->detalle }}</td>
                <td data-label="Descripción">{{ $pago->descripcion }}</td>
                <td data-label="Valor">{{ number_format($pago->valor) }}</td>
                <td data-label="Acciones">
                    <a href="/admin/pagos/edit/{{$pago->id}}" title="Editar producto">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="/admin/pagos/delete/{{$pago->id}}" title="Eliminar producto" onclick="return confirm('¿Desea eliminar permanentemente el pago?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="/admin/pagos/user/{{$pago->id}}" title="Asignar usuario">
                        <button class="btn btn-primary">
                            <i class="fa fa-user-plus"></i>
                            <span></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>    

@endsection