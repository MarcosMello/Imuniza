@extends('layouts.index')

@section('title', 'UBS')

@section('content')
    @foreach($ubs as $singleUBS)
        <p>
            {{  $singleUBS->CNES_UBS . ", " .
                $singleUBS->Nome . ", " .
                $singleUBS->Telefone . ", " .
                $singleUBS->Logradouro . ", " .
                $singleUBS->Cidade . ", " .
                $singleUBS->Estado . ", " .
                $singleUBS->Numero . ", " .
                $singleUBS->Complemento . "."}}
        </p>
        <a type="button" href="{{ route('index.ubs.edit', $singleUBS->CNES_UBS)}}">
            <button>EDITAR</button></a>
    @endforeach
@endsection
