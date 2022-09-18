<?php

namespace App\Http\Controllers;
use App\Models\User;
use resources\views;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

            $id = auth()->user()->id;

            // Perquisa o nivel do usuário
            $nivel = DB::select("SELECT * FROM users WHERE id = $id");

            //Atualiza o nivel do usuario
            if($nivel[0]->role == 'cliente')
                DB::select("UPDATE users set role = 'pessoal' WHERE id = $id");

            return redirect("/perfil?id=$id") -> with('msg',"cadastro criado");
        }
        catch(\Exception $e){
            return redirect("/perfil?id=$id") -> with('msg',"erro");
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
            return redirect("/perfil?id=$id") -> with('msg',"cadastro alterado");

        } catch (\Exception $e){
            return redirect("/perfil?id=$id") -> with('msg',"erro");
        }
    }
    public function show()
    {
        
    }

}
