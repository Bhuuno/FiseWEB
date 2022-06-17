<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use resources\views;

class PessoaController extends Controller
{
    public function gravar(Request $request)
    {
        try{
            $pessoa = new Pessoa();
            $dados = $request->only($pessoa->getFillable());
            Pessoa::create($dados);
            return redirect()->action([PessoaController::class,'create']);
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
