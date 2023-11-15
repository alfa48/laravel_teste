@extends('layouts.app')

@section('title','Blancos')

@section('content')

    <h4>Centralidade / bloco / prédio / coordenadores / banco</h4>
    
    <form action="{{ route('bancos-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>ID Banco</th>
            <th>Descrição</th>
            <th>Saldo</th>
            <th>Entidade Bancária</th>
            <th>ID Coordenador</th>
        </tr>
        @foreach ($bancos as $banco)
            <tr>
                <td>{{ $banco -> n_codibanco }}</td>
                <td>{{ $banco -> c_descbanco }}</td>
                <td>{{ $banco -> n_saldbanco }}</td>
                <td>{{ $banco -> c_entibanco }}</td>
                <td>{{ $banco -> n_codicoord }}</td>
                
            </tr>
        @endforeach
        
        
    </table>

@endsection