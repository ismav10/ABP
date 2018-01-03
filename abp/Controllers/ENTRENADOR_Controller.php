<?php

//Controlador para la gestión de usuarios
include '../Models/USUARIO_Model.php';
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

//Método que recoge la información del formulario para usuarios entrenadores
function get_data_form_Entrenador() {

    //Atributos comunes a entrenadores y deportistas
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

    if (!isset($_REQUEST['newPassword']) || $_REQUEST['newPassword'] == '') {
        $newPassword = '';
    } else {
        $newPassword = $_REQUEST['newPassword'];
    }

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $entrenador = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, "", "", $newPassword);

    return $entrenador;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

if (!isset($_REQUEST['user'])) {
    $_REQUEST['user'] = 'entrenador';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Insertar']:

        if ($_REQUEST['user'] == "entrenador") {
            if (!isset($_REQUEST['nombre'])) { //Si no se ha introducido ningun valor, mostramos la vista con el formulario
                new ENTRENADOR_Insertar('ENTRENADOR_Controller.php', 'ENTRENADOR_Controller.php?user=entrenador');
            } else {
                $entrenador = get_data_form_Entrenador(); //Recogemos los datos del formulario
                //Creamos las carpetas para guardar los archivos
                $carpetaFoto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/';

                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }

                $respuesta = $entrenador->Insertar();
                new Mensaje($respuesta, 'ENTRENADOR_Controller.php');
            }
        }
        break;




    case $strings['Modificar']:

        if (ConsultarTipoUsuario($_REQUEST['userName']) == 2) {
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('ENTRENADOR_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTRENADOR_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    new Entrenador_Modificar($valores, 'ENTRENADOR_Controller.php');
                }
            } else {
                $entrenador = get_data_form_Entrenador();

                $carpetaFoto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/';
                //Se realizan las modificaciones también en las carpetas de documentos
                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }
                $respuesta = $entrenador->Modificar();
                new Mensaje($respuesta, 'ENTRENADOR_Controller.php');
            }
        }
        break;


    case $strings['Borrar']:
        if (ConsultarTipoUsuario($_REQUEST['userName']) == 2) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('ENTRENADOR_Borrar')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTRENADOR_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new ENTRENADOR_Borrar($valores, 'ENTRENADOR_Controller.php');
                }
            } else {
                $entrenador = get_data_form_Entrenador();
                $respuesta = $entrenador->Borrar();
                new Mensaje($respuesta, 'ENTRENADOR_Controller.php');
            }
        }
        break;


    case $strings['Ver']:
        if (!isset($_REQUEST['nombre'])) {
            //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
            $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
            $valores = $usuario->RellenaDatos();
            $datos['actividades'] = $usuario->ConsultarActividades();
            if (!tienePermisos('ENTRENADOR_SELECT_SHOW')) {
                new Mensaje('No tienes los permisos necesarios', 'DEPORTISTA_Controller.php');
            } else {

                new ENTRENADOR_SELECT_SHOW($valores, $datos, 'ENTRENADOR_Controller.php');
            }
        }

        break;



    case $strings['Ver1']:
        if (!isset($_REQUEST['nombre'])) {
            //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
            $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
            $valores = $usuario->RellenaDatos();
            $datos['actividades'] = $usuario->ConsultarActividades();
            if (!tienePermisos('ENTRENADOR_SELECT_SHOW')) {
                new Mensaje('No tienes los permisos necesarios', 'DEPORTISTA_Controller.php');
            } else {

                new ENTRENADOR_SELECT_SHOW($valores, $datos, '../Controllers/DEPORTISTA_Controller.php?accion=' . $strings['MisActividades']);
            }
        }

        break;



    case $strings['VerMonitor']:
        if (!isset($_REQUEST['nombre'])) {
            //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
            $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
            $valores = $usuario->RellenaDatos();
            $datos['actividades'] = $usuario->ConsultarActividades();
            if (!tienePermisos('ENTRENADOR_SELECT_SHOW')) {
                new Mensaje('No tienes los permisos necesarios', 'ACTIVIDAD_GRUPAL_Controller.php');
            } else {

                new ENTRENADOR_SELECT_SHOW($valores, $datos, 'ACTIVIDAD_GRUPAL_Controller.php');
            }
        }

        break;



    case $strings['MisActividades']:
        $usuario = new USUARIO_Modelo($_SESSION['login'], '', ConsultarTipoUsuario($_SESSION['login']), '', '', '', '', '', '', '', '', '', '', '', '');
        //$valores = $usuario->RellenaDatos();
        $datos = $usuario->ConsultarActividades();
        if (!tienePermisos('ENTRENADOR_SHOW_GRUPALES')) {
            new Mensaje('No tienes los permisos necesarios', 'ACTIVIDAD_GRUPAL_Controller.php');
        } else {

            new ENTRENADOR_SHOW_GRUPALES($datos, 'ACTIVIDAD_GRUPAL_Controller.php');
        }
        break;


        
    case $strings['VerDeportistas']:
        $usuario = new USUARIO_Modelo($_SESSION['login'], '', ConsultarTipoUsuario($_SESSION['login']), '', '', '', '', '', '', '', '', '', '', '', '');
        //$valores = $usuario->RellenaDatos();
        $datos = $usuario->ConsultarDeportistasActividades($_REQUEST['idActividadGrupal']);
        if (!tienePermisos('DEPORTISTA_SHOW_ACTIVIDADES')) {
            new Mensaje('No tienes los permisos necesarios', '../Controllers/DEPORTISTA_Controller.php?accion=' . $strings['MisActividades']);
        } else {
            new DEPORTISTA_SHOW_ACTIVIDADES($datos, '../Controllers/DEPORTISTA_Controller.php?accion=' . $strings['MisActividades']);
        }
        break;





    default: //Por defecto se realiza el show all
        if (!isset($_REQUEST['userName'])) {
            $usuario = new USUARIO_Modelo('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
        } else {
            $usuario = get_data_form_Entrenador();
        }

        $datos = $usuario->ConsultarTodo($_REQUEST['user']);

        if (!tienePermisos('ENTRENADOR_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new ENTRENADOR_Show($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
