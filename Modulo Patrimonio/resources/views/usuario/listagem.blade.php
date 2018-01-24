@extends('layout.principal')
@section('conteudo')

@if(empty($usuarios))
<div class="alert alert-danger">
    Você não tem nenhum usuarios cadastrado.
</div>
@else

<h1>Usuários Cadastrados</h1>

@can('criar-global')
<a href="{{action('UsuarioController@novo')}}" class="btn-sm btn-success  glyphicon glyphicon-plus" > Usuario<br/></a>
@endcan

<table class="tini table table table-hover table-striped table-bordered" id="usuario-table"  >
    <thead class = "thead-inverse" >
    <td>@lang('messages.nome')</td>
    <td>@lang('messages.email')</td>
    <td class="col-lg-1 text-center">@lang('Detalhes')</td>
    <td class="col-lg-1 text-center">@lang('Remover')</td>
    <td class="col-lg-1 text-center">@lang('Editar')</td>
</thead>

</thead>

@foreach ($usuarios as $u)
<tbody>
    <tr >
        <td>{{$u->name}} </td>
        <td> {{$u->email}}  </td>


        <td class="text-center"> @can('visualizar-global')<a href="{{action('UsuarioController@mostra', $u->id)}}"><span class="glyphicon glyphicon-list-alt"></span></a>@endcan</td>

        <td class="text-center">@can('remover-global')<a href="{{action('UsuarioController@remove', $u->id)}}" onclick="return confirm('Deseja realmente excluir este item?')"> <span class="glyphicon glyphicon-trash"></span></a>@endcan</td>


        <td class="text-center"> @can('editar-global')<a href="{{action('UsuarioController@muda', $u->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>@endcan</td>


    </tr>


    @endforeach
</tbody>
</table>

{!!$usuarios->links()!!}



@endif

@if(old('apelido'))
<div class="alert alert-success">
    <strong>Sucesso !</strong>O {{ old('apelido')}} foi adicionado.
</div>
@endif

<!-- Trigger the modal with a button -->



@stop

