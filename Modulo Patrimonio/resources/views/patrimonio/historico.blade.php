@extends('layout.principal')
@section('conteudo')

@if(empty($patrimonio))
<div class="alert alert-danger">
    <h3> Você não tem nenhum usuarios cadastrado. </h3>
</div>
@else

<h2>Bem Permanente - Histórico</h2> <br>

<table class="tini table table table-hover table-striped table-bordered" id="patrimonio-table"  >
    <thead>
    <td class="col-lg-1 text-center"><b>@lang('Setor')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Data')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Status')</b></td>
</thead>
<tbody>
    @foreach($patrimonio as $s)
    <tr>
        <td class="text-center">{{$s->nomesetor}}</td>
        <td class="text-center">{{$s->data}}</td>
        <td class="text-center">{{$s->descricao}}</td>
    </tr>
    @endforeach
</tbody>
</table>

@endif

@stop
