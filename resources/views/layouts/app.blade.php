<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body{
            background-color: darkgray;
        }
        table{
            border-collapse: collapse;
        }
        th,td{
            border: 1px solid black;
            padding: 8px;
        }
        input{
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type='submit']{
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        select{
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
        }
        nav{
            background-color: #333;
            padding: 10px;
        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li{
            display: inline-block;
        }
        li a{
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }
        li a:hover{
            background-color: #555;
        }
        .oculto{
            display: none;
        }
       /* .form_despesa{
            display: none;
        }*/
       .selecionado{
            background-color: yellowgreen;
            font-size: 15px;
            background-color: #4CAF50 /*#ccc #555 #f2f2f2*/;
        }
    </style>
</head>
<body>
    <nav>

        <ul>
            <li><a href="{{ route('testes-index') }}">Página inicial</a></li>
            <li><a href="#">Objectivo</a></li>
        </ul>

    </nav>
    
    @yield('content')
</body>

<!-- SCRIPT-->
<script>
    
// pegar os blocos
        function findBlocosViaAjax(valor){ 
           console.log('oló');
           const arquivo ={
                id:98
           }
           const selectElement = document.getElementById('select-blocos');
           selectElement.innerHTML = "<option value='' >Selecione o Bloco</option>"; 
           fetch('/findblocos?id='+valor,{
              /*  
                method:'post',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body:JSON.stringify(arquivo)
                */
            }).then(response=>response.text()).then(data=>{
                
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   const optionElement = document.createElement('option');
                   optionElement.value = elemento.n_codibloco;
                   optionElement.textContent = elemento.c_descbloco;
                   selectElement.appendChild(optionElement);
                });
            });       
         }


// pegar os prédios
         function findPrediosViaAjax(valor){ 
           console.log('olá');

           const selectElement = document.getElementById('select-predios');
           selectElement.innerHTML = "<option value='' >Selecione o Prédio</option>"; 
           fetch('/findpredios?id='+valor,{
              /*  
                method:'post',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body:JSON.stringify(arquivo)
                */
            }).then(response=>response.text()).then(data=>{
                
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   const optionElement = document.createElement('option');
                   optionElement.value = elemento.n_codipredi;
                   optionElement.textContent = elemento.c_descpredi+' Entrada '+elemento.c_entrpredi;
                   selectElement.appendChild(optionElement);
                });
            });
         }

 // pegar os apartamentos
         function findApartamentosViaAjax(valor){ 
           console.log('olaá');

           const selectElement = document.getElementById('select-apartamentos');
           selectElement.innerHTML = "<option value='' >Selecione apartamento</option>"; 
           fetch('/findapartamentos?id='+valor,{
            }).then(response=>response.text()).then(data=>{       
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   const optionElement = document.createElement('option');
                   optionElement.value = elemento.n_codiapart;
                   optionElement.textContent = 'Porta '+ elemento.c_portapart;
                   selectElement.appendChild(optionElement);
                });
            });       
         }
         //Com moradores
         function findApartamentosComViaAjax(valor){ 
           console.log('olaá');

           const selectElement = document.getElementById('select-apartamentos');
           selectElement.innerHTML = "<option value='' >Selecione apartamento</option>"; 
           fetch('/findapartamentoscommoradores?id='+valor,{
            }).then(response=>response.text()).then(data=>{       
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   const optionElement = document.createElement('option');
                   optionElement.value = elemento.n_codiapart;
                   optionElement.textContent = 'Porta '+ elemento.c_portapart;
                   selectElement.appendChild(optionElement);
                });
            });       
         }
    //Sem moradores
         function findApartamentosSemViaAjax(valor){ 
           console.log('olaá');

           const selectElement = document.getElementById('select-apartamentos');
           selectElement.innerHTML = "<option value='' >Selecione apartamento</option>"; 
           fetch('/findapartamentossemmoradores?id='+valor,{
            }).then(response=>response.text()).then(data=>{       
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   const optionElement = document.createElement('option');
                   optionElement.value = elemento.n_codiapart;
                   optionElement.textContent = 'Porta '+ elemento.c_portapart;
                   selectElement.appendChild(optionElement);
                });
            });       
         }

// pegar os apartamentos
      function findCoordenadorPredioViaAjax(valor){ 
           console.log('oloaá');

           const selectElement = document.getElementById('input-idCoordenador');
           fetch('/findprediocoordenador?id='+valor,{
              /*  
                method:'post',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body:JSON.stringify(arquivo)
                */
            }).then(response=>response.text()).then(data=>{
                
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);
                selectElement.value = objectos[0].n_codicoord;
             });       
         }


 // pegar as dividas
      function findDividasApartamentoViaAjax(valor){ 
           console.log('oloaáá');
           console.log(valor);
           /*apartamentos com dividas: predio 2(A-entrada B) bloco 7(C) centralidade 1(Cequuele) */

           const tableElement = document.getElementById('tableDividas');
           tableElement.innerHTML = "<tr><th>Descrição da dívida</th><th>Valor a pagar</th><th>Valor pago</th><th>Valor pendente</th><th>Estádo</th><th>Prázo em dias</th><th>Data da Criação</th><th>Valor da Multa</th><th>Data Para a contração da multa</th></tr>";
          
           fetch('/finddividasapartamentos?id='+valor,{
              /*  
                method:'post',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body:JSON.stringify(arquivo)
                */
            }).then(response=>response.text()).then(data=>{
                
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);

                objectos.forEach((elemento)=>{
                   //Todo continua... preencher as tabelas apartir daqui~
                   const trElement = document.createElement("tr");
                   trElement.setAttribute('onclick','selectRowDivida(this)');
                   trElement.value = elemento.n_codidivid;
                   //trElement.onclick = "selectRow(this)";
                   
                  // trElement.addEventListener(onclick,selectRow(trElement));
                    console.log(trElement.getAttributeNames);




                    const tdElement0 = document.createElement('td');
                   tdElement0.textContent = elemento.n_codidivid;
                   tdElement0.setAttribute('class','oculto');
                   trElement.appendChild(tdElement0);
                   
                   const tdElement01 = document.createElement('td');
                   tdElement01.textContent = elemento.n_codicoord;
                   tdElement01.setAttribute('class','oculto');
                   trElement.appendChild(tdElement01);
                   
                   const tdElement2 = document.createElement('td');
                   tdElement2.textContent = elemento.c_descdivid;
                   trElement.appendChild(tdElement2);
                   
                   const tdElement3 = document.createElement('td');
                   tdElement3.textContent = elemento.n_valtdivid;
                   trElement.appendChild(tdElement3);

                   const tdElement1 = document.createElement('td');
                   tdElement1.textContent = elemento.n_vapadivid;
                   trElement.appendChild(tdElement1);

                    const tdElement = document.createElement('td');
                   tdElement.textContent = elemento.n_vapedivid;
                   trElement.appendChild(tdElement);

                   
                   const tdElement4 = document.createElement('td');
                   tdElement4.textContent = elemento.c_estadivid;
                   trElement.appendChild(tdElement4);

                   const tdElement5 = document.createElement('td');
                   tdElement5.textContent = elemento.n_prazdivid;
                   trElement.appendChild(tdElement5);

                   const tdElement6 = document.createElement('td');
                   tdElement6.textContent = elemento.d_dacrdivid;
                   trElement.appendChild(tdElement6);

                   const tdElement7 = document.createElement('td');
                   tdElement7.textContent = elemento.n_vmuldivid;
                   trElement.appendChild(tdElement7);

                   const tdElement8 = document.createElement('td');
                   tdElement8.textContent = elemento.d_dcomdivid;
                   trElement.appendChild(tdElement8);

                   tableElement.appendChild(trElement);

                });
                
             });       
         }

//Seleciona dividas
      function selectRowDivida(row){
        var tdElement = document.getElementById('codidivida');
        var tdElement1 = document.getElementById('codicoordenador');
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
        console.log("AQUI:"+values);
        tdElement.setAttribute('value',values[0])
        tdElement1.setAttribute('value',values[1])
    }

//Seleciona Pagamentos
    function selectRowPagamento(row){
        var tdElementPagamento = document.getElementById('pagamento');
        var tdElementCoordenador = document.getElementById('coordenador');
        var table = document.getElementById('tablePagamentos');
        var rows = table.getElementsByTagName("tr");

        for(var i = 0; i < rows.length;i++){
            rows[i].classList.remove("selecionado");
        }
        row.classList.add("selecionado");

        var cells = row.getElementsByTagName('td');
        var values = [];
        for(var j = 0; j < cells.length; j++){
            values.push(cells[j].innerText);
        }
        console.log(values);
        console.log(values[10]);
         tdElementCoordenador.setAttribute('value',values[10])
         tdElementPagamento.setAttribute('value',values[0])
    }  
    
    

    function mostraFormulario(value){
        var inputElementPagamento = document.getElementById('despesa');
        //metodo para estar ou ser chamado no select dos predios
        //objectivo: fazer o vormulario oculto para cadastrar as despesas aparecer
        // e alterar os value do input codicoord para o codicoord do predio selecionado
        
    }

     // pegar os apartamentos
     function findCoordenadorDoPredioViaAjax(valor){ 
           console.log('olaá');

           const selectElement = document.getElementById('select-apartamentos');
           const inputCoord = document.getElementById('coordenador');
           fetch('/findcoordenador?id='+valor,{
            }).then(response=>response.text()).then(data=>{       
                //como trasformar string num objecto ou como receber um srrsy de objectos
                console.log(data)
                const objectos = JSON.parse(data);
                console.log(objectos[0].n_codicoord)
                inputCoord.value = objectos[0].n_codicoord;
                
            });       
         }

/*
//Seleciona Despesas
    function selectRowPagamento(row){
        var inputElementPagamento = document.getElementById('despesa');
        var inputElementCoordenador = document.getElementById('coordenador');
        var table = document.getElementById('tableDespesas');
        var rows = table.getElementsByTagName("tr");

        for(var i = 0; i < rows.length;i++){
            rows[i].classList.remove("selecionado");
        }
        row.classList.add("selecionado");

        var cells = row.getElementsByTagName('td');
        var values = [];
        for(var j = 0; j < cells.length; j++){
            values.push(cells[j].innerText);
        }
        console.log(values);
        console.log(values[10]);
         inputElementCoordenador.setAttribute('value',values[10])
         inputElementPagamento.setAttribute('value',values[0])
    }    
*/
    </script>

</html>