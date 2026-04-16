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

        // Limitar a 70 imágenes (pravatar)
        $max = 70;

        // Reutiliza si supera el límite
        $index = ($n % $max) ?: $max;

        $filename = "avatar$index.jpg";
        $url = "https://i.pravatar.cc/300?img=$index";

        // Descargar SOLO si no existe
        if (!Storage::disk('public')->exists($filename)) {
            $response = Http::get($url);

            if ($response->successful()) {
                Storage::disk('public')->put($filename, $response->body());
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

            // Elegir avatar aleatorio
            'avatar' => $filename,
            //
        ];
    }
}
