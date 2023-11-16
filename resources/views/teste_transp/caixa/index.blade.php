@extends('layouts.app')

@section('title','Taxas')

@section('content')
<h4>centralidade / bloco / prédio / caixa</h4>
   
<form action="{{ route('caixas-index') }}" method="get">
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

            <input type="submit" value="Pesquisar">
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
    <h2>Pagamentos feitos pelos moradores do prédio: #</h2>
<table id="tablePagamentos">

    <tr>
        <th>ID pagamento</th>
        <th>Descrição do pagamento</th>
        <th>Valor</th>
        <th>Forma de pagamento</th>
        <th>Data de pagamento</th>
        <th>Data de confirmação do pagamento</th>
        <th>Banco</th>
        <th>Estado do pagamento</th>
        <th>ID dívida</th>
        <th>ID Apartamento</th>
        <th>ID Coordenador</th>
    </tr>

       @foreach ($pagamentosPredio as $pagamento)
            <tr onclick="selectRowPagamento(this)">
                    <td>{{ $pagamento-> n_codipagam }}</td>
                    <td>{{ $pagamento-> c_descpagam }}</td>
                    <td>{{ $pagamento-> n_valopagam }}</td>
                    <td>{{ $pagamento-> c_formpagam }}</td> 
                    <td>{{ $pagamento-> d_datapagam }}</td>
                    <td>{{ $pagamento-> d_dacopagam }}</td>
                    <td>{{ $pagamento-> c_bancpagam }}</td>
                    <td>{{ $pagamento-> n_estapagam }}</td> 
                    <td>{{ $pagamento-> n_codidivid }}</td>
                    <td>{{ $pagamento-> n_codiapart }}</td>
                    <td>{{ $pagamento-> n_codicoord }}</td>  
            </tr>            
        @endforeach

</table>

        <form action="{{ route('caixas-index') }}" method="get">
            @csrf

            <input type="number" class="oculto" value="" id="pagamento" name="n_codipagam" required>
            <input type="number" class="oculto" value="" id="coordenador" name="n_codicoord" required>
            <input type="submit" value="Confirmar Pagamento">
        </form>

@endsection