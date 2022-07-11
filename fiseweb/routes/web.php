<?php
require __DIR__.'/auth.php';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
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

require __DIR__.'/auth.php';

Route::resources([
    'pessoa' => \App\Http\Controllers\PessoaController::class,
    'prestador' => \App\Http\Controllers\PrestadorController::class,
]);

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/chat',[ChatController::class,'index'])->middleware(['auth'])->name('chat');

//HOME
//EXIBIR PRETADOR TELA HOME
Route::get('/', [HomeController::class,'index']);


//CLIENTE//
//Gravar
// Route::get('/cliente/create',[ClienteController::class,'create']);

//PRESTADOR//
//Gravar
Route::get('/prestador/create',[PrestadorController::class,'create'])->middleware(['auth']);
//EDITAR
Route::get('/prestador/update',[PrestadorController::class,'update'])->middleware(['auth']);

//PESSOA//
//Gravar
Route::get('/pessoa/create',[PessoaController::class,'create'])->middleware(['auth']);
//EDITAR
Route::get('/pessoa/update',[PessoaController::class,'update'])->middleware(['auth']);
