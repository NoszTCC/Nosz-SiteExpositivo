<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nome',
        'email',
        'senha',
        'cpfcnpj',
        'telefone',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'restaurante',
        'logo',
        'mensagem'
    ];
}
