<?php
require __DIR__.'/auth.php';

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Cookie\Middleware\EncryptCookies as middleware;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\VisualizacaoController;

$user = new User(); 

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
    'galeria' => \App\Http\Controllers\GaleriaController::class,
    'pergunta' => \App\Http\Controllers\PerguntaController::class,
]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard')->middleware('role:prestador,administrador');


Route::get('/dashboard/chat',[ChatController::class,'index'])->middleware(['auth'])->name('chat');

//HOME
Route::get('/', [HomeController::class,'index']);

//PRESTADOR
Route::get('/dashboard/prestador/{id}',[PrestadorController::class,'profile'])->middleware(['auth']);

//PERGUNTAS PÁGINA PERFIL PRESTADOR
Route::get('/gravar_pergunta',[PerguntaController::class,'gravar_pergunta'])->middleware(['auth']);

//NOTA SERVIÇO PRESTADOR
Route::get('/media',[AvaliacaoController::class,'media'])->middleware(['auth']);

//DASHBOARD
Route::get('/visualizacao',[VisualizacaoController::class,'store'])->middleware(['auth']);
Route::get('/visualizacao/grafico',[VisualizacaoController::class,'grafico'])->middleware(['auth']);
Route::get('/informacoes/dashboard',[VisualizacaoController::class,'dashboard'])->middleware(['auth']);

//PERFIL PRESTADOR/PESSOA
Route::get('/dashboard/perfil',[PerfilController::class,'index'])->middleware(['auth']);

//AVALIAÇÃO
Route::get('/dashboard/avaliacao/{id}',[AvaliacaoController::class,'index'])->middleware(['auth']);
Route::get('/gravar/comentario',[AvaliacaoController::class,'store'])->middleware(['auth'])->middleware('role:pessoal,prestador,administrador');

//GALERIA
Route::get('/dashboard/galeria/{id}',[GaleriaController::class,'index'])->middleware(['auth']); //exibe a página dagaleria
Route::get('/galeria/foto/consultar',[GaleriaController::class,'consulta_foto'])->middleware(['auth']); //retorna imagem prestador na modal galeria
Route::get('/galeria/foto/excluir',[GaleriaController::class,'excluir_foto'])->middleware(['auth']); //exclui imagem galeria prestador
Route::get('/galeria/foto/editar',[GaleriaController::class,'editar_comentario'])->middleware(['auth']); //Busca informações para edicao
Route::get('/galeria/foto/update/{id}',[GaleriaController::class,'atualizar_comentario'])->middleware(['auth']); //altera o comentario da imagem
Route::get('/galeria/foto/naoexibir',[GaleriaController::class,'nao_exibir'])->middleware(['auth']); //altera o status da imagem para não exibir
Route::get('/galeria/foto/exibir',[GaleriaController::class,'exibir'])->middleware(['auth']); //altera o status da imagem para exibir

//PAGAMENTO
Route::get('/dashboard/pagamento/index',[PagamentoController::class,'index'])->middleware(['auth'])->middleware('role:pessoal,prestador,administrador');