@extends('layouts.app')

@section('title','Moradores')

@section('content')

    
    <div>
        <h1>Cadastrar Morador</h1>
        <hr>
        <form action="{{ route('moradores-store') }}" method="post">
            @csrf

                 <!-- Selects-->
                 <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr">
                <option value="" >Selecione centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>

            <select id="select-blocos" class="hidden" onchange="findPrediosViaAjax(this.value)"  name="n_codibloco">
                <option value="" >Selecione bloco</option>            
            </select>

            <select id="select-predios" class="hidden" onchange="findApartamentosViaAjax(this.value)" name="n_codipredi">
                <option value="" >Selecione prédio</option>            
            </select>

            <select id="select-apartamentos" class="hidden" name="n_codiapart">
                <option value="" >Selecione apartamento</option>            
            </select>

            <h3>Morador</h3>


            <input type="text" name="c_nomemorad" placeholder="digite o nome" required>
            <input type="text" name="c_apelmorad" placeholder="digite o apelido" required>
            <input pattern="\d*" name="c_bilhmorad" placeholder="digite o número do BI">
            <input type="submit" value="Salvar">
        </form>
    </div>

    
     <!-- LISTA DOS APARTAMETO -->
     <h1>Lista dos Apartamentos</h1>
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