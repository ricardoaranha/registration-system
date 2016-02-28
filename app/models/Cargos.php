<?php

class Cargos extends Eloquent {

	protected $table = 'cargos';

	public $timestamps = false;

	protected $fillable = array(
		'cargo',
		'seletivoid',
		'escolaridadeid',
		'salario',
		'cargahoraria',
		'vagas'
	);

}
