@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">
      @if(Session::has('msg'))
      <div class="alert alert-{{ Session::get('class') }} alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>{{ Session::get('msg') }}</strong>
      </div>
      @endif
      <hr>
      <div class="col-md-8 col-md-offset-2">
         <form action="{{ URL::to('/login') }}" method="post">
            <fieldset>
               <div class="form-group">
                  <label for="email">
                     Email:
                  </label>
                  <input type="text" class="form-control" id="email" name="email" required>
               </div>
               <div class="form-group">
                  <label for="senha">
                     Senha:
                  </label>
                  <input type="password" class="form-control" id="senha" name="senha" required>
               </div>
               <input type="submit" class="btn btn-success btn-md btn-block" value="Entrar">
               <a href="" class="btn btn-default btn-md btn-block">Esqueci minha senha</a>
               <br />
               <a href="{{ URL::to('/login/cadastrar') }}" class="btn btn-primary btn-md btn-block">Cadastrar</a>
            </fieldset>
         </form>
      </div>
   </div>
</div>

@stop
