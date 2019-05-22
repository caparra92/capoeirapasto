@extends('admin.layout')

@section('content')
    <table class="table tabla-adp">
        <caption><h2>Cajas</h2></caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Saldo actual</th>
                <th>Saldo anterior</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cajas as $caja)
            <tr>
                <td data-label="Id">{{ $caja->id }}</td>
                <td data-label="Nombre">{{ $caja->nombre }}</td>
                <td data-label="Saldo actual">{{ number_format($caja->saldo_actual) }}</td>
                <td data-label="Saldo anterior">{{ number_format($caja->saldo_anterior)}}</td>
                <td data-label="Estado">@if($caja->estado=="abierta")<p class="pagado">{{ $caja->estado}} @else<p class="vencido">{{ $caja->estado}}@endif</p></td>
                <td data-label="Acciones">
                    <a href="/admin/cajas/edit/{{$caja->id}}">
                        <button class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                            <span></span>
                        </button>
                    </a>
                    <a href="/admin/cajas/delete/{{$caja->id}}" onclick="return confirm('¿Desea eliminar permanentemente la caja?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            <span></span>
                        </button>
                    </a>
                    @if($caja->estado=="cerrada")
                    <a href="/admin/cajas/open/{{$caja->id}}" onclick="return confirm('¿Desea dar apertura a la caja?')">
                        <button class="btn btn-info">
                            <i class="fa fa-sign-in"></i>
                            <span>Abrir</span>
                        </button>
                    </a>
                    @else
                    <a href="/admin/cajas/close/{{$caja->id}}" onclick="return confirm('¿Desea cerrar la caja?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-lock"></i>
                            <span>Cerrar</span>
                        </button>
                    </a>
                    @endif
                    <a href="/admin/cajas/mov/{{$caja->id}}">
                        <button class="btn btn-primary">
                            <i class="fa fa-line-chart"></i>
                            <span></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>    

@endsection