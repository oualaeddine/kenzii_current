<?php

namespace Modules\Users\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsSeederTableSeeder::class);

        $user = new User();
        $user->name = "Berrehal Ouala eddine";
        $user->username = "ouala";
        $user->email = "ouala@gmail.com";
        $user->password = bcrypt("wazawaza");
        $user->is_active = true;
        $user->save();
        $user->assignRole("admin");

    }
}
