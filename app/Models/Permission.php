<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function scopeLikeName($query, $name)
    {
        return !empty($name) ? $query->where('name', 'like', "%{$name}%") : $query;
    }

    public function scopeLikeDisplayName($query, $display_name)
    {
        return !empty($display_name) ? $query->where('display_name', 'like', "%{$display_name}%") : $query;
    }

    public function deletePermission($permissionIds = array())
    {
        return $this->whereIn('id', $permissionIds)->delete();
    }
}
