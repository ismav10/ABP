<?php

//Controlador para la gestión de usuarios
include '../Models/NOTIFICACION_Model.php';
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
if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

//Este get data form se usa para obtener los datos en el caso de una inserción.
//En el caso de la inserción el username y usuario van a ser el mismo.
function get_data_form() {
    $idNotificacion = $_REQUEST['idNotificacion'];
    $remitenteNotificacion = $_REQUEST['remitenteNotificacion'];
    $destinatarioNotificacion = $_REQUEST['destinatarioNotificacion'];
    $fechaHoraNotificacion = $_REQUEST['fechaHoraNotificacion'];
    $asuntoNotificacion = $_REQUEST['asuntoNotificacion'];
    $mensajeNotificacion = $_REQUEST['mensajeNotificacion'];
    $userName = $_REQUEST['userName'];


    $notificacion = new NOTIFICACION_Model($idNotificacion, $remitenteNotificacion, $destinatarioNotificacion, $fechaHoraNotificacion, $asuntoNotificacion, $mensajeNotificacion, $userName);
    return $notificacion;
}

switch ($_REQUEST['accion']) {
    case $strings['Insertar']:
        if (!isset($_REQUEST['username'])) {
            new NOTIFICACION_Insertar();
        } else {
            $notificacion = get_data_form();
            $respuesta = $notificacion->Insertar();
            //COMPLETAR AQUI ENVIANDO LA RESPUESTA.
        }
        break;
    //En el caso de que quiera consultar una notificacion en concreto creo la notificacion solo con el id que va a venir de la vista,
    //llamo a la funcion que obtiene los datos sobre esa notificacion y creo una vista showcurrent mostrando los datos y con el controlador de las notificaciones.
    case $strings['Ver']:
        if ($_REQUEST['idNotificacion'] != '') {
            $idNotificacion = $_REQUEST['idNotificacion'];
            $notificacion = new NOTIFICACION_Model($idNotificacion, '', '', '', '', '', '');
            $resultado = $notificacion->VerDetalleNotificacion();
            new NOTIFICACION_Seleccionar($resultado, 'NOTIFICACION_Controller.php');
        }
        break;


    //Por defecto se realiza un show all de las notificaciones a las que tiene acceso el usuario.
    default:
        if (!tienePermisos('NOTIFICACION_Listar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $notificacion = new NOTIFICACION_Model('', '', '', '', '', '', $_SESSION['login']);
            $datos = $notificacion->Listar();
            new NOTIFICACION_Listar($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
