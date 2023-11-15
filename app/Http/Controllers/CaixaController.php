<?php

namespace App\Http\Controllers;

use App\Models\Centralidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaixaController extends Controller
{
    public function index(Request $request)
    {
        $caixa = [];
        $bancosCoord = [];
        //dd('Miseravel como estás?');
        $centralidades = Centralidade::all();
        
        $idpredio = $request->query("n_codipredi");
        //var_dump($idpredio);
        if ($idpredio != null) {

            $idcaixa = DB::select('select n_codicaixa from trapredi where n_codipredi = ?', [0 => $idpredio]);
            $IDcaixa =  $idcaixa[0]->n_codicaixa;
            //var_dump($IDcaixa);
            //dd($idcaixa);
            $caixa =  DB::select('select * from tracaixa where n_codicaixa = ?', [$IDcaixa]);
            
            //pegar os bancos do coordenador do predio
            //$idCoordenador = DB::select('select n_codicoord from trapredi where n_codipredi = ?', [0 => $idpredio]);
            $bancosCoord = DB::select('select * from trabanco where n_codientid = ? and c_nomeentid = ? ', [0 => $idpredio, 1 =>'trapredi']);
           // var_dump($bancosCoord);
            
        }     
 

        return view('teste_transp.caixa.index', ['caixa' => count($caixa) == 0 ? null : $caixa[0],
                                                'centralidades'=>$centralidades,
                                                'bancos' => $bancosCoord]);
    }
}