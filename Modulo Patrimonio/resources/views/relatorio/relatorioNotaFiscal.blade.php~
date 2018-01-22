@extends('layout.principal')
@section('conteudo')

@if(empty($patrimonio))
<div class="alert alert-danger">
    <h3> Você não tem nenhum usuarios cadastrado. </h3>
</div>
@else

<h2>Bens Permanentes - Relatório por Nota Fical</h2> <br>

<form method="get" action="/patrimonio/relatorio/notafiscal">
    @if(empty($_GET['numero']))
    Insira o número da Nota Fiscal: <input type="number" name="numero">
    @else
    Insira o número da Nota Fiscal: <input type="number" name="numero" value="{{$_GET['numero']}}">
    @endif
    <button type="submit"
            <span class="btn-sm btn-success glyphicon glyphicon-ok"></span>
    </button>
</form>
<br><br>
<a style="margin-left: 85%" href="{{action('PDFController@bensNotaFiscal')}}" class="btn"> Download PDF <i class="fa fa-file-pdf-o"></i></a>
<table class="tini table table table-hover table-striped table-bordered" id="patrimonio-table"  >
    <thead>
    <td class="col-lg-1 text-center"><b>@lang('Descrição')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Número Patrimônio')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Valor')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Nota Fiscal')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Data Aquisição')</b></td>
</thead>

@foreach ($patrimonio as $p)
<tbody>
    <tr >
        <td> {{$p -> descricao}} </td>
        <td> {{$p -> numeropatrimonio}}  </td>
        <td> {{$p -> valor}}  </td>
        <td> {{$p -> numeronotafiscal}}  </td>
        <td> {{$p -> dataaquisicao}} </td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $patrimonio->appends(Request::except('page'))->links() }}
@endif

<script>
    $('.btn').on('click', function (e) {
        e.preventDefault(); // Interrompe o browser de seguir para o href do botão

        var href = $(this).attr('href'); // Armazena o valor do atributo href do botão que foi clicado

        // Concatena os valores do form ao href e redireciona para a nova url
        window.location.href = href + '?numero=' + $('input[name=numero]').val();
    });

</script>


@stop

