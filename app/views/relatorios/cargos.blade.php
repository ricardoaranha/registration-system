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
            Cargo
         </th>
         <th>
            Seletivo
         </th>
         <th>
            Vagas
         </th>
         <th>
            Total de inscritos
         </th>
      </tr>
   </thead>

   <tbody>
      @foreach($cargos as $row)
      <tr>
         <?php $cargoCount += 1 ?>
         <td>
            {{ mb_strtoupper($row->cargo) }}
         </td>
         <td>
            @foreach($seletivos as $seletivo)
               @if($row->seletivoid = $seletivo->id)
                  {{ mb_strtoupper($seletivo->seletivo) }}
               @endif
            @endforeach
         </td>
         <td>
            {{ $row->vagas }}
         </td>
         <td>
            @foreach($inscritos as $inscrito)
               <?php $inscritoCount = 0 ?>
               @if($row->id == $inscrito->cargoid)
                  <?php $inscritoCount += 1 ?>
               @endif
            @endforeach
            {{ $inscritoCount }}
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
<br />
<h4>
   <strong>Total de {{ $pdfName[2] }} = {{ $cargoCount }}</strong>
</h4>
@stop
