@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">

      <form action="{{ $actionUrl }}" method="post">
         <div class="form-group">
            <label for="seletivo">
               Nome do seletivo:
            </label>
            <input type="text" class="form-control" name="seletivo" id="seletivo" @if(isset($seletivo)) value="{{ $seletivo->seletivo }}" @endif required>
         </div>

         <div class="form-group">
            <label for="dtainicio">
               Data de início:
            </label>
            <input type="date" class="form-control" name="dtainicio" id="dtainicio" @if(isset($seletivo)) value="{{ $seletivo->dtainicio }}" @endif required>
         </div>

         <div class="form-group">
            <label for="dtafim">
               Data de termino:
            </label>
            <input type="date" class="form-control" name="dtafim" id="dtafim" @if(isset($seletivo)) value="{{ $seletivo->dtafim }}" @endif required>
         </div>

         <div class="form-group">
            <label for="descricao">
               Descriçõ do seletivo:
            </label>
            <textarea type="text" class="form-control" name="descricao" id="descricao" required>@if(isset($seletivo)) {{ $seletivo->descricao }} @endif</textarea>
         </div>

         <input type="submit" class="btn btn-success btn-md btn-block" value="{{ $buttonValue }}">
      </form>

   </div>
</div>

@stop
