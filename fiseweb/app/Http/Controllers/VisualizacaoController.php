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


        //REALIZA A CONSULTA DO PRESTADOR
        $consulta = DB::select("SELECT
        COUNT(*) as semanal,
        (select COUNT(*)
        from 
            visualizacaos
        WHERE 
            prestador_id = '$prestador' AND
            date(created_at) >= '$mensal' 
            LIMIT 30)as mensal,
        (select COUNT(*)
        from 
            visualizacaos
        WHERE 
            prestador_id = '$prestador')as total_visualizacao,
        (select COUNT(*)
        from 
            avaliacaos
        WHERE 
            prestador_id = '$prestador')as total_avaliacoes,
        (select sum(avaliacao)/(SELECT COUNT(*) from avaliacaos WHERE 
            prestador_id = '$prestador')
        from 
            avaliacaos
        WHERE 
            prestador_id = '$prestador')as media
    from 
        visualizacaos
    WHERE 
        prestador_id = '$prestador' AND
        date(created_at) >= '$semana';");

        return json_encode($consulta);
        
    }
    public function grafico()
    {
        //RECEBE DO DASHBOAD
        $prestador = $_GET['prestador'];
        $dias = $_GET['dias'];
        $data = $_GET['data'];

        if(empty($data))
        {
            $data = date('Y-m-d');
            $data = date('Y-m-d', strtotime("-$dias days"));
            // var_dump($data);
        }

        $grafico = DB::select("SELECT 
            COUNT(prestador_id) AS quantidade,
            date_format(created_at, '%d/%m/%Y') AS data,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '1') AS NOTA0,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '1') AS NOTA1,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '2') AS NOTA2,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '3') AS NOTA3,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '4') AS NOTA4,
            (SELECT COUNT(*) FROM avaliacaos WHERE prestador_id = '$prestador' AND avaliacao = '5') AS NOTA5
        FROM 
            visualizacaos 
        WHERE 
            prestador_id = '$prestador' AND
            date(created_at) >= '$data' 
            GROUP BY DATA
            LIMIT $dias");

       return json_encode($grafico);
    }
}
