<?php

namespace App\Models\UserControl;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserControl\Group;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Group::class);
    }

    public function isSuper()
    {
       if ($this->groups->contains('name', 'super')) {
            return true;
        }
        return false;
    }
 
    public function hasGroup($name)
    {
        if ($this->isSuper()) {
            return true;
        }

        if (is_string($name)) {
            return $this->name->contains('name', $name);
        }
        return !! $this->groups->intersect($name)->count();
    }
 
    public function assignGroup($group)
    {
        if (is_string($group)) {
            $group = Group::where('name', $group)->first();
        }
 
        return $this->groups()->attach($group);
    }
 
    public function revokeGroup($group)
    {
        if (is_string($group)) {
            $group = Group::where('name', $group)->first();
        }
 
        return $this->groups()->detach($group);
    }
}
