@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo permiso</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/permissions/store')}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_name" class="col-md-4 control-label">Display name</label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" id="display_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input type="text" name="description" id="description" class="form-control">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="col-md-12" style="padding-top:30px">
                                    <input type="submit" class="btn btn-success btn-login" value="Agregar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection