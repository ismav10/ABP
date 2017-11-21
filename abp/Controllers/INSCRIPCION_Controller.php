<?php

//Controlador para la gestión de usuarios
include '../Models/INSCRIPCION_Model.php';
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

    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $tipoUsuario = ConsultarIDRol($_REQUEST['tipoUsuario']);
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $fechaNac = $_REQUEST['fechaNac'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $cuentaBanc = $_REQUEST['cuentaBanc'];

    $inscripcion = new INSCRIPCION_Modelo();

    return $entrenador;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Aceptar']:

        $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
        $respuesta = $inscripcion->Aceptar();
        new Mensaje($respuesta, 'INSCRIPCION_Controller.php');

        break;


    case $strings['Rechazar']:


        $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
        $respuesta = $inscripcion->Rechazar();
        new Mensaje($respuesta, 'INSCRIPCION_Controller.php');


        break;


    default: //Por defecto se realiza el show all
        if (!isset($_REQUEST['idInscripcion'])) {
            $inscripcion = new INSCRIPCION_Model('', '', '', '');
        } else {
            $inscripcion = get_data_form();
        }

        $datos = $inscripcion->ConsultarTodo();

        if (!tienePermisos('INSCRIPCIONPENDIENTE_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new INSCRIPCIONPENDIENTE_Show($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
