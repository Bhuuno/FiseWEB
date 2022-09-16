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

        
        $perfil=DB::select("SELECT ps.nome as nome_prestador,
        pr.profissao as profissao, ps.image as imagem
        FROM prestadors as pr 
        INNER JOIN pessoas as ps on ps.id = pr.id
        WHERE pr.id = $id");

        $comentario=DB::select("
        SELECT p.nome as nome_cliente, a.comentario as comentario, ps.nome as nome_prestador,
         pr.profissao as profissao, a.avaliacao as avaliacao, ps.image as imagem, a.created_at,
         a.avaliacao
        FROM `avaliacaos` as a 
        INNER JOIN pessoas as p on p.id = a.pessoa_id
        INNER JOIN prestadors as pr on pr.id = a.prestador_id
        INNER JOIN pessoas as ps on ps.id = pr.id
        WHERE a.prestador_id = $id
        ORDER by created_at DESC");
        
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
        $id_pessoa = DB::select("SELECT id as id from pessoas WHERE user_id = $user");

        //GRAVA O COMENTARIO NA TABELA DE DADOS "AVALIACAOS"
        $avaliacao_prestador = new ModelAvaliacao(); 
        $avaliacao_prestador->pessoa_id = $id_pessoa[0]->id;
        $avaliacao_prestador->prestador_id = $_GET['id'];
        $avaliacao_prestador->comentario = $_GET['comentario'];
        $avaliacao_prestador->avaliacao = $_GET['nota'];

        $avaliacao_prestador->save();
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
        $id_prestador = $_GET['id'];

        $media=DB::select("SELECT 
            sum(avaliacao) as total_nota, 
            COUNT(avaliacao) as qtde_avaliacao 
        FROM `avaliacaos` 
        WHERE prestador_id = '$id_prestador'");

        return json_encode($media);
    }
}
