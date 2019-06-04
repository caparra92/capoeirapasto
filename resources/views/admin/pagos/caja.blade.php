@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2 col-lg-7">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-body">
            @foreach($pago as $pag)
                <form action="{{url('/admin/pagos/user/estado/'.$pago_user_id)}}" method="post" id="formCaja" name="formCaja">
                {{ csrf_field() }}
                    <div class="form-group">
                    <input type="hidden" name="valor" value="{{$pag->valor}}">
                    <input type="hidden" name="detalle" value="{{$pag->detalle}}">
                    <input type="hidden" name="pago_id" value="{{$pag->pago_id}}">
                    <input type="hidden" name="user_id" value="{{$pag->user_id}}">
            @endforeach
                        <div class="col-md-10">
                            <label for="caja" class="col-md-4 control-label">Caja</label>
                            <select name="caja" id="caja" class="form-control" required>
                                <option value="" selected disabled>Seleccione caja..</option>
                                    @foreach($cajas as $caja)
                                <option value="{{ $caja->id }}">{{ $caja->nombre }}</option>
                                    @endforeach
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-success" id="pagar">
                                <i class="fa fa-dollar"></i>
                                <span>Pagar</span>
                            </button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
        
    </div>
        
    </div>
    
</div>

@endsection