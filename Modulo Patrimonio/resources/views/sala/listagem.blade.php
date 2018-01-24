@extends('layout.principal')
@section('conteudo')

@if(empty($salas))
<div class="alert alert-danger">
    <h3> Você não tem nenhuma sala cadastrada. </h3>
</div>
@else

<h2>Salas - Cadastradas</h2> <br>

<form method="get" action="/sala/pesquisar">
    <div class="form-group col-lg-3">
        <input type="text" name="texto" class="form-control" placeholder="Pesquisar..." />
    </div>
    <select name="filtro" class="form-group">
        <option value="descricao">Nome</option>
        <option value="ramal">Ramal</option>
        
    </select>
    <button type="submit"
            <span class="btn-sm btn-success glyphicon glyphicon-search"></span>
    </button>
    @can('criar-global')
    <a href="{{action('SalaController@novo')}}" class="btn-sm btn-success  glyphicon glyphicon-plus" > Novo <br/></a>
    @endcan
</form>



<div class="dropdown col-md-4 col-md-offset-10">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ordenar por
        <span class="caret"></span></button>
    <ul class="dropdown-menu col-md-2 col-md-offset-2">
        <li><a href="{{action('SalaController@ordemAlfabetica')}}">Nome</a></li>
    </ul>
</div> 

<table class="tini table table table-hover table-striped table-bordered" id="sala-table"  >
    <thead class = "thead-inverse" >
    <td class="">@lang('ID')</td> 
    <td>@lang('Nome')</td>
    <td>@lang('Ramal')</td>
	 <td>@lang('Prédio')</td>
    <td class="col-lg-1 text-center">@lang('Editar')</td>
    <td class="col-lg-1 text-center">@lang('Remover')</td>
</thead>

@foreach ($salas as $sala)
<tbody>
    <tr >
        <td> {{$sala -> id}} </td>
        <td> {{$sala -> descricao}}  </td>
        <td> {{$sala -> ramal}} </td>
        <td> {{$sala -> predio -> descricao}}</td>
        <td class="text-center"> @can('editar-global')<a href="{{action('SalaController@muda', $sala->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>@endcan </td>
        <td class="text-center">@can('remover-global') <a href="{{action('SalaController@remover', $sala->id)}}" onclick="return confirm('Deseja realmente excluir este item?')"><span class="glyphicon glyphicon-trash"></span></a>@endcan </td>
         </tr>
    @endforeach
</tbody>
</table>
{{ $salas->appends(Request::except('page'))->links() }}
<!--{{$salas->links()}}-->
@endif

@if(old('descricao'))
<div class="alert alert-success">
    <strong>Sucesso !</strong>O {{ old('descricao')}} foi adicionado.
</div>
@endif

@stop
