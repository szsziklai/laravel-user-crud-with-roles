<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    
    //Example create User with roles and permissions
    
    public function index() {
        return view('admin.dashboard');
    }

}
