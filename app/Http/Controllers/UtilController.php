<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\NullType;

class UtilController extends Controller
{
    public function findBlocos(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            $blocos = DB::select('select * from trabloco where n_codicentr = ?', [$id]);
            //var_dump($blocos);
            return $blocos;   
 
        }catch(err){
            //return err->getMessage();
        }
    }

    
    public function findPredios(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            $predios = DB::select('select * from trapredi where n_codibloco = ?', [$id]);
            //var_dump($blocos);
            return $predios;   
 
        }catch(err){
            //return err->getMessage();
        }        
    }

    public function findApartamenos(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            $apartamentos = DB::select('select * from traapart where n_codipredi = ?', [$id]);
           // var_dump($apartamentos);
            return $apartamentos;   
 
        }catch(err){
            //return err->getMessage();
        }        
    }
    public function findApartamenoSemMoradores(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            $apartamentos = DB::select('select * from traapart where n_codipredi = ? and n_codimorad is null', [$id]);
           // var_dump($apartamentos);
            return $apartamentos;   
 
        }catch(err){
            //return err->getMessage();
        }        
    }
    public function findApartamenosComMoradores(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            $apartamentos = DB::select('select * from traapart where n_codipredi = ? and n_codimorad is not null', [$id]);
           // var_dump($apartamentos);
            return $apartamentos;   
 
        }catch(err){
            //return err->getMessage();
        }        
    }
    public function findPredioCoordenador(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');
            //var_dump($id);
            //$registro = Apartamento::where('n_codiapart',$request->input('n_codiapart'))->first();
            $codicoord = DB::select('select n_codicoord from trapredi where n_codipredi = ?', [$id]);
            //var_dump($blocos);
            return $codicoord;   
 
        }catch(err){
            //return err->getMessage();
        }        
    }
    
    
    public function findDividasApartamenos(Request $request){
        // $blocos = Bloco::all();
 
        try{
            $id = $request->query('id');//n_codipredi
            //var_dump($id);
            $dividas = DB::select('select * from tradivid where n_codiconta = ?', [$id]);
            //var_dump($blocos);
            return $dividas;   
 
        }catch(err){
            //return err->getMessage();
        }                
    }
    public function findCoordenadorPredio(Request $request){
        $id = $request->query('id');//n_codipredi
        $codicoord = DB::select('select n_codicoord from trapredi where n_codipredi = ?', [$id]);
        //var_dump($blocos);
        return $codicoord;   
    }

}
