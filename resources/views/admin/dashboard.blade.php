@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
    @role('admin')
        <div class="col-md-3">
          <div class="small-box bg-green">
            <div class="inner">
                <h3>Pagos</h3>
                <p>Total pendientes: {{$Nmensu_pend}}</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <!-- /.box-body -->
            <a href="{{url('/admin/pagos/user')}}" class="small-box-footer"> Ver más</a>
           </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3>Posts</h3>
                <p>Total post: {{$Nposts}}</p>
            </div>
            <div class="icon">
                <i class="fa fa-comments"></i>
            </div>
            <!-- /.box-body -->
            <a href="{{url('/admin/posts')}}" class="small-box-footer"> Ver más</a>
           </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-red">
            <div class="inner">
                <h3>Usuarios</h3>
                <p>Usuarios registrados: {{$Nusers}}</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-circle"></i>
            </div>
            <!-- /.box-body -->
            <a href="{{url('/admin/users')}}" class="small-box-footer"> Ver más</a>
           </div>
        </div>
    @endrole
    @role('user')
        <div class="col-md-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Pagos</h3>
                    <p>Pagos pendientes: {{$Nmymensu}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
                <!-- /.box-body -->
                <a href="{{url('/admin/pagos/profile/'.auth()->user()->id)}}" class="small-box-footer"> Ver más</a>
            </div>
        </div>
    @endrole
    </div>
</div>
    
@endsection