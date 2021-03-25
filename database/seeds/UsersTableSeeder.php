<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'first_name'     => 'Admin',
                'last_name'      => 'Admin',
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'avatar'         => 'users/default.png',
                'cover_image'    => 'users/default.png',
                'password'       => bcrypt('12345678'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        }
    }
}
