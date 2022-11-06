<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_user_id',
        'id_prestador',
        'tipo',
        'status',
        'pergunta',
        'resposta'];    

}
