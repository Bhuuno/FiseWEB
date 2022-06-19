<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use resources\views;

class PessoaController extends Controller
{
    public function store(Request $request)
    {
        try{
            $pessoas = new Pessoa();

            // INSERE O ID DO USUÁRIO NA CHAVE ESTRANGEIRA
            $request["user_id"] = auth()->user()->id;

            $dados = $request
                ->only($pessoas->getFillable());
            Pessoa::create($dados);
            //return redirect()->action([PessoaController::class,'create']);
            return redirect('/') -> with('msg','Cadastro criado com sucesso!');
        }
        catch(\Exception $e){
            echo"Erro ao inserir! $e";
        }
        
    }

    // public function index()
    // {
    //     //realizar a busca do produto
    //     $search = request('search');
    //     if($search){
    //         $events = Event::where([
    //             ['title', 'like', '%'.$search.'%']
    //         ])->get();
    //     }else{
    //         $events = Event::all();
    //     }

    //     return view('welcome',['events' => $events, 'search'=> $search]);
    // }

    public function create()
    {
        $cadastro = Pessoa::findOrFail(auth()->user()->id);
        return view('pessoa.create',['cadastro'=>$cadastro]);
    }
}
