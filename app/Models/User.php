<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'userName',
        'email',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


    public function post(){
        return $this->hasMany(Post::class,'user_id','id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }


}