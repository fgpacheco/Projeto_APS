@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do Servidor: {{ $servidor->nome }}</h1>
    <ul>
        <li>
            <b>cargo:</b> {{ $servidor->cargo }}
        </li>
        <li>
            <b>Matricula:</b> {{ $servidor->matricula }}
        </li>
        <li>
            <b>Cadastrado por: </b> {{ $servidor->usuario->name}}
        </li>
    </ul>
@stop