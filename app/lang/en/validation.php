<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => array(
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	),
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'nome' => array(
			'required' => 'O campo NOME é obrigatorio!',
			'alpha' => 'O campo NOME deve conter apenas letras!'
		),
		'email' => array(
			'required' => 'O campo EMAIL é obrigatorio!',
			'email' => 'O endereço de EMAIL digitado seve ser valido!<br />ex: nome@email.com',
			'unique' => 'O EMAIL digitado já foi cadastrado!'
		),
		'cpf' => array(
			'required' => 'O campo CPF é obrigatorio!',
			'numeric' => 'O CPF deve conter apenas números!',
			'digits' => 'O CPF deve conter apenas 11 digitos!',
			'unique' => 'O CPF digitado já foi cadstrado!'
		),
		'rg' => array(
			'required' => 'O campo RG é obrigatorio!',
			'numeric' => 'O RG deve conter apenas números!'
		),
		'dtanasc' => array(
			'required' => 'O campo DATA DE NASCIMENTO é obrigatorio!',
			'date_format' => 'O fromato da DATA DE NASCIMENTO deve ser dia/mês/ano'
		),
		'senha' => array(
			'required' => 'O campo SENHA é obrigatorio!',
			'same' => 'Senhas diferentes, por favor certifique-se de digitar a mesnha senha corretamente',
			'alpha_num' => 'A SENHA deve conter apenas letras e nímeros',
			'between' => 'A SENHA deve ter entre 8 e 12 caracteres!',
			'exists' => 'A SENHA atual está incorreta, por favor certifique-se de digitar a senha atual corretamente'
		),
		'senha1' => array(
			'different' => 'A NOVA SENHA deve ser diferente da SENHA ATUAL',
			'same' => 'Senhas diferentes, por favor certifique-se de digitar a mesnha senha corretamente',
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
