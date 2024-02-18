<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'name'=>'admin',
        ]);
        Role::create([
           'name'=>'supervisor',
        ]);
        Role::create([
            'name'=>'operator',
        ]);
        Role::create([
           'name'=>'packaging',
        ]);
        foreach(Role::all() as $role) {
            $user = User::create([
                'name' => str::random(10),
                'email' => $role->name.'@gmail.com',
                'username' => str::random(4),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);

                $user->assignRole($role);

        }
    }
}
