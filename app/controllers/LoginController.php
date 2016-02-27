<?php

class LoginController extends BaseController {

	public function index() {

		$title = 'Login';

		return View::make('login.login', compact('title'));

	}

   public function auth() {

      $request = Input::all();

      $request['senha'] = md5($request['senha']);

      $user = DB::table('users')
         ->where('email', '=', $request['email'])
         ->where('senha', '=', $request['senha'])
         ->get();

      if ($user) {
         return Redirect::action('HomeController@index');
      } else {
         return Redirect::action('LoginController@index')
            ->with('msg', 'Email e ou senha invalidos, por favor tente novamente!');
      }

   }

   public function newUser() {

      $title = 'Cadastrar';

      return View::make('login.novoUsuario', compact('title'));

   }

   public function create() {

      $request = Input::all();

      if($request['senha1'] != $request['senha2']) {
         return Redirect::action('LoginController@newUser')
            ->with('msg', 'Senhas diferente, por favor certifique-se de digitar a mesnha senha corretamente');
      }

      $rules = array(
         'nome' => array('required'),
         'email' => array('required', 'email'),
         'cpf' => array('required', 'numeric', 'min:11', 'max:11'),
         'rg' => array('required', 'numeric'),
         'dataNascimento' => array('required', 'date_format:d/m/Y'),
         'senha' => array('required', 'alpha_num')
      );

      $validation = Validator::make($request, $rules);

      if ($validation->fails()) {
         return Redirect::action('LoginController@newUser')
            ->withErrors($validation)
            ->with('request', $request);
      }

   }

}
