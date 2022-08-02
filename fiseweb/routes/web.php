<?php
require __DIR__.'/auth.php';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VisualizacaoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AvaliacaoController;

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
    'perfil' => \App\Http\Controllers\PerfilController::class,
    'avaliacao' => \App\Http\Controllers\AvaliacaoController::class,
]);

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/chat',[ChatController::class,'index'])->middleware(['auth'])->name('chat');

//HOME
Route::get('/', [HomeController::class,'index']);

//CLIENTE//
// Route::get('/cliente/create',[ClienteController::class,'create']);


//PRESTADOR//
Route::get('/prestador/create',[PrestadorController::class,'create'])->middleware(['auth']);
Route::get('/prestador/update',[PrestadorController::class,'update'])->middleware(['auth']);
Route::get('/dashboard/prestador/{id}',[PrestadorController::class,'profile'])->middleware(['auth']);


//VISUALIZAÇÃO
Route::get('/visualizacao',[VisualizacaoController::class,'store'])->middleware(['auth']);
Route::get('/visualizacao/grafico',[VisualizacaoController::class,'grafico'])->middleware(['auth']);


//PESSOA//
Route::get('/pessoa/create',[PessoaController::class,'create'])->middleware(['auth']);
Route::get('/pessoa/update',[PessoaController::class,'update'])->middleware(['auth']);
Route::get('/dashboard/perfil',[PerfilController::class,'index'])->middleware(['auth']);


//AVALIAÇÃO
Route::get('/dashboard/avaliacao/{id}',[AvaliacaoController::class,'index'])->middleware(['auth']);
Route::get('/gravar/comentario',[AvaliacaoController::class,'store'])->middleware(['auth']);
//NOTA SERVIÇO PRESTADOR
Route::get('/media',[AvaliacaoController::class,'media'])->middleware(['auth']);
