@extends('layout.principal')
@section('conteudo')
    <div class="alert alert-danger">
        <strong>Servidor não pode ser excluido, pois está vinculado a um setor</strong>
    </div>
    <a href="{{action('ServidorController@listar')}}" class="btn-sm btn-success  glyphicon glyphicon-hand-left"> Voltar<br/></a>

@stop