<?php

namespace App\Http\Controllers;

use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Response;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Factory;

class DownloadController extends Controller
{
    private $autenticacao;
    private $firestore;
    private $storage;

    public function __construct()
    {
        $contaServico = json_decode(file_get_contents(base_path(env('FIREBASE_CREDENTIALS'))), true);

        $this->autenticacao = (new Factory)->withServiceAccount($contaServico)->createAuth();
        $this->firestore = (new Factory)->withServiceAccount($contaServico)->createFirestore()->database();
        $this->storage = (new Factory)->withServiceAccount($contaServico)->createStorage();
    }

    public function mostrarDownload()
    {
        return view("pages.download");
    }

    public function emailExistente(Request $requisicao)
    {
        $email = $requisicao->input('email');

        try {
            $emailExists = $this->autenticacao->getUserByEmail($email);
            if ($emailExists) {
                return Response::json(data: ['message' => 'Usuário já cadastrado'], status: 400);
            }
        } catch (FirebaseException) { return Response::json(status: 500); }

        return Response::json(status: 204);
    }

    public function cadastrarFBAuth(Request $requisicao)
    {
        $tipo = $requisicao->input("tipo");
        $nome = $requisicao->input("nome");
        $email = $requisicao->input("email");
        $senha = $requisicao->input("senha");
        $cpfcnpj = $requisicao->input("cpfcnpj");
        $telefone = $requisicao->input("telefone");
        $rua = $requisicao->input("rua");
        $numero = $requisicao->input("numero");
        $bairro = $requisicao->input("bairro");
        $cidade = $requisicao->input("cidade");
        $estado = $requisicao->input("estado");
        $restaurante = $requisicao->input("restaurante");
        $logo = $requisicao->file('logo');
        $mensagem = $requisicao->input("mensagem");

        define('BOOLEANO', 'in:users,parceiros|');
        define('CARACTERE', 'string|');
        define('NUMERO', 'integer|');
        define('OPCIONAL', 'nullable|');
        define('OBRIGATORIO', 'required|');
        define('UNICO', 'unique:downloads,');
        if ($tipo === "users") {
            define('CPFCNPJ', '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/');
        } elseif ($tipo === "parceiros") {
            define('CPFCNPJ', '/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/');
        }
        define('TELEFONE', '/^\(\d{2}\) \d{4,5}\-\d{4}$/');
        define('MIN', 'min:');
        define('MAX', 'max:');

        $erro = [
            'tipo.required' => 'Selecione se você é um cliente ou parceiro',
            'email.unique' => 'E-mail existente, pode fazer o login no app ou altere sua senha',
            'senha.min' => 'Escolha uma senha mais forte',
            'cpfcnpj.unique' => 'CPF/CNPJ já cadastrado no sistema',
            'telefone.unique' => 'Telefone já cadastrado no sistema',
            'cpfcnpj.min' => 'CPF/CNPJ menor que esperado',
            'telefone.min' => 'Telefone menor que esperado',
            'cpfcnpj.max' => 'CPF/CNPJ maior que esperado',
            'telefone.max' => 'Telefone maior que esperado',
            'cpfcnpj.regex' => 'Redigite seu CPF/CNPJ',
            'telefone.regex' => 'Redigite seu Telefone inválido',
            'estado.min' => 'Digite o estado corretamente',
            'estado.max' => 'Digite o estado corretamente'
        ];

        try {
            $validacao = $requisicao->validate([
            'tipo' => BOOLEANO . OBRIGATORIO,
            'nome' => CARACTERE . OBRIGATORIO,
            'email' => 'email|' . OBRIGATORIO . UNICO . 'email',
            'senha' => CARACTERE . OBRIGATORIO . MIN . '6',
            'confirmarSenha' => CARACTERE . OBRIGATORIO . 'same:senha',
            'cpfcnpj' => CARACTERE . OBRIGATORIO . UNICO . 'cpfcnpj|' . MIN . '14|' . MAX . '18|regex:' . CPFCNPJ,
            'telefone' => CARACTERE . OBRIGATORIO . UNICO . 'telefone|' . MIN . '15|' . MAX . '15|regex:' . TELEFONE,
            'rua' => CARACTERE . OBRIGATORIO,
            'numero' => NUMERO . OBRIGATORIO,
            'bairro' => CARACTERE . OBRIGATORIO,
            'cidade' => CARACTERE . OBRIGATORIO,
            'estado' => CARACTERE . OBRIGATORIO . MIN . '2|' . MAX . '2',
            'restaurante' => CARACTERE . OPCIONAL,
            'logo' => 'file|' . OPCIONAL . 'mimes:jpeg,png,jpg,gif,svg|' . MAX . '2048',
            'mensagem' => CARACTERE . OPCIONAL
            ], $erro);

            if ($logo !== null) {
                $nmArquivo = time() . '_'. $logo->getClientOriginalName();
                $pasta = $logo->getPathName();
                $armazenamento = $this->storage->getBucket();
                $caminho = 'logos/' . $nmArquivo;
                $armazenamento->upload(fopen($pasta, 'r'), ['name' => $caminho]);
                $referencia = $armazenamento->object($caminho);
                $urlImg = $referencia->signedUrl(new \DateTime('+1 year'));
            }
    
            $usuarioCriado = $this->autenticacao->createUserWithEmailAndPassword($email, $senha);
            $this->firestore->collection($tipo)->document($usuarioCriado->uid)->set([
                ($tipo === 'parceiros' ? 'responsavel' : 'nome') => $nome,
                'email' => $email,
                ($tipo === 'parceiros' ? 'cnpj' : 'cpf') => $cpfcnpj,
                'telefone' => $telefone,
                'rua' => $rua,
                'numero' => $numero,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'estado' => $estado,
                'restaurante' => $tipo === 'parceiros' ? $restaurante : null,
                'logo' => $tipo === 'parceiros' ? $urlImg : null,
                'mensagem' => $mensagem
            ]);

            $retorno = 'Sucesso! Pode fazer o login rápido no nosso app';
        } catch (FirebaseException $e) {
            if ($e->getMessage() === "The email address is already in use by another account.") {
                $retorno = "E-Mail já está em uso";
            } else { $retorno = "Erro: {$e->getMessage()}"; }
        }

        Download::create($validacao);

        return view("pages.download", compact('retorno'));
    }
}
