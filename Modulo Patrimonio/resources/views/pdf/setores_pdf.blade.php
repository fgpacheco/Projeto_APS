<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Servidores</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de setores cadastrados no <em>Patrimônio</em></h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        <th>Nome</th>
        <th>Responsável</th>
        <th>Curso</th>
    </tr>

    @foreach ($setores as $setor)
        <tr>
            <td>{{ $setor->descricao }}</td>
            <td>{{ $setor->servidor->nome }} </td>
            <td>{{ $setor->curso->nome }} </td>
        </tr>
    @endforeach
</table>


</body>
</html>