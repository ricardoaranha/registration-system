<?php

class Seletivos extends Eloquent {

	protected $table = 'seletivos';

	public $timestamps = false;

	protected $fillable = array(
		'seletivo',
		'dtainicio',
		'dtafim',
		'descricao'
	);

}
