@extends('layouts.app')

@section('title','Moradores')

@section('content')

    <h1>Lista dos Moradores</h1>
    
    <form action="{{ route('moradores-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>Nome do Morador</th>
            <th>Apelido</th>
            <th>Id Morador</th>
        </tr>
        
        @foreach ($moradores as $morador)
            <tr>
                <td>{{ $morador -> c_nomemorad }}</td>
                <td>{{ $morador -> c_apelmorad }}</td>
                <td>{{ $morador -> n_codimorad }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection