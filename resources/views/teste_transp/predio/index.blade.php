@extends('layouts.app')

@section('title','Predios')

@section('content')

    <h1>Lista dos Prédios</h1>
    
    <form action="{{ route('predios-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>Predio</th>
            <th>Entrada</th>
            <th>Id</th>
            <th>Bloco</th>
            <th>Coordenador</th>
        </tr>
        
        @foreach ($predios as $predio)
            <tr>
                <td>{{ $predio -> c_descpredi }}</td>
                <td>{{ $predio -> c_entrpredi }}</td>
                <td>{{ $predio -> n_codipredi }}</td>
                <td>{{ $predio -> n_codibloco }}</td>
                <td>{{ $predio -> n_codicoord }}</td>
            </tr>
        @endforeach
        

    </table>

@endsection