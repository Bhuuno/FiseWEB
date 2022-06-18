<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use resources\views;

class PessoaController extends Controller
{
    public function store(Request $request)
    {
        try{
            $pessoas = new Pessoa();
            $dados = $request
                ->only($pessoas->getFillable());
            Pessoa::create($dados);
            // return redirect()->action([PessoaController::class,'create']);
            return redirect('/') -> with('msg','Evento criado com sucesso!');
        }
        catch(\Exception $e){
            echo"Erro ao inserir!";
        }
        
    }
    public function create()
    {
        return view('pessoa.create');
    }
}
