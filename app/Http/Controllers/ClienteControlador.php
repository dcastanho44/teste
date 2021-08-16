<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    
    private $clientes = [
        ['id' => 1, 'nome' => 'Ademir'],
        ['id' => 2, 'nome' => 'João'],
        ['id' => 3, 'nome' => 'Maria'],
        ['id' => 4, 'nome' => 'Lucio'],
    ];
    
    public function __construct() {
        $clientes = session('clientes');
        if (!isset($clientes))
            session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recebe o POST do create
        $clientes = session('clientes');
        $id = count($clientes) + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $infoCliente = $clientes[$id - 1]; //precisa do decremento porque no store há um incremento
        return view('clientes.info', compact(['infoCliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $infoCliente = $clientes[$id - 1]; //precisa do decremento porque no store há um incremento
        return view('clientes.edit', compact(['infoCliente']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $clientes[ $id - 1]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes'); //recebe a quantidade de clientes (não estou usando o banco ainda, tô pegando os dados pela session)
        $ids = array_column($clientes, 'id'); //acha o valor do id na coluna do array
        $index = array_search($id, $ids); //procura o indice onde o valor do id está
        array_splice($clientes, $index, 1); //apaga 1 indice do array de clientes
        session(['clientes' => $clientes]); //atualiza a sessão
        return redirect()->route('clientes.index');
    }
}
