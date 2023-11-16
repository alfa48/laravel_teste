@extends('layouts.app')

@section('title','Apartamentos')

@section('content')

    
    <div>
        <h1>Criar Apartamento</h1>
        <hr>
        <form action="{{ route('apartamentos-store') }}" method="post">
            @csrf

            <!-- Selects-->
            <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr">
                <option value="" >Selecione a centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>

            <select id="select-blocos" class="hidden" onchange="findPrediosViaAjax(this.value)"  name="n_codibloco">
             </select>

            <select id="select-predios" class="hidden" name="n_codipredi">          
            </select>

            <h3>Apartamento</h3>

            <input type="text" name="c_portapart" placeholder="digite a porta" required>
            <input type="text" name="c_tipoapart" placeholder="digite a tipologia" required>
            <input type="submit" value="Salvar">
        </form>
    </div>

    
     <!-- LISTA DOS PÉDIOS -->
     <h1>Lista dos Prédios</h1>
    <hr>
    <table>

<tr>
    <th>Predio</th>
    <th>Entrada</th>
    <th>Bloco</th>
    <th>Coordenador</th>
    <th>Id</th>
</tr>

@foreach ($predios as $predio)
    <tr>
        <td>{{ $predio -> c_descpredi }}</td>
        <td>{{ $predio -> c_entrpredi }}</td>
        <td>{{ $predio -> n_codibloco }}</td>
        <td>{{ $predio -> n_codicoord }}</td>
        <td>{{ $predio -> n_codipredi }}</td>
    </tr>
@endforeach


</table>
  
@endsection