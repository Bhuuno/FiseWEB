<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use resources\views\cliente;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cliente.create');
    }
}