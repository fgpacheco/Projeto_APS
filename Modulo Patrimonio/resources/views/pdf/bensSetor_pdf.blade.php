<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Bens Permanentes</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de todos os Bens Permanentes no Setor {{$setor}}</h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        <th align="center">Nome</th>
        <th align="center">Número Patrimônio</th>
        <th align="center">Status</th>
    </tr>

    @foreach ($patrimonio as $p)
        <tr>
            <td>{{ $p->nomep }}</td>
            <td>{{ $p->numeropatrimonio }} </td>
            <td>{{ $p->descricao }} </td>
        </tr>
    @endforeach
</table>


</body>
</html>