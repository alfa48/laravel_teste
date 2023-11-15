<?php

namespace App\Http\Controllers;

use App\Models\Bloco;
use App\Models\Centralidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlocoController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $blocos = Bloco::all();
       
       //dd($centralidades);
        return view('teste_transp.bloco.index',['blocos' => $blocos]);
    }

    public function create(){
        $centralidades = Centralidade::all();
        return view('teste_transp.bloco.create',['centralidades' => $centralidades]);

    }
    public function store(Request $request){
        $dadoscaxa =[
            'n_saldcaixa' => 0
        ];

        $id = DB::table('tracaixa')->insertGetId($dadoscaxa);
       // dd($id);

        $dadosbloco =[
            'c_descbloco' => $request->input('c_descbloco'),
            'n_codicentr' => $request->input('n_codicentr'),
            'c_ruabloco' => $request->input('c_ruabloco'),
            'n_codicaixa' => $id
        ];
        DB::table('trabloco')->insertGetId($dadosbloco);

        
        return redirect()->route('blocos-index');
        
    }
}
