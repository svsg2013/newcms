<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements Transformable, HasRoleAndPermissionContract
{
    use Notifiable, TransformableTrait, HasRoleAndPermission;

    protected $fillable = [
        "name",
        "email",
        "password",
        "remember_token",

        "gender",
        "birthday",
        "last_logon",

        "active_code",
        "active",
        "avatar"
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];
}
