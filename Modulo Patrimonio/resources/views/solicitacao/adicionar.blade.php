@extends('layout.principal')
@section('conteudo')
<form  action="adicionar" method="post">
    <fieldset>
        <!-- Form Name -->
        <input type="hidden"
               name="_token" value="{{ csrf_token() }}" />
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">
                    <div class="col-md-6">
                        <h2 class="dark-grey">Nova Solicitação</h2>

                        <div class="form-group col-lg-12">
                            <label>@lang('messages.nome')</label>
                            <input type="text" name="nome" class="form-control" id="" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>@lang('messages.matricula')</label>
                            
                            <input type="text" name="matricula" class="form-control" id="" value="{{ old('matricula')}}">
                        </div>
                           <div class="form-group col-lg-6">
                                <label>@lang('messages.data')</label>
                                <input type="date" name="data" class="form-control" id=""  value="{{ old('data') }}">
                            </div>

                          <div class="form-group col-lg-12">
                                <label>@lang('messages.cargo')</label>
                                <select class="selectpicker" name="cargo">
                                    @foreach($servidors as $servidor)
                                        <option value="{{ $servidor->cargo }}">{{ $servidor->cargo}}</option>
                                    @endforeach

                                </select>
                                
                            </div>

                          <div class="form-group col-lg-8">
                                <label>@lang('messages.sala')</label>
                                <select class="selectpicker" name="sala">
                                    @foreach($salas as $sala)
                                        <option value="{{ $sala->descricao }}">{{ $sala->descricao}}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                          <div class="form-group col-lg-8">
                                <label>@lang('messages.predio')</label>
                                <select class="selectpicker" name="predio">
                                    @foreach($predios as $predio)
                                        <option value="{{ $predio->descricao }}">{{ $predio->descricao}}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                           
                          <div class="form-group col-lg-12">
                                <label>@lang('messages.ramal')</label>
                                <select class="selectpicker" name="ramal">
                                    @foreach($salas as $sala)
                                        <option value="{{ $sala->ramal }}">{{ $sala->ramal}}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                          <div class="form-group col-lg-12">
                                <label>@lang('messages.curso')</label>
                                <select class="selectpicker" name="curso">
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->nome }}">{{ $curso->nome}}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                           <div class="form-group col-lg-8">
                                <label>@lang('messages.setor')</label>
                                <select class="selectpicker" name="setor_id">
                                    @foreach($setors as $setor)
                                        <option value="{{ $setor->id }}">{{ $setor->descricao}}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                        
                      
                            <div class="form-group col-lg-12">
                            <label>@lang('messages.descricao')</label>
                            <textarea name="descricao" class="form-control"  value="{{ old('descricao') }}"></textarea> 

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
