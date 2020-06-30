<?php

namespace App\Policies;

use App\Model\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function edit(User $user, User $current_user) {
        if ($user->id == $current_user->id || ($user->hasRole('admin') && $user->hasPermissionTo('administer-users'))) {
            return true;
        }
        return false;
    }

    public function show(User $user, User $current_user) {
        if ($user->id == $current_user->id || $user->hasRole('admin')) {
            return true;
        }
        return false;
    }

    public function delete(User $user, User $current_user) {
        if ($user->id == $current_user->id || $user->hasRole('admin')) {
            return true;
        }
        return false;
    }

    public function change_password(User $user, User $current_user) {
        if ($user->id == $current_user->id || $user->hasRole('admin')) {
            return true;
        }
        return false;
    }

}
