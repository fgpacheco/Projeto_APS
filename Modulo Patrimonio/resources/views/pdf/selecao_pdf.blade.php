@extends('layout.principal')
@section('conteudo')

    <br/>
    <h1 class="col-lg-offset-1">Selecione uma categoria para a geração do PDF</h1>

    <form method="get" action="/pdf/gerarPdf" target="_blank" class="col-lg-offset-2">

        <br/>
        <br/>
        <label class="radio-inline"><input type="radio" name="rb" value="Solitacoes" checked>Solicitações</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Usuarios">Usuários</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Servidores">Servidores</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Setores">Setores</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Departamentos">Departamentos</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Salas_Predios">Salas - Prédios</label>
        <label class="radio-inline"><input type="radio" name="rb" value="Bens">Bens Permanentes</label>

        <br/><br/><br/><br/>

        <button class="col-lg-offset-3 btn-success" type="submit" name="download" value="download">
            Download PDF
        </button>

        <button class="col-lg-offset-1 btn-info" type="submit" name="visualizar" value="visualizar">
            Visualizar PDF
        </button>

    </form>

@stop