<?php

class InscritosController extends BaseController {

	public function retrieve() {

		$title = 'Inscritos';

      $inscritos = Inscritos::select('cargo', 'inscritos.id', 'seletivo', 'nome')
         ->leftjoin('seletivos', 'seletivos.id', '=', 'inscritos.seletivoid')
         ->leftJoin('cargos', 'cargos.id', '=', 'inscritos.cargoid')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
         ->orderBy('nome', 'asc')
         ->paginate(20);

		return View::make('inscritos.index', compact('title', 'inscritos'))
         ->with('inscritos', $inscritos);

	}

	public function search() {

		$title = 'Inscritos';

      $inscritos = Inscritos::select('cargo', 'inscritos.id', 'seletivo', 'nome')
         ->leftjoin('seletivos', 'seletivos.id', '=', 'inscritos.seletivoid')
         ->leftJoin('cargos', 'cargos.id', '=', 'inscritos.cargoid')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->where('nome', 'LIKE', '%'.Input::get('query').'%')
			->orderBy('nome', 'asc')
			->paginate();

		$button = '<a href="'.URL::to('/inscritos').'" class="btn btn-warning btn-md">Voltar</a>';

		return View::make('inscritos.index', compact('title', 'inscritos', 'button'))
			->with('inscritos', $inscritos);

	}

	public function edit($inscritoid) {

		$title = 'Editar inscrito';

		$actionUrl = URL::to('/inscritos/update/'.$inscritoid);

		$inscrito = Inscritos::select('cargo', 'inscritos.cargoid', 'inscritos.seletivoid', 'inscritos.id', 'seletivo', 'nome', 'inscritos.userid')
         ->leftjoin('seletivos', 'seletivos.id', '=', 'inscritos.seletivoid')
         ->leftJoin('cargos', 'cargos.id', '=', 'inscritos.cargoid')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->where('inscritos.id', $inscritoid)
         ->orderBy('nome', 'asc')
         ->first();

      $seletivos = Seletivos::select('id', 'seletivo')->get();
		$cargos = Cargos::select('id', 'cargo')->get();

      return View::make('inscritos.form', compact('title', 'cargos', 'actionUrl', 'seletivos', 'inscrito'));

	}

	public function update($inscritoid) {

		$request = Input::all();

		$user = User::find($request['userid']);
		$user->nome = $request['nome'];
		$user->push();

		$inscrito = Inscritos::find($inscritoid);
		$inscrito->seletivoid = $request['seletivoid'];
		$inscrito->cargoid = $request['cargoid'];
		$inscrito->push();

		return Redirect::action('InscritosController@retrieve')
			->with('msg', 'Inscrito editado com sucesso!');

	}

	public function delete($inscritoid) {

		Inscritos::find($inscritoid)->delete();

		return Redirect::action('InscritosController@retrieve')
			->with('msg', 'Inscrito excluido com sucesso!');

	}

}
