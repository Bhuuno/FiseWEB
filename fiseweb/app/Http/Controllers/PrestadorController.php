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
        // $cadastro = Prestador::where('user_id',auth()->user()->id)->first();
        // if(isset($cadastro))
        //     return view('prestador.update',['cadastro'=>$cadastro]);
        // else
        //     return view('prestador.create');
    }
    
    public function store(Request $request)
    {
        try{
            $prestadors = new Prestador();

            $id= auth()->user()->id;

            // INSERE O ID DO USUÁRIO NA CHAVE ESTRANGEIRA
            $request["user_id"] = auth()->user()->id;

            $request["status"] = 1;

            $dados = $request
                ->only($prestadors->getFillable());

            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage -> extension();
                $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImage->move(public_path('img/fotos_perfil'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["image"] =  $imageName;
            }

            // Grava dados na tabela
            Prestador::create($dados);

            // Perquisa o nivel do usuário
            $nivel = DB::select("SELECT * FROM users WHERE id = $id");

            //Atualiza o nivel do usuario
            if($nivel[0]->role == 'pessoal')
                DB::select("UPDATE users set role = 'prestador' WHERE id = $id");

            return redirect("/perfil?id=$id") -> with('msg',"cadastro criado");
        }
        catch(\Exception $e){

            // CASO ESTEJA PROCURANDO ERRO USE O EXEMPLO ABAIXO
            // echo("Erro: $e");
            return redirect("/perfil?id=$id") -> with('msg',"erro");
        }
    }
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        try{
            
            $prestador = new Prestador();
            
            $dados = $request->only($prestador->getFillable());
            
            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage -> extension();
                $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImage->move(public_path('img/fotos_perfil'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["image"] =  $imageName;
            }

            //atualiza tabela
            Prestador::where('user_id',$id)->update($dados);


            return redirect("/perfil?id=$id") -> with('msg',"cadastro alterado");

        } catch (\Exception $e){

            // CASO ESTEJA PROCURANDO ERRO USE O EXEMPLO ABAIXO
            // echo("Erro: $e");
            return redirect("/perfil?id=$id") -> with('msg',"erro");
        }
    }
    // RETORNA AS INFORMAÇÕES NA TELA
    public function profile($id)
    {
        $prestador=DB::table('prestadors')
        ->where([['prestadors.user_id', $id]])
        ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
        ->select('pessoas.*','prestadors.*')
        ->get();
        return view('prestador.perfil',compact('prestador','id'));
    }
}
