@extends('layout.principal')
@section('conteudo')

@if(empty($marca))
<div class="alert alert-danger">
    Você não tem nenhum usuarios cadastrado.
</div>
@else

<h1>Marcas Cadastradas</h1>

<table class="tini table table table-hover table-striped table-bordered" id="marca-table"  >
    <thead>
    <td class="col-lg-1 text-center">@lang('Nome')</td>
    <td class="col-lg-1 text-center">@lang('Detalhes')</td>
    <td class="col-lg-1 text-center">@lang('Remover')</td>
    <td class="col-lg-1 text-center">@lang('Editar')</td>
</thead>

</thead>
 
@foreach ($marca as $m)
<tbody>
    <tr >
        <td> {{$m -> id}} </td>
        <td> {{$m -> descricao}}  </td>
        
        <td class="text-center"> @can('visualizar-global')<a href="{{action('UsuarioController@mostra', $m->id)}}"><span class="glyphicon glyphicon-list-alt"></span></a> @endcan</td>
        
        
        <td class="text-center"> @can('remover-global')<a href="{{action('UsuarioController@remove', $m->id)}}" onclick="return confirm('Deseja realmente excluir este item?')"><span class="glyphicon glyphicon-trash"></span></a>@endcan </td>
        
        
        <td class="text-center">@can('editar-global') <a href="{{action('UsuarioController@muda', $m->id)}}"><span class="glyphicon glyphicon-pencil"></span></a> @endcan</td>
        
    </tr>
    @endforeach
</tbody>
</table>

@endif

@if(old('descricao'))
<div class="alert alert-success">
    <strong>Sucesso !</strong>O {{ old('descricao')}} foi adicionado.
</div>
@endif



@stop

