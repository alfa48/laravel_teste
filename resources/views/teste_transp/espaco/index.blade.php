@extends('layouts.app')

@section('title','Espaço')

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
        @foreach ($eps as $ep)
            <tr>
                <td>{{ $ep -> c_descepubl }}</td>
                <td>{{ $ep -> n_precepubl }}</td>
                
            </tr>
        @endforeach
        
        
    </table>

@endsection