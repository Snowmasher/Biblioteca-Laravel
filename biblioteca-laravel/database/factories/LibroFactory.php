<?php

namespace Database\Factories;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titulo" => $this->faker->company,
            "descripcion" => $this->faker->paragraph(3),
            "user_id" => User::all()->random()->id,
            "created_at" => now()
        ];
    }
}
