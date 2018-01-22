@extends('layout.principal')
@section('conteudo')

<form action="/patrimonio/descarte" method='post'>
    <fieldset>
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">        
                    <div class="col-md-6">
                        <h2 class="dark-grey">Descarte de Bem Permanente</h2> <br/>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input type="hidden" name="id"  value="{{$patrimonio->id}}"/>
                        <input type="hidden" name="data" value="{{$patrimonio->dataaquisicao}}"/>
                        <div class="form-group col-lg-6">
                            Descrição: <input name="descricao1" disabled=""class="form-control" type="text" value="{{$patrimonio->descricao}}"/>
                        </div>
                        <div class="form-group col-lg-6">
                            Data de Aquisição: <input name="data1"  disabled="" class="form-control" type="text" value="{{$patrimonio->dataaquisicao}}"/>
                        </div>
                        <div class="form-group col-lg-6">
                            Motivo:<br>
                            <select name="motivo">
                                @foreach ($descarte as $d)
                                <option value="{{$d->id}}">{{$d->motivo}}</option>
                                @endforeach
                            </select>                           
                        </div>
                        
                        <div class="col-md-12">
                            <input type="submit" value="Descartar"/>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    </fieldset>
</form>

@stop