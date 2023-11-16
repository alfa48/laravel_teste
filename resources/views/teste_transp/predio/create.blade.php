@extends('layouts.app')

@section('title','Predios')

@section('content')

    
    <div>
        <h1>Cadastrar Prédio</h1>
        <hr>

        <form action="{{ route('predios-store') }}" method="post">
            @csrf
            <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr">
                
                <option value="" >Selecione a centralidade</option>
                
                @foreach ($centralidades as $centralidade)
                     <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>
            
            <select id="select-blocos" class="hidden" name="n_codibloco">
            </select>
            
            <h3>Prédio</h3>
            
            <input type="text" name="c_descpredi" placeholder="digite o nome do prédio.." required>
            <input type="text" name="c_entrpredi" placeholder="digite entrada do prédio.." required>

            <h3>Coordendaor do prédio</h3>
            
            <input type="text" name="c_nomecoord" placeholder="nome do coordenador" required>
            <input type="text" name="c_apelcoord" placeholder="apelido" required>
            <input pattern="\d*" name="n_codimorad" placeholder="digite o id do apartamento.">

            <input type="submit" value="Salvar">
        </form>
    </div>
@endsection