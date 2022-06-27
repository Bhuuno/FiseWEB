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
        if(isset($cadastro))
            return view('prestador.update',['cadastro'=>$cadastro]);
        else
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
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        try{
            $pessoas = new Prestador();
            $dados = $request->only($pessoas->getFillable());
            Prestador::whereId($id)->update($dados);
            return redirect('/') -> with('msg',"Cadastro Alterado com sucesso! $id");
            // return redirect()->action([ProdutoController::class, "index"])
            //     ->with("resposta", "Registro alterado");
        } catch (\Exception $e){
            // return redirect()->action([ProdutoController::class, "index"])
            //     ->with("resposta", "Erro ao alterar");
            return redirect('/') -> with('msg',"Erro ao alterar! $e");
        }
    }
}
