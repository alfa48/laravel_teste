<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogosController extends Controller
{
    
    public function index(){
        //dd('Miseravel como estás?');
        $nome = 'Manuel Alfredo';
        $ids = 123;
        return view('jogos',['name' => $nome, 'id' => $ids]);
    }
}
