@extends('layouts.app')

@section('title','Centralidades')

@section('content')

    
    <div>
        <h1>Criar Centralidades</h1>
        <hr>
        <form action="{{ route('centralidades-store') }}" method="post">
            @csrf
            <input type="text" name="c_desccentr" placeholder="digite o nome da centr..." required>
           <h4>Endereço</h4>
           <input type="text" name="c_paisender" value="Angola" placeholder="país" required>
           <input type="text" name="c_provender" placeholder="província" required>
           <input type="text" name="c_muniender" placeholder="município" required>
           <input type="text" name="c_bairender" placeholder="bairro">
            <input type="submit" value="Salvar">
        </form>
    </div>


@endsection