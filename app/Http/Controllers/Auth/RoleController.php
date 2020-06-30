<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Role;
use App\Model\User\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller {

    public function listAll() {
        $data = Role::paginate(10);
        return view('auth.roles_list', compact('data'));
    }

    public function add() {
        $data = new Role();
        $permission = Permission::all();
        return view('auth.role_edit', compact('data', 'permission'));
    }

    public function edit($id) {
        $data = Role::with('permissions')->find($id);
        $permission = Permission::all();
        return view('auth.role_edit', compact('data', 'permission'));
    }

    public function editPost(Request $request, $id) {
        $role = Role::with('permissions')->findOrFail($id);

        $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $this->saveData($request, $role);
        return redirect()->back();
    }

    public function addPost(Request $request) {
        $role = new Role();
        $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'slug' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $role->slug = $request->input('slug');
        $this->saveData($request, $role);
        return redirect()->route('role_list');
    }

    public function saveData(Request $request, $role) {
        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->detach();
        $permissions = [];
        if ($request->input('permissions')) {
            foreach ($request->input('permissions') as $p) {
                $permissions[] = $p;
            }
        }
        $role->permissions()->attach($permissions);
        $role->attach_translate($request->all());
        flash(trans("validation.success"))->success();
    }

    public function delete($id) {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $role->users()->detach();
        $role->translate()->delete();
        $role->delete();
        flash(trans("validation.success"))->success();
        return redirect()->back();
    }

}
