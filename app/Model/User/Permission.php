<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Role;
use App\Model\User\User;

class Permission extends Model {

    protected $model_name = 'permission';
    protected $with = ['translate'];
    protected $translatables = ['name' => 'varchar'];

    use \App\Traits\TranslateTrait;

    public function roles() {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'users_permissions');
    }

}
