<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUsersRequest;
use App\User;
Use App\Role;
Use App\Permission;
Use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.create')->with(['roles'=>$roles,'permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $request)
    {   
        $validated = $request->validated();
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->password = bcrypt($request->password);
        $user->usuario  = $request->usuario;
        $user->email = $request->email;

        $user->save();
        $user->attachRole($request->role);
        flash('Usuario creado con éxito!!','success')->important();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('admin.users.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles,'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //dd($request->roles);
        if($request->file()){
            $ruta = public_path().'/img/';
            $imagen_original = $request->file('imagen');
            $imagen = Image::make($imagen_original);
            $temp_name = $this->random_string() . '.' . $imagen_original->getClientOriginalExtension();
            $imagen->resize(215,215);
            $imagen->save($ruta . $temp_name, 100);
            $user->path = $temp_name;
        }else{
           $user->path = $user->path;
        }
        $user->nombre = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->direccion = $request->get('direccion');
        $user->telefono = $request->get('telefono');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->password = bcrypt($request->get('password'));
        $user->usuario  = $request->get('usuario');
        $user->email = $request->get('email');

        $user->save();
        if($user->hasRole($request->role)){
            flash('El rol '.$request->role.' ya se encuentra asignado a este usuario','danger')->important();
        }
        else{
            $rol = Role::where('name','=',$request->role)->first();
            $user->attachRole($rol->id);
        }
        flash('Usuario editado con éxito!!','warning')->important();
        return redirect('/admin/users/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('Usuario eliminado con éxito!!','danger')->important();
        return redirect('/admin/users/');
    }

    public function updateImg(Request $request){
        $user = User::find(auth()->id());
        $ruta = public_path().'/img/';
        $imagen_original = $request->file('imagen');
        $imagen = Image::make($imagen_original);
        $temp_name = $this->random_string() . '.' . $imagen_original->getClientOriginalExtension();
        $imagen->resize(215,215);
        $imagen->save($ruta . $temp_name, 96);
        $user->path = $temp_name;
        $user->save();
        return response()->json($user->path);
    }

    public function indexRoles(){
        $roles = Role::all();
        return view('admin.roles.index')->with('roles',$roles);
    }

    public function createRoles(){
        $permissions = Permission::all();
        return view('admin.roles.create')->with('permissions',$permissions);
    }

    public function storeRoles(Request $request){
        //dd($request->all());
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if($role->isInvalid()){
            flash('Ya existe un rol con ese name/display name','danger')->important();
            return redirect('/admin/roles/new');
        }else{
            $role->save();
            $role->attachPermissions(array($request->permissions));
            flash('Rol agregado con éxito!!','success')->important();
            return redirect('/admin/roles');
        }
    }

    public function editRoles($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $arrayPermRole=[];
        $arrayPerm=[];
        $idPermRole=[];
        foreach($role->perms as $rolePerm){
            $arrayPermRole[]=$rolePerm->name;
            $idPermRole[]=$rolePerm->id;  
        }
        foreach($permissions as $perm){
            $arrayPerm[]=$perm->name;
            $idPerm[]=$perm->id;
        }
        $difPerm = array_diff($arrayPerm,$arrayPermRole);
        $difId = array_diff($idPerm,$idPermRole);
        $permArray = array_fill_keys($difId,$difPerm);
        
        return view('admin.roles.edit')->with(['role'=>$role,'difPerm'=>$difPerm,'difId'=>$difId,'permArray'=>$permArray]);
    }

    public function updateRoles(Request $request,$id){
        $role = Role::find($id);
        //dd($request->permissions);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if($role->isInvalid()){
            flash('Ya existe un rol con ese name/display','danger')->important();
            return redirect('/admin/roles/edit/'.$id);
        }else{
            $role->save();
        }
        if(!$request->permissions){
            flash('Ningun permiso asignado','danger')->important();
            flash('Rol actualizado con éxito!!','warning')->important();
            return redirect('/admin/roles');
        }else{
            $role->detachPermissions($role->perms);
            $role->attachPermissions($request->permissions);
            flash('Rol actualizado con éxito!!','warning')->important();
            return redirect('/admin/roles');
        }
        
    }

    public function destroyRoles($id){
        $role = Role::find($id);
        $role->delete();
        flash('Rol eliminado con éxito!!','danger')->important();
        return redirect('/admin/roles');
    }
    
    //permisos
    public function indexPermissions(){
        $permissions = Permission::paginate(5);
        return view('admin.permissions.index')->with('permissions',$permissions);
    }

    public function createPermissions(){
        return view('admin.permissions.create');
    }

    public function storePermissions(Request $request){
        //dd($request->all());
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        
        flash('Permiso agregado con éxito!!','success')->important();
        return redirect('/admin/permissions');
    }

    public function editPermissions($id){
        $permission = Permission::find($id);
        
        return view('admin.permissions.edit')->with('permission',$permission);
    }

    public function updatePermissions(Request $request,$id){
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
    
        flash('Permiso actualizado con éxito!!','warning')->important();
        return redirect('/admin/permissions');
    }

    public function destroyPermissions($id){
        $permission = Permission::find($id);
        $permission->delete();
        flash('Permiso eliminado con éxito!!','danger')->important();
        return redirect('/admin/permissions');
    }

    public function addPerms(Request $request){
        $role = Role::find($request->role_id);
        $newPerms = $request->permissions;
        $long = count($newPerms);
        $perms = [];
        for($i=0;$i<$long;$i++){
            $perms = DB::table('permissions')
                    ->where('name','=',$newPerms[$i])
                    ->select('id')
                    ->first();
            $role->attachPermissions($perms);
        }
        //$perm_array = array_fill_keys(array($perms),$newPerms);
        return response()->json($newPerms);
    }
    
}
