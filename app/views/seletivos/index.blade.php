@extends('templates.layout')
@section('content')

@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <strong>{{ Session::get('msg') }}</strong>
</div>
@endif

<a href="{{ URL::to('/seletivos/cadastrar') }}" class="btn btn-primary btn-md">Novo seletivo</a>

<br /><br />

<table class="table">
   <thead>
      <tr>
         <th>
            Seletivo
         </th>
         <th>
            Período
         </th>
         <th width="500">
            Descrição
         </th>
         <th colspan="2">
            Ações
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($seletivos as $row)
      <tr>
         <td>
            {{ mb_strtoupper($row->seletivo) }}
         </td>
         <td>
            {{ date('d/m/Y', strtotime($row->dtainicio)) }} - {{ date('d/m/Y', strtotime($row->dtafim)) }}
         </td>
         <td>
            {{ mb_strtoupper($row->descricao) }}
         </td>
         <td>
            <a href="{{ URL::to('/seletivos/update/'.$row->id) }}" class="btn btn-success btn-md">Editar</a>
         </td>
         <td>
            <a href="{{ URL::to('/seletivos/delete/'.$row->id) }}" class="btn btn-danger btn-md">Excluir</a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>

@stop
