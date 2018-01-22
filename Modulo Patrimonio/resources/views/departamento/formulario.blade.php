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
            
            <div class="form-group col-lg-12">
              <label>Departamento</label>
              <input type="text" name='departamento' class="form-control" id="" value="{{ old('departamento') }}">
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

