@extends('layout.principal')
@section('conteudo')

@if(empty($patrimonio))
<div class="alert alert-danger">
    <h3> Você não tem nenhum usuarios cadastrado. </h3>
</div>
@else

<h2>Bens Permanentes - Descartados</h2> <br>


<table class="tini table table table-hover table-striped table-bordered" id="patrimonio-table"  >
    <thead>
    <td><b>@lang('ID')</b></td>
    <td><b>@lang('Nome')</b></td>
    <td><b>@lang('Número Patrimônio')</b></td>
    <td><b>@lang('Marca')</b></td>
    <td><b>@lang('Motivo')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Detalhes')</b></td>
</thead>

@foreach ($patrimonio as $p)
<tbody>
    <tr >
        <td> {{$p -> id}} </td>
        <td> {{$p -> descricao}}  </td>
        <td> {{$p -> numeropatrimonio}} </td>
        <td> {{$p -> marca -> descricao}}</td>
        <td> {{$p -> descarte -> motivo}}</td>
        <td class="text-center"> <a href="{{action('PatrimonioController@visualizar', $p->id)}}"><span class="glyphicon glyphicon-list-alt"></span></a> </td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $patrimonio->appends(Request::except('page'))->links() }}
<!--{{$patrimonio->links()}}-->
@endif

@if(old('descricao'))
<div class="alert alert-success">
    <strong>Sucesso !</strong>O {{ old('descricao')}} foi adicionado.
</div>
@endif
@stop