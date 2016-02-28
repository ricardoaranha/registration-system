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
            Seletivo
         </th>
         <th>
            Período
         </th>
         <th>
            Total de cargos
         </th>
         <th>
            Total de inscritos
         </th>
         <th>
            Descrição
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($seletivos as $row)
      <tr>
         <?php $seletivoCount += 1 ?>
         <td>
            {{ mb_strtoupper($row->seletivo) }}
         </td>
         <td>
            {{ date('d/m/Y', strtotime($row->dtainicio)) }} <br /> {{ date('d/m/Y', strtotime($row->dtafim)) }}
         </td>
         <td>
            @foreach($cargos as $cargo)
            <?php $cargoCount = 0 ?>
               @if($row->id == $cargo->seletivoid)
                  <?php $cargoCount += 1 ?>
               @endif
            @endforeach
            {{ $cargoCount }}
         </td>
         <td>
            @foreach($inscritos as $inscrito)
            <?php $inscritoCount = 0 ?>
               @if($row->id == $inscrito->seletivoid)
                  <?php $inscritoCount += 1 ?>
               @endif
            @endforeach
            {{ $inscritoCount }}
         </td>
         <td>
            {{ mb_strtoupper($row->descricao) }}
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
<br />
<h4>
   <strong>Total de {{ $pdfName[2] }} = {{ $seletivoCount }}</strong>
</h4>
@stop
