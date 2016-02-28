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
            'id' => $user->id,
            'nome' => $user->nome,
				'email' => $user->email,
				'usertypeid' => $user->usertypeid
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

	public function retrieve() {

		$title = 'Usuários cadastrados';

		$users = User::where('usertypeid', 2)->paginate();

		return View::make('login.list', compact('title', 'users'))
			->with('users', $users);

	}

   public function newUser() {

      $title = 'Cadastrar usuário';

		$buttonValue = 'Cadastrar';

		$actionUrl = URL::to('/login/cadastrar');

      return View::make('login.form', compact('title', 'buttonValue', 'actionUrl'));

   }

   public function create() {

      $request = Input::all();

      $request['usertypeid'] = 2;

      $rules = array(
         'nome' => 'required|alpha',
         'email' => 'required|email|unique:users,email',
         'senha' => 'required|alpha_num|between:8,12|same:senha2'
      );

      $validation = Validator::make($request, $rules);

      if ($validation->fails()) {
         return Redirect::action('LoginController@newUser')
            ->withErrors($validation)
            ->with('request', $request);
      }

      $request['senha'] = md5($request['senha']);

      User::create($request);

      return Redirect::action('LoginController@retrieve')
         ->with('class', 'success')
         ->with('msg', 'Cadastro realizado com sucesso!');

   }

	public function edit($userid) {

		$title = 'Alterar senha';

		$actionUrl = URL::to('/login/update/'.$userid);

		$buttonValue = 'Salvar';

		return View::make('login.update', compact('title', 'users', 'actionUrl', 'buttonValue'));

	}

	public function update($userid) {

		$request = Input::all();

		$user = User::auth(Session::get('user')['email'], md5($request['senha']));

		if(!$user) {
			return Redirect::action('LoginController@update', array('id' => $userid))
	         ->with('msg', 'Você não pode alterar pois senha atual incorreta ou o usuario que você está tentando alterar não é o seu, por favor tente novamente!');
		}

      $rules = array(
         'senha' => 'required|alpha_num|between:8,12',
			'senha1' => 'required|alpha_num|between:8,12|same:senha2|different:senha'
      );

      $validation = Validator::make($request, $rules);

      if ($validation->fails()) {
         return Redirect::action('LoginController@update', array('id' => $userid))
            ->withErrors($validation);
      }

      $request['senha'] = md5($request['senha1']);

		$user = User::find($userid);
		$user->senha = $request['senha'];
		$user->push();

      return Redirect::action('LoginController@retrieve')
         ->with('class', 'success')
         ->with('msg', 'Senha alterada com sucesso!');

	}

	public function delete($userid) {

		$user = User::find($userid);
		$user->delete();

		return Redirect::action('LoginController@retrieve')
         ->with('class', 'success')
         ->with('msg', 'Cadastro excluido com sucesso!');

	}

   public function logout() {

      Session::flush();

      return Redirect::action('HomeController@index')
         ->with('msg', 'Logout realizado com sucesso!');

   }

}
