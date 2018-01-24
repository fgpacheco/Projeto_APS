@extends('layout.principal')
@section('conteudo')
    @if(empty($solicitacao))
        <div class="alert alert-danger">
            Você não tem nenhum setor cadastrado.
        </div>
    @else
        <h1>Solicitações cadastradas</h1>
        <a href="adicionar" class="btn-sm btn-success  glyphicon glyphicon-plus" > Solicitação <br/></a>
        <table class="tini table table table-hover table-striped table-bordered" id="solicitacao-table"  >

            <thead>
            <td>@lang('messages.nome')</td>
            <td>@lang('messages.cargo')</td>
             <td>@lang('messages.curso')</td>
             <td>@lang('messages.data')</td>
             <td>@lang('messages.descricao')</td>
            <td></td>
            <td></td>
            <td></td>
            </thead>

            @foreach ($solicitacao as $s)
                <tbody>
                <tr>
                    <td>{{$s->nome}}</td>
                    <td>{{$s->cargo}}</td>
                     <td>{{$s->curso}}</td>
                     <td>{{$s->data}}</td>
                     <td>{{$s->descricao}}</td>
                     <td> <a href="{{action('SolicitacaoController@visualizar', $s->id)}}"><span class="glyphicon glyphicon-file"></span></a> </td>
                     <td> <a href="{{action('SolicitacaoController@remover', $s->id)}}"><span class="glyphicon glyphicon-trash"></span></a> </td>

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

