<?php

//Formulario para el registro de nuevos usuarios
$form = array(
	0 => array(
	'type' => 'text',
	'name' => 'USUARIO_NOMBRE',
	'value' => '',
	'size' => 25,
	'required' => true,
	'pattern' => '',
	'validation' => '',
	'readonly' => false
	),
	1 => array(
		'type' => 'text',
		'name' => 'USUARIO_APELLIDO',
		'value' => '',
		'size' => 50,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	2 => array(
		'type' => 'text',
		'name' => 'USUARIO_DNI',
		'value' => '',
		'size' => 9,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	3 => array(
		'type' => 'date',
		'name' => 'USUARIO_FECH_NAC',
		'value' => '',
		'min' => '1900-01-01',
		'max' => '2017-01-01',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	4 => array(
		'type' => 'text',
		'name' => 'USUARIO_DIRECCION',
		'value' => '',
		'size' => 80,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	5 => array(
		'type' => 'email',
		'name' => 'USUARIO_EMAIL',
		'value' => '',
		'size' => 50,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	6 => array(
		'type' => 'text',
		'name' => 'USUARIO_TELEFONO',
		'value' => '',
		'size' => 15,
		'required' => true,
		'pattern' => '{0-9}',
		'validation' => '',
		'readonly' => false
	),

	7 => array(
		'type' => 'text',
		'name' => 'USUARIO_CUENTA',
		'value' => '',
		'size' => 24,
		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	8 => array(
		'type' => 'file',
		'name' => 'USUARIO_NOMINA',
		'value' => '',

		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),



	9=> array(
		'type' => 'text',
		'name' => 'USUARIO_COMENTARIOS',
		'value' => '',
		'size' => 80,
		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	10 => array(
		'type' => 'text',
		'name' => 'USUARIO_USER',
		'value' => '',
		'size' => 25,
		'required' => 'true',
		///^[a-z\d_]{4,15}$/i
		'pattern' => '',
		'validation' => 'onblur=\'funcion(xxxx)\'',
		'readonly' => false
	),
	11=> array(
		'type' => 'password',
		'name' => 'USUARIO_PASSWORD',
		'value' => '',
		'size' => 25,
		'required' => 'true',
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	12 => array(
		'type' => 'select',
		'name' => 'IDIOMA',
		'multiple' => 'false',
		'value' => '',
		'options' => array('Castellano','Galego', 'English'),
		'required' => 'true',
		'readonly' => false
	)
	,
	13 => array(
		'type' => 'select',
		'name' => 'USUARIO_ESTADO',
		'multiple' => 'false',
		'value' => '',
		'options' => array('Activo','Inactivo'),
		'required' => 'true',
		'readonly' => false
	),
	14 => array(
		'type' => 'file',
		'name' => 'USUARIO_FOTO',

		'value' => '',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	)

)


?>
