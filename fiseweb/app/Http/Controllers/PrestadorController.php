<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Prestador;
use Illuminate\Http\Request;
use resources\views;

class PrestadorController extends Controller
{
    public function create()
    {
        $cadastro = Prestador::find(auth()->user()->id);
        // if(isset($cadastro))
        //     return view('prestador.update',['cadastro'=>$cadastro]);
        // else
            return view('prestador.create');
    }
    public function store(Request $request)
    {
        try{
            $prestadors = new Prestador();

            // INSERE O ID DO USUÁRIO NA CHAVE ESTRANGEIRA
            $request["user_id"] = auth()->user()->id;

            $dados = $request
                ->only($prestadors->getFillable());
            Prestador::create($dados);
            //return redirect()->action([PessoaController::class,'create']);
            return redirect('/') -> with('msg','Cadastro criado com sucesso!');
        }
        catch(\Exception $e){
            echo"Erro ao inserir! $e";
        }
        
    }
    
}
