@extends('layout.principal')
@section('conteudo')
    <form  action="salvar" method="post">
        <fieldset>
            <!-- Form Name -->
            <input type="hidden"
                   name="_token" value="{{ csrf_token() }}" />
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">
                        <div class="col-md-6 col-lg-offset-3">
                            <a herf="#">
                                <img src="http://www.ufrpe.br/sites/www.ufrpe.br/themes/corporateRural/logo.png" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </fieldset>
    </form>
@stop
