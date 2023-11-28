@extends('layouts.index')

@section('title', 'Vacinas')

@section('content')
    <form action="{{ isset($vacina) ? route("index.vacinas.update", $vacina->Lote) : route("index.vacinas.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($vacina)
            @method("PUT")
        @else
            @method("POST")
        @endisset

        @component('index.vacinas.form', [ "vacina" => isset($vacina) ? $vacina : null])
        @endcomponent
    </form>
@endsection
