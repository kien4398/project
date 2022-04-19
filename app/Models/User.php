<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasRoles;
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

    public function getImageAttribute($image){
        return is_null($image) || $image == '' ? 'public/image/123.jpg' : $image;
    }


    public function post(){
        return $this->hasMany(Post::class,'user_id','id');
    }
}
