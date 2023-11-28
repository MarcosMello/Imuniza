@extends('layouts.index')

@section('title', 'Colaboradores')

@section('content')
    <form action="{{ isset($colaborador) ? route("index.colaboradoresUpdate", [$colaborador->UBS_CNES_UBS, $colaborador->Matricula]) : route("index.colaboradores.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($colaborador)
            @method("PUT")
        @else
            @method("POST")
        @endisset

        @component('index.colaborador.form', [ "colaborador" => isset($colaborador) ? $colaborador : null])
        @endcomponent
    </form>
@endsection
