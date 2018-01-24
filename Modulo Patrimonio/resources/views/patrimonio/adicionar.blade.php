@extends('layout.principal')
@section('conteudo')

<form action="adicionar" method='post'>
    <fieldset>
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">        
                    <div class="col-md-6">
                        <h2 class="dark-grey">Cadastrar Patrimônio</h2> <br/>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="form-group col-lg-6">
                            Descrição: <input name="descricao" class="form-control" type="text"/>
                        </div>

                        <div class="form-group col-lg-6"> 
                            Valor: <input name='valor' class="form-control" type="text" id="mask"/>
                        </div>  

                        <div class="form-group col-lg-6">
                            Número Patrimônio: <input name="numeropatrimonio" class="form-control" type="text"/>
                        </div>

                        <div class="form-group col-lg-6">
                            Número Patrimônio Antigo: <input name="numeropantigo" class="form-control" type="text" />
                        </div>

                        <div class="form-group col-lg-6">
                            Número Empenho: <input name="numeroempenho" class="form-control" type="text"/>
                        </div>

                        <div class="form-group col-lg-6">
                            Número Pregão: <input name="numeropregao" class="form-control" type="text"/>
                        </div>

                        <div class="form-group col-lg-6">
                            Número Nota Fiscal <input name="numeronotafiscal" class="form-control" type="text" />
                        </div>

                        <div class="form-group col-lg-6">
                            Data Aquisição: <input name="dataaquisicao"  class="form-control" type="date" />
                        </div>

                        <div class="form-group col-lg-6">
                            Marca: <input type="text" class="form-control" name="marca" /> <br/>
                        </div>

                        <div class="form-group col-lg-6">
                            Grupo: <input type="text" class="form-control" name="grupo" />
                        </div>

                        <div class="form-group col-lg-6" >
                            Subgrupo: <input type="text" class="form-control" name="subgrupo"/>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Cadastrar"/>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    </fieldset>
</form>
<script>
    $(document).ready(function ($){
        $('#mask').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    });
</script>
@stop

