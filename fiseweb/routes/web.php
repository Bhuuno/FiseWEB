<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClienteController;
use \App\Http\Controllers\PrestadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//CLIENTE
Route::get('/cliente/create',[ClienteController::class,'create']);
//PRESTADOR
Route::get('/prestador/create',[PrestadorController::class,'create']);
