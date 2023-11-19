<?php

namespace App\Http\Controllers;

use App\Models\Centralidade;
use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DespesaController extends Controller
{
    public function index(Request $request)
    {
        $caixa = [];
        $bancosCoord = [];
        $despesasPredio = [];
        //dd('Miseravel como estás?');
        $centralidades = Centralidade::all();
        
        $idpredio = $request->query("n_codipredi");
        
        //var_dump($idpredio);
        if ($idpredio != null) {


            $predio = DB::select('select * from trapredi where n_codipredi = ?', [0 => $idpredio]);
            $IDcaixa =  $predio[0]->n_codicaixa;
            $IDcoord =  $predio[0]->n_codicoord;
            var_dump($IDcaixa);
            var_dump($IDcoord);


            /*$idcaixa = DB::select('select n_codicaixa from trapredi where n_codipredi = ?', [0 => $idpredio]);
            $IDcaixa =  $idcaixa[0]->n_codicaixa;
            */
            //var_dump($IDcaixa);
            //dd($idcaixa);
            $caixa =  DB::select('select * from tracaixa where n_codicaixa = ?', [$IDcaixa]);
            
            //pegar os bancos do coordenador do predio
            //$idCoordenador = DB::select('select n_codicoord from trapredi where n_codipredi = ?', [0 => $idpredio]);
            $bancosCoord = DB::select('select * from trabanco where n_codientid = ? and c_nomeentid = ? ', [$idpredio, 1 =>'trapredi']);
           // var_dump($bancosCoord);
            $despesasPredio = DB::select('select * from tradespe where n_codicoord = ?', [$IDcoord]);
           //pegar os pagamentos feitos por moradores do predio

       }     

        $codi_coord = $request->input("n_codicoord");
        $codi_pagam = $request->input("n_codipagam");
        if(!is_null($codi_coord) & !is_null($codi_pagam)){
            //Confirmar pagamento
            DB::select('update trapagam set n_estapagam = ?, n_codicoord = ? where n_codipagam = ?', [1, $codi_coord, $codi_pagam]);
        }
 

        return view('teste_transp.despesa.index', ['caixa' => count($caixa) == 0 ? null : $caixa[0],
                                                'centralidades'=>$centralidades,
                                                'bancos' => $bancosCoord,
                                                'despesasPredio' => $despesasPredio]);
    }

    public function store(Request $request){

        $dadosDespesa = [
            'n_codicoord' => $request->input('n_codicoord'),
            'n_valodespe' => $request->input('n_valodespe'),
            'c_objedespe' => $request->input('c_objedespe'),
            'c_fontdespe' => $request->input('c_fontdespe'),
            'd_dacrdespe' => $request->input('d_dacrdespe'),
            'd_dasadespe' => $request->input('d_dasadespe')
        ];
       Despesa::insertGetId($dadosDespesa);
        
        //return redirect()->route('despesas-index');
    }
}
