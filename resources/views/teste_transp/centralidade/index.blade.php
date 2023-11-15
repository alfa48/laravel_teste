@extends('layouts.app')

@section('title','Centralidades')

@section('content')

    <h1>Lista das Centralidades</h1>
    <form action="{{ route('centralidades-create') }}" method="get">
        <input value="Nova" type="submit"/>
     </form>
    <hr>
    <table>

        <tr>
            <th>Id</th>
            <th>Denominação</th>
            <th>Endereço</th>
        </tr>
        
        @foreach ($centralidades as $centralidade)
            <tr>
                <td>{{ $centralidade -> n_codicentr }}</td>
                <td>{{ $centralidade -> c_desccentr }}</td>
                <td>{{ $centralidade -> n_codiender }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection