<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use resources\views\cadastrocliente;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cadastrocliente');
    }
}
