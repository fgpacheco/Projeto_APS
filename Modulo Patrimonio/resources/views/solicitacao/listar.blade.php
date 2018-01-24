@extends('layout.principal')
@section('conteudo')
@if(empty($solicitacao))
<div class="alert alert-danger">
    Você não tem nenhum setor cadastrado.
</div>
@else
<h1>Solicitações cadastradas</h1>
@can('criar-global')
<a href="adicionar" class="btn-sm btn-success  glyphicon glyphicon-plus" > Solicitação <br/></a>
@endcan
<table class="tini table table table-hover table-striped table-bordered" id="solicitacao-table"  >

    <thead class = "thead-inverse" >
    <td>@lang('messages.nome')</td>
    <td>@lang('messages.cargo')</td>
    <td>@lang('messages.curso')</td>
    <td>@lang('messages.data')</td>
    <td>@lang('messages.descricao')</td>
    <td class="col-lg-1 text-center">@lang('Detalhes')</td>
    <td class="col-lg-1 text-center">@lang('Remover')</td>
    <td class="col-lg-1 text-center">@lang('Editar')</td>
</thead>

@foreach ($solicitacao as $s)
<tbody>
    <tr>
        <td>{{$s->nome}}</td>
        <td>{{$s->cargo}}</td>
        <td>{{$s->curso}}</td>
        <td>{{$s->data}}</td>
        <td>{{$s->descricao}}</td>

        <td class="text-center"> @can('visualizar-global')<a href="{{action('SolicitacaoController@visualizar', $s->id)}}"><span class="glyphicon glyphicon-list-alt"></span></a>@endcan </td>
        <td class="text-center"> @can('remover-global')<a href="{{action('SolicitacaoController@remover', $s->id)}}" onclick="return confirm('Deseja realmente excluir este item?')"><span class="glyphicon glyphicon-trash"></span></a> @endcan</td>

</tbody>
@endforeach

</table>
@endif

{!!$solicitacao->links()!!}

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

