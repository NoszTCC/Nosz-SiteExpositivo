<?php

namespace Database\Factories;

use App\Models\Principal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrincipalFactory extends Factory
{
    protected $model = Principal::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mensagem' => $this->faker->sentence,
        ];
    }
}
