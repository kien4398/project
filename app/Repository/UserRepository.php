<?php

namespace App\Repository;

use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\traits\ImageTrait;
use Illuminate\Http\Request;

class UserRepository {
    use ImageTrait;
    public function createUsers($data){
        $image = $this->imageUpload($data,'image','image');

        $dataCreate = 
        [
            'firstName' => $data['first_name'],
            'middleName' => $data['middle_name'],
            'lastName' => $data['last_name'],
            'userName' => $data['user_name'],
            'email' => $data['email'],
            'image' => isset($data['image']) ? $image : '123.jpg',
            'password' =>bcrypt($data['password']),
        ] ;
        
        $user = User::create($dataCreate);
        $user->roles()->attach($data->role_id);
    }
    public function updateUsers(User $user, $data){
        $image = $this->imageUpload($data,'image','image');

        $dataUpdate= [
            'firstName' => isset($data['firstName']) ? $data['firstName'] : $user->firstName,
            'middleName' => isset($data['middleName']) ? $data['middleName'] : $user->middleName,
            'lastName' => isset($data['lastName']) ? $data['lastName'] : $user->lastName,
            'userName' => isset($data['userName']) ? $data['userName'] : $user->userName,
            'email' => isset($data['email']) ? $data['email'] : $user->email,
            'password' =>bcrypt($data['password']), 
            'image' => isset($data['image']) ? $image : $user->image,
        ];
        
        $update = $user->update($dataUpdate);
        $user->roles()->sync($data->role_id);
    }
}