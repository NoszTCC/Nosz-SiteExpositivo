<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGrid extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $email;
    public $mensagem;

    public function __construct($nome, $email, $mensagem)
    {
        $this->nome = $nome; $this->email = $email; $this->mensagem = $mensagem;
    }

    public function build()
    {
        return $this->view("pages.index")->from($this->email)->subject("De $this->nome: $this->mensagem");
    }
}
