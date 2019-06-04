@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Editar permiso</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/permissions/update/'.$permission->id)}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_name" class="col-md-4 control-label">Display name</label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" id="display_name" class="form-control" value="{{$permission->display_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input type="text" name="description" id="description" class="form-control" value="{{$permission->description}}">
                            </div>
                        </div>
                        <div class="panel-footer">
                        
                        <div class="col-md-10">
                            <h3>Asignado a los roles</h3>
                        </div>
                        <div class="col-md-2 text-right" style="margin-top:20px">
                            <button type="button" class="btn btn-primary" id="addPerm" data-toggle="modal" data-target="#modal-review"><i class="fa fa-plus"></i><span></span></button>
                        </div>
                        
                        @foreach($permission->roles as $role)
                            <div class="form-check">
                                <div class="col-md-4">
                                    <input type="checkbox" checked name="permissions[]" id="{{$role->name}}" value="{{$role->id}}"class="form-check-input">
                                    <label for="{{$role->name}}" class="form-check-label">{{$role->display_name}}</label>
                                </div>
                            </div>
                        @endforeach
                            <div class="form-group">
                                <div class="col-md-12" style="padding-top:30px">
                                    <input type="submit" class="btn btn-warning btn-edit" value="Actualizar">
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