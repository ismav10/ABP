<?php

//Controlador para la gestión de instalaciones
include '../Models/INSTALACION_Model.php';
include '../Views/MENSAJE_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

function get_data_form() {

    //Atributos de instalacion

    if (!isset($_REQUEST['idInstalacion'])) {
        $idInstalacion = '';
    } else {
        $idInstalacion = $_REQUEST['idInstalacion'];
    }

    $nombreInstalacion = $_REQUEST['nombreInstalacion'];
    $descripcionInstalacion = $_REQUEST['descripcionInstalacion'];
	$aforoInstalacion = $_REQUEST['aforoInstalacion'];

    $instalacion = new INSTALACION_Model($idInstalacion, $nombreInstalacion, $descripcionInstalacion, $aforoInstalacion);

    return $instalacion;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case 'guardar':
        print_r($_POST);
        exit(0);
        $idInstalacion = $_REQUEST['idInstalacion'];
        $instalacion = get_data_form();
        $instalacion->guardarCambios($idInstalacion);

        break;

    case $strings['Insertar']:

		if (!tienePermisos('INSTALACION_Insertar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
		}else{
        if (!isset($_REQUEST['nombreInstalacion'])) { //Si no se ha introducido ningun valor, mostramos la vista con el formulario
            $instalacion = new INSTALACION_Model('', '', '', '');
            $datos = $instalacion->RellenaDatos();
            new INSTALACION_Insertar($datos, '../Views/DEFAULT_Vista.php');
        } else {
            //Recogemos los datos del formulario
            $instalacion = get_data_form();
            $respuesta = $instalacion->Insertar();
            new Mensaje($respuesta, 'INSTALACION_Controller.php');
        }
		}break;

    case $strings['Modificar']:


        if (!tienePermisos('INSTALACION_Modificar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            if (!isset($_REQUEST['nombreInstalacion'])) {
                $instalacion = new INSTALACION_Model($_REQUEST['idInstalacion'], '', '', '');
                $datos = $instalacion->RellenaDatos();
                new INSTALACION_Modificar($datos, '../Views/DEFAULT_Vista.php');
            } else {
                $idInstalacion = $_REQUEST['idInstalacion'];
                $instalacion = get_data_form();
                $instalacion->guardarCambios($idInstalacion);
                $datos = $instalacion->Listar();
                new INSTALACION_Listar($datos, '../Controllers/INSTALACION_Controller.php');
            }
        }
        break;



    case $strings['Borrar']:

        if (!isset($_REQUEST['idInstalacion'])) {
            $instalacion = new INSTALACION_Model($_REQUEST['idInstalacion'], '', '', '');
            $valores = $instalacion->RellenaDatos();
            if (!tienePermisos('INSTALACION_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            } else {
                new INSTALACION_Borrar($valores, 'INSTALACION_Controller.php');
            }
        } else {
            $instalacion = new INSTALACION_Model($_REQUEST['idInstalacion'], '', '', '');
            $respuesta = $instalacion->Borrar();
            new Mensaje($respuesta, '../Controllers/INSTALACION_Controller.php');
        }
        break;


    case $strings['Consultar']:

        if ((!isset($_REQUEST['nombreInstalacion']))) {

            if (!tienePermisos('INSTALACION_Consultar')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            }
            new INSTALACION_Consultar('../Views/INSTALACION_Controller.php');
        } else {

            if (!isset($_REQUEST['nombreInstalacion'])) {
                $nombreInstalacion = '';
            } else {
                $nombreInstalacion = $_REQUEST['nombreInstalacion'];
            }

            $instalacion = new INSTALACION_Model('', $nombreInstalacion, '', '');
            $datos = $instalacion->Consultar();
            new INSTALACION_Listar($datos, '../Views/INSTALACION_Controller.php');
        }
        break;


    case $strings['Ver']:

        if (isset($_REQUEST['idInstalacion'])) {
            $instalacion = new INSTALACION_Model($_REQUEST['idInstalacion'], '', '', '');
            $datos = $instalacion->RellenaDatos();
            if (!tienePermisos('INSTALACION_VerDetalle')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            } else {
                new INSTALACION_VerDetalle($datos, '../Views/DEFAULT_Vista.php');
            }
        }

        break;



    default: //Por defecto se realiza el show all
        if (!tienePermisos('INSTALACION_Listar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $instalacion = new INSTALACION_Model('', '', '', '');
            $datos = $instalacion->Listar();
            new INSTALACION_Listar($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
