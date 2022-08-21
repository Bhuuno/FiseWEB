<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('galeria.galeria',compact('id'));
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
    public function store(Request $request)
    {
        try{
            $galeria = new Galeria();

            // INSERE O ID DO USUÁRIO NA CHAVE ESTRANGEIRA
            $request["user_id"] = auth()->user()->id;
            $dados = $request
                ->only($galeria->getFillable());
            
            //CRIA NOME CRIPTOGRAFIA PARA IMAGEM
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImagem = $request->imagem;
                $extension = $requestImagem -> extension();
                $imageName = md5($requestImagem -> getClientOriginalName() . strtotime("now") . "." . $extension);
                $requestImagem->move(public_path('img/fotos_perfil'), $imageName);

                // TEM QUE COLOCAR O NOME DA IMAGEM ASSIM NO BANCO
                $dados["imagem"] =  $imageName;
                $dados["status"] = true;
                $dados["curtidas"] = 0;
            }


           Galeria::create($dados);
            //return redirect()->action([PessoaController::class,'create']);
            echo "Garvado1";
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
        //
    }
}
