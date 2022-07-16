<?php

namespace App\Http\Controllers;
use App\Models\User;
use resources\views;
use App\Models\Prestador;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PessoaController;

class PrestadorController extends Controller
{
    public function create()
    {
        $cadastro = Prestador::where('user_id',auth()->user()->id)->first();
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
    public function profile($id)
    {
        $prestador=DB::table('prestadors')
        ->where([['prestadors.user_id', $id]])
        ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
        ->select('pessoas.nome','pessoas.email','pessoas.image','prestadors.celular','prestadors.profissao','prestadors.experiencia','prestadors.created_at',
                'prestadors.especialidade','prestadors.celular','prestadors.informacao','prestadors.sobre','prestadors.razao_social','prestadors.telefone'
                ,'prestadors.endereco','prestadors.user_id')
        ->get();
        return view('prestador.perfil',compact('prestador'));
    }
}
