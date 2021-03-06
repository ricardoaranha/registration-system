@extends('templates.layout')
@section('content')

@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>{{ Session::get('msg') }}</strong>
</div>
@endif

<form class="form-inline" action="{{ URL::to('/login/buscar') }}" method="post">
   <div class="form-group">
      <label class="sr-only" for="query">Buscar usuário</label>
      <div class="input-group">
         <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
         <input type="text" class="form-control" id="query" name="query" placeholder="Buscar usuário">
      </div>
   </div>
   <button type="submit" class="btn btn-primary btn-md">Buscar</button>
</form>

<br /><br />

<a href="{{ URL::to('/login/cadastrar') }}" class="btn btn-primary btn-md">Novo usuário</a>

@if(isset($button))
   {{ $button }}
@endif

<br /><br />

<table class="table">
   <thead>
      <tr>
         <th>
            Nome
         </th>
         <th>
            Email
         </th>
         <th colspan="2">
            Ações
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($users as $row)
      <tr>
         <td>
            {{ mb_strtoupper($row->nome) }}
         </td>
         <td>
            {{ $row->email }}
         </td>
         <td>
            <a href="{{ URL::to('/login/update/'.$row->id) }}" class="btn btn-success btn-md">Alterar senha</a>
         </td>
         <td>
            <a href="{{ URL::to('/login/delete/'.$row->id) }}" class="btn btn-danger btn-md">Excluir</a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>

<div class="col-md-8 col-md-offset-2">
   <?php echo $users->links(); ?>
</div>

@stop
