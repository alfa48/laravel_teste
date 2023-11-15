@extends('layouts.app')

@section('title','Blocos')

@section('content')

    <h1>Lista das Blocos</h1>
    
    <form action="{{ route('blocos-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>Id</th>
            <th>Bloco</th>
            <th>Centralidade</th>
        </tr>
        
        @foreach ($blocos as $bloco)
            <tr>
                <td>{{ $bloco -> n_codibloco }}</td>
                <td>{{ $bloco -> c_descbloco }}</td>
                <td>{{ $bloco -> n_codicentr }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection