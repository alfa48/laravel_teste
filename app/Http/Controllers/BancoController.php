<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Bloco;
use App\Models\Centralidade;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BancoController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $bancos = Banco::all();
       
       //dd($centralidades);
        return view('teste_transp.banco.index',['bancos' => $bancos]);
    }

    public function create(){
        $centralidades = Centralidade::all();
        return view('teste_transp.banco.create',['centralidades' => $centralidades]);

    }
    public function store(Request $request){
        $idpredio = $request->input("n_codientid");
         //var_dump($idpredio);
         $predio  = DB::select('select * from trapredi where n_codipredi = ?', [0 => $idpredio]);
        // $predio = Predio::where('n_codipredi',$idpredio)->first();
         //var_dump($predio);
         $idCoord = $predio[0] -> n_codicoord;
        // var_dump($idCoord);

        $dadosBanco =[
            'n_codicoord' => $idCoord,
            'c_entibanco' => $request->input('c_entibanco'),
            'c_descbanco' => $request->input('c_descbanco'),
            'n_codientid' => $request->input('n_codientid'),
            'c_nomeentid' => 'trapredi'
        ];
        //var_dump($dadosBanco);
        DB::table('trabanco')->insertGetId($dadosBanco);

        
        return redirect()->route('bancos-index');
        
    }
}
