<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PessoaController;
use Illuminate\Notifications\Notifiable;


class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
    'nome',
    'user_id',
    'rg',
    'cpf',
    'data_nascimento',
    'email',
    'celular',
    'estado_civil',
    'celular',
    'endereco',
    'numero',
    'cidade',
    'cep',
    'image'];

    public function user(){
        return $this->belongsTo(Users::class);
    }
}
