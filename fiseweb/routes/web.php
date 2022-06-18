<?php
require __DIR__.'/auth.php';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\PessoaController;


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

Route::resources([
    'pessoa' => \App\Http\Controllers\PessoaController::class,
]);

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//CLIENTE//
//Gravar
// Route::get('/cliente/create',[ClienteController::class,'create']);

//PRESTADOR//
//Gravar
// Route::get('/prestador/create',[PrestadorController::class,'create']);

//PESSOA//
//Gravar
Route::get('/pessoa/create',[PessoaController::class,'create']);


