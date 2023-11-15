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

/*

        <table>

        <tr>
            <th>ID pagamento</th>
            <th>Descrição do pagamento</th>
            <th>Valor</th>
            <th>Forma de pagamento</th>
            <th>Data de pagamento</th>
            <th>Banco</th>
            <th>Estado do pagamento</th>
            <th>ID dívida</th>
            <th>ID Apartamento</th>
        </tr>
    
               @foreach ($pagamentos as $pagamento)
                    <tr>
                            <td>{{ $pagamento-> n_codipagam }}</td>
                            <td>{{ $pagamento-> c_descpagam }}</td>
                            <td>{{ $pagamento-> n_valopagam }}</td>
                            <td>{{ $pagamento-> c_formpagam }}</td> 
                            <td>{{ $pagamento-> d_datapagam }}</td>
                            <td>{{ $pagamento-> c_bancpagam }}</td>
                            <td>{{ $pagamento-> n_estapagam }}</td> 
                            <td>{{ $pagamento-> n_codidivid }}</td>
                            <td>{{ $pagamento-> n_codiapart }}</td>  
                    </tr>            
                @endforeach
      
    </table>

*/