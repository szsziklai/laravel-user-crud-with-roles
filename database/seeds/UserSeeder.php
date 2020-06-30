<?php

use Illuminate\Database\Seeder;

use App\Model\User\User;
use App\Model\User\Role;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();
        $adminRole = Role::whereSlug('admin')->first();

        // Seed test admin
        $seededAdminEmail = config('admin_email');
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                        'firstname' => 'Admin',
                        'lastname' => 'Super',
                        'email' => $seededAdminEmail,
                        'password' => Hash::make('password'),
                        'deleted_at' => null,
                        'lang' => 'en',
                        'remember_token' => Str::random(64),
            ]);
            $user->save();
            $user->roles()->attach($adminRole);
            $user->save();
        }
    }

}
