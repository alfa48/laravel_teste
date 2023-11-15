@extends('layouts.app')

@section('title','Apartamentos')

@section('content')

    
    <div>
        <h1>Criar Taxa</h1>
        <hr>
        <form action="{{ route('taxas-store') }}" method="post">
            @csrf


                        <!-- Selects-->
            <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr">
                <option value="" >Selecione a centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>

            <select id="select-blocos" class="hidden" onchange="findPrediosViaAjax(this.value)"  name="n_codibloco">
                <option value="" >Selecione o Bloco</option>            
            </select>

            <select id="select-predios" class="hidden" onchange="findCoordenadorPredioViaAjax(this.value)"  name="n_codipredi">
                <option value="" >Selecione o Prédio</option>            
            </select>

            <h4>Taxa Para o prédio</h4>

            <input type="textarea" name="c_desctaxa" placeholder="descrição da taxa" required>
            <input pattern="[0-9]+(\.[0-9]+)?" name="n_valotaxa" placeholder="volor da taxa" required>
            <input pattern="\d*" name="n_praztaxa" placeholder="prazo em dias">
            <input type="number" min='0' max='100' pattern="\d*" name="n_permtaxa" placeholder="percentagem da multa" required></input>
            <input type="date"  name="d_denvtaxa" placeholder="data de envio" required>
            <input pattern="\d*" id="input-idCoordenador" class="oculto" name="n_codicoord" required>
            
            <select name="c_freqtaxa">
                <option value="uma vez">UMA VEZ</option>
                <option value="diariamente">DIARIO</option>
                <option value="semanalmente">SEMANAL</option>
                <option value="quinzenalmente">QUINZENAL</option>
                <option value="mensalmente">MENSAL</option>
                <option value="trimestralmente">TRIMESTRAL</option>
                <option value="semestralmente">SEMESTRAL</option>
                <option value="anualmente">ANUAL</option>
                <option value="TESTE">TESTE</option>
            </select>

           
            <input type="submit" value="Salvar">
        </form>
    </div>

    
     <!-- LISTA DOS PÉDIOS -->
     <h1>Lista dos Prédios</h1>
    <hr>
    <table>

<tr>
    <th>Nome</th>
    <th>Apelido</th>
    <th>Entidade a Coordenar</th>
    <th>ID</th>
    <th>ID da Entidade a Coordenar</th>
</tr>

@foreach ($coordenadores as $coordenador)
    <tr>
        <td>{{ $coordenador -> c_nomecoord }}</td>
        <td>{{ $coordenador -> c_apelcoord }}</td>
        <td>{{ $coordenador -> c_nomeentid }}</td>
        <td>{{ $coordenador -> n_codicoord }}</td>
        <td>{{ $coordenador -> n_codientid }}</td>
    </tr>
@endforeach


</table>
  
@endsection