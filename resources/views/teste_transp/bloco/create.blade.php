@extends('layouts.app')

@section('title','Blocos')

@section('content')

    
    <div>
        <h1>Criar Bloco</h1>
        <hr>
        <form action="{{ route('blocos-store') }}" method="post">
            @csrf
            <input type="text" name="c_descbloco" placeholder="digite o nome do bloco.." required>
            <input type="text" name="c_ruabloco" placeholder="digite as ruas de limite  do bloco.."> 
           
            <select name="n_codicentr">
                <option value="" >Selecione a centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>


            <input type="submit" value="Salvar">
        </form>
    </div>

  
@endsection