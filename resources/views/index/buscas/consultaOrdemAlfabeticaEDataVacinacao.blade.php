@extends('layouts.index')

@section('title', 'Consulta')

@section('content')
    @foreach($entries as $entry)
        <p>
            {{  $entry->Numero_SUS . ", " .
                $entry->Nome . ", " .
                $entry->Data_de_nascimento . ", " .
                $entry->Data_Aplicacao . "."}}
        </p>
    @endforeach
@endsection
