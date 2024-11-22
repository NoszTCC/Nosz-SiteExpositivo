<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class DownloadFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => fake()->randomElement(['users', 'parceiros']),
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'senha' => static::$password ??= Hash::make('password') ,
            'cpfcnpj' => fake()->numerify('###########'),
            'telefone' => fake()->phoneNumber(),
            'cep' => fake()->numerify('#####-###'),
            'rua' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'bairro' => fake()->secondaryAddress(),
            'cidade' => fake()->city(),
            'estado' => fake()->stateAbbr(),
            'restaurante' => null,
            'logo' => null,
            'mensagem' => 'Olá, mundo!'
        ];
    }
}
