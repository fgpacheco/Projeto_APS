<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Servidores</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de servidores cadastrados no <em>Patrimônio</em></h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        <th>Matrícula</th>
        <th>Nome</th>
        <th>Cargo</th>
    </tr>

    @foreach ($servidores as $servidor)
        <tr>
            <td>{{ $servidor->matricula }}</td>
            <td>{{ $servidor->nome }} </td>
            <td>{{ $servidor->cargo }} </td>
        </tr>
    @endforeach
</table>


</body>
</html>