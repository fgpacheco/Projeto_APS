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

                            <h1 class="dark-grey">Cadastrar novo setor</h1><br/>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.descricao')</label>
                                <input type="text" name="descricao" class="form-control" id="" value="{{ old('descricao') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.sala')</label>
                                <input type="text" name="sala" class="form-control" id="" value="{{ old('sala') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.predio')</label>
                                <input type="text" name="predio" class="form-control" id="" value="{{ old('predio') }}">
                            </div>

                            @if(count($servidores) >= 1)
                                <div class="form-group col-lg-10">
                                    <label>@lang('messages.responsavel')</label><br/>
                                    <select class="selectpicker" name="servidor_id">
                                        @foreach($servidores as $servidor)
                                            <option value="{{ $servidor->id }}">{{ $servidor->nome }} - {{ $servidor->cargo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else

                            @endif


                            <div class="form-group col-lg-8">
                                <label>@lang('messages.curso')</label>
                                <select class="selectpicker" name="curso_id">
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if(count($servidores) >= 1)
                                <div class="col-md-12">
                                    <button type="submit" class="btn-inverse btn-large btn-block">Registrar</button>
                                </div>
                            @else
                                <div class="label-danger col-md-10 text-center">
                                    <br/>
                                    <br/>
                                    <strong>Nenhum servidor cadastrado</strong>. Cadastre pelo menos um servidor para continuar com o cadastro do setor.
                                    <br/>
                                    <br/>
                                    <a href="{{action('ServidorController@novo')}}" class="btn-sm btn-success  glyphicon glyphicon-plus pull-right" > Servidor<br/></a>
                                </div>
                            @endif


                        </div>
                    </div>
                </section>
            </div>
        </fieldset>
    </form>
@stop