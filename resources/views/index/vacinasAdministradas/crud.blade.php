@extends('layouts.index')

@section('title', 'Vacinas Administradas')

@section('content')
    <form action="{{ isset($vacinaAdministrada) ? route("index.vacinasAdministradasUpdate", [$vacinaAdministrada->Cidadao_Numero_SUS, $vacinaAdministrada->Vacinas_Lote, $vacinaAdministrada->Data_Aplicacao]) : route("index.vacinasAdministradas.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($vacinaAdministrada)
            @method("PUT")
        @else
            @method("POST")
        @endisset

        @component('index.vacinasAdministradas.form', [ "vacinaAdministrada" => isset($vacinaAdministrada) ? $vacinaAdministrada : null])
        @endcomponent
    </form>
@endsection
