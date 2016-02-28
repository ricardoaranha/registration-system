@extends('templates.layout')
@section('content')

<div class="row">
   <div class="col-md-6 col-md-offset-3">

      <form action="{{ $actionUrl }}" method="post">
         <div class="form-group">
            <label for="cargo">
               Nome do cargo:
            </label>
            <input type="text" class="form-control" name="cargo" id="cargo" @if(isset($cargo)) value="{{ $cargo->cargo }}" @endif required>
         </div>

         <div class="form-group">
            <label for="seletivoid">
               Seletivo do cargo:
            </label>
            <select class="form-control" name="seletivoid" id="seletivoid" required>
            <option vlaue="">--- SELETIVOS ---</option>
            @foreach($seletivos as $row)
               <option value="{{ $row->id }}" @if(isset($cargo) && $cargo->seletivoid == $row->id) selected @endif>{{ $row->seletivo }}</option>
            @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="escolaridadeid">
               Nivel de escolaridade:
            </label>
            <select class="form-control" name="escolaridadeid" id="escolaridadeid" required>
            <option vlaue="">--- ESCOLARIDADE ---</option>
            @foreach($escolaridade as $row)
               <option value="{{ $row->id }}" @if(isset($cargo) && $cargo->escolaridadeid == $row->id) selected @endif>{{ $row->escolaridade }}</option>
            @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="salario">
               Salário:
            </label>
            <input type="number" step="0.01" class="form-control" name="salario" id="salario" @if(isset($cargo)) value="{{ $cargo->salario }}" @endif required>
         </div>

         <div class="form-group">
            <label for="cargahoraria">
               Carga horaria:
            </label>
            <input type="number" class="form-control" name="cargahoraria" id="cargahoraria" @if(isset($cargo)) value="{{ $cargo->cargahoraria }}" @endif required>
         </div>

         <div class="form-group">
            <label for="vagas">
               Vagas:
            </label>
            <input type="number" class="form-control" name="vagas" id="vagas" @if(isset($cargo)) value="{{ $cargo->vagas }}" @endif required>
         </div>

         <input type="submit" class="btn btn-success btn-md btn-block" value="Cadastrar">
      </form>

   </div>
</div>

@stop
