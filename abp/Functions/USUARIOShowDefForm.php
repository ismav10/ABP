<?php
//Formulario para mostrar la consulta de usuarios
$DefForm2 = array(
	0 => array(
		'type' => 'text',
		'name' => 'USUARIO_NOMBRE',
		'value' => '',
		'texto'=>'USUARIO_NOMBRE2',
		'size' => 25,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	1 => array(
		'type' => 'text',
		'name' => 'USUARIO_APELLIDO',
		'texto'=>'USUARIO_APELLIDO2',

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
		'texto'=>'USUARIO_DNI2',
		'value' => '',
		'size' => 9,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	3=> array(
		'type' => 'text',
		'name' => 'USUARIO_USER',
		'texto'=>'USUARIO_USER2',
		'value' => '',
		'size' => 25,
		'required' => 'true',
		'pattern' => '{a-z}{A-Z}{0-9}',
		'validation' => 'onblur=\'funcion(xxxx)\'',
		'readonly' => false
	)
)


?>
