<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Database\Seeders\PermissionsSeederTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
       $this->call(YalidineWilayasSeeder::class);
        $this->call(YalidineMairiesSeeder::class);
//         \App\Models\User::factory(10)->create();
    }
}
