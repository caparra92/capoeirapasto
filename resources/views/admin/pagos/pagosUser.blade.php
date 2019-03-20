@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <input id="search" type="text" class="form-control" placeholder="Filtrar...">
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-review">
        <i class="fa fa-search"></i>
        <span>Avanzado</span>
        </button>
    </div>
</div>
<hr>
    <table class="table tabla-adp" id="pagos">
        <caption><h2>Pagos usuarios</h2></caption>
        <thead>
            <tr>
                <th class="text-center">Estado</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Pago</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla">
            <tr class="fila">
            @foreach($pagos as $pago)
                <input type="hidden" name="id" id="id" class="id" value="{{$pago->id}}">
                <td data-label="Estado" class="columna"><p @if($pago->estado=="pendiente")class='pendiente' @else class='pagado' @endif>{{ $pago->estado }}</p></td>
                <td data-label="Fecha"><p>{{ $pago->fecha }}</p></td>
                <td data-label="Usuario"><p>{{ $pago->nombre}}</p></td>
                <td data-label="Pago"><p>{{ $pago->detalle }}</p></td>
                <td data-label="Valor"><p>{{ number_format($pago->valor) }}</p></td>
                <td data-label="Acciones" class="acciones text-center">
                    <a href="/admin/pagos/user/edit/{{$pago->id}}">
                        <button class="btn btn-warning"><i class="fa fa-pencil"></i>
                        <span></span>
                        </button>
                    </a>
                    <a href="/admin/pagos/user/delete/{{$pago->id}}" onclick="return confirm('¿Desea eliminar permanentemente el pago?')">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i>
                        <span></span>
                        </button>   
                    </a>
                    @if($pago->estado=="pendiente")
                    <a href="/admin/pagos/user/estado/{{$pago->id}}">
                        <button class="btn btn-success"><i class="fa fa-dollar"></i>
                        <span></span>
                        </button>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
            <tr>
                <td><h3>Pagados: </h3>@foreach($total_pag as $pagados)<p>{{number_format($pagados->total_pagados)}}</p>@endforeach</td>
                <td><h3>Pendientes: </h3>@foreach($total_pend as $pendientes)<p>{{number_format($pendientes->total_pagados)}}</p>@endforeach</td>
            </tr>

            <!-- Modal -->
            <div id="modal-review" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content col-md-8">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Filtro avanzado</h4>
                </div>
                <div class="modal-body mx-3">
                    <form action="/admin/pagos/user/filter" method="post" id="formModal" name="formModal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="mes" class="col-md-4 control-label">Mes</label>
                                <select name="mes" id="mes" class="form-control" required>
                                <option value="" selected disabled>Seleccione mes..</option>
                                @foreach($meses as $mes)
                                <option value="{{ $mes->mesNum }}">{{ $mes->mes }}</option>
                                @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="ano" class="col-md-4 control-label">Año</label>
                                <select name="ano" id="ano" class="form-control" required>
                                <option value="" selected disabled>Seleccione año..</option>
                                @foreach($anos as $ano)
                                <option value="{{ $ano->ano }}">{{ $ano->ano }}</option>
                                @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="radio col-md-10">
                                <label><input type="radio" name="estado"  id="pendiente" checked value="pendiente" required>Pendiente</label>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="radio col-md-10">
                                <label><input type="radio" name="estado" id="pagado" value="pagado" required>Pagado</label>
                            </div>
                        </div> 
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-md-10">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="filter">
                            <i class="fa fa-search"></i>
                            <span> Filtrar</span>
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div> 
                </div>
                    </form>
                </div>
            </div>
            </div>
        </tbody>
    </table>  

@endsection