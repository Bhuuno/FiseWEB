<?php

namespace App\Http\Controllers;

use App\Models\User;
use resources\views;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //EXIBE A PAGINA INICIAL
    public function index($id)
    {
        $galeria = DB::select("SELECT * FROM `galerias` WHERE user_id = $id");

        return view('galeria.galeria',compact('id','galeria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //GRAVA A IMAGEM NA TABELA "GALERIAS"
    public function store(Request $request)
    {
        $id_user = auth()->user()->id;
        try{
            $galeria = new Galeria();

            // INSERE O ID DO USUÁRIO NA CHAVE ESTRANGEIRA
            $request["user_id"] = $id_user;
            $dados = $request->only($galeria->getFillable());

            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImagem = $request->image;
                $extension = $requestImagem -> extension();
                $imageName = md5($requestImagem -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImagem->move(public_path('img/galeria'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["image"] =  $imageName;
                $dados["status"] = true;
            }

            Galeria::create($dados);
            // return redirect()->action([GaleriaController::class,'index']);

            return redirect("/dashboard/galeria/$id_user?id=$id_user");
            // return redirect('/') -> with('msg',"Cadastro criado com sucesso!");
        }
        catch(\Exception $e){
            echo"Erro ao inserir! $e";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    //RETORNA A IMAGEM PARA MODAL
    public function consulta_foto()
    {   
        $id = $_GET['id'];
        $foto = DB::table('galerias')->find($id);
        return json_encode($foto);
    }

    //EXCLUI A IMAGEM 
    public function excluir_foto()
    {   
        $id = $_GET['id'];
        $foto = DB::table('galerias')->delete($id);
        return true;
    }
    //CONSULTA AS INFORMACOES DA IMAGEM QUE QUER ALTERAR
    public function editar_comentario()
    {   
        $id = $_GET['id'];
        $foto = DB::table('galerias')->find($id);
        return json_encode($foto);
    }

    //ALTERA COMENTARIO DA IMAGEM GALERIA
    public function atualizar_comentario($id)
    {   
        $id_user = auth()->user()->id;
        $comentario = $_GET['comentario_alteracao'];
        $foto = DB::select("UPDATE galerias SET comentario = '$comentario' WHERE id = $id;");

        return redirect("/dashboard/galeria/$id_user?id=$id_user");
    }
    //FAZ COM QUE A IMAGEM NÃO EXIBA
    public function nao_exibir()
    {
        $id = $_GET['id'];
        $foto = DB::select("UPDATE galerias SET status = 0 WHERE id = '$id';");
    }
    //FAZ COM QUE A IMAGEM EXIBA
    public function exibir()
    {
        $id = $_GET['id'];
        $foto = DB::select("UPDATE galerias SET status = 1 WHERE id = '$id';");
    }
}
