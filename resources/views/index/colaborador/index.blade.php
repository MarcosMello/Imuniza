@extends('layouts.index')

@section('title', 'Colaboradores')

@section('content')
    @foreach($colaboradores as $colaborador)
        <p>
            {{  $colaborador->UBS_CNES_UBS . ", " .
                $colaborador->Matricula . ", " .
                $colaborador->CPF . ", " .
                $colaborador->Nome . ", " .
                $colaborador->Data_Admissao . ", " .
                $colaborador->Cargo . "."   }}
        </p>
        <a type="button" href="{{ route('index.colaboradoresEdit', [$colaborador->UBS_CNES_UBS, $colaborador->Matricula])}}">
            <button>EDITAR</button></a>
    @endforeach
@endsection
