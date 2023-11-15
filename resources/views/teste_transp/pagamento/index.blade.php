@extends('layouts.app')

@section('title','Pagamentos')

@section('content')

    <h1>Lista dos Pagamentos</h1>
    
    <form action="{{ route('pagamentos-create') }}" method="get">
        <input value="Novo" type="submit"/>
     </form>
    
    <hr>

    <table>

        <tr>
            <th>ID</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Forma de pagamento</th>
            <th>Banco</th>
            <th>ID Banco</th>
            <th>Estado 0-pendente 1-confirmado</th>
            <th>ID_coordenador do prédio</th>
            <th>ID da dívida a liquidar</th>
        </tr>
        
        @foreach ($pagamentos as $pagamento)
            <tr>
                <td>{{ $pagamento -> n_codipagam }}</td>
                <td>{{ $pagamento -> n_valopagam }}</td>
                <td>{{ $pagamento -> c_descpagam }}</td>
                <td>{{ $pagamento -> c_formpagam }}</td>
                <td>{{ $pagamento -> c_bancpagam }}</td>
                <td>{{ $pagamento -> n_codibanco }}</td>
                <td>{{ $pagamento -> n_estapagam }}</td>
                <td>{{ $pagamento -> n_codicoord }}</td>
                <td>{{ $pagamento -> n_codidivid }}</td>
                
            </tr>
        @endforeach
        

    </table>

@endsection