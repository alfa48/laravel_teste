<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use App\Models\Centralidade;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PredioController extends Controller
{
    public function find(Request $request){
       // $blocos = Bloco::all();

       try{
           $id = $request->query('idc');
           $blocos = DB::select('select * from trabloco where n_codicentr = ?', [$id]);
          // var_dump($blocos); 
           return $blocos;   

       }catch(err){
           return err->getMessage();
    }
       // var_dump($id);
    }
    public function index(){
        //dd('Miseravel como estás?');
       $predios = Predio::all();
      
        return view('teste_transp.predio.index',['predios' => $predios]);
    }

    public function create(){
        $centralidades = Centralidade::all();
        return view('teste_transp.predio.create',['centralidades' => $centralidades]);

    }
    public function store(Request $request){
        $dadosCaxa =[
            'n_saldcaixa' => 0,
            'c_nomeentid' =>'trapredi',

        ];
        $idCaixa = DB::table('tracaixa')->insertGetId($dadosCaxa);
       // dd($id);

        $dadosPredio =[
            'c_descpredi' => $request->input('c_descpredi'),
            'n_codibloco' => $request->input('n_codibloco'),
            'c_entrpredi' => $request->input('c_entrpredi'),
            'n_codicaixa' => $idCaixa
        ];
        $idPredio = DB::table('trapredi')->insertGetId($dadosPredio);

        ////pega  o caixa criado
        $registroCaixa = Caixa::where('n_codicaixa',$idCaixa)->first();
        // atribuir o predio ao caixa
        $registroCaixa->n_codientid = $idPredio;
        $registroCaixa->save();


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


        return redirect()->route('predios-index');
        
    }
}
