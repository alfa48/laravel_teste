<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Centralidade;
use App\Models\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function index(){
        //dd('Miseravel como estás?');
       $moradores = Morador::all();
       //dd($centralidades);
        return view('teste_transp.morador.index',['moradores' => $moradores]);
    }

    public function create(){
        $apartamentos = Apartamento::all();
        $centralidades = Centralidade::all();
        return view('teste_transp.morador.create',['apartamentos' => $apartamentos],['centralidades'=> $centralidades]);

    }
    public function store(Request $request){
        $dadosMorador =[
            'c_nomemorad' => $request->input('c_nomemorad'),
            'c_apelmorad' => $request->input('c_apelmorad'),
            'c_bilhmorad' => $request->input('c_bilhmorad')
        ];
        $idMorador = Morador::insertGetId($dadosMorador);

        $registro = Apartamento::where('n_codiapart',$request->input('n_codiapart'))->first();
        // atribuir o apartamento ao morador
        $registro->n_codimorad = $idMorador;
        $registro->save();

        return redirect()->route('moradores-index');
    }
}
