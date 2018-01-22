@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do setor: {{ $setor->descricao }}</h1>
    <ul>
        <li>
            <b>Sala:</b>
            <ul>
                <li>
                    Descrição: {{ $setor->sala->descricao }}
                </li>
                <li>
                    Ramal: {{ $setor->sala->ramal }}
                </li>
            </ul>
        </li>
        <li>
            <b>Servidor Responsável: </b> {{ $setor->servidor->nome}}
        </li>
        <li>
            <b>Curso: </b> {{ $setor->curso->nome}}
        </li>
    </ul>
@stop