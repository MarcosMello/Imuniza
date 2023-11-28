@extends('layouts.index')

@section('title', 'UBS')

@section('content')
    <form action="{{ isset($ubs) ? route("index.ubs.update", $ubs->CNES_UBS) : route("index.ubs.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($ubs)
            @method("PUT")
        @else
            @method("POST")
        @endisset

        @component('index.ubs.form', [ "ubs" => isset($ubs) ? $ubs : null])
        @endcomponent
    </form>
@endsection
