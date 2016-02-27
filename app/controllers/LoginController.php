<?php

class LoginController extends BaseController {

	public function index() {

		$title = 'Login';

		return View::make('login.login', compact('title'));

	}

   public function auth() {

      $email = Input::get('email');
      $senha = Input::get('senha');

      $senha = md5($senha);

      return $senha;

   }

}
