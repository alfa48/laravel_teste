@extends('layouts.app')

@section('title','Apartamentos')

@section('content')

    
    <div>
    <h4>centralidade / bloco / prédio / apartamanto / dividas</h4>
        

        <h1>Criar Pagamento</h1>
        <hr>
        <form action="{{ route('pagamentos-store') }}" method="post">
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

            <select id="select-apartamentos" class="hidden" onchange="findDividasApartamentoViaAjax(this.value)" name="n_codiapart">
                <option value="" >Selecione apartamento</option>            
            </select>

            <h4>Dividas do Apartamento#</h4>

<table id="tableDividas">

    <tr>
        <th>ID dívida</th>
        <th>Descrição da dívida</th>
        <th>Valor a pagar</th>
        <th>Estádo</th>
        <th>Prázo em dias</th>
        <th>Data da Criação</th>
        <th>Valor da Multa</th>
        <th>Data Para a contração da multa</th>
        <th>Conta do apartamento</th>

    </tr>

    @if (count($dividas) !== 0)
        @foreach ($dividas as $divida)
            <tr onclick="selectRow(this)">
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="9"></td>
            </tr>                   
    @endif
    
</table>
        
            <input type="textarea" name="c_descpagam" placeholder="descrição">
            <input type="date" name="d_datapagam" placeholder="data de pagamento"/>
            <input pattern="[0-9]+(\.[0-9]+)?" name="n_valopagam" placeholder="volor do pagamento" required>
            <input class="oculto" type="number" id="codidivida" name="n_codidivid" placeholder="ID da divida" required>
            
            <select name="c_formpagam" require>
                <option value="cash">cash</option>
                <option value="transferência">transferência</option>
            </select>
            <select name="c_bancpagam">
            <option value="">banco de pagamamento</option>
                <option value="BFA">BFA</option>
                <option value="BAI">BAI</option>
                <option value="BIC">BIC</option>
                <option value="BPC">BPC</option>
                <option value="BCA">BCA</option>
                <option value="BIR">BIR</option>
                <option value="BNI">BNI</option>
                <option value="BANC">BANC</option>
                <option value="BFA">BCI</option>
                <option value="BAI">BPA</option>
                <option value="BIC">SBA</option>
                <option value="BPC">BPPH</option>
                <option value="BCA">BMF</option>
                <option value="BDA">BDA</option>
                <option value="BPR">BPR</option>
            </select>

            <input type="submit" value="Salvar">
        </form>

</div>

    
  
<script>
    
    function selectRow(row){
        var inputElement = document.getElementById('codidivida');
        var table = document.getElementById('tableDividas');
        var rows = table.getElementsByTagName("tr");

        for(var i = 0; i < rows.length;i++){
            rows[i].classList.remove("selecionado");
        }
        console.log(row);
        row.classList.add("selecionado");
        var cells = row.getElementsByTagName('td');
        var values = [];
        for(var j = 0; j < cells.length; j++){
            values.push(cells[j].innerText);
        }
        console.log(values[0]);
        inputElement.setAttribute('value',values[0])
    }

</script>

@endsection