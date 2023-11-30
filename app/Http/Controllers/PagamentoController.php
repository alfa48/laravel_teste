<?php

namespace App\Http\Controllers;

use App\Models\Bloco;
use App\Models\Centralidade;
use App\Models\Divida;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $pagamentos = Pagamento::all();
       
       //dd($centralidades);
        return view('teste_transp.pagamento.index',['pagamentos' => $pagamentos]);
    }

    public function create(){
        $centralidades = Centralidade::all();
        $dividas = [];
        return view('teste_transp.pagamento.create',['dividas' => $dividas],['centralidades'=>$centralidades]);

    }
    public function store(Request $request){
        //$idDivida = 0;
        //TODO
        $dadosPagamento =[
            'n_codicoord' => $request->input('n_codicoord'),
            'n_valopagam' => $request->input('n_valopagam'),
            'c_descpagam' => $request->input('c_descpagam'),
            'c_formpagam' => $request->input('c_formpagam'),
            'd_datapagam' => $request->input('d_datapagam'),
            'c_bancpagam' => $request->input('c_bancpagam'),
            'n_codidivid' => $request->input('n_codidivid'),
            'n_codiapart' => $request->input('n_codiapart'),
            'n_codidivid' => $request->input('n_codidivid')
        ];

        $idPagamento = DB::table('trapagam')->insertGetId($dadosPagamento);
       // dd($id);

        /*$dadosPredio =[
            'c_descpredi' => $request->input('c_descpredi'),
            'n_codibloco' => $request->input('n_codibloco'),
            'c_entrpredi' => $request->input('c_entrpredi'),
            'n_codicaixa' => $idCaixa
        ];
        $idPredio = DB::table('trapredi')->insertGetId($dadosPredio);

        $dadosCoordenador =[
            'c_nomecoord' => $request->input('c_nomecoord'),
            'c_apelcoord' => $request->input('c_apelcoord'),
            'n_codimorad' => $request->input('n_codimorad'),
            'c_nomeentid' => 'trapredi',
            'n_codientid' => $idPredio
        ];
        // criar um coordenador
        $idCoordenador = DB::table('tracoord')->insertGetId($dadosCoordenador);
        //pega  o predio criado
        $registro = Predio::where('n_codipredi',$idPredio)->first();
        // atribuir o predio ao coordenador
        $registro->n_codicoord = $idCoordenador;
        $registro->save();
        */

        return redirect()->route('pagamentos-index');
        
    }
}
