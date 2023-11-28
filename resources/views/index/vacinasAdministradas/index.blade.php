@extends('layouts.index')

@section('title', 'Vacinas Administradas')

@section('content')
    @foreach($vacinasAdministradas as $vacinaAdministrada)
        <p>
            {{  $vacinaAdministrada->Cidadao_Numero_SUS . ", " .
                $vacinaAdministrada->Vacinas_Lote . ", " .
                $vacinaAdministrada->Colaborador_CNES_UBS . ", " .
                $vacinaAdministrada->Colaborador_Matricula . ", " .
                $vacinaAdministrada->Data_Aplicacao . ", " .
                $vacinaAdministrada->Tipo_Vacina . "."   }}
        </p>
        <a type="button" href="{{ route('index.vacinasAdministradasEdit', [$vacinaAdministrada->Cidadao_Numero_SUS, $vacinaAdministrada->Vacinas_Lote, $vacinaAdministrada->Data_Aplicacao])}}">
            <button>EDITAR</button></a>
    @endforeach
@endsection
