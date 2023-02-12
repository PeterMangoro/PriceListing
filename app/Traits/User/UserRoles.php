<?php

namespace App\Traits\User;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

trait UserRoles
{
    public function hasRole(...$roles): bool
    {
        //    dd($roles);

        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermission($permission)
    {
        return $this->hasPermissionThroughRole($permission) || (bool) $this->permissions->where('name', $permission->name)->count();
    }

    public function hasPermissionThroughRole($permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function givePermission(...$permission)
    {
        $permissions = $this->getPermissions(Arr::flatten($permission));
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    public function getPermissions(array $permissions): Collection
    {
        return Permission::whereIn('name', $permissions)->get();
    }
    public function removePermission(...$permission)
    {
        $permissions = $this->getPermissions(Arr::flatten($permission));
        $this->permissions()->detach($permissions);
        return $this;
    }
    public function modifyPermission(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermission($permissions);
    }
}
