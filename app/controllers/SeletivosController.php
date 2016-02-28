<?php

class SeletivosController extends BaseController {

	public function retrieve() {

		$title = 'Seletivos';

      $seletivos = Seletivos::all();

		return View::make('seletivos.index', compact('title', 'seletivos'));

	}

   public function novoSeletivo() {

      $title = 'Cadastro de seletivos';

		$actionUrl = URL::to('/seletivos/cadastrar');

      return View::make('seletivos.form', compact('title', 'actionUrl'));

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

		$actionUrl = URL::to('/seletivos/update/'.$seletivo->id);

      return View::make('seletivos.form', compact('title', 'seletivo', 'actionUrl'));

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
