<?php

namespace App\Http\Controllers;

use App\Models\Centralidade;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CentralidadeController extends Controller
{
    //
    public function index(){
        //dd('Miseravel como estás?');
       $centralidades = Centralidade::all();
       //dd($centralidades);
        return view('teste_transp.centralidade.index',['centralidades' => $centralidades]);
    }

    public function create(){
        $enderecos = Endereco::all();
        return view('teste_transp.centralidade.create',['enderecos' => $enderecos]);

    }
    public function store(Request $request){

        $dadosEndereco = [
            'c_paisender' => $request->input('c_paisender'),
            'c_provender' => $request->input('c_provender'),
            'c_muniender' => $request->input('c_muniender'),
            'c_bairender' => $request->input('c_bairender'),
        ];
        $idEndereco = Endereco::insertGetId($dadosEndereco);
        //EnderecoDB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        $dadosCentralidade =[
            'c_desccentr' => $request->input('c_desccentr'),
            'n_codiender' => $idEndereco
        ];

        $id = Centralidade::insertGetId($dadosCentralidade);
       //dd($id);


        //$centralidade = Centralidade::create($request->all());
        
        return redirect()->route('centralidades-index');
    }
}
