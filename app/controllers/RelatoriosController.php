<?php

class RelatoriosController extends BaseController {

	public function seletivos() {

		$title = 'Relatório de seletivos';
		$pdfName = explode(' ', $title);

      $seletivos = Seletivos::orderBy('seletivo', 'asc')->get();
		$cargos = Cargos::orderBy('cargo', 'asc')->get();
		$inscritos = Inscritos::select('nome', 'inscritos.id', 'inscritos.seletivoid', 'inscritos.cargoid', 'cpf')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->orderBy('nome', 'asc')
			->get();

		$seletivoCount = 0;
		$cargoCount = 0;
		$inscritoCount = 0;

		return View::make('relatorios.seletivos', compact('title', 'seletivos', 'cargos', 'inscritos', 'seletivoCount', 'cargoCount', 'inscritoCount', 'pdfName'));

	}

   public function cargos() {

		$title = 'Relatório de cargos';

		$pdfName = explode(' ', $title);

		$seletivos = Seletivos::orderBy('seletivo', 'asc')->get();
		$cargos = Cargos::orderBy('cargo', 'asc')->get();
		$inscritos = Inscritos::select('nome', 'inscritos.id', 'inscritos.seletivoid', 'inscritos.cargoid', 'cpf')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->orderBy('nome', 'asc')
			->get();

		$seletivoCount = 0;
		$cargoCount = 0;
		$inscritoCount = 0;

		return View::make('relatorios.cargos', compact('title', 'seletivos', 'cargos', 'inscritos', 'seletivoCount', 'cargoCount', 'inscritoCount', 'pdfName'));

	}

   public function inscritos() {

		$title = 'Relatório de inscritos';

		$pdfName = explode(' ', $title);

		$seletivos = Seletivos::orderBy('seletivo', 'asc')->get();
		$cargos = Cargos::orderBy('cargo', 'asc')->get();
		$inscritos = Inscritos::select('nome', 'inscritos.id', 'inscritos.seletivoid', 'inscritos.cargoid', 'cpf')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->orderBy('nome', 'asc')
			->get();

		$seletivoCount = 0;
		$cargoCount = 0;
		$inscritoCount = 0;

		return View::make('relatorios.inscritos', compact('title', 'seletivos', 'cargos', 'inscritos', 'seletivoCount', 'cargoCount', 'inscritoCount', 'pdfName'));

	}

	public function download($title) {

		$title = $title;
		$pdfName = explode(' ', $title);

		$seletivos = Seletivos::orderBy('seletivo', 'asc')->get();
		$cargos = Cargos::orderBy('cargo', 'asc')->get();
		$inscritos = Inscritos::select('nome', 'inscritos.id', 'inscritos.seletivoid', 'inscritos.cargoid', 'cpf')
			->leftJoin('users', 'users.id', '=', 'inscritos.userid')
			->orderBy('nome', 'asc')
			->get();

		$seletivoCount = 0;
		$cargoCount = 0;
		$inscritoCount = 0;

		$hide = true;

		$pdf = PDF::loadView('relatorios.'.$pdfName[2], compact('title', 'seletivos', 'cargos', 'inscritos', 'seletivoCount', 'cargoCount', 'inscritoCount', 'hide', 'pdfName'));
		return $pdf->download('relatorio_'.$pdfName[2].'_'.date('Y-m-d_H-i').'.pdf');

	}

}
