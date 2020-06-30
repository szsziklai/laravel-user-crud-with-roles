<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\User;
use App\Model\User\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use App\Rules\PhoneNumberChk;

class UserCrudController extends Controller {

    public function listAll() {
        $data = User::with('roles')->paginate(10);
        return view('auth.crud.users_list', compact('data'));
    }

    public function show($id) {
        $data = User::with('roles')->find($id);

        if (!$this->authorize('show', $data)) {
            return redirect()->back()->with('error', trans('user.no_permission_update'));
        }

        return view('auth.crud.show', compact('data'));
    }

    public function edit($id) {
        $data = User::with('roles')->find($id);
        $roles = Role::all();
        if (!$this->authorize('edit', $data)) {
            return redirect()->back()->with('error', trans('user.no_permission_update'));
        }

        return view('auth.crud.edit', compact('data', 'roles'));
    }

    public function editPost(Request $request, $id) {
        $user = User::findOrFail($id);

        if (!$this->authorize('edit', $user)) {
            return redirect()->back()->with('error', trans('user.no_permission_update'));
        }

        $data = [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string', 'max:255', 'nullable'],
            'lang' => ['required', 'string', 'max:2'],
        ];

        if ($request->input('email') == $user->email) {
            unset($data['email']);
        }

        //$validator = $this->validator($request->all())->validate();
        $validator = Validator::make($request->all(), $data);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->lang = $request->input('lang');
        $user->phone = $request->input('phone');
        $user->save();

        if ($request->input('lang') != $user->lang && in_array($request->input('lang'), config('app.languages'))) {
            session()->put('locale', $request->input('lang'));
            app()->setLocale($request->input('lang'));
        }
        flash(trans("validation.success"))->success();
        return redirect()->back();
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        if (!$this->authorize('delete', $user)) {
            return redirect()->back()->with('error', trans('user.no_permission_update'));
        }

        $user->delete();

        flash(trans("validation.success"))->success();
        return redirect()->back();
    }

    public function changePasswordPost(Request $request, $id) {
        $user = User::findOrFail($id);

        if (!$this->authorize('change_password', $user)) {
            return redirect()->back()->with('error', trans('user.no_permission_update'));
        }

        $validator = Validator::make($request->all(), [
                    'current_password' => [new MatchOldPassword($user)],
                    'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();
        flash(trans("validation.success"))->success();
        return redirect()->back();
    }

    public function attachRoles(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $user->roles()->detach();
        $roles = [];
        if ($request->input('roles')) {
            foreach ($request->input('roles') as $r) {
                $roles[] = $r;
            }
        }
        $user->roles()->attach($roles);
        flash(trans("validation.success"))->success();
        return redirect()->back();
    }

}
