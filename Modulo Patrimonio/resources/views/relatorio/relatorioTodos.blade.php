@extends('layout.principal')
@section('conteudo')

@if(empty($patrimonio))
<div class="alert alert-danger">
    <h3> Você não tem nenhum usuarios cadastrado. </h3>
</div>
@else
<br>
<h2>Bens Permanentes - Relatório</h2> <br>

<table class="tini table table table-hover table-striped table-bordered" id="patrimonio-table"  >
    <thead class="thead-inverse">
    <td class="col-lg-1 text-center"><b>@lang('ID')</b></td>
    <td class="col-lg-1 text-center"> <b>@lang('Nome')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Número Patrimônio')</b></td>
</thead>

@foreach ($patrimonio as $p)
<tbody>
    <tr >
        <td> {{$p -> id}}  </td>
        <td> {{$p -> descricao}} </td>
        <td> {{$p -> numeropatrimonio}}  </td>
    </tr>
    @endforeach
</tbody>
</table>
{{$patrimonio->links()}}
@endif
@stop
