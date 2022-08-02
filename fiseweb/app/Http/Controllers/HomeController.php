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

            $prestadores = DB::select("WITH prestadores as (select pr.id,p.user_id,p.nome,p.image,pr.celular,pr.profissao,pr.created_at,pr.especialidade,pr.experiencia
            from prestadors as pr
            join pessoas as p on p.user_id = pr.user_id
            order by p.nome)
            
            SELECT ps.*,(select SUM(a.avaliacao) as total from avaliacaos as a where a.prestador_id = ps.user_id) as total,
            (select COUNT(a.avaliacao) as quantidade from avaliacaos as a where a.prestador_id = ps.user_id) as quantidade 
            FROM prestadores as ps where ps.nome like'%$search%';");
            // $prestadores=DB::table('prestadors')
            //     ->where([['nome', 'like', '%'.$search.'%']])
            //     ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
            //     ->select('prestadors.user_id','pessoas.nome','pessoas.image','prestadors.celular','prestadors.profissao','prestadors.experiencia','prestadors.created_at',
            //             'prestadors.especialidade','prestadors.celular','prestadors.id')
            //     ->orderBy('nome')
            //     ->paginate();
        }
        else{
            $prestadores = DB::select("WITH prestadores as (select pr.id,p.user_id,p.nome,p.image,pr.celular,pr.profissao,pr.created_at,pr.especialidade,pr.experiencia
            from prestadors as pr
            join pessoas as p on p.user_id = pr.user_id
            order by p.nome)
            
            SELECT ps.*,(select SUM(a.avaliacao) as total from avaliacaos as a where a.prestador_id = ps.user_id) as total,
            (select COUNT(a.avaliacao) as quantidade from avaliacaos as a where a.prestador_id = ps.user_id) as quantidade 
            FROM prestadores as ps;");

            // $prestadores = DB::table('prestadors')
            // ->join('pessoas', 'pessoas.user_id', '=', 'prestadors.user_id')
            // ->select('prestadors.user_id','pessoas.nome','pessoas.image','prestadors.celular','prestadors.profissao','prestadors.created_at',
            //         'prestadors.especialidade','prestadors.celular','prestadors.experiencia','prestadors.id')
            // ->orderBy('nome')
            // ->paginate(5);

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
