@extends('layouts.app')

@section('title','Apartamento')

@section('content')

    <h1>Lista dos Apartamentos</h1>
    
    <form action="{{ route('apartamentos-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>Id</th>
            <th>Porta</th>
            <th>Tipologia</th>
            <th>Id da conta</th>
            <th>Id do predio</th>
            <th>Id do morador</th>
        </tr>
        
        @foreach ($apartamentos as $apartamento)
            <tr>
                <td>{{ $apartamento -> n_codiapart }}</td>
                <td>{{ $apartamento -> c_portapart }}</td>
                <td>{{ $apartamento -> c_tipoapart }}</td>
                <td>{{ $apartamento -> n_codiconta }}</td>
                <td>{{ $apartamento -> n_codipredi }}</td>
                <td>{{ $apartamento -> n_codimorad }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection