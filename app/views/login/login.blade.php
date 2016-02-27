@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">
      <h1>{{ $title }}</h1>
      <hr>
      <div class="col-md-8 col-md-offset-2">
         <form action="{{ URL::to('/login/auth') }}" method="post">
            <fieldset>
               <div class="form-group">
                  <label for="email">
                     Email:
                  </label>
                  <input type="text" class="form-control" id="email" name="email">
               </div>
               <div class="form-group">
                  <label for="senha">
                     Senha:
                  </label>
                  <input type="password" class="form-control" id="senha" name="senha">
               </div>
               <input type="submit" class="btn btn-success btn-md btn-block" value="Entrar">
               <a href="" class="btn btn-info btn-md btn-block">Esqueci minha senha</a>
            </fieldset>
         </form>
      </div>
   </div>
</div>

@stop
