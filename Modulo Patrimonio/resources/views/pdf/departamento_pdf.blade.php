<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Departamento</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de Departamento cadastrados no <em>Patrimônio</em></h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        
        <th>Departamento</th>
    </tr>

    @foreach ($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->departamento}}</td>
          
        </tr>
    @endforeach
</table>


</body>
</html>