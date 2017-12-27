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
        if (!tienePermisos('NOTIFICACION_Insertar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            if (!isset($_REQUEST['username'])) {
                //Si es administrador le pasa todos los usuarios a la vista
                if(ConsultarTipoUsuario($_SESSION['login'])==1)
                {
                    $notificacion = new NOTIFICACION_Model('','','','','','',$_SESSION['login']);
                    $datos = $notificacion->ConsultarUsuarios();
                new NOTIFICACION_Insertar($datos,'../Controllers/NOTIFICACION_Controller.php');
                }
                //Si es entrenador le pasa solo los deportistas a la vista
                else 
                    if(ConsultarTipoUsuario($_SESSION['login'])==2)
                    {
                    $notificacion = new NOTIFICACION_Model('','','','','','',$_SESSION['login']);
                    $datos = $notificacion->ConsultarDeportistas();
                        new NOTIFICACION_Insertar($datos,'../Controllers/NOTIFICACION_Controller.php');
                    }            
            } else {
                $notificacion = new NOTIFICACION_Model('', '', $_REQUEST['destinatarioNotificacion'], '', $_REQUEST['asuntoNotificacion'], $_REQUEST['mensajeNotificacion'], $_SESSION['login']);
                $respuesta = $notificacion->Insertar();
                new Mensaje($respuesta, '../Controllers/NOTIFICACION_Controller.php');
            }
        }
        break;

    case $strings['Borrar']:
        if (!isset($_REQUEST['identificador'])) {
            $notificacion = new NOTIFICACION_Model($_REQUEST['idNotificacion'], '', '', '', '', '', '');
            $valores = $notificacion->RellenaDatos();
            if (!tienePermisos('NOTIFICACION_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            } else {
                new NOTIFICACION_Borrar($valores, 'NOTIFICACION_Controller.php');
            }
        } else {
            $notificacion = new NOTIFICACION_Model($_REQUEST['identificador'], '', '', '', '', '', '');
            $respuesta = $notificacion->Borrar();
            new Mensaje($respuesta, '../Controllers/NOTIFICACION_Controller.php');
        }
        break;

    case $strings['Consultar']:
        if (!isset($_REQUEST['consulta'])) {
            if (!tienePermisos('NOTIFICACION_Consultar')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            } else {
                new NOTIFICACION_Consultar('../Controllers/NOTIFICACION_Controller.php');
            }
        } else {
            $notificacion = new NOTIFICACION_Model('',$_REQUEST['Remitente'],'','',$_REQUEST['Asunto'],'',$_SESSION['login']);
            $datos = $notificacion->Consultar();
            $tipoUsuario = ConsultarTipoUsuario($_SESSION['login']);
            new NOTIFICACION_Listar($datos, $tipoUsuario, '../Controllers/NOTIFICACION_Controller.php');
        }

    //En el caso de que quiera consultar una notificacion en concreto creo la notificacion solo con el id que va a venir de la vista,
    //llamo a la funcion que obtiene los datos sobre esa notificacion y creo una vista showcurrent mostrando los datos y con el controlador de las notificaciones.
    case $strings['Ver']:
        if (!tienePermisos('NOTIFICACION_Seleccionar')) {
            new Mensaje('No tienes los permisos necesarios', '../Controllers/NOTIFICACION_Controller.php');
        } else {
            if (!isset($_REQUEST['idNotificacion'])) {
                
            } else {
                $idNotificacion = $_REQUEST['idNotificacion'];
                $notificacion = new NOTIFICACION_Model($idNotificacion, '', '', '', '', '', '');
                $resultado = $notificacion->RellenaDatos();
                new NOTIFICACION_Seleccionar($resultado, '../Controllers/NOTIFICACION_Controller.php');
            }
        }
        break;


    //Por defecto se realiza un show all de las notificaciones a las que tiene acceso el usuario.
    default:
        if (!tienePermisos('NOTIFICACION_Listar')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $notificacion = new NOTIFICACION_Model('', '', '', '', '', '', $_SESSION['login']);
            $datos = $notificacion->Listar();
            $tipoUsuario = ConsultarTipoUsuario($_SESSION['login']);
            new NOTIFICACION_Listar($datos, $tipoUsuario, '../Controllers/NOTIFICACION_Controller.php');
        }
}
?>
