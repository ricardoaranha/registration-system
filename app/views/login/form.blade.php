@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">
      @if(Session::has('msg'))
      <div class="alert alert-danger alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>Erro!</strong> {{ Session::get('msg') }}
      </div>
      @endif

      @if($errors->has())
      <div class="alert alert-danger alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <ul>
         @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
         @endforeach
         </ul>
      </div>
      @endif
      <div class="col-md-8 col-md-offset-2">
         <form class="form-horizontal" action="{{ $actionUrl }}" method="post">
            <fieldset>
               <div class="form-group">
                  <label for="nome">
                     Nome:
                  </label>
                  <input type="text" class="form-control" id="nome" name="nome" @if(Session::has('request')) value="{{ Session::get('request')['nome'] }}" @endif required>
               </div>
               <div class="form-group">
                  <label for="email">
                     Email:
                  </label>
                  <input type="text" class="form-control" id="email" name="email" @if(Session::has('request')) value="{{ Session::get('request')['email'] }}" @endif required>
               </div>
               <div class="form-group">
                  <label for="senha">
                     Senha:
                  </label>
                  <input type="password" class="form-control" id="senha" name="senha" required>
                  <span id="senha1" class="help-block">* A senha deve conter entre 8 e 12 caraceres!
               </div>
               <div class="form-group">
                  <label for="senha2">
                     Repetir senha:
                  </label>
                  <input type="password" class="form-control" id="senha2" name="senha2" required>
               </div>
               <input type="submit" class="btn btn-success btn-md btn-block" value="{{ $buttonValue }}">
               <input type="reset" class="btn btn-danger btn-md btn-block" value="Limpar">
            </fieldset>
         </form>
      </div>
   </div>
</div>

@stop
