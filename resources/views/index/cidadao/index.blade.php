@extends('layouts.index')

@section('title', 'Cidadãos')

@section('content')
    @foreach($cidadaos as $cidadao)
        <p>
                {{ $cidadao->Numero_SUS . ", " .
                   $cidadao->CPF . ", " .
                   $cidadao->Nome . ", " .
                   $cidadao->Data_de_nascimento . ", " .
                   $cidadao->Nome_da_mae . ", " .
                   $cidadao->Estado_civil . "," .
                   $cidadao->Escolaridade . "," .
                   $cidadao->Etnia . "," .
                   $cidadao->Possui_plano . "," .
                   $cidadao->Logradouro . "," .
                   $cidadao->Numero . "," .
                   $cidadao->Cidade . "," .
                   $cidadao->Estado . "," .
                   $cidadao->Complemento . "."}}
        </p>
        <a type="button" href="{{ route('index.cidadao.edit', $cidadao->Numero_SUS)}}">
            <button>EDITAR</button></a>
    @endforeach
@endsection
