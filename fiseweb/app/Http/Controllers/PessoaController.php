<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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
            
            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage -> extension();
                $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImage->move(public_path('img/fotos_perfil'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["image"] =  $imageName;
            }


           Pessoa::create($dados);
            //return redirect()->action([PessoaController::class,'create']);
            return redirect('/') -> with('msg',"Cadastro criado com sucesso!");
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
        // $cadastro = Pessoa::where('user_id',auth()->user()->id)->first();
        // // var_dump($cadastro);
        // if(isset($cadastro))
        //     return view('pessoa.update',['cadastro'=>$cadastro]);
        // else
        //     return view('pessoa.create');
    }

    public function update(Request $request)
    {
        $id = auth()->user()->id;

        try{
            $pessoas = new Pessoa();
            $dados = $request->only($pessoas->getFillable());

            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage -> extension();
                $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImage->move(public_path('img/fotos_perfil'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["image"] =  $imageName;
            }

            Pessoa::whereId($id)->update($dados);
            return redirect("/perfil?id=$id") -> with('msg',"Cadastro Pessoal Alterado com sucesso!");
            // return redirect()->action([ProdutoController::class, "index"])
            //     ->with("resposta", "Registro alterado");
        } catch (\Exception $e){
            // return redirect()->action([ProdutoController::class, "index"])
            //     ->with("resposta", "Erro ao alterar");
            return redirect("/perfil?id=$id") -> with('msg',"Erro ao alterar perfil pessoal! $e");
        }
    }
    public function show()
    {
        
    }

}
