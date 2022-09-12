<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Prestador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ELE VERIFICA SE O USUÁRIO JÁ POSSUI CADASTRO PESSOA/PRESTADOR
        $cadastro_pessoa = Pessoa::where('user_id',auth()->user()->id)->first();
        $cadastro_prestador = Prestador::where('user_id',auth()->user()->id)->first();

        // // var_dump($casdastro_prestador, $cadastro_pessoa);
         

        // if(empty($cadastro_pessoa) && empty($casdastro_prestador))
        // {
        //     //Entra aqui quando usuário já possui cadastro 
        //     return view('perfil.perfil');
        // }   
        // else
        //     //Se não possui
            return view('perfil.perfil',['pessoa'=>$cadastro_pessoa,'prestador'=>$cadastro_prestador]);
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
