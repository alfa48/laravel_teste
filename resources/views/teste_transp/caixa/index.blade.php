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
                <option value="" >Selecione o Bloco</option>            
            </select>

            <select id="select-predios" class="hidden" name="n_codipredi">
                <option value="" >Selecione o Prédio</option>            
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
    
@endsection