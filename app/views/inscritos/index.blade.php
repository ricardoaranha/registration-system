@extends('templates.layout')
@section('content')

@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>{{ Session::get('msg') }}</strong>
</div>
@endif

<form class="form-inline" action="{{ URL::to('/inscritos') }}" method="post">
   <div class="form-group">
      <label class="sr-only" for="query">Buscar inscrito</label>
      <div class="input-group">
         <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
         <input type="text" class="form-control" id="query" name="query" placeholder="Buscar inscrito">
      </div>
   </div>
   <button type="submit" class="btn btn-primary btn-md">Buscar</button>
</form>

<br /><br />

@if(isset($button))

   {{ $button }}

   <br /><br />
@endif

<table class="table">
   <thead>
      <tr>
         <th>
            Nome
         </th>
         <th>
            Seletivo
         </th>
         <th>
            Cargo
         </th>
         <th colspan="2">
            Ações
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($inscritos as $row)
      <tr>
         <td>
            {{ mb_strtoupper($row->nome) }}
         </td>
         <td>
            {{ mb_strtoupper($row->seletivo) }}
         </td>
         <td>
            {{ mb_strtoupper($row->cargo) }}
         </td>
         <td>
            <a href="{{ URL::to('/inscritos/update/'.$row->id) }}" class="btn btn-success btn-md">Editar</a>
         </td>
         <td>
            <a href="{{ URL::to('/inscritos/delete/'.$row->id) }}" class="btn btn-danger btn-md">Excluir</a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>

<div class="col-md-8 col-md-offset-2">
   <?php echo $inscritos->links(); ?>
</div>

@stop
