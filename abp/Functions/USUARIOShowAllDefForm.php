<?php

//Formulario para listar los usuarios
$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'userName',
        'value' => '',
        'size' => 25,
        'required' => 'true',
        ///^[a-z\d_]{4,15}$/i
        'pattern' => '',
        'validation' => 'onblur=\'funcion(xxxx)\'',
        'readonly' => false
    ),
    1 => array(
        'type' => 'password',
        'name' => 'password',
        'value' => '',
        'size' => 25,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'nombre',
        'value' => '',
        'size' => 20,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    3 => array(
        'type' => 'text',
        'name' => 'apellidos',
        'value' => '',
        'size' => 45,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'text',
        'name' => 'dni',
        'value' => '',
        'size' => 9,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    5 => array(
        'type' => 'date',
        'name' => 'fechaNac',
        'value' => '',
        'min' => '1900-01-01',
        'max' => '2017-11-01',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    6 => array(
        'type' => 'text',
        'name' => 'direccion',
        'value' => '',
        'size' => 80,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    7 => array(
        'type' => 'email',
        'name' => 'email',
        'value' => '',
        'size' => 50,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    8 => array(
        'type' => 'text',
        'name' => 'telefono',
        'value' => '',
        'size' => 15,
        'required' => true,
        'pattern' => '{0-9}',
        'validation' => '',
        'readonly' => false
    ),
    9 => array(
        'type' => 'select',
        'name' => 'IDIOMA',
        'multiple' => 'false',
        'value' => '',
        'options' => array('Castellano', 'Galego', 'English'),
        'required' => 'true',
        'readonly' => false
    ),
    10 => array(
        'type' => 'file',
        'name' => 'foto',
        'value' => '',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    11 => array(
        'type' => 'text',
        'name' => 'cuentaBanc',
        'value' => '',
        'size' => 24,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    12 => array(
        'type' => 'select',
        'name' => 'tipoDeportista',
        'multiple' => 'false',
        'value' => '',
        'options' => array('PEF', 'TDU'),
        'required' => 'true',
        'readonly' => false
    ),
    13 => array(
        'type' => 'text',
        'name' => 'metodoPago',
        'value' => '',
        'size' => 24,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);
$DefForm = AñadirTipos($form);
?>
