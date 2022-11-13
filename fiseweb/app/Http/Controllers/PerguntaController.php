<?php

namespace App\Http\Controllers;

use App\Models\Perguntas;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerguntaController extends Controller
{
    //GRAVA A PERGUNTA PARA O PRESTADOR!
    public function gravar_pergunta()
    { 
        $perguntas = new Perguntas();
        $id_prestador = $_GET['id_prestador'];
        $id_pessoa = $_GET['id_pessoa'];
        $pergunta = $_GET['pergunta'];

        try{
            //GRAVA PERGUNTA NA TABELA
            $perguntas->pergunta = $pergunta;
            $perguntas->pessoa_user_id = $id_pessoa;
            $perguntas->id_prestador = $id_prestador;
            $perguntas->resposta = "";
            $perguntas->status = 0;
            $perguntas->visualizacao = 0;
            $perguntas->tipo = 0;

            $perguntas->save();
            
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }

    public function notificacao()
    {
        $id_prestador = auth()->user()->id;
        try{
            $notificacao = db::select("SELECT 
            (SELECT count(*) FROM perguntas as p 
                        WHERE p.pessoa_user_id = $id_prestador and status = 1 and p.tipo = 0 and visualizacao = 0) as respondido,
            (SELECT count(*) FROM perguntas as p
                        WHERE p.id_prestador = $id_prestador and status = 0 and visualizacao = 0) as perguntas;");

            return json_encode($notificacao);
        }
        catch(\Exception $e){
            return false;
        }
    }

    public function gravar_resposta()
    { 
        $perguntas = new Perguntas();
        $id_prestador = $_GET['id_prestador'];
        $id_pessoa = $_GET['id_pessoa'];
        $resposta = $_GET['resposta'];
        $id_pergunta = $_GET['id_pergunta'];
        
        try{
            //GRAVA RESPOSTA NA TABELA
            $perguntas->pergunta = "";
            $perguntas->pessoa_user_id = $id_pessoa;
            $perguntas->id_prestador = $id_prestador;
            $perguntas->id_pergunta = $id_pergunta;
            $perguntas->resposta = $resposta;
            $perguntas->status = 0;
            $perguntas->visualizacao = 0;
            $perguntas->tipo = 1;

            $perguntas->save();

            DB::select("UPDATE perguntas SET status = 1 where id = $id_pergunta");
            
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //       
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
        //
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
