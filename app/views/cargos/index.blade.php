@extends('templates.layout')
@section('content')

@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>{{ Session::get('msg') }}</strong>
</div>
@endif

<form class="form-inline" action="{{ URL::to('/cargos') }}" method="post">
   <div class="form-group">
      <label class="sr-only" for="query">Buscar cargo</label>
      <div class="input-group">
         <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
         <input type="text" class="form-control" id="query" name="query" placeholder="Buscar cargo">
      </div>
   </div>
   <button type="submit" class="btn btn-primary btn-md">Buscar</button>
</form>

<br /><br />

<a href="{{ URL::to('/cargos/cadastrar') }}" class="btn btn-primary btn-md">Novo cargo</a>

@if(isset($button))
   {{ $button }}
@endif

<br /><br />

<table class="table">
   <thead>
      <tr>
         <th>
            Cargo
         </th>
         <th>
            Seletivo
         </th>
         <th>
            Nivel de escolaridade
         </th>
         <th>
            Salário
         </th>
         <th>
            Carga horaria
         </th>
         <th>
            Vagas
         </th>
         <th colspan="2">
            Ações
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($cargos as $row)
      <tr>
         <td>
            {{ mb_strtoupper($row->cargo) }}
         </td>
         <td>
            {{ mb_strtoupper($row->seletivo) }}
         </td>
         <td>
            {{ mb_strtoupper($row->escolaridade) }}
         </td>
         <td>
            {{ 'R$ '.$row->salario }}
         </td>
         <td>
            {{ $row->cargahoraria }}
         </td>
         <td>
            {{ $row->vagas }}
         </td>
         <td>
            <a href="{{ URL::to('/cargos/update/'.$row->id) }}" class="btn btn-success btn-md">Editar</a>
         </td>
         <td>
            <a href="{{ URL::to('/cargos/delete/'.$row->id) }}" class="btn btn-danger btn-md">Excluir</a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>

<div class="col-md-8 col-md-offset-2">
   <?php echo $cargos->links(); ?>
</div>

@stop
