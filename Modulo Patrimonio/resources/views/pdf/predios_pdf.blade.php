<!DOCTYPE html>
<html lang = "{{ app()->getLocale() }}">
<head>
    <title>Predios Salas</title>
</head>
<body>

<h1 align="center">Universidade Federal Rural de Pernambuco</h1>
<h2 align="center">Unidade Acadêmica de Garanhuns</h2>
<br/>
<h3 align="center">Lista de Prédios e Salas cadastradas no <em>Patrimônio</em></h3>
<br/>

<table border="1" align="center" width="100%">

    <tr>
        <th>Prédio</th>
        <th>Sala</th>
        <th>Ramal</th>
    </tr>

    @foreach ($predios as $predio)
        
            @foreach ($salas as $sala)
            @if($sala->predio_id == $predio->id)
				<tr>
            <td>{{ $predio->descricao }}</td> 
            <td>{{ $sala->descricao }}</td>
            <td>{{ $sala->ramal }}</td>
            @endif
             </tr>
            @endforeach
       
    @endforeach
</table>


</body>
</html>