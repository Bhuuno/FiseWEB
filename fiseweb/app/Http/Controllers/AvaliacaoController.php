<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\avaliacao;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\Avaliacao as ModelAvaliacao;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        //pega o nivel do usuário
        $role = auth()->user()->role;

        $perfil=DB::select("SELECT pr.*, ps.nome as nome_prestador,
        pr.profissao as profissao, pr.image as imagem
        FROM prestadors as pr 
        INNER JOIN pessoas as ps on ps.user_id = pr.user_id
        WHERE pr.user_id = $id");


        $comentario=DB::select("SELECT a.*, p.nome as nome_cliente, p.image as imagem
        FROM prestadors as pr
        INNER JOIN avaliacaos AS a ON a.prestador_id = pr.id
        INNER JOIN pessoas AS p ON p.id = a.pessoa_id
        WHERE pr.user_id = $id
        ORDER by a.created_at desc");    

        //esse esta errado tem que verificar
        // $comentario=DB::select("
        // SELECT p.nome as nome_cliente, a.comentario as comentario, ps.nome as nome_prestador,
        //  pr.profissao as profissao, a.avaliacao as avaliacao, ps.image as imagem, a.created_at,
        //  a.avaliacao
        // FROM `avaliacaos` as a 
        // INNER JOIN pessoas as p on p.id = a.pessoa_id
        // INNER JOIN prestadors as pr on pr.id = a.prestador_id
        // INNER JOIN pessoas as ps on ps.id = pr.id
        // WHERE a.user_id  = 3
        // ORDER by created_at DESC");
        
        return view('avaliacao.avaliacao_perfil',compact('perfil','comentario','id','role'));
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
    public function store()//Request $request
    {
        //PEGA O ID DO LOGIN DO CLIENTE E BUSCA O ID DO PERFIL
        $user = auth()->user()->id;
        $id = $_GET['id_prestador'];

        $id_pessoa = DB::select("SELECT id as id from pessoas WHERE user_id = $user");
        $id_prestador = DB::select("SELECT id as id from prestadors WHERE user_id = $id");

        $id_p = intval($id_pessoa[0]->id);
        $id_pr = intval($id_prestador[0]->id);

        
        // var_dump(intval($id_pessoa[0]->id),$id_prestador);exit();

        //VERIFICA SE JÁ POSSUI AVALIAÇÃO
        $avaliacao = DB::select("SELECT 
                                    count(*) as avaliacao 
                                FROM 
                                    `avaliacaos` 
                                WHERE 
                                    pessoa_id = $id_p
                                    and prestador_id = $id_pr");

        if(intval($avaliacao[0]->avaliacao) > 0)
        {
            $nota = intval($_GET['nota']);
            $comentario = strval($_GET['comentario']);
            DB::select("UPDATE avaliacaos SET comentario = '$comentario', avaliacao = $nota  WHERE prestador_id = $id_pr and pessoa_id = $id_p;");
        }
        else
        {
            // GRAVA O COMENTARIO NA TABELA DE DADOS "AVALIACAOS"
            $avaliacao_prestador = new ModelAvaliacao(); 
            $avaliacao_prestador->pessoa_id = $id_pessoa[0]->id;
            $avaliacao_prestador->prestador_id = $id_prestador[0]->id;
            $avaliacao_prestador->comentario = strval($_GET['comentario']);
            $avaliacao_prestador->avaliacao = $_GET['nota'];

            $avaliacao_prestador->save();
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
    public function media()
    {
        //PEGA O ID POR GET
        $id = $_GET['id'];

        //CALCULA A MEDIA
        $media=DB::select("SELECT 
            sum(avaliacao) as total_nota, 
            COUNT(avaliacao) as qtde_avaliacao 
        FROM 
            `avaliacaos` 
        WHERE 
            prestador_id = (SELECT id from prestadors WHERE user_id = '$id')");

        return json_encode($media);
    }
}
