<?php

namespace App\Http\Controllers;

use App\Models\Visualizacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisualizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    
    public function store()//Request $request
    {
        $visualizacao = new Visualizacao();
        $visualizacao->user_id = $_GET['cliente'];
        $visualizacao->prestador_id = $_GET['prestador'];   

        $visualizacao->save();
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
    public function dashboard()
    {
        //PEGA A DATA ATUAL MENOS 7 DIAS
        $semana = date('Y-m-d', strtotime("-7 days"));
        
        //PEGA A DATA ATUAL MENOS 1 MÊS
        $mensal = date('Y-m-d', strtotime("-30 days"));

        //PEGA O ID DO PRESTADOR
        $prestador = auth()->user()->id;

        var_dump($prestador);exit();

        //REALIZA A CONSULTA DO PRESTADOR
        $consulta = DB::select("SELECT
        COUNT(*) as semanal,
            (select COUNT(*)
            from 
                visualizacaos as v
            INNER JOIN 
                prestadors AS pr ON pr.user_id = '$prestador'
            WHERE 
                v.prestador_id = pr.user_id AND
                date(v.created_at) >= '$mensal' 
                LIMIT 30)as mensal,
                
            (select COUNT(*)
            from 
                visualizacaos as v
            INNER JOIN 
                prestadors AS pr ON pr.user_id = $prestador
            WHERE 
                v.prestador_id = pr.user_id)as total_visualizacao,
                
            (select COUNT(*)
            FROM 
                prestadors AS p
            INNER JOIN 
                avaliacaos as ava ON ava.prestador_id = p.id
            WHERE 
                user_id = $prestador)as total_avaliacoes,

            (SELECT COUNT(*) from galerias WHERE user_id = $prestador) as qtde_fotos,

            (select sum(av.avaliacao)/(SELECT COUNT(*)
            FROM 
                prestadors AS p
            INNER JOIN 
                avaliacaos as ava ON ava.prestador_id = p.id
            WHERE 
                user_id = $prestador)
            FROM 
                prestadors AS p 
            INNER JOIN avaliacaos AS av ON av.prestador_id = p.id
            WHERE 
                p.user_id = $prestador) as media
        from 
            visualizacaos AS v
        INNER JOIN 
            prestadors AS pr ON pr.user_id = $prestador
        WHERE 
            v.prestador_id = PR.user_id AND 
            date(v.created_at) >= '$semana';");

        return json_encode($consulta);
        
    }
    public function grafico()
    {
        //RECEBE DO DASHBOAD
        $prestador = auth()->user()->id;
        $dias = $_GET['dias'];
        $data = $_GET['data'];

        if(empty($data))
        {
            $data = date('Y-m-d');
            $data = date('Y-m-d', strtotime("-$dias days"));
            // var_dump($data);
        }

        $grafico = DB::select("SELECT 
            COUNT(v.prestador_id) AS quantidade,
            date_format(v.created_at, '%d/%m/%Y') AS data,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '0') AS NOTA0,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '1') AS NOTA1,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '2') AS NOTA2,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '3') AS NOTA3,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '4') AS NOTA4,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = pr.id AND avaliacao = '5') AS NOTA5
        FROM 
            visualizacaos as v
        INNER JOIN 
        	prestadors AS pr ON pr.user_id = '$prestador' 
        WHERE 
            v.prestador_id = pr.id AND
            date(v.created_at) >= '$data' 
            GROUP BY DATA, pr.id
            LIMIT $dias");

       return json_encode($grafico);
    }
}
