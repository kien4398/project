<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function role(){
        $roles = Role::all();
        return view('backend/role/role',['roles' => $roles]);
    }
    public function add(){
        $permissions = Permission::all();
        return view('backend/role/add_role',compact('permissions'));
    }
    public function create(Request $request){
        $role = Role::create([
        'name' => $request->role,
        'display_name' => $request->display_name_role,
        ]);
        
        $role->permissions()->attach($request->permission_ids);
        return redirect()->route('role');
    }
    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $roleOfPermission = $role->permissions;
        return view('backend/role/edit_role', compact('role', 'permissions','roleOfPermission'));
    }
    public function update(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->role;
        $role->display_name = $request->display_name_role;
        $role->save();

        $role = Role::find($id);
        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('role');
    }

    public function delete(Request $request,$id){
        $role = Role::find($id);
        $role->delete();

        $role->permissions()->detach($request->permission_id);
        return redirect()->route('role');
    }
}
