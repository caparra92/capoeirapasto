@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editar rol</div>
                <div class="panel-body">
                    <form method="post" action="{{url('/admin/roles/update/'.$role->id)}}" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_name" class="col-md-4 control-label">Display name</label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" id="display_name" class="form-control" value="{{$role->display_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input type="text" name="description" id="description" class="form-control" value="{{$role->description}}">
                            </div>
                        </div>
                        <div class="panel-footer">
                        
                        <div class="col-md-10 col-xs-10">
                            <h3>Permisos</h3>
                        </div>
                        <div class="col-md-2 col-xs-2" style="margin-top:20px">
                            <button type="button" class="btn btn-large btn-primary" id="addPerm" data-toggle="modal" data-target="#modal-review"><i class="fa fa-plus"></i><span></span></button>
                        </div>
                            <div class="form-check" id="panelF">
                        @foreach($role->perms as $permission)
                            
                                <div class="col-md-4 col-xs-4">
                                    <input type="checkbox" checked name="permissions[]" id="{{$permission->name}}" value="{{$permission->id}}" class="form-check-input">
                                    <label for="{{$permission->name}}" class="form-check-label">{{$permission->display_name}}</label>
                                </div>
                            
                        @endforeach
                            </div>
                            <div class="form-group">
                                <div class="col-md-12" style="height:30px;padding-top:40px">
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
   <!-- Modal -->
<div id="modal-review" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content col-md-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar permiso</h4>
        </div>
        <div class="modal-body mx-3">
            <form action="{{url('/admin/roles/permission/new')}}" method="post" id="formPerm" name="formModal">   
            {{csrf_field()}}
            <input type="hidden" name="role_id" id="role_id" value="{{$role->id}}">
            @foreach($difPerm as $key=>$permission)
                <div class="form-check">
                    <div class="col-md-4 col-xs-4" id="chk{{$permission}}">
                        <input type="checkbox" name="permissions[]" id="{{$permission}}" value="{{$permission}}" class="form-check-input">
                        <label for="{{$permission}}" class="form-check-label">{{$permission}}</label>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success btn-login" data-dismiss="modal" id="add">
                        <i class="fa fa-plus"></i>
                        <span>Agregar</span>
                    </button>
                </div>
            </div> 
        </div>
            </form>
        </div>
    </div>
</div>
@endsection