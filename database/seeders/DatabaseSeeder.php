<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Alumno;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Manuel',
            'email' => 'a@a.com',
            'password' => Hash::make('12345678')
        ]);
//        $faker = Faker::create();
//
//        for ($i = 1; $i <= 20; $i++) {
//            $number = rand(1,100);
//            Alumno::create([
//                'nombre' => $faker->name(),
//                'apellidos' => $faker->lastName(),
//                'email' => $faker->unique()->safeEmail(),
//                       'avatar' => "https://avatars.dicebear.com/personas/svg?seed=$number",
//            ]);
//        }
    }
}
