@extends('layouts.app')

@section('title','Bancos')

@section('content')

    
    <div>
        <h1>Criar Banco</h1>
        <hr>
        <form action="{{ route('bancos-store') }}" method="post">
            @csrf

            <!-- Selects-->
            <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr">
                <option value="" >Selecione a centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
            </select>

            <select id="select-blocos" class="hidden" onchange="findPrediosViaAjax(this.value)"  name="n_codibloco">
            </select>

            <select id="select-predios" class="hidden" name="n_codientid">
            </select>

            <select id="select-blocos" class="hidden" name="c_entibanco" require>
                <option value="BFA" >BFA</option>
                <option value="BAI" >BAI</option>
                <option value="BIC" >BIC</option>
                <option value="BPC" >BPC</option>
                <option value="BCA" >BCA</option>
                <option value="BIR" >BIR</option>
                <option value="BNI" >BNI</option>
                <option value="BPR" >BPR</option>
                <option value="BDA" >BDA</option>
                <option value="BMF" >BMF</option>
                <option value="SBA" >SBA</option>
                <option value="BCI" >BCI</option>
                <option value="BPA" >BPA</option>
                <option value="BANC" >BANC</option>
                <option value="BPPH" >BPPH</option>
            </select>
            <input type="text" name="c_descbanco" placeholder="descrição do banco"> 
        
            <input type="submit" value="Salvar">
        </form>
    </div>

  
@endsection