<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    public function create()
    {
        return view('prestador.create');
    }
}
