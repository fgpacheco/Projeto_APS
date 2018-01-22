@extends('layout.principal')
@section('conteudo')

<h2>Bens Permanentes - Relatório por Setor</h2> <br>

<form method="get" action="/patrimonio/relatorio/setor">
    
    Escolha o Setor: <select name="setor" class="form-group" onchange="this.form.submit()">
        @if(empty($_GET['setor']))
        <option value="" selected="">Selecione..</option>
        @foreach($setors as $s)
        <option value="{{$s->descricao}}">{{$s->descricao}}</option>
        @endforeach
        @else
        <option value="{{$_GET['setor']}}" selected="">Selecione</option>
        @foreach($setors as $s)
        <option value="{{$s->descricao}}">{{$s->descricao}}</option>
        @endforeach
        @endif
    </select>
</form>
<br><br>
<a style="margin-left: 85%" href="{{action('PDFController@bensSetor')}}" class="btn"> Download PDF <i class="fa fa-file-pdf-o"></i></a>
<table class="tini table table table-hover table-striped table-bordered" id="patrimonio-table"  >
    <thead>
    <td class="col-lg-1 text-center"><b>@lang('Descrição')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Número Patrimônio')</b></td>
    <td class="col-lg-1 text-center"><b>@lang('Setor')</b></td>
</thead>

@foreach ($patrimonio as $p)
<tbody>
    <tr >
        <td> {{$p -> nomep}} </td>
        <td> {{$p -> numeropatrimonio}}  </td>
        <td> {{$p -> descricao}}  </td>
    </tr>
    @endforeach
</tbody>
</table>
<!--{{ $patrimonio->appends(Request::except('page'))->render()}}-->
{{ $patrimonio->setPath('setor')->links() }}

<script>
    $('.btn').on('click', function (e) {
        e.preventDefault(); // Interrompe o browser de seguir para o href do botão

        var href = $(this).attr('href'); // Armazena o valor do atributo href do botão que foi clicado

        // Concatena os valores do form ao href e redireciona para a nova url
        window.location.href = href + '?' + $('select').serialize();
    });

    $(function () {
        $("select option:select").attr("selected", "selected");
    });

//    
//    $(this).find(':selected').attr('setor');

</script>
@stop