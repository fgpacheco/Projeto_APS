@extends('layout.principal')
@section('conteudo')

<form action="/patrimonio/transferir" method='post'>
    <fieldset>
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">        
                    <div class="col-md-6">
                        <h2 class="dark-grey">Empréstimo de Bem Permanente</h2> <br/>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input type="hidden" name="id"  value="{{$p->id}}"/>

                        <div class="form-group col-lg-6">
                            Descrição: <input name="descricao" disabled="true" class="form-control" type="text" value="{{$p->descricao}}"/>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            Marca: <input name="marca" disabled="true" class="form-control" type="text" value="{{$p->marca->descricao}}"/>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            Número Patrimônio: <input name="patrimonio" disabled="true" class="form-control" type="text" value="{{$p->numeropatrimonio}}"/>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            Data do Emprestimo: <input name="dataaquisicao" class="form-control" type="date" />
                        </div>
                        
                        <div class="form-group col-lg-6">
                            Setor: <br/>

                            <select name="setor_id">
                                @foreach ($s as $setor)
                                <option value="{{$setor -> id}}"> {{$setor -> descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            Status do Bem: <br/>

                            <select name="status_id">
                                @foreach ($st as $status)
                                <option value="{{$status -> id}}"> {{$status -> descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Transferir"/>
                        </div>

                    </div>
                </div>
            </section>  
        </div>
    </fieldset>
</form>
@stop
