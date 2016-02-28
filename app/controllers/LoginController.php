<?php

class LoginController extends BaseController {

	public function index() {

		$title = 'Login';

		return View::make('login.login', compact('title'));

	}

   public function auth() {

      $request = Input::all();

      $request['senha'] = md5($request['senha']);

      $user = User::auth($request['email'],$request['senha']);

      if ($user) {

         $user = array(
            'id' => $user->userid,
            'nome' => $user->nome
         );

         Session::put('user', $user);

         return Redirect::action('HomeController@index')
            ->with('msg', 'Login realizado com sucesso!');

      } else {

         return Redirect::action('LoginController@index')
            ->wiht('class', 'danger')
            ->with('msg', 'Email e ou senha invalidos, por favor tente novamente!');

      }

   }

   public function newUser() {

      $title = 'Cadastrar';

      return View::make('login.novoUsuario', compact('title'));

   }

   public function create() {

      $request = Input::all();

      $request['usertypeid'] = 1;

      if ($request['senha'] != $request['senha2']) {
         return Redirect::action('LoginController@newUser')
            ->with('msg', 'Senhas diferente, por favor certifique-se de digitar a mesnha senha corretamente');
      }

      $rules = array(
         'nome' => 'required|regex:/^[a-z A-Z]+$/',
         'email' => 'required|email|unique:users,email',
         'cpf' => 'required|numeric|digits:11|unique:users,cpf',
         'rg' => 'required|numeric',
         'dtanasc' => 'required|date_format:d/m/Y',
         'senha' => 'required|alpha_num|between:8,12'
      );

      $validation = Validator::make($request, $rules);

      if ($validation->fails()) {
         return Redirect::action('LoginController@newUser')
            ->withErrors($validation)
            ->with('request', $request);
      }

      $request['senha'] = md5($request['senha']);

      // User::create($request);

      return Redirect::action('LoginController@index')
         ->with('class', 'success')
         ->with('msg', 'Cadastro realizado com sucesso!');

   }

   public function logout() {

      Session::flush();

      return Redirect::action('HomeController@index')
         ->with('msg', 'Lougt realizado com sucesso!');

   }

}
