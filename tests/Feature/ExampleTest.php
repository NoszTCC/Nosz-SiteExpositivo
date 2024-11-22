<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PrincipalController;
use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_Envio_de_EMails()
    {
        // Cria um registro de teste usando a factory
        $seed = Principal::factory()->create();

        // Verifica se o registro está presente no banco
        $this->assertDatabaseHas('principals', [
            'nome' => $seed->nome,
            'email' => $seed->email,
            'mensagem' => $seed->mensagem
        ]);

        // Corrige o nome do campo para 'mensagem'
        $request = new Request([
            'nome' => 'Teste nome',
            'email' => 'teste@exemplo.com',
            'mensagem' => 'Olá,'
        ]);

        Mail::fake();

        // Executa o método enviarEMail
        $controller = new PrincipalController;
        $envio = $controller->enviarEMail($request);

        // Verifica o redirecionamento e a sessão
        $envio->assertRedirect('/#contatos');
        $envio->assertSessionHas('retorno', 'Mensagem enviada com sucesso');
    }
}
