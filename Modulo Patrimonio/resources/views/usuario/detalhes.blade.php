@extends('layout.principal')
@section('conteudo')
  <h1>Detalhes do Usuario: {{ $u->apelido }}</h1>
				<ul>
					<li>
						<b>Email:</b> {{ $u->email }}
						</li>
					<li>
						
						<b>Usuario id</b>
		
						<b>{{$u->id}}</b>
				</ul>
@stop