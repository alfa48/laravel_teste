<?php

namespace App\Http\Controllers;

use App\Models\Centralidade;
use App\Models\Coordenador;
use App\Models\Taxa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxaController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $taxas = Taxa::all();
       //dd($centralidades);
        return view('teste_transp.taxa.index',['taxas' => $taxas]);
    }

    public function create(){
        $centralidades = Centralidade::all();
        $coordenadores = Coordenador::all();
        return view('teste_transp.taxa.create',['coordenadores' => $coordenadores],['centralidades'=>$centralidades]);

    }
    public function store(Request $request){
        $dadosTaxa =[
            'c_desctaxa' => $request->input('c_desctaxa'),
            'd_denvtaxa' => $request->input('d_denvtaxa'),
            'n_valotaxa' => $request->input('n_valotaxa'),
            'n_permtaxa' => $request->input('n_permtaxa'),
            'n_diaetaxa' => $request->input('n_diaetaxa'),
            'c_freqtaxa' => $request->input('c_freqtaxa'),
            'n_praztaxa' => $request->input('n_praztaxa'),
            'n_codicoord' => $request->input('n_codicoord')
        ];
        $idTaxa = Taxa::insertGetId($dadosTaxa);

        return redirect()->route('taxas-index');
    }
}
