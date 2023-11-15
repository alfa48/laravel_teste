@extends('layouts.app')

@section('title','Taxas')

@section('content')

    <h1>Lista dos Taxas</h1>
    
    <form action="{{ route('taxas-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>Id</th>
            <th>Propósito</th>
            <th>Volar da taxa</th>
            <th>Multa por não pagar no prazo</th>
            <th>Data de envio primário</th>
            <th>Frequencia_de_envio</th>
            <th>Prazo_em_dias</th>
            <th>Id_coordenador_emitio_taxa</th>
        </tr>
        
        @foreach ($taxas as $taxa)
            <tr>
                <td>{{ $taxa -> n_coditaxa }}</td>
                <td>{{ $taxa -> c_desctaxa }}</td>
                <td>{{ $taxa -> n_valotaxa }}</td>
                <td>{{ $taxa -> n_vmultaxa }}</td>
                <td>{{ $taxa -> d_denvtaxa }}</td>
                <td>{{ $taxa -> c_freqtaxa }}</td>
                <td>{{ $taxa -> n_praztaxa }}</td>
                <td>{{ $taxa -> n_codicoord }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection