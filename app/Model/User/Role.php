<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Permission;
use App\Model\User\User;

class Role extends Model {
    
    protected $model_name = 'role';
    
    protected $with = ['translate'];
    
    protected $translatables = ['name' => 'varchar'];
    
    use \App\Traits\TranslateTrait;

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'users_roles');
    }

}
