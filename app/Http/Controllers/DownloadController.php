<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Response;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Hash;

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
                return Response::json(data: ['messagem' => 'Usuário já cadastrado'], status: 400);
            }
        } catch (FirebaseException) {
            return Response::json(status: 500);
        }

        return Response::json(status: 204);
    }

    public function cadastrarFBAuth(Request $requisicao)
    {
        $tipo = $requisicao->input('tipo');
        $logo = $requisicao->file('logo');
        $senha = $requisicao->input('senha');

        define('CARACTERE', 'string|');
        define('OPCIONAL', 'nullable|');
        define('OBRIGATORIO', 'required|');
        define('UNICO', 'unique:downloads,');
        define('FORMATACAO', 'regex:');
        if ($tipo === "users") {
            define('CPFCNPJ', '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/');
        } elseif ($tipo === "parceiros") {
            define('CPFCNPJ', '/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/');
        }
        define('TELEFONE', '/^\(\d{2}\) \d{4,5}\-\d{4}$/');
        define('MIN', 'min:');
        define('MAX', 'max:');
        define('TAMANHO', 'size:');

        $erro = [
            'tipo.required' => 'Selecione se você é um cliente ou parceiro',
            'email.unique' => 'E-mail existente, pode fazer o login no app ou altere sua senha',
            'senha.min' => 'Escolha uma senha mais forte',
            'confirmarSenha.same' => 'As senhas não coincidem',
            'cpfcnpj.unique' => 'CPF/CNPJ já cadastrado no sistema',
            'telefone.unique' => 'Telefone já cadastrado no sistema',
            'cpfcnpj.min' => 'CPF/CNPJ menor que esperado',
            'telefone.min' => 'Telefone menor que esperado',
            'cpfcnpj.max' => 'CPF/CNPJ maior que esperado',
            'telefone.max' => 'Telefone maior que esperado',
            'cpfcnpj.regex' => 'Redigite seu CPF/CNPJ',
            'telefone.regex' => 'Redigite seu Telefone',
            'cep.min' => 'CEP menor que esperado',
            'cep.max' => 'CEP maior que esperado',
            'numero.min' =>  'Número menor que esperado',
            'numero.max' =>  'Número maior que esperado',
            'estado.size' => 'Digite o estado corretamente',
            'logo.mimes' =>  'Escolha outro formato de imagem para a logo',
            'logo.max' => 'Nome de arquivo longo'
        ];

        try {
            $validacao = $requisicao->validate([
                'tipo' => CARACTERE . OBRIGATORIO . 'in:users,parceiros|',
                'nome' => CARACTERE . OBRIGATORIO,
                'email' => 'email|' . OBRIGATORIO . UNICO . 'email',
                'senha' => CARACTERE . OBRIGATORIO . MIN . '6',
                'confirmarSenha' => CARACTERE . OBRIGATORIO . 'same:senha',
                'cpfcnpj' => CARACTERE . OBRIGATORIO . UNICO . 'cpfcnpj|' . MIN . '14|' . MAX . '18|' .
                    FORMATACAO . CPFCNPJ,
                'telefone' => CARACTERE . OBRIGATORIO . UNICO . 'telefone|' . MIN . '15|' . MAX . '15|' .
                    FORMATACAO . TELEFONE,
                'cep' => CARACTERE . OBRIGATORIO . MIN . '8|' . MAX . '10',
                'rua' => CARACTERE . OBRIGATORIO,
                'numero' => 'integer|' . OBRIGATORIO . MIN . '1|' . 'max_digits: 5',
                'bairro' => CARACTERE . OBRIGATORIO,
                'cidade' => CARACTERE . OBRIGATORIO,
                'estado' => CARACTERE . OBRIGATORIO . TAMANHO . '2',
                'restaurante' => CARACTERE . OPCIONAL,
                'logo' => 'file|' . OPCIONAL . 'mimes:jpeg,png,jpg,gif,svg|' . MAX . '2048',
                'mensagem' => CARACTERE . OPCIONAL
            ], $erro);
            $validacao['senha'] = Hash::make($validacao['senha']);

            if ($logo !== null) {
                $nmArquivo = time() . '_' . $logo->getClientOriginalName();
                $pasta = $logo->getPathName();
                $armazenamento = $this->storage->getBucket();
                $caminho = 'logos/' . $nmArquivo;
                $armazenamento->upload(fopen($pasta, 'r'), ['name' => $caminho]);
                $referencia = $armazenamento->object($caminho);
                $urlImg = $referencia->signedUrl(new \DateTime('+1 year'));
            }

            $usuarioCriado = $this->autenticacao->createUserWithEmailAndPassword($validacao['email'], $senha);
            $this->firestore->collection($validacao['tipo'])->document($usuarioCriado->uid)->set([
                ($validacao['tipo'] === 'parceiros' ? 'responsavel' : 'nome') => $validacao['nome'],
                'email' => $validacao['email'],
                ($validacao['tipo'] === 'parceiros' ? 'cnpj' : 'cpf') => $validacao['cpfcnpj'],
                'telefone' => $validacao['telefone'],
                'cep' => $validacao['cep'],
                'rua' => $validacao['rua'],
                'numero' => $validacao['numero'],
                'bairro' => $validacao['bairro'],
                'cidade' => $validacao['cidade'],
                'estado' => $validacao['estado'],
                'restaurante' => $validacao['tipo'] === 'parceiros' ? $validacao['restaurante'] : null,
                'logo' => $validacao['tipo'] === 'parceiros' ? $urlImg : null,
                'mensagem' => $validacao['mensagem']
            ]);

            $retorno = 'Sucesso! Pode fazer o login rápido no nosso app';
        } catch (FirebaseException $e) {
            if ($e->getMessage() === "The email address is already in use by another account.") {
                $retorno = "E-mail existente, pode fazer o login no app ou altere sua senha";
            } else {
                $retorno = "Erro: {$e->getMessage()}";
            }
        }

        Download::create($validacao);

        return view("pages.download", compact('retorno'));
    }
}
