@extends('layout.principal')
@section('conteudo')

<form action="adicionar" method='post'>
    <div class="container-fluid">
        <section class="container">
            <div class="container-page">        
                <div class="col-md-6">
                    <h2 class="dark-grey">Cadastrar Marca</h2> <br/>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group col-lg-6">
                        Nome: <input name="descricao" type="text"/>
                    </div>

                    <div class="col-md-12">
                        <input type="submit" value="Cadastrar"/>
                    </div>
                </div>
            </div>
        </section>  
    </div>
</form>
@stop

