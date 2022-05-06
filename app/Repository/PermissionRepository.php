<?php

namespace App\Repository;

use App\Models\Permission;

class PermissionRepository{
    function createPermission($data){
        $perCreate = [
            'name' => $data['permission'],
            'display_name' => $data['display_name_permission'],
        ];
        return Permission::create($perCreate);
    }
    function updatePermission(Permission $permission,$data){
        $perUpdate = [
            'name' => isset($data['name']) ? $data['permission'] : $permission->name,
            'display_name' => isset($data['display_name_permission']) ? $data['display_name_permission'] : $permission->display_name,
        ];
        $update = $permission->update($perUpdate);
        return $update ? $permission : false;
    }
}
