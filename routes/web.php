<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('produtos', 'App\Http\Controllers\MeuControlador@produtos');
Route::get('nome', 'App\Http\Controllers\MeuControlador@getNome');
Route::get('idade', 'App\Http\Controllers\MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'App\Http\Controllers\MeuControlador@multiplicar');

Route::resource('clientes', 'App\Http\Controllers\ClienteControlador');      //pega todos os recursos, métodos ou funções e as rotas do controlador

/*Route::get('/ola', function (){
    echo "Olá";
});

Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome){
    echo "Olá, seja bem-vindo $nome $sobrenome!";
});

Route::get('/seunome/{nome?}', function ($nome=null){
    if (isset($nome))
        echo "Olá, seja bem-vindo, $nome!";
    else 
        echo "Você não digitou um nome";
});

Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n){
    for($i=0;$i<$n;$i++)
        echo "Olá, seja bem-vindo $nome!<br>";
})->where('nome', '[A-Za-z]+')
  ->where('n', '[0-9]+');

Route::prefix('/application')->group(function(){
    
    Route::get('/', function(){
        return view ('app');
    })->name('app');
 
    Route::get('/user', function(){
        return view ('user');
    })->name('app.user');
 
    Route::get('/profile', function(){
        return view ('profile');
    })->name('app.profile');
});

Route::get('/produtos', function(){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
        echo "<li>Notebook </li>";
        echo "<li>Mouse </li>";
        echo "<li>Impressora </li>";
    echo "</ol>";        
})->name('meusprodutos');

Route::redirect('todosprodutos', 'produtos', 301); //redirecionamento de todosprodutos para produtos

Route::get('todosprodutos2', function(){
    return redirect()->route('meusprodutos');
});

//////////////////////////////////

Route::post('/requisicoes', function(Request $request){ 
    return 'Hello POST';
});

Route::delete('/requisicoes', function(Request $request){ 
    return 'Hello DELETE';
});

Route::put('/requisicoes', function(Request $request){ 
    return 'Hello PUT';
});

Route::patch('/requisicoes', function(Request $request){ 
    return 'Hello PATCH';
});


Route::options('/requisicoes', function(Request $request){ 
    return 'Hello OPTIONS';
});*/