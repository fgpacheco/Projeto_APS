@extends('layout.principal')
@section('conteudo')


    <form  action="adiciona" method="post">
        <fieldset>

            <!-- Form Name -->

            <input type="hidden"
                   name="_token" value="{{{ csrf_token() }}}" />
            <div class="container-fluid">

                <section class="container">
                    <div class="container-page">
                        <div class="col-md-6">
                            <h2 class="dark-grey">Registrar</h2>

                            <div class="form-group col-lg-6">
                                Departamento: <br/>

                                <select name="departamento_id">
                                    @foreach ($d as $departamento)
                                        <option value="{{$departamento->id}}"> {{$departamento->departamento}}</option>
                                    @endforeach
                                </select>
                                <a href="{{action('DepartamentoController@novo')}}"class="btn-sm btn-success  glyphicon glyphicon-plus" > <br/></a>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.apelido')</label>
                                <input type="text" name="apelido" class="form-control" id="apelido" value="{{ old('apelido') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.senha')</label>
                                <input type="password" name="senha" class="form-control" id="senha"  value="{{ old('senha') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Repita @lang('messages.senha')</label>
                                <input type="password" name="" class="form-control" id="senha2" value= value="{{ old('senha') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.email')</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Repita @lang('messages.email')</label>
                                <input type="email" name="" class="form-control" id="email2" value="{{ old('email') }}">
                            </div>


                            <div class="col-md-12">


                                <button type="submit" class="btn-inverse btn-large btn-block">Registrar</button>
                            </div>
                        </div>


                    </div>
                </section>
            </div>

    </form>

@stop