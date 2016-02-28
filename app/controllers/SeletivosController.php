<?php

class SeletivosController extends BaseController {

	public function retrieve() {

		$title = 'Seletivos';

      $seletivos = Seletivos::paginate(20);

		return View::make('seletivos.index', compact('title', 'seletivos'))
			->with('seletivos', $seletivos);

	}

   public function novoSeletivo() {

      $title = 'Cadastro de seletivos';

		$actionUrl = URL::to('/seletivos/cadastrar');

		$buttonValue = 'Cadastrar';

      return View::make('seletivos.form', compact('title', 'actionUrl', 'buttonValue'));

   }

   public function create() {

      $request = Input::all();

		Seletivos::create($request);

		return Redirect::action('SeletivosController@retrieve')
			->with('msg', 'Seletivo cadastrado com sucesso!');

   }

	public function edit($seletivoid) {

		$title = 'Editar seletivo';

		$seletivo = Seletivos::find($seletivoid);

		$actionUrl = URL::to('/seletivos/update/'.$seletivoid);

		$buttonValue = 'Salvar';

      return View::make('seletivos.form', compact('title', 'seletivo', 'actionUrl', 'buttonValue'));

	}

	public function update($seletivoid) {

		$request = Input::all();

		$seletivo = Seletivos::find($seletivoid);
		$seletivo->seletivo = $request['seletivo'];
		$seletivo->dtainicio = $request['dtainicio'];
		$seletivo->dtafim =	$request['dtafim'];
		$seletivo->descricao = $request['descricao'];
		$seletivo->push();

		return Redirect::action('SeletivosController@retrieve')
			->with('msg', 'Seletivo editado com sucesso!');

	}

	public function delete($seletivoid) {

		Seletivos::find($seletivoid)->delete();

		return Redirect::action('SeletivosController@retrieve')
			->with('msg', 'Seletivo excluido com sucesso!');

	}

}
