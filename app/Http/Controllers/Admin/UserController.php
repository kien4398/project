<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    protected $userRepository;
    public function __construct(){
        $this->userRepository = new UserRepository();
    }

    public function index(){
        //them role
        // $role = Role::create(['name' => 'writer']);

        //them permission
        // $permission = Permission::create(['name' => 'restore posts']);

        //gan role permission
        // $role = Role::find(3);
        // $permission = Permission::find(2);
        // $role->givePermissionTo($permission);

        //gan quyen user
        // $user = User::find(2);
        // $user->assignRole('editor');
        // Auth::user()->syncRoles(['admin','editor','writer']);

        return view('backend/users/index');
    }
    public function user()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backend/users/user', ['users' => $users]);
    }

    public function addUser()
    {
        return view('backend/users/adduser');
    }
    public function createUser(Request $request)
    {
        $data = $request->all();
        $this->userRepository->createUsers($request);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function editUser($id)
    {
        $user = User::find($id);
        return view('backend/users/edituser', ['user' => $user]);

    }
    public function updateUser(EditUserRequest $editUserRequest, $id)
    {
        $this->userRepository->updateUsers($editUserRequest, $id);
        return redirect()->route('user');
    }
    public function deleteUser(Request $request,$id)
    {
        $user = User::find($id);
        if(is_null($user)){
            $request->session()->flash('error','Người dùng không tồn tại!');
            return redirect()->route('user');
        }
        $user->delete();
        return redirect('admin/user');
    }
    public function deleteeUser(Request $request,$id)
    {   
        $user = User::find($id);
        if(is_null($user)){
            $request->session()->flash('error','Người dùng không tồn tại!');
            return redirect()->route('user');
        }
        $user->delete();
    }


    public function trash()
    {
        $users = User::orderBy('deleted_at','desc')->onlyTrashed()->get();
        return view('backend/users/trash', ['users' => $users]);
    }
    public function untrash(Request $request,$id){
        $user = User::withTrashed()->find($id);
        $user->restore();
        $request->session()->flash('success','Đã khôi phục thành công');
        return redirect()->route('user');
    }
}