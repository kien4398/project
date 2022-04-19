<?php

namespace App\Repository;

use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository {
    public function createUsers(Request $request){
        $file = $request->file('image');
            $fileName = time().".".$file->getClientOriginalExtension();
            $file->move('image', $fileName);

        $dataCreate = 
        [
            'firstName' => $request->first_name,
            'middleName' => $request->middle_name,
            'lastName' => $request->last_name,
            'userName' => $request->user_name,
            'email' => $request->email,
            'image' => $fileName,
            'password' =>bcrypt($request->password),
        ] ;
        return User::create($dataCreate);
    }
    public function updateUsers(EditUserRequest $editUserRequest, $id){
        $user = User::find($id);
        $user->firstName = $editUserRequest->firstName;
        $user->middleName = $editUserRequest->middleName;
        $user->lastName = $editUserRequest->lastName;
        $user->userName = $editUserRequest->userName;
        $user->email = $editUserRequest->email;
        $user->password = bcrypt($editUserRequest->password); 
        if($editUserRequest->has('image')){
            $file = $editUserRequest->file('image');
            $fileName = time().".".$file->getClientOriginalExtension();
            $file->move('image', $fileName);

            $user->image = $fileName;
        }
        $user->save();
        return $user;
    }
}