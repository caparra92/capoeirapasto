@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="small-box bg-green">
            <div class="inner">
                <h3>Mensualidades</h3>
                <p>Total pendientes</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- /.box-body -->
            <a href="#" class="small-box-footer"> Ver más</a>
           </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3>Posts</h3>
                <p>Total post</p>
            </div>
            <div class="icon">
                <i class="fa fa-comments"></i>
            </div>
            <!-- /.box-body -->
            <a href="#" class="small-box-footer"> Ver más</a>
           </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-red">
            <div class="inner">
                <h3>Pendientes</h3>
                <p>Pagos pendientes</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <!-- /.box-body -->
            <a href="#" class="small-box-footer"> Ver más</a>
           </div>
        </div>
    </div>
</div>
    
@endsection