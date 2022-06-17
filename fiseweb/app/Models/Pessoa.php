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
    'rg',
    'cpf',
    'data_nsacimento',
    'email',
    'telefone',
    'estado_civil',
    'endereco',
    'numero',
    'cidade',
    'cep'];

    protected $id;
    protected $nome;
    protected $rg;
    protected $cpf;
    protected $endereco; 
    protected $email;
    protected $telefone;
    protected $data_nascimento;
    protected $estado_civil;
    
// //GET AND SET

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function setId($id)
//     {
//         $this->id = $id;

//         return $this;
//     }

//     public function getNome()
//     {
//         return $this->nome;
//     }

//     public function setNome($nome)
//     {
//         $this->nome = $nome;

//         return $this;
//     }

//     public function getRg()
//     {
//         return $this->rg;
//     }

//     public function setRg($rg)
//     {
//         $this->rg = $rg;

//         return $this;
//     }
    
//     public function getCpf()
//     {
//         return $this->cpf;
//     }

//     public function setCpf($cpf)
//     {
//         $this->cpf = $cpf;

//         return $this;
//     }

//     public function getEndereco()
//     {
//         return $this->endereco;
//     }

//     public function setEndereco($endereco)
//     {
//         $this->endereco = $endereco;

//         return $this;
//     }

//     public function getEmail()
//     {
//         return $this->email;
//     }

//     public function setEmail($email)
//     {
//         $this->email = $email;

//         return $this;
//     }

//     public function getTelefone()
//     {
//         return $this->telefone;
//     }

//     public function setTelefone($telefone)
//     {
//         $this->telefone = $telefone;

//         return $this;
//     }

//     public function getData_nascimento()
//     {
//         return $this->data_nascimento;
//     }

//     public function setData_nascimento($data_nascimento)
//     {
//         $this->data_nascimento = $data_nascimento;

//         return $this;
//     }

//     public function getEstado_civil()
//     {
//         return $this->estado_civil;
//     }

//     public function setEstado_civil($estado_civil)
//     {
//         $this->estado_civil = $estado_civil;

//         return $this;
//     }
// /////////////////////CONTRUTOR//////////////////////
//     public function __construct($id = "", $nome = "", $rg = "",$cpf = "", $endereco = "", $email = "", $telefone = "", $data_nascimento = "", $estado_civil = "")
//     {

//         $this->id = $id;
//         $this->nome = $nome;
//         $this->rg = $rg;
//         $this->cpf = $cpf;
//         $this->endereco = $endereco;
//         $this->email = $email;
//         $this->telefone = $telefone;
//         $this->data_nascimento = $data_nascimento;
//         $this->estado_civil = $estado_civil;
//     }
}
