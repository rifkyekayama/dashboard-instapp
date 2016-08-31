<?php

namespace App\Models\UserControl;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'permission_group');
    }
    public function users()
    {
        return $this->hasManyThrough(User::class, Group::class);
    }
}
