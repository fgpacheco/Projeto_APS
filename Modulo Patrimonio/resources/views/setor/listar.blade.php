@extends('layout.principal')
@section('conteudo')

@if(empty($setores))
<div class="alert alert-danger">
    Você não tem nenhum setor cadastrado.
</div>
@else
<h1>Setores cadastrados</h1>
<form method="get" action="/setor/pesquisar">
    <div class="form-group col-lg-3">
        <input type="text" name="nome" class="form-control" placeholder="Pesquisar..." />
    </div>
    <button type="submit"
            <span class="btn-sm btn-success glyphicon glyphicon-search"></span>
    </button>
    @can('criar-global')
    <a href="{{action('SetorController@novo')}}" class="btn-sm btn-success  glyphicon glyphicon-plus" > Setor<br/></a>
    @endcan
</form>

<div class="dropdown col-md-4 col-md-offset-10">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ordenar por
        <span class="caret"></span></button>
    <ul class="dropdown-menu col-md-2 col-md-offset-2">
        <li><a href="{{action('SetorController@ordemAlfabetica')}}">Nome</a></li>
        <li><a href="{{action('SetorController@ordemCurso')}}">Curso</a></li>
    </ul>
</div>


<table class="tini table table table-hover table-striped table-bordered" id="servidor-table"  >

            <thead class = "thead-inverse" >
            <td>@lang('messages.nome')</td>
            <td>@lang('messages.sala')</td>
            <td>@lang('messages.servidor')</td>
            <td>@lang('messages.curso')</td>
            <td class="col-lg-1 text-center">@lang('Detalhes')</td>
            <td class="col-lg-1 text-center">@lang('Remover')</td>
            <td class="col-lg-1 text-center">@lang('Editar')</td>
            </thead>

@foreach ($setores as $setor)
<tbody>
    <tr>
        <td>{{$setor->descricao}}</td>
        <td>{{$setor->sala->descricao}}</td>
        <td>{{$setor->servidor->nome}}</td>
        <td>{{$setor->curso->nome}}</td>

        <td class="text-center">@can('visualizar-global')<a href="{{action('SetorController@visualizar', $setor->id)}}"><span class="glyphicon glyphicon-list-alt"></span></a>@endcan</td>
        <td class="text-center">@can('remover-global')<a href="{{action('SetorController@remover', $setor->id)}}" onclick="return confirm('Deseja realmente excluir este item?')"><span class="glyphicon glyphicon-trash"></span></a>@endcan</td>
        <td class="text-center">@can('editar-global')<a href="{{action('SetorController@recuperar', $setor->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>@endcan</td>
    </tr>
</tbody>
@endforeach

</table>
@endif

{!!$setores->links()!!}

@if(old('descricao'))
<div class="alert alert-success">
    <strong>O Setor {{ old('descricao')}} foi adicionado com sucesso !</strong>.
</div>
@elseif(old('curso_id')) <!-- curso_id usado apenas como condição de controle -->
<div class="alert alert-success">
    <strong>Setor atualizado com sucesso !</strong>.
</div>
@endif
@stop

