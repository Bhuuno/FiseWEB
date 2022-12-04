<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TritanopiaController extends Controller
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
        $id = auth()->user()->id; 

        $ativo = DB::select("SELECT count(*) as ativo FROM `tritanopias` WHERE user_id = $id");

        // cria caso o usuário nem tenha uasdo ainda
        if($ativo[0]->ativo == 0)
        {
            DB::select("INSERT INTO tritanopias (user_id,checked) VALUES($id,true);");
        }
        else{
            $checked = DB::select("SELECT * FROM `tritanopias` WHERE user_id = $id");

            // caso esteja desativado ele ativa tritanopia
            if($checked[0]->checked ==0)
                DB::select("UPDATE tritanopias SET checked=true WHERE user_id = $id;");
            //faz aocontrario
            else
                DB::select("UPDATE tritanopias SET checked=false WHERE user_id = $id;");

        }



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
    public function show()
    {
        $id = auth()->user()->id; 
        $ativo = DB::select("SELECT count(*) as ativo FROM `tritanopias` WHERE user_id = $id");

        if($ativo[0]->ativo == 0)
        {
            return false;
        }
        else{
            $tritanopia = DB::select("SELECT user_id,checked FROM `tritanopias` WHERE user_id = $id");

            return json_encode($tritanopia);
        }

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
