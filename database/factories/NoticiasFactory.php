<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'titulo' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph,
            'imagem' => "noticias/WsezR98vXlCFXHcjNktymDWgvol2gdbJvxEAUXZ3.jpg",

        ];
    }
}
