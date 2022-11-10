<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AlistamentoController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\RequisicaoController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Procedimento;
use App\Models\Requisicao;
use App\Models\Situacao;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::resource("usuario", UsuarioController::class);
    Route::resource("atendimento", AtendimentoController::class);
    Route::resource("alistamento", AlistamentoController::class);
    Route::resource("agendamento", AgendamentoController::class);
    // Route::get('/buscarRequisicao', function () {
    //     return view('buscarRequisicao', ['requisicoes' => Requisicao::with('latestSituacao')->get()]);
    // })->name('buscarRequisicao');
    // Route::get('/cadastrarUsuario', function () {

    //     return view('cadastrarRequisicao', ['procedimentos' => Procedimento::all()]);
    // })->name('cadastrarUsuario');

    // Route::get('/editarRequisicao/{requisicao}', function (Requisicao $requisicao) {
    //     return view('editarRequisicao', ['requisicao' => $requisicao, 'procedimentos' => Procedimento::all()]);
    // })->name('editarRequisicao');

    // Route::post('/cadastrandoRequisicao', [RequisicaoController::class, 'create'])->name('cadastrandoRequisicao');
    // Route::put('/editandoRequisicao/{requisicao}', [RequisicaoController::class, 'update'])->name('editandoRequisicao');
    // Route::delete('/requisicao/delete/{requisicao?}', [RequisicaoController::class, 'delete'])->name('requisicao.delete');

    // Route::get(
    //     '/novaSituacao/{requisicao}',
    //     function (Requisicao $requisicao) {
    //         return view('situacao-show', ['requisicao' => $requisicao]);
    //     }
    // )->name('situacao.index');
    // Route::post('/criarSituacao/{requisicao}', [SituacaoController::class, 'create'])->name('situacao.create');
    // Route::get('/historico/{requisicao}', [SituacaoController::class, 'show'])->name('situacao.show');
    
});

// Auth::routes();
  Auth::routes(['register' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 