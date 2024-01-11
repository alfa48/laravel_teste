@extends('layouts.app')

@section('title','Teste')

@section('content')

    <h2>Página de Testes</h2>
    <hr/>


    <table>

        <tr>
            <th>Centralidades</th>
            <th>Blocos</th>
            <th>Prédios</th>
            <th>Apartamentos</th>
            <th>Moradores</th>
            <th>Taxas</th>
            <th>Pagamentos</th>
            <th>Caixas/Bancos</th>
            <th>Bancos</th>
            <th>Despesas</th>
            
        </tr>
        
            <tr>
                <td>
                <form action="{{ route('centralidades-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('blocos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('predios-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('apartamentos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('moradores-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('taxas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('pagamentos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('caixas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('bancos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>


                <td>
                <form action="{{ route('despesas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

            </tr>
        

    </table>
    <br>
    <table>

        <tr>
            <th>Esp. públicos</th>
            <th>Esp. comercias</th>
            <th>Prédios</th>
            <th>Apartamentos</th>
            <th>Moradores</th>
            <th>Taxas</th>
            <th>Pagamentos</th>
            <th>Caixas/Bancos</th>
            <th>Bancos</th>
            <th>Despesas</th>
            
        </tr>
        
            <tr>
                <td>
                <form action="{{ route('centralidades-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('blocos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('predios-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('apartamentos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('moradores-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('taxas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('pagamentos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('caixas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

                <td>
                <form action="{{ route('bancos-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>


                <td>
                <form action="{{ route('despesas-index') }}" method="get">
                    <input value="testar" type="submit"/>
                </form>
                </td>

            </tr>
        

    </table>

@endsection