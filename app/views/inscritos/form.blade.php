@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">

      <form action="{{ $actionUrl }}" method="post">
         <div class="form-group">
            <label for="nome">
               Nome do inscrito:
            </label>
            <input type="text" class="form-control" name="nome" id="nome" @if(isset($inscrito)) value="{{ $inscrito->nome }}" @endif required>
            <input type="hidden" name="userid" value="{{ $inscrito->userid }}">
         </div>

         <div class="form-group">
            <label for="seletivoid">
               Seletivo do cargo:
            </label>
            <select class="form-control" name="seletivoid" id="seletivoid" required>
            <option vlaue="">--- SELETIVOS ---</option>
            @foreach($seletivos as $row)
               <option value="{{ $row->id }}" @if(isset($inscrito) && $inscrito->seletivoid == $row->id) selected @endif>{{ $row->seletivo }}</option>
            @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="cargoid">
               Cargo:
            </label>
            <select class="form-control" name="cargoid" id="cargoid" required>
            <option vlaue="">--- CARGOS ---</option>
            @foreach($cargos as $row)
               <option value="{{ $row->id }}" @if(isset($inscrito) && $inscrito->cargoid == $row->id) selected @endif>{{ $row->cargo }}</option>
            @endforeach
            </select>
         </div>

         <input type="submit" class="btn btn-success btn-md btn-block" value="Salvar">
      </form>

   </div>
</div>

@stop
