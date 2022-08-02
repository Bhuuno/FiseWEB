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

    public function grafico()
    {
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
            date_format(created_at, '%d/%m/%Y') AS data
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
