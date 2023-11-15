<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestesController extends Controller
{
    //
    public function index(){
        $nome = 'Manuel Alfredo';
        $ids = 123;
        return view('teste_transp.index',['name' => $nome, 'id' => $ids]);
    }
}
