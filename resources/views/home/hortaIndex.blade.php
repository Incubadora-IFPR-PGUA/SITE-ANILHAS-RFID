@extends('index')

@section('conteudo')
    <div class="text-center my-4">
        <span class="fs-4 fw-bold text-dark">
            Seja bem-vindo(a)
            <span class="text-primary">{{ Auth::user()->name }}</span>
            <br>
            ao Sistema Smart Horta!
        </span>
    </div>
@endsection