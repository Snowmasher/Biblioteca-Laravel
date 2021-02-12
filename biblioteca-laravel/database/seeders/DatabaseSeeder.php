<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name" => "snowmasher",
            "email" => "alvaro3400@gmail.com",
            "password" => bcrypt("snowmasher")
        ]);

        User::factory()->create([
            "name" => "kimia",
            "email" => "kimia@gmail.com",
            "password" => bcrypt("kimia")
        ]);

        Libro::factory()->times(20)->create();
    }
}
