<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendGrid;
use App\Models\Principal;
use Illuminate\Http\Request;
use Exception;

class PrincipalController extends Controller
{
    public function mostrarPrincipal()
    {
        return view("pages.index");
    }

    public function enviarEMail(Request $request)
    {
        try {
            $contatos = $request->validate([
                'nome' => 'required|string|max:150',
                'email' => 'required|email|max:255',
                'mensagem' => 'required|string'
            ]);

            Mail::to('nosztcc@gmail.com')
                ->send(new SendGrid($contatos['nome'], $contatos['email'], $contatos['mensagem']));

            $retorno = "Mensagem enviada com sucesso";
        } catch (Exception $e) {
            if ($e->getMessage() === "The mensagem field is required.") {
                $retorno = "Resta preencher um campo";
            } else {
                $retorno = "Houve um erro no envio do e-mail: {$e->getMessage()}";
            }
        }

        Principal::create($contatos);

        return redirect()->to('/#contatos')->with('retorno', $retorno);
    }
}
