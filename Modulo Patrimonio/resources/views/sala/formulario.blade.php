@extends('layout.principal')
@section('conteudo')






    <form  action="adicionar" method="post">
        <fieldset>

            <!-- Form Name -->

            <input type="hidden"
                   name="_token" value="{{{ csrf_token() }}}" />
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">
                        <div class="col-md-6">
                            <h2 class="dark-grey">Registrar</h2>

                            <div class="form-group col-lg-12">
                                <label>@lang('Nome')</label>
                                <input type="text" name="descricao" class="form-control" id="" value="{{ old('descricao') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('Ramal')</label>
                                <input type="text" name="ramal" class="form-control" id=""  value="{{ old('ramal') }}">
                            </div>

                            <div class="form-group col-lg-8">
                                <label>@lang('Prédio')</label>
                                <select class="selectpicker" name="predio_id">
                                    @foreach($predios as $predio)
                                        <option value="{{ $predio->id }}">{{ $predio->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn-inverse btn-large btn-block">Registrar</button>
                        </div>
                    </div>


            </div>
            </section>
            </div>


    </form>



@stop