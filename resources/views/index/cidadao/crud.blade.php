@extends('layouts.index')

@section('title', 'Cidadãos')

@section('content')
    <form action="{{ isset($cidadao) ? route("index.cidadao.update", $cidadao->Numero_SUS) : route("index.cidadao.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($cidadao)
            @method("PUT")
        @else
            @method("POST")
        @endisset

        @component('index.cidadao.form', [ "cidadao" => isset($cidadao) ? $cidadao : null])
        @endcomponent
    </form>
@endsection
