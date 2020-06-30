<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Permission;

class PermissionController extends Controller {

    public function listAll() {
        $data = Permission::paginate(10);
        return view('auth.permission_list', compact('data'));
    }

    public function add() {
        
    }

}
