<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'admin']);
        $admin = User::create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('admin_yammt_2023')
        ]);
        $admin->assignRole('admin');
    }
}
