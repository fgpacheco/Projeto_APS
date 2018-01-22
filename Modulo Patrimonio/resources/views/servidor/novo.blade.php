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
                        <div class="col-md-6">
                            <h1 class="dark-grey">Cadastrar novo servidor</h1><br/>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.nome')</label>
                                <input type="text" name="nome" class="form-control" id="" value="{{ old('nome') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.cargo')</label>
                                <input type="text" name="cargo" class="form-control" id="" value="{{ old('cargo') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.matricula')</label>
                                <input type="text" name="matricula" class="form-control" id=""  value="{{ old('matricula') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <!-- <label>@lang('messages.matricula')</label> -->
                                <!-- Value '1' porque já está cadastrado no banco esse usuário, e não pode deixar esse campo NULL-->
                                <input type="hidden" name="usuario_id" class="form-control" id=""  value="{{ Auth::user()->id }}">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn-inverse btn-large btn-block">Registrar</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </fieldset>
    </form>
@stop
