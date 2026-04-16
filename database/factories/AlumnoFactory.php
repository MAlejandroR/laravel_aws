<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $n = 1;

        $max = 70;
        $index = ($n % $max) ?: $max;

        $filename = "avatar$index.jpg";
        $url = "https://i.pravatar.cc/300?img=$index";

        if (!Storage::disk('public')->exists("avatars/$filename")) {
            $response = Http::get($url);

            if ($response->successful()) {
                Storage::disk('public')->put("avatars/$filename", $response->body());
            }
        }

        $n++;

        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'direccion' => fake()->streetAddress(),
            'ciudad' => fake()->city(),
            'notas' => fake()->sentence(),
            'avatar' => $filename,
        ];
    }
}
