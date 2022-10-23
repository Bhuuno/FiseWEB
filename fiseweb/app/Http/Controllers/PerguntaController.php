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
        $id_prestador = $_GET['id_prestador'];
        $id_pessoa = $_GET['id_pessoa'];
        $pergunta = $_GET['pergunta'];
        try{
            //GRAVA PERGUNTA NA TABELA
            $perguntas = DB::select("INSERT into `perguntas` (pergunta,pessoa_user_id,id_prestador,resposta,status,tipo) VALUES('$pergunta',$id_pessoa,$id_prestador,'',0,0)");
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
        $perguntas=DB::select("SELECT * FROM `perguntas` WHERE id_prestador = $id");

        
        return view('perfil.perfil',compact('perguntas'));        
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
