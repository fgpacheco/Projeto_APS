<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Usuarios</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de Usuarios cadastrados no <em>Patrimônio</em></h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo de usuario</th>
        <th>Departamento</th>
    </tr>

    @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }} </td>
            <td>{{ $usuario->tipousuario->tipousuario }} </td>
             <td>{{ $usuario->departamento->departamento}}</td>
        </tr>
    @endforeach
</table>


</body>
</html>