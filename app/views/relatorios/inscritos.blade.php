@extends('templates.layout')
@section('content')

@if(isset($hide))
<style>
   body { background-color: #fff !important ; }
</style>
@endif

@if(!isset($hide))
<a href="{{ URL::to('/relatorios/download/'.$title) }}" class="btn btn-danger btn-md">Baixar pdf</a>
<br /><br />
@endif

<table class="table">
   <thead>
      <tr>
         @if(isset($hide))
         <th></th>
         @endif
         <th>
            Nome
         </th>
         <th>
            CPF
         </th>
         <th>
            Seletivo
         </th>
         <th>
            Cargo
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($inscritos as $row)
      <tr>
         <?php $inscritoCount += 1 ?>
         <td>
            {{ mb_strtoupper($row->nome) }}
         </td>
         <td>
            {{ $row->cpf }}
         </td>
         <td>
            @foreach($seletivos as $seletivo)
               @if($row->seletivoid == $seletivo->id)
                  {{ mb_strtoupper($seletivo->seletivo) }}
               @endif
            @endforeach
         </td>
         <td>
            @foreach($cargos as $cargo)
               @if($row->cargoid == $cargo->id)
                  {{ mb_strtoupper($cargo->cargo) }}
               @endif
            @endforeach
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
<br />
<h4>
   <strong>Total de {{ $pdfName[2] }} = {{ $inscritoCount }}</strong>
</h4>
@stop
