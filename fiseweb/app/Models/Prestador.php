<?php

namespace App\Models;

use App\Models\Pessoa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestador extends Model
{
    use HasFactory;

    protected $fillable = [
        'razao_social',
        'cnpj',
        'data_constituicao',
        'email',
        'profissao',
        'especialidade',
        'informacao',
        'sobre',
        'experiencia',
        'celular',
        'telefone',
        'endereco',
        'numero',
        'cidade',
        'cep',
        ];
}
