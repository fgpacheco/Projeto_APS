@extends('layout.principal')
@section('conteudo')

<h1>Editar</h1>

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>@foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach</ul>
        
    </div>
@endif
<form  action="alterar" method="post">
<fieldset>

<!-- Form Name -->

 <input type="hidden"
    name="_token" value="{{ csrf_token() }}" />

     <input type="hidden"
    name="id" value="{{$u->id}}" />

<div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-6">
         <div class="form-group col-lg-12">
          <label>@lang('messages.apelido')</label>
          <input type="text" name="apelido" class="form-control"  value="{{$u->apelido}}">
        </div>
        
        <div class="form-group col-lg-6">
          <label>@lang('messages.senha')</label>
          <input type="password" name="senha" class="form-control"value="">
        </div>
        
        <div class="form-group col-lg-6">
          <label>Repita @lang('messages.senha')</label>
          <input type="password" name="" class="form-control" value="">
        </div>
                
        <div class="form-group col-lg-6">
          <label>@lang('messages.email')</label>
          <input type="email" name="email" class="form-control"value="{{$u->email}}">
        </div>
        
        <div class="form-group col-lg-6">
          <label>Repita @lang('messages.email')</label>
          <input type="email" name="email" class="form-control"value="{{$u->email}}">
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


 