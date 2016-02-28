<?php

class AdminController extends BaseController {

	public function index() {

		$title = 'Início';

		return View::make('home.home', compact('title'));

	}

}
