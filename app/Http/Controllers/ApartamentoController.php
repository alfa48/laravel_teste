<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Centralidade;
use App\Models\Conta;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartamentoController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $apartamentos = Apartamento::all();
       //dd($centralidades);
        return view('teste_transp.apartamento.index',['apartamentos' => $apartamentos]);
    }

    public function create(){
        $predios = Predio::all();
        $centralidades = Centralidade::all();
        return view('teste_transp.apartamento.create',['predios' => $predios],['centralidades'=>$centralidades]);

    }
    public function store(Request $request){

       $dadosConta =[
            'n_saldconta' => 0,
            'n_diviconta' => 0          
        ];

        $idConta = Conta::insertGetId($dadosConta);

        $dadosApartamento =[
            'c_portapart' => $request->input('c_portapart'),
            'c_tipoapart' => $request->input('c_tipoapart'),
            'n_codipredi' => $request->input('n_codipredi'),
            'n_codiconta' => $idConta
            
        ];

        $id = Apartamento::insertGetId($dadosApartamento);
       //dd($id);


        //$centralidade = Centralidade::create($request->all());
        
        return redirect()->route('apartamentos-index');
    }
}
