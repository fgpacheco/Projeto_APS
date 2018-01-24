@extends('layout.principal')
@section('conteudo')

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  action="alterar" method="post">
        <fieldset>

            <!-- Form Name -->

            <input type="hidden"
                   name="_token" value="{{ csrf_token() }}" />

            <input type="hidden"
                   name="id" value="{{$servidor->id}}" />

            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">
                        <div class="col-md-6">

                            <h1>Editar Servidor</h1><br/>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.matricula')</label>
                                <input type="text" name="matricula" class="form-control" id=""
                                       value="{{$servidor->matricula}}" readonly="readonly">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.nome')</label>
                                <input type="text" name="nome" class="form-control" id="" value="{{$servidor->nome}}">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.cargo')</label>
                                <input type="text" name="cargo" class="form-control" id=""  value="{{$servidor->cargo}}">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn-inverse btn-large btn-block">Editar</button>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </fieldset>
    </form>
@stop


