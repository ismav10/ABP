<?php

//Controlador para la gestión de usuarios
include '../Models/SESION_Model.php';
include '../Views/MENSAJE_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

Switch ($_REQUEST['accion'])
{ //Actúa según la acción elegida

    
    
    
    default:
        //if (!tienePermisos('SESION_Listar')) {
            //new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        //} else {
            $sesion = new SESION_Model($_REQUEST['userName'], '', '', '', '', '', '', '');
            $datos = "";
			//require_once '../Views/ESTADISTICAS_SHOWALL.php';
            new ESTADISTICAS_SHOWALL($datos, 'SESION_Controller.php');
        //}
}
?>
