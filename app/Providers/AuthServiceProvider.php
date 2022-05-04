<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function getPermissions(User $user){

        $cacheKey = 'permissions_of_user_'.$user->id;
        $permissionIds = Cache::get($cacheKey);
        if(!is_null($permissionIds)){
            return $permissionIds;
        }
        
        $user = User::whereId($user->id)->with(['roles'])->get();
        
        $permissionIds = $user->pluck('roles')->flatten()
        ->pluck('permissions')->flatten()
        ->pluck('id')->toArray();
        Cache::put($cacheKey,$permissionIds,300);

        return $permissionIds;
    }

    public function boot()
    {
      $permissions = Permission::all()->toArray();
        foreach ($permissions as $permission) {
            Gate::define($permission['name'], function (User $user) use($permission) {
                $perIds = $this->getPermissions($user);
                if(in_array($permission['id'] , $perIds)) {
                    return true;
                }
                return false;
            });
        }   


        

        // Gate::define('add-post', function (User $user) {
        //     // $user = User::whereId($user->id)->with(['roles'])->get();
        //     // $permissionIds = $user->pluck('roles')->flatten()->pluck('permissions')->flatten()->pluck('id');
        //     // dd($permissionIds);

        //     // $roles = Auth()->user()->roles;
        //     // foreach ($roles as $role) {
        //     //     $permissions = $role->permissions;
        //     //     foreach ($permissions as $permission) {
        //     //         if ($permission->name == 'add_post') {
        //     //             return true;
        //     //         }
        //     //         return false;
        //     //     }
        //     // }
        // });

        // function checkPermission($permission)
        // {
        //     $roles =  Auth()->user()->roles;
        //     foreach ($roles as $role) {
        //         $permissions = $role->permissions;
        //         foreach ($permissions as $permission) {
        //             if ($permission->name == '$permission') {
        //                 return true;
        //             }
        //             return false;
        //         }
        //     }
        // }
        // Gate::define('edit-post', function (User $user) {
        //     return $user->checkPermission('edit_post');
        // });
        // Gate::define('delete-post', function (User $user) {
        //     return $user->checkPermission('delete_post');
        // });
        // Gate::define('restore-post', function (User $user) {
        //     return $user->checkPermission('restore_post');
        // });
    }
}
