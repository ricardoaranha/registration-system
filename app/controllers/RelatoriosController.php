<?php

class ReslatoriosController extends BaseController {

	public function seletivos() {

		$title = 'Relatório de seletivos';

		return View::make('relatorios.seletivos', compact('title'));

	}

   public function cargos() {

		$title = 'Relatório de cargos';

		return View::make('relatorios.cargos', compact('title'));

	}

   public function inscritos() {

		$title = 'Relatório de inscritos';

		return View::make('relatorios.inscritos', compact('title'));

	}

}
