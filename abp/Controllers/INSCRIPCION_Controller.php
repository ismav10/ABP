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

        if ($_REQUEST['act'] == 'grupal') {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
            $respuesta = $inscripcion->AceptarGrupal();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php?act=grupal');
        } else {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
            $respuesta = $inscripcion->AceptarIndividual();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php?act=individual');
        }

        break;


    case $strings['Rechazar']:

        if ($_REQUEST['act'] == 'grupal') {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
            $respuesta = $inscripcion->RechazarGrupal();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php?act=grupal');
        } else {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['userName'], $_REQUEST['actividad'], '', '');
            $respuesta = $inscripcion->RechazarIndividual();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php?act=individual');
        }

        break;


    default: //Por defecto se realiza el show all

        if ($_REQUEST['act'] == 'grupal') {
            if (!isset($_REQUEST['idInscripcion'])) {
                $inscripcion = new INSCRIPCION_Model('', '', '', '');
            } else {
                $inscripcion = get_data_form();
            }

            $datos = $inscripcion->ConsultarTodoGrupales();
        } else {
            if (!isset($_REQUEST['idInscripcion'])) {
                $inscripcion = new INSCRIPCION_Model('', '', '', '');
            } else {
                $inscripcion = get_data_form();
            }

            $datos = $inscripcion->ConsultarTodoIndividuales();
        }
        if (!tienePermisos('INSCRIPCIONPENDIENTE_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new INSCRIPCIONPENDIENTE_Show($datos, $_REQUEST['act'], '../Views/DEFAULT_Vista.php');
        }
}
?>
