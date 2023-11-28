@extends('layouts.index')

@section('title', 'Vacinas')

@section('content')
    @foreach($vacinas as $vacina)
        <p>
            {{  $vacina->Lote . ", " .
                $vacina->Fabricante . ", " .
                $vacina->Nome_Vacina . ", " .
                $vacina->Validade . ", " .
                $vacina->Quantidade_Doses }}
        </p>
        <a type="button" href="{{ route('index.vacinas.edit', $vacina->Lote)}}">
            <button>EDITAR</button></a>
    @endforeach
@endsection
