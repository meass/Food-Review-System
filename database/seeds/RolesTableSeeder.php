<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'Admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Administrator',
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Normal User',
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'shop_owner']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Shop Owner',
                ])->save();
        }
    }
}
