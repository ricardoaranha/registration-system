<?php

class CargosController extends BaseController {

	public function retrieve() {

		$title = 'Cargos';

      $cargos = Cargos::select('cargo', 'cargos.id', 'salario', 'cargahoraria', 'vagas', 'seletivo', 'escolaridade')
         ->leftjoin('seletivos', 'seletivos.id', '=', 'cargos.seletivoid')
         ->leftJoin('escolaridade', 'escolaridade.id', '=', 'cargos.escolaridadeid')
         ->orderBy('cargo', 'asc')
         ->paginate(20);

		return View::make('cargos.index', compact('title', 'cargos'))
         ->with('cargos', $cargos);

	}

	public function search() {

		$title = 'Cargos';

      $cargos = Cargos::select('cargo', 'cargos.id', 'salario', 'cargahoraria', 'vagas', 'seletivo', 'escolaridade')
         ->leftjoin('seletivos', 'seletivos.id', '=', 'cargos.seletivoid')
         ->leftJoin('escolaridade', 'escolaridade.id', '=', 'cargos.escolaridadeid')
			->where('cargo', 'LIKE', '%'.Input::get('query').'%')
			->paginate();

		$button = '<a href="'.URL::to('/cargos').'" class="btn btn-warning btn-md">Voltar</a>';

		return View::make('cargos.index', compact('title', 'cargos', 'button'))
			->with('cargos', $cargos);

	}

   public function novoCargo() {

      $title = 'Cadastro de cargos';

		$actionUrl = URL::to('/cargos/cadastrar');

      $seletivos = Seletivos::select('id', 'seletivo')->get();

      $escolaridade = DB::table('escolaridade')
      ->orderBy('escolaridade', 'asc')
      ->get();

		$buttonValue = 'Cadastrar';

      return View::make('cargos.form', compact('title', 'actionUrl', 'seletivos', 'escolaridade', 'buttonValue'));

   }

   public function create() {

      $request = Input::all();

		Cargos::create($request);

		return Redirect::action('CargosController@retrieve')
			->with('msg', 'Cargo cadastrado com sucesso!');

   }

	public function edit($cargoid) {

		$title = 'Editar cargo';

		$cargo = Cargos::find($cargoid);

		$actionUrl = URL::to('/cargos/update/'.$cargoid);

      $seletivos = Seletivos::select('id', 'seletivo')->get();

      $escolaridade = DB::table('escolaridade')
      ->orderBy('escolaridade', 'asc')
      ->get();

		$buttonValue = 'Salvar';

      return View::make('cargos.form', compact('title', 'cargo', 'actionUrl', 'seletivos', 'escolaridade', 'buttonValue'));

	}

	public function update($cargoid) {

		$request = Input::all();

		$cargo = Cargos::find($cargoid);
		$cargo->cargo = $request['cargo'];
		$cargo->seletivoid = $request['seletivoid'];
		$cargo->escolaridadeid = $request['escolaridadeid'];
		$cargo->cargahoraria = $request['cargahoraria'];
      $cargo->salario = $request['salario'];
      $cargo->vagas = $request['vagas'];
		$cargo->push();

		return Redirect::action('CargosController@retrieve')
			->with('msg', 'Cargo editado com sucesso!');

	}

	public function delete($cargoid) {

		Cargos::find($cargoid)->delete();

		return Redirect::action('CargosController@retrieve')
			->with('msg', 'Cargo excluido com sucesso!');

	}

}
