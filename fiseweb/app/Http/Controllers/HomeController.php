<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pessoa;
use App\Models\Prestador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        if($search){

            $prestadores=DB::table('prestadors')
                ->where([['nome', 'like', '%'.$search.'%']])
                ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
                ->select('pessoas.nome','pessoas.image','prestadors.celular','prestadors.profissao',
                        'prestadors.especialidade','prestadors.celular')
                ->orderBy('nome')
                ->get();
        }
        else{
            $prestadores = DB::table('prestadors')
                ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
                ->select('pessoas.nome','pessoas.image','prestadors.celular','prestadors.profissao',
                        'prestadors.especialidade','prestadors.celular')
                ->orderBy('nome')
                ->get();
        }   



        return view('home',compact('prestadores','search'));
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
