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
        'user_id',
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
        'address',
        'numero',
        'city',
        'cep',
        'status',
        'image',

        // Redes Sociais
        'website',
        'github',
        'instagram',
        'twitter',
        'facebook',

        // SOFTSKILL
        'primeiroSoftskill',
        'segundoSoftskill',
        'terceiroSoftskill',
        'quartoSoftskill',
        'quintoSoftskill',
        'porcentagemPrimeiroSoftskill',
        'porcentagemSegundoSoftskill',
        'porcentagemTerceiroSoftskill',
        'porcentagemQuartoSoftskill',
        'porcentagemQuintoSoftskill',

        // Habilidade
        'primeiroHabilidade',
        'segundoHabilidade',
        'terceiroHabilidade',
        'quartoHabilidade',
        'quintoHabilidade',
        'porcentagemPrimeiroHabilidade',
        'porcentagemSegundoHabilidade',
        'porcentagemTerceiroHabilidade',
        'porcentagemQuartoHabilidade',
        'porcentagemQuintoHabilidade',
        ];
        public function user(){
            return $this->belongsTo(Users::class);
        }
}
