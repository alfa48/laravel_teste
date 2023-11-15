<?php

use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\BlocoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CentralidadeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JogosController;
use App\Http\Controllers\MoradorController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\TaxaController;
use App\Http\Controllers\TestesController;
use App\Http\Controllers\UtilController;
use App\Models\Predio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*

Route::get('/users', function () {
    return 'MEU TEXTO!';
});
*/

//Route::view('/jogos','jogos',['name' => 'NEED FOR SPEED']);

/*//parametro dinamico apenas texto
 Route::get('/jogos/{name?}',
    function ($name = null){
        return view('jogos',['nomeJogo'=> $name]);
    }
)->where('name','[A-Za-z]+'); */

/* //parametro dinamico apenas numeros
Route::get('/jogos/{id?}',
    function ($id = null){
        return view('jogos',['idJogo'=> $id]);
    }
)->where('id','[0-9]+');
*/

/* //parametros dinamicos numero e texto
Route::get('/jogos/{id?}/{name?}',
    function ($id = null,$name = null){
        return view('jogos',['idJogo'=> $id],['nomeJogo' => $name]);
    }
)->where('id','[0-9]+');
*/
/*CENTRALIDADE */
Route::prefix('centralidades')->group(function(){
    Route::get('/',[CentralidadeController::class, 'index'])->name('centralidades-index');
    Route::get('/create',[CentralidadeController::class, 'create'])->name('centralidades-create');
    Route::post('/store',[CentralidadeController::class, 'store'])->name('centralidades-store');
});
/*BLOCO */
Route::prefix('blocos')->group(function(){
    Route::get('/',[BlocoController::class, 'index'])->name('blocos-index');
    Route::get('/create',[BlocoController::class, 'create'])->name('blocos-create');
    Route::post('/store',[BlocoController::class, 'store'])->name('blocos-store');
});

/* PREDIO */
Route::prefix('predios')->group(function(){
    Route::get('/',[PredioController::class, 'index'])->name('predios-index');
    Route::get('/create',[PredioController::class, 'create'])->name('predios-create');
    Route::post('/store',[PredioController::class, 'store'])->name('predios-store');
});

/* APARTAMENTOS */
Route::prefix('apartamentos')->group(function(){
    Route::get('/',[ApartamentoController::class, 'index'])->name('apartamentos-index');
    Route::get('/create',[ApartamentoController::class, 'create'])->name('apartamentos-create');
    Route::post('/store',[ApartamentoController::class, 'store'])->name('apartamentos-store');
});

/* MORADORES */
Route::prefix('moradores')->group(function(){
    Route::get('/',[MoradorController::class, 'index'])->name('moradores-index');
    Route::get('/create',[MoradorController::class, 'create'])->name('moradores-create');
    Route::post('/store',[MoradorController::class, 'store'])->name('moradores-store');
});

/* TAXA */
Route::prefix('taxas')->group(function(){
    Route::get('/',[TaxaController::class, 'index'])->name('taxas-index');
    Route::get('/create',[TaxaController::class, 'create'])->name('taxas-create');
    Route::post('/store',[TaxaController::class, 'store'])->name('taxas-store');
});

/* PAGAMENTO */
Route::prefix('pagamentos')->group(function(){
    Route::get('/',[PagamentoController::class, 'index'])->name('pagamentos-index');
    Route::get('/create',[PagamentoController::class, 'create'])->name('pagamentos-create');
    Route::post('/store',[PagamentoController::class, 'store'])->name('pagamentos-store');
});

/* CAIXAS */
Route::prefix('caixas')->group(function(){
    Route::get('/',[CaixaController::class, 'index'])->name('caixas-index');
});

/* BANCO */
Route::prefix('bancos')->group(function(){
    Route::get('/',[BancoController::class, 'index'])->name('bancos-index');
    Route::get('/create',[BancoController::class, 'create'])->name('bancos-create');
    Route::post('/store',[BancoController::class, 'store'])->name('bancos-store');
});

Route::get('/findblocos', [UtilController::class, 'findBlocos']);
Route::get('/findpredios', [UtilController::class, 'findPredios']);
Route::get('/findprediocoordenador', [UtilController::class, 'findPredioCoordenador']);
Route::get('/findapartamentos', [UtilController::class, 'findApartamenos']);
Route::get('/finddividasapartamentos', [UtilController::class, 'findDividasApartamenos']);



Route::get('/find-centralidades', [PredioController::class, 'find']);

Route::get('/testes', [TestesController::class, 'index'])->name('testes-index');



Route::get('/lar', function () {
    return view('welcome');
})->name('home-index');

Route::fallback(function(){
    return 'Erro ao localizar rota';
});