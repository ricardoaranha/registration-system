<?php

class User extends Eloquent {

	protected $table = 'users';

	public $timestamps = false;

	protected $fillable = array(
		'nome',
		'email',
		'usertypeid',
		'cpf',
		'rg',
		'dtanasc',
		'senha'
	);

	protected function auth($email, $senha) {

		return DB::table('users')
			->where('email', $email)
			->where('senha', $senha)
			->first();

	}

}
