<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //

    public function __construct(){
        $this->userRepository = new UserRepository();
        $this->role = new Role();
        $this->user = new User();
    }

    public function index(User $user){
        
        return view('backend/users/index');
    }
    
    public function user()
    {
        $roles = Role::all();
        $users = User::orderBy('id','desc')->get();
        return view('backend/users/user', ['users' => $users,'roles' => $roles]);
    }

    public function addUser()
    {
        $roles = Role::all();
        return view('backend/users/adduser',['roles' => $roles]);
    }

    public function createUser(Request $request)
    {
     
        $this->userRepository->createUsers($request);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function editUser($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        $roleOfUser = $user->roles;
        return view('backend/users/edituser', compact('user', 'roles', 'roleOfUser'));

    }

    public function updateUser(EditUserRequest $editUserRequest, $id)
    {
        $user = User::find($id);
        $this->userRepository->updateUsers($user,$editUserRequest, $id);
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
        $user->roles()->detach($request->role_id);
        return response()->json([
            'code'=> '200'
        ]);
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