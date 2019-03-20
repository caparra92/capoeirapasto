@extends('admin.layout')

@section('content')


<div class="container"><h2>Mis pagos </h2></div>
<div id="exTab1" class="container">	
<ul  class="nav nav-pills">
    
    <li class="active">
        <a  href="#1a" data-toggle="tab">Mensualidad</a>
	</li>
	<li><a href="#2a" data-toggle="tab">Camisetas</a>
	</li>
	<li><a href="#3a" data-toggle="tab">Berimbaos</a>
	</li>
</ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-lg-8">
            <table class="table table-responsive">
                <thead id="cabecera3">
                    <th class="text-center">Detalle</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Valor</th>  
                    <th class="text-center">Estado</th>
                </thead>
                <tbody id="cuerpo3">   
                @foreach($user->pagos as $pago)
                @if($pago->detalle=="Mensualidad" && $pago->pivot->estado=="pendiente")
                        <tr>
                            <td><p class="text-center">{{ $pago->detalle }}</p></td>
                            <td><p class="text-center">{{ $pago->pivot->fecha }}</p></td>
                            <td><p class="text-center">{{ number_format($pago->valor) }}</p></td>
                            <td><p class="pendiente text-center">{{ $pago->pivot->estado }}</p></td>
                        </tr>
                @else
                <script>
                document.getElementById('cabecera').style.display="none";
                document.getElementById('cuerpo').innerHTML='<tr><td><p class="text-center">Usted no tiene pagos pendientes</p<</td></tr>';
                </script>
                @endif
                @endforeach
                </tbody> 
            </table>
            </div>
            </div>
        </div>
        </div>
        <div class="tab-pane" id="2a">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-lg-8">
            <table class="table table-responsive">
                <thead>
                    <th class="text-center">Detalle</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Valor</th>  
                    <th class="text-center">Estado</th>
                </thead>
                <tbody>   
            @foreach($user->pagos as $pago)
            @if($pago->detalle=="Camisetas" && $pago->pivot->estado=="pendiente")
                    <tr>
                        <td><p class="text-center">{{ $pago->detalle }}</p></td>
                        <td><p class="text-center">{{ $pago->pivot->fecha }}</p></td>
                        <td><p class="text-center">{{ number_format($pago->valor) }}</p></td>
                        <td><p class="pendiente text-center">{{ $pago->pivot->estado }}</p></td>
                    </tr>
            @else
            <script>
            document.getElementById('cabecera').style.display="none";
            document.getElementById('cuerpo').innerHTML='<tr><td><p class="text-center">Usted no tiene pagos pendientes</p<</td></tr>';
            </script>
            @endif
            @endforeach
                </tbody> 
            </table>
            </div>
            </div>
        </div>
        </div>
        <div class="tab-pane" id="3a">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-lg-8">
            <table class="table table-responsive">
                <thead id="cabecera2">
                    <th class="text-center">Detalle</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Valor</th>  
                    <th class="text-center">Estado</th>
                </thead>
                <tbody id="cuerpo2">   
                @foreach($user->pagos as $pago)
                @if($pago->detalle=="Berimbaos" && $pago->pivot->estado=="pendiente")
                        <tr>
                            <td><p class="text-center">{{ $pago->detalle }}</p></td>
                            <td><p class="text-center">{{ $pago->pivot->fecha }}</p></td>
                            <td><p class="text-center">{{ number_format($pago->valor) }}</p></td>
                            <td><p class="pendiente text-center">{{ $pago->pivot->estado }}</p></td>
                        </tr>
                @else
                <script>
                //document.getElementById('cabecera2').style.display="none";
                //document.getElementById('cuerpo2').innerHTML='<tr><td><p class="text-center">Usted no tiene pagos pendientes</p<</td></tr>';
                </script>
                @endif
                @endforeach
                </tbody> 
            </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>	

@endsection