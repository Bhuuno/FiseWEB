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
            $perguntas->visualizacao_pergunta = 0;
            $perguntas->visualizacao_resposta = 0;
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
                                                    WHERE p.pessoa_user_id = $id_prestador and status = 1 and p.tipo = 0 and visualizacao_resposta <= 0) as respondido,
                                        (SELECT count(*) FROM perguntas as p
                                                    WHERE p.id_prestador = $id_prestador and status = 0 and tipo = 0) as perguntas;");

            // var_dump($dados);exit();

            return json_encode($notificacao);
        }
        catch(\Exception $e){
            return false;
        }
    }


    // NOME DE QUEM FEZ AS PERGUNTAS
    public function nomes_notificacao_perguntas()
    {
        $id_prestador = auth()->user()->id;
        try{
           
            //RETORNA APENAS NOMES
            $nomes = DB::select("SELECT DISTINCT
                                                pe.nome,
                                                pe.user_id
                                            FROM
                                                perguntas AS p
                                            INNER JOIN
                                                prestadors AS pr ON pr.user_id = p.id_prestador
                                            INNER JOIN
                                                pessoas AS pe ON pe.user_id = p.pessoa_user_id
                                            WHERE
                                                p.id_prestador = $id_prestador
                                                AND p.status = 0
                                                AND p.tipo = 0;");


            return json_encode($nomes);
        }
        catch(\Exception $e){
            return false;
        }
    }


    // NOME DE QUEM RESPONDEU
    public function nomes_notificacao_respostas()
    {
        $id_prestador = auth()->user()->id;
        try{
           
            //RETORNA APENAS NOMES
            $nomes = DB::select("SELECT DISTINCT
                                            ps.user_id,
                                            ps.nome
                                        FROM 
                                            perguntas as p
                                        INNER JOIN
                                            pessoas AS ps ON ps.user_id = p.id_prestador 
                                        WHERE
                                            p.pessoa_user_id = $id_prestador
                                            AND p.status = 1 
                                            AND p.visualizacao_resposta <= 0;");


            return json_encode($nomes);
        }
        catch(\Exception $e){
            return false;
        }
    }


    public function visualizacao_resposta()
    {
        $id_prestador = $_GET['id_prestador'];
        $id_pessoa = auth()->user()->id;

        try{
            $atualizar = DB::select("UPDATE perguntas SET visualizacao_resposta = visualizacao_resposta + 1 WHERE id_prestador =$id_prestador AND pessoa_user_id = $id_pessoa AND status = 1 AND id_pergunta is null;");
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
            $perguntas->visualizacao_pergunta = 0;
            $perguntas->visualizacao_resposta = 0;
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
