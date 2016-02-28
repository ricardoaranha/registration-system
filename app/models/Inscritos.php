<?php

class Inscritos extends Eloquent {

	protected $table = 'inscritos';

	public $timestamps = false;

	protected $fillable = array(
		'seletivoid',
		'cargoid'
	);

}
