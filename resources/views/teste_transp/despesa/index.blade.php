@extends('layouts.app')

@section('title','Taxas')

@section('content')
<h4>centralidade / bloco / prédio / caixa</h4>
   
    <form action="{{ route('despesas-index') }}" method="get">
            @csrf

            <!-- Selects-->
            <select id="selectPrincipal" onchange="findBlocosViaAjax(this.value)"  name="n_codicentr" required>
                <option value="" >Selecione a centralidade</option>
                @foreach ($centralidades as $centralidade)
                <option value="{{ $centralidade -> n_codicentr }}">{{ $centralidade -> c_desccentr }}</option>
                @endforeach
                
            </select>

            <select id="select-blocos" class="hidden" onchange="findPrediosViaAjax(this.value)"  name="n_codibloco" required>            
            </select>

            <select id="select-predios" class="hidden" onchange="findCoordenadorDoPredioViaAjax(this.value)"  name="n_codipredi" required>            
            </select>

            <input type="submit" value="Pesquisar">
    </form>
    
    <form class="form_despesa" action="{{ route('despesas-index') }}" method="get">
            @csrf
            <h4>Criar despesa para o prédio</h4>
            <input type="text" name="c_objedespe" placeholder="objectivo dos valores" required>
            <input type="number" name="n_valodespe" placeholder="valor" required>
            <input type="number" class="oculto" value="" id="coordenador" name="n_codicoord" required>
            <select  class="hidden" name="c_fontdespe" required>
                <option value="" >Seleciona a fonte da renda</option>
                <option value="caixa">caixa</option>
                <option value="BFA" >BFA</option>
                <option value="BAI" >BAI</option>
                <option value="BIC" >BIC</option>
                <option value="BPC" >BPC</option>
                <option value="BCA" >BCA</option>
                <option value="BIR" >BIR</option>
                <option value="BNI" >BNI</option>
                <option value="BPR" >BPR</option>
                <option value="BDA" >BDA</option>
                <option value="BMF" >BMF</option>
                <option value="SBA" >SBA</option>
                <option value="BCI" >BCI</option>
                <option value="BPA" >BPA</option>
                <option value="BANC" >BANC</option>
                <option value="BPPH" >BPPH</option>
            </select>

            <input type="submit" value="Cadastrar">
    </form>
    <hr>

    <h2>Caixa do prédio: #</h2>
    <table>

        <tr>
            <th>ID caixa</th>
            <th>Saldo</th>
            <th>Limite de saque</th>
            <th>Entidade</th>
            <th>ID entidade</th>
        </tr>
    
               @if (!is_null($caixa))
                    <tr>
                            <td>{{ $caixa-> n_codicaixa }}</td>
                            <td>{{ $caixa-> n_saldcaixa }}</td>
                            <td>{{ $caixa-> n_limicaixa }}</td> 
                            <td>{{ $caixa-> c_nomeentid }}</td>
                            <td>{{ $caixa-> n_codientid }}</td>  
                    </tr>            
                @else
                    <tr>
                        <td colspan="5"></td>
                    </tr>                   
               @endif
       
    </table>

    <h2>Bancos do coordenador do prédio: #</h2>
    <table>

        <tr>
            <th>ID banco</th>
            <th>Saldo</th>
            <th>Banco</th>
            <th>Entidade</th>
            <th>ID entidade</th>
        </tr>
    
               @foreach ($bancos as $banco)
                    <tr>
                            <td>{{ $banco-> n_codibanco }}</td>
                            <td>{{ $banco-> n_saldbanco }}</td>
                            <td>{{ $banco-> c_entibanco }}</td> 
                            <td>{{ $banco-> c_nomeentid }}</td>
                            <td>{{ $banco-> n_codientid }}</td>  
                    </tr>            
                @endforeach
       
    </table>
    <hr>
    <h2>Despesas do prédio: #</h2>
<table id="tableDespesas">

    <tr>
        <th>ID despesa</th>
        <th>Descrição da despesa</th>
        <th>Valor</th>
        <th>Fonte da dos valores</th>
        <th>Data de aquisição dos valores</th>
        <th>Data de criação da despesa</th>
    </tr>

       @foreach ($despesasPredio as $despesa)
            <tr onclick="selectRowPagamento(this)">
                    <td>{{ $despesa-> n_codidespe }}</td>
                    <td>{{ $despesa-> c_objedespe }}</td>
                    <td>{{ $despesa-> n_valodespe }}</td>
                    <td>{{ $despesa-> c_fontdespe }}</td> 
                    <td>{{ $despesa-> d_dasadespe }}</td>
                    <td>{{ $despesa-> d_dacrdespe }}</td>
            </tr>            
        @endforeach

</table>

@endsection