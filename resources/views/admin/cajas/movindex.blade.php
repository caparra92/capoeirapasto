@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Movimientos</div>
                <!--cierre o apertura -->
                    <div class="pull-right" style="padding-top: 20px; padding-right:20px">
                    @if($caja->estado=="cerrada")
                    <a href="{{url('/admin/cajas/open/'.$caja->id)}}" onclick="return confirm('¿Desea dar apertura a la caja?')">
                        <button class="btn btn-info">
                            <i class="fa fa-sign-in"></i>
                            <span>Abrir</span>
                        </button>
                    </a>
                    @else
                    <a href="{{url('/admin/cajas/close/'.$caja->id)}}" onclick="return confirm('¿Desea cerrar la caja?')">
                        <button class="btn btn-danger">
                            <i class="fa fa-lock"></i>
                            <span>Cerrar</span>
                        </button>
                    </a>
                    @endif
                    </div>
                    <div class="panel-body">
                        <table class="table tabla-adp">
                            <caption><h2>Movimientos caja <b>{{$caja->nombre}}</b></h2></caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Base</th>
                                    <th>Fecha apertura</th>
                                    <th>Fecha cierre</th>
                                    <th>Diferencia</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($movcajas->sortByDesc('id') as $movcaja)
                                <tr>
                                    <td data-label="Id">{{ $movcaja->id }}</td>
                                    <td data-label="Base">{{ number_format($movcaja->base) }}</td>
                                    <td data-label="Fecha apertura">{{ $fecha_apertura }}</td>
                                    <td data-label="Fecha cierre">@if($movcaja->fecha_cierre=="abierta")<p class="pagado">@else <p>@endif {{ $movcaja->fecha_cierre }}</p></td>
                                    <td data-label="Diferencia">{{ number_format($movcaja->diferencia)}}</td>
                                    <td data-label="Usuario">{{ $movcaja->nombre }}</td>
                            @endforeach
                                    
                                </tr>
                            </tbody>
                        </table>    
                    </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Saldos</div>
                <div class="panel-body">
                <h4>Saldo actual: </h4><p>$ {{number_format($caja->saldo_actual)}}</p>
                <h4>Saldo anterior: </h4><p>$ {{number_format($caja->saldo_anterior)}}</p>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection