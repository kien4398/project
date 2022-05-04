<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function permission(){
        $permissions = Permission::all();
        return view('backend/permissions/permission', compact('permissions'));
    }
    public function add(){
        return view('backend/permissions/add_permission');
    }
    public function create(Request $request){
        $permission = new Permission();
        $permission->name = $request->permission;
        $permission->display_name = $request->display_name_permission;
        $permission->save();

        return redirect()->route('permission');
    }
    public function edit($id){
        $permission = Permission::find($id);
        return view('backend/permissions/edit_permission', compact('permission'));
    }
    public function update(Request $request, $id){
        $permission = Permission::find($id);
        $permission->name = $request->permission;
        $permission->display_name = $request->display_name_permission;
        $permission->save();

        return redirect()->route('permission');
    }
    public function delete($id){
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('permission');
    }
}
