<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Principal;

// php artisan test --filter=ExampleTest
class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // php artisan test --filter=ExampleTest::test_Envio_de_Dados
    public function test_Envio_de_Dados()
    {
        $seed = Principal::factory()->create();

        $this->assertDatabaseHas('principals', [
            'nome' => $seed->nome,
            'email' => $seed->email,
            'mensagem' => $seed->mensagem
        ]);
    }

    public function test_Testes_de_Testes()
    {
        $a = 'a';
        $b = 'a';

        $this->assertEquals($a, $b, "Não é o número pedido");
    }
}
